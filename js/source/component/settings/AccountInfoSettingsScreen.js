import React, { useState, useEffect, useRef } from 'react';

import SectionHeader from '../section/SectionHeader';

import Loader from '../loader/Loader';
import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

import SettingsWidget from './SettingsWidget';

import * as userRouter from '../../router/user/user-router';
import * as memberRouter from '../../router/member/member-router';

import { getGroups } from '../utils/xprofile';

function AccountInfoSettingsScreen(props) {
  const [loggedUser, setLoggedUser] = useState(false);

  const [profileDataGroups, setProfileDataGroups] = useState([]);
  const [profileDataFields, setProfileDataFields] = useState({});

  const [saving, setSaving] = useState(false);

  const getLoggedInMember = () => {
    userRouter.getLoggedInMember('user-settings')
    .done((response) => {
      // console.log('ACCOUNT INFO SETTINGS SCREEN - LOGGED IN USER: ', response);

      // get social data
      const loggedUserProfileDataGroups = getGroups(response.profile_data, 'account');

      setLoggedUser(response);
      setProfileDataGroups(loggedUserProfileDataGroups);
    });
  };

  useEffect(() => {
    getLoggedInMember();
  }, []);

  const updateProfileData = (field, value) => {
    // update profile data fields with new value
    // this is used to update fields when saving

    setProfileDataFields(previousProfileDataFields => {
      return {
        ...previousProfileDataFields,
        [field.id]: value
      };
    });
  };

  const save = () => {
    // return if already saving
    if (saving) {
      return;
    }

    const profileDataChanged = Object.keys(profileDataFields).length > 0;

    // only process data if it changed
    if (profileDataChanged) {
      setSaving(true);

      const updateProfileDataPromise = memberRouter.updateMemberXProfileData({
        fields: profileDataFields,
        member_id: loggedUser.id
      });

      updateProfileDataPromise
      .then((updateProfileDataResponse) => {
        // console.log('ACCOUNT INFO SETTINGS SCREEN - UPDATE PROFILE DATA RESPONSE:', updateProfileDataResponse);
  
        // refresh page
        window.location.reload();
      }, (error) => {
        // console.log('ACCOUNT INFO SETTINGS SCREEN - ERROR WHEN SAVING: ', error);
      });
    }
  };

  // console.log('ACCOUNT INFO SETTINGS SCREEN - PROFILE DATA GROUPS: ', profileDataGroups);
  // console.log('ACCOUNT INFO SETTINGS SCREEN - PROFILE DATA FIELDS: ', profileDataFields);

  return (
    <div className="account-hub-content">
      <SectionHeader pretitle={vikinger_translation.account} title={vikinger_translation.account_info} />
    {
      !loggedUser &&
        <Loader />
    }
    {
      loggedUser &&
        <React.Fragment>
        {
          (profileDataGroups.length > 0) &&
            <div className="grid-column">
            {
              profileDataGroups.map((group) => {
                return (
                  <SettingsWidget key={group.id}
                                  data={group}
                                  onFieldUpdate={updateProfileData}
                  />
                );
              })
            }

            {/* ACCOUNT HUB CONTENT OPTIONS */}
            <div className="account-hub-content-options">
              <div className="button primary" onClick={save}>
                {
                  !saving &&
                    vikinger_translation.save_changes
                }
                {
                  saving &&
                    <React.Fragment>
                      {vikinger_translation.saving}
                      <LoaderSpinnerSmall />
                    </React.Fragment>
                }
              </div>
            </div>
            {/* ACCOUNT HUB CONTENT OPTIONS */}
          </div>
        }
        {
          (profileDataGroups.length === 0) &&
            <p className="no-results-text">{vikinger_translation.no_account_info_available}</p>
        }
        </React.Fragment>
    }
    </div>
  );
}

export { AccountInfoSettingsScreen as default };