import React, { useState, useEffect } from 'react';

import SectionHeader from '../section/SectionHeader';

import Loader from '../loader/Loader';
import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

import SettingsWidget from './SettingsWidget';

import * as userRouter from '../../router/user/user-router';
import * as memberRouter from '../../router/member/member-router';

import { getGroups } from '../utils/xprofile';

function SocialSettingsScreen(props) {
  const [loggedUser, setLoggedUser] = useState(false);

  const [profileDataGroups, setProfileDataGroups] = useState([]);
  const [profileDataFields, setProfileDataFields] = useState({});

  const [saving, setSaving] = useState(false);

  useEffect(() => {
    getLoggedInMember();
  }, []);

  const getLoggedInMember = () => {
    userRouter.getLoggedInMember('user-settings')
    .done((response) => {
      // console.log('SOCIAL SETTINGS SCREEN - LOGGED IN USER: ', response);

      // get social data
      const loggedUserProfileDataGroups = getGroups(response.profile_data, 'social');

      setLoggedUser(response);
      setProfileDataGroups(loggedUserProfileDataGroups);
    });
  };

  const updateProfileData = (field, value) => {
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

    setSaving(true);

    const profileDataChanged = Object.keys(profileDataFields).length > 0;

    // only process data if it changed
    if (profileDataChanged) {
      const updateProfileDataPromise = memberRouter.updateMemberXProfileData({
        fields: profileDataFields,
        member_id: loggedUser.id
      });

      updateProfileDataPromise
      .done((updateProfileDataResponse) => {
        // console.log('SOCIAL SETTINGS SCREEN - UPDATE PROFILE DATA RESPONSE:', updateProfileDataResponse);
  
        // refresh page
        window.location.reload();
      })
      .fail((error) => {
        // console.log('SOCIAL SETTINGS SCREEN - ERROR WHEN SAVING: ', error);
        setSaving(false);
      });
    } else {
      setSaving(false);
    }
  };

  return (
    <div className="account-hub-content">
      <SectionHeader pretitle={vikinger_translation.my_profile} title={vikinger_translation.social_networks} />
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
            <p className="no-results-text">{vikinger_translation.no_social_info_available}</p>
        }
        </React.Fragment>
    }
    </div>
  );
}

export { SocialSettingsScreen as default };