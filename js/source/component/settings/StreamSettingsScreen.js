import React, { useState, useEffect } from 'react';

import SectionHeader from '../section/SectionHeader';

import Loader from '../loader/Loader';
import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

import FormInput from '../form/FormInput';

import * as userRouter from '../../router/user/user-router';

function StreamSettingsScreen(props) {
  const [loggedUser, setLoggedUser] = useState(false);
  const [streamerUsername, setStreamerUsername] = useState('');

  const [fetchingStreamerUsername, setFetchingStreamerUsername] = useState(true);

  const [saving, setSaving] = useState(false);

  useEffect(() => {
    getLoggedInMember();
    getLoggedUserStreamUsername();
  }, []);

  const getLoggedInMember = () => {
    userRouter.getLoggedInMember('user-settings')
    .done((response) => {
      // console.log('STREAM SETTINGS SCREEN - LOGGED IN USER: ', response);

      setLoggedUser(response);
    });
  };

  const getLoggedUserStreamUsername = () => {
    userRouter.getLoggedUserStreamUsername()
    .done((response) => {
      // console.log('STREAM SETTINGS SCREEN - GET LOGGED USER STREAM USERNAME RESPONSE: ', response);

      setStreamerUsername(response);
      setFetchingStreamerUsername(false);
    })
    .fail((error) => {
      // console.log('STREAM SETTINGS SCREEN - GET LOGGED USER STREAM USERNAME ERROR: ', error);
    });
  };

  const handleStreamerUsernameChange = (value) => {
    setStreamerUsername(value);
  };

  const save = () => {
    // return if already saving
    if (saving) {
      return;
    }

    setSaving(true);

    const updateLoggedUserStreamUsernamePromise = userRouter.updateLoggedUserStreamUsername({username: streamerUsername});

    updateLoggedUserStreamUsernamePromise
    .done((response) => {
      // console.log('STREAM SETTINGS SCREEN - UPDATE LOGGED USER STREAM USERNAME RESPONSE: ', response);

      window.location.reload();
    })
    .fail((error) => {
      // console.log('STREAM SETTINGS SCREEN - UPDATE LOGGED USER STREAM USERNAME ERROR: ', error);

      setSaving(false);
    })
  };

  return (
    <div className="account-hub-content">
      <SectionHeader pretitle={vikinger_translation.my_profile} title={vikinger_translation.stream} />
    {
      !loggedUser && fetchingStreamerUsername &&
        <Loader />
    }
    {
      loggedUser && !fetchingStreamerUsername &&
        <div className="grid-column">
          <div className="widget-box">
            {/* WIDGET BOX TITLE */}
            <p className="widget-box-title">{vikinger_translation.stream_settings_username_title}</p>
            {/* WIDGET BOX TITLE */}

            {/* WIDGET BOX CONTENT */}
            <div className="widget-box-content">
              {/* FORM */}
              <div className="form">
                <div className="form-row">
                  <div className="form-item">
                    <FormInput  name="streamerUsername"
                                label={vikinger_translation.stream_settings_username_placeholder}
                                modifiers="small"
                                value={streamerUsername}
                                onChange={handleStreamerUsernameChange}
                    />
                  </div>
                </div>
              </div>
              {/* FORM */}
            </div>
            {/* WIDGET BOX CONTENT */}
          </div>

          <div className="widget-box">
            {/* WIDGET BOX TITLE */}
            <p className="widget-box-title">{vikinger_translation.stream_settings_preview_title}</p>
            {/* WIDGET BOX TITLE */}

            {/* WIDGET BOX TEXT */}
            <p className="widget-box-text">{vikinger_translation.stream_settings_preview_text}</p>
            {/* WIDGET BOX TEXT */}

            {/* WIDGET BOX CONTENT */}
            <div className="widget-box-content">
            {
              streamerUsername &&
                <div className="iframe-wrap">
                  <iframe src={`//player.twitch.tv/?channel=${streamerUsername}&parent=${vikinger_constants.settings.stream_twitch_embeds_parent}`} allowFullScreen></iframe>
                </div>
            }
            {
              !streamerUsername &&
                <p className="no-results-text">{vikinger_translation.stream_settings_preview_no_results}</p>
            }
              
            </div>
            {/* WIDGET BOX CONTENT */}
          </div>

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
    </div>
  );
}

export { StreamSettingsScreen as default };