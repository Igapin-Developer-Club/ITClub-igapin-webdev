import React, { useState, useRef, useEffect } from 'react';

import SectionHeader from '../section/SectionHeader';

import Notification from '../notification/Notification';

import Loader from '../loader/Loader';
import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

import FormSelect from '../form/FormSelect';

import SelectableUserStatusList from '../user-status/SelectableUserStatusList';
import GroupInvitationStatusList from '../user-status/user-status-group/user-status-group-invitation/GroupInvitationStatusList';

import * as userRouter from '../../router/user/user-router';
import * as groupMemberRouter from '../../router/group-member/group-member-router';

const getInviteableFriends = (user, group) => {
  const inviteableFriends = [];

  for (const friend of user.friends) {
    // friend isn't a member of the group
    if (!group.members.some(member => member.id === friend.id)) {
      // friend isn't banned from the group
      if (!group.banned.some(bannedMember => bannedMember.id === friend.id)) {
        // friend hasn't already been invited to the group
        if (!user.group_invitations_sent.some(invitation => (invitation.user.id === friend.id) && (group.id === invitation.group.id))) {
          // add friend as selectable to invite
          inviteableFriends.push(friend);
        }
      }
    }
  }

  return inviteableFriends;
};

function SendGroupInvitationsSettingsScreen(props) {
  const [loggedUser, setLoggedUser] = useState(false);

  const [groups, setGroups] = useState([]);

  const [selectedGroupID, setSelectedGroupID] = useState(false);
  const [selectedFriends, setSelectedFriends] = useState(false);

  const [sendingInvitations, setSendingInvitations] = useState(false);

  const friends = useRef([]);

  useEffect(() => {
    getLoggedInMember();
  }, []);

  const getLoggedInMember = () => {
    userRouter.getLoggedInMember('user-groups-invitations')
    .done((response) => {
      // console.log('SEND GROUP INVITATIONS SETTINGS SCREEN - LOGGED IN USER: ', response);

      let groupOptions = [];
      let newSelectedGroupID = false;

      const unbannedGroups = response.groups.filter(group => !group.is_banned);

      // if logged user belongs to any groups
      if (unbannedGroups.length > 0) {
        groupOptions = unbannedGroups.map(group => ({id: group.id, name: group.name, value: group.id}));
        newSelectedGroupID = groupOptions[0].value;

        const selectedGroup = response.groups.filter(group => group.id === Number.parseInt(newSelectedGroupID, 10))[0];

        friends.current = getInviteableFriends(response, selectedGroup);
      }

      setLoggedUser(response);
      setGroups(groupOptions);
      setSelectedGroupID(selectedGroupID ? selectedGroupID : newSelectedGroupID);
      setSelectedFriends((new Array(friends.current.length)).fill(false));
      setSendingInvitations(false);
    });
  };

  const handleSelectedGroupIDChange = (e) => {
    setSelectedGroupID(e.target.value);
  };

  const toggleSelectableActive = (i) => {
    setSelectedFriends(previousSelectedFriends => {
      const newSelectedFriends = previousSelectedFriends.slice();

      newSelectedFriends[i] = !newSelectedFriends[i];

      return newSelectedFriends;
    });
  };

  const sendInvitations = () => {
    const aFriendIsSelected = selectedFriends.some(selected => selected);

    // if already sending invitations or no friend is selected, return
    if (sendingInvitations || !aFriendIsSelected) {
      return;
    }

    setSendingInvitations(true);

    // send invitation promises
    const sendInvitationPromises = [];

    for (let i = 0; i < friends.current.length; i++) {
      // if friend selected
      if (selectedFriends[i]) {
        const sendInvitationPromise = groupMemberRouter.sendGroupInvitation({
          group_id: selectedGroupID,
          user_id: friends.current[i].id
        });

        sendInvitationPromises.push(sendInvitationPromise);
      }
    }

    jQuery
    .when(...sendInvitationPromises)
    .done((...sendInvitationResults) => {
      // console.log('SEND GROUP INVITATIONS SETTINGS SCREEN - SEND INVITATIONS RESPONSE: ', sendInvitationResults);
      
      // update logged in member
      getLoggedInMember();
    })
    .fail((error) => {
      // console.log('SEND GROUP INVITATIONS SETTINGS SCREEN - SEND INVITATIONS ERROR: ', error);

      setSendingInvitations(false);
    });
  };

  const selectedGroup = loggedUser ? loggedUser.groups.filter(group => group.id === Number.parseInt(selectedGroupID, 10))[0] : false;

  if (selectedGroup) {
    friends.current = getInviteableFriends(loggedUser, selectedGroup);
  }

  // console.log('SEND GROUP INVITATIONS SETTINGS SCREEN - SELECTED GROUP: ', selectedGroup);
  // console.log('SEND GROUP INVITATIONS SETTINGS SCREEN - INVITABLE FRIENDS: ', friends.current);

  const sentGroupInvitations = [];

  if (loggedUser) {
    const groupedSentGroupInvitations = {};

    for (const sentInvitation of loggedUser.group_invitations_sent) {
      if (typeof groupedSentGroupInvitations[sentInvitation.group.id] === 'undefined') {
        groupedSentGroupInvitations[sentInvitation.group.id] = [];
      }

      groupedSentGroupInvitations[sentInvitation.group.id].push(sentInvitation);
    }

    for (const groupID in groupedSentGroupInvitations) {
      sentGroupInvitations.push(groupedSentGroupInvitations[groupID]);
    }
  }

  // console.log('SEND GROUP INVITATIONS SETTINGS SCREEN - SENT GROUP INVITATIONS: ', sentGroupInvitations);

  return (
    <div className="account-hub-content">
      <SectionHeader pretitle={vikinger_translation.groups} title={vikinger_translation.send_invitations} />
    {
      !loggedUser &&
        <Loader />
    }
    {
      loggedUser &&
        <React.Fragment>
        {
          (loggedUser.groups.length === 0) &&
            <Notification title={vikinger_translation.send_invitations_no_results_title}
                          text={vikinger_translation.send_invitations_no_results_text_1}
            />
        }

        {
          (loggedUser.groups.length > 0) &&
            <React.Fragment>
            {
              (groups.length === 0) &&
                <Notification title={vikinger_translation.send_invitations_no_results_title}
                              text={vikinger_translation.send_invitations_no_results_text_2}
                />
            }

            {
              (groups.length > 0) &&
                <React.Fragment>
                  {/* WIDGET BOX */}
                  <div className="widget-box no-padding">
                    <p className="widget-box-title">{vikinger_translation.select_the_group}</p>

                    {/* WIDGET BOX CONTENT */}
                    <div className="widget-box-content">
                      {/* FORM */}
                      <div className="form padded">
                        <div className="form-row">
                          <div className="form-item">
                            <FormSelect options={groups}
                                        name="selectedGroupID"
                                        value={selectedGroupID}
                                        handleValue
                                        onChange={handleSelectedGroupIDChange}
                            />
                          </div>
                        </div>
                      </div>
                      {/* FORM */}
                    </div>
                    {/* WIDGET BOX CONTENT */}

                    <p className="widget-box-title">{vikinger_translation.select_your_friends}</p>

                    {/* WIDGET BOX HOLLOW */}
                    <div className="widget-box-hollow height-limit">
                    {
                      (friends.current.length === 0) &&
                        <p className="no-results-text">{vikinger_translation.send_invitations_friends_no_results}</p>
                    }

                    {
                      (friends.current.length > 0) &&
                        <SelectableUserStatusList data={friends.current}
                                                  loggedUser={loggedUser}
                                                  selectedItems={selectedFriends}
                                                  toggleSelectableActive={toggleSelectableActive}
                        />
                    }
                    </div>
                    {/* /WIDGET BOX HOLLOW */}

                    {/* WIDGET BOX FOOTER ACTIONS */}
                    <div className="widget-box-footer-actions">
                      <div className="button secondary" onClick={sendInvitations}>
                        {
                          !sendingInvitations &&
                            vikinger_translation.send_invitations
                        }
                        {
                          sendingInvitations &&
                            <React.Fragment>
                              {vikinger_translation.sending}
                              <LoaderSpinnerSmall />
                            </React.Fragment>
                        }
                      </div>
                    </div>
                    {/* WIDGET BOX FOOTER ACTIONS */}
                  </div>
                  {/* WIDGET BOX */}

                  <SectionHeader pretitle={vikinger_translation.groups} title={vikinger_translation.pending_invitations} />
                  {
                    (sentGroupInvitations.length === 0) &&
                      <Notification title={vikinger_translation.pending_invitations_no_results_title}
                                    text={vikinger_translation.pending_invitations_no_results_text}
                      />
                  }

                  {
                    (sentGroupInvitations.length > 0) &&
                      <div className="grid">
                      {
                        sentGroupInvitations.map((groupInvitations) => {
                          return (
                            <div key={groupInvitations[0].group.id} className="widget-box">
                              <p className="widget-box-title">{groupInvitations[0].group.name}</p>

                              <div className="widget-box-content">
                                <GroupInvitationStatusList  data={groupInvitations}
                                                            loggedUser={loggedUser}
                                                            onActionComplete={getLoggedInMember}
                                />
                              </div>
                            </div>
                          );
                        })
                      }
                      </div>
                  }
                </React.Fragment>
            }
            </React.Fragment>
        }
        </React.Fragment>
    }
    </div>
  );
}

export { SendGroupInvitationsSettingsScreen as default };