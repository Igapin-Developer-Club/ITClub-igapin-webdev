import React, { useState, useEffect } from 'react';

import SectionHeader from '../section/SectionHeader';

import Loader from '../loader/Loader';
import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

import { deepMerge } from '../../utils/core';

import * as userRouter from '../../router/user/user-router';
import * as memberRouter from '../../router/member/member-router';

import { getEmailSettings } from '../utils/notification';

const emailSettings = getEmailSettings();

function EmailSettingsScreen(props) {
  const [loggedUser, setLoggedUser] = useState(false);

  const [settings, setSettings] = useState([]);
  const [savingSettings, setSavingSettings] = useState(false);

  const getLoggedInMember = () => {
    userRouter.getLoggedInMember('user-settings-notification')
    .done((response) => {
      // console.log('EMAIL SETTINGS SCREEN - LOGGED IN USER: ', response);

      setLoggedUser(response);
      setSettings(deepMerge(response.email_settings));
    });
  };

  useEffect(() => {
    getLoggedInMember();
  }, []);

  const toggleSetting = (settingID) => {
    setSettings(previousSettings => {
      const newSettings = deepMerge(previousSettings);

      newSettings[settingID] = newSettings[settingID] === 'yes' ? 'no' : 'yes';

      return newSettings;
    });
  };

  const saveSettings = () => {
    // return if already saving
    if (savingSettings) {
      return;
    }

    setSavingSettings(true);

    const saveSettingsPromise = memberRouter.updateUserMetadata({
      user_id: loggedUser.id,
      metadata: settings
    });

    saveSettingsPromise
    .done((response) => {
      // refresh page
      window.location.reload();
    })
    .fail((error) => {
      setSavingSettings(false);
    });
  };

  return (
    <div className="account-hub-content">
      <SectionHeader  pretitle={vikinger_translation.my_profile} title={vikinger_translation.email_settings} />
      {
        !loggedUser &&
          <Loader />
      }
      {
        loggedUser &&
          <React.Fragment>
            <div className="grid-column">
            {
              emailSettings.map((section) => {
                return (
                  <div key={section.name} className="widget-box">
                    <p className="widget-box-title">{section.name}</p>

                    {/* WIDGET BOX CONTENT */}
                    <div className="widget-box-content">
                      {/* SWITCH OPTION LIST */}
                      <div className="switch-option-list">
                      {
                        section.options.map((option) => {
                          return (
                            <div key={option.id} className="switch-option">
                              <p className="switch-option-title">{option.name}</p>

                              <p className="switch-option-text">{option.description}</p>

                              <div  className={`form-switch ${settings[option.id] !== 'no' ? 'active' : ''}`}
                                    onClick={() => {toggleSetting(option.id);}}
                              >
                                <div className="form-switch-button"></div>
                              </div>
                            </div>
                          );
                        })
                      }
                      </div>
                      {/* SWITCH OPTION LIST */}
                    </div>
                    {/* WIDGET BOX CONTENT */}
                  </div>
                );
              })
            }
            </div>

            {/* ACCOUNT HUB CONTENT OPTIONS */}
            <div className="account-hub-content-options">
              <div className="button primary" onClick={saveSettings}>
                {
                  !savingSettings &&
                    vikinger_translation.save_changes
                }
                {
                  savingSettings &&
                    <React.Fragment>
                      {vikinger_translation.saving}
                      <LoaderSpinnerSmall />
                    </React.Fragment>
                }
              </div>
            </div>
            {/* ACCOUNT HUB CONTENT OPTIONS */}
          </React.Fragment>
      }
    </div>
  );
}

export { EmailSettingsScreen as default };