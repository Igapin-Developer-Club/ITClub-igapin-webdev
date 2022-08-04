import React, { useState, useRef, useEffect, useLayoutEffect } from 'react';

import SectionHeader from '../section/SectionHeader';

import Loader from '../loader/Loader';
import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

import MessageBox from '../message/MessageBox';

import FormInputPassword from '../form/FormInputPassword';

import { createPopup } from '../../utils/plugins';

import * as userRouter from '../../router/user/user-router';
import * as memberRouter from '../../router/member/member-router';

function PasswordSettingsScreen(props) {
  const [loggedUser, setLoggedUser] = useState(false);

  const [currentPassword, setCurrentPassword] = useState(false);
  const [newPassword, setNewPassword] = useState(false);
  const [newPasswordRepeat, setNewPasswordRepeat] = useState(false);

  const [saving, setSaving] = useState(false);

  const [messageBoxTitle, setMessageBoxTitle] = useState('');
  const [messageBoxText, setMessageBoxText] = useState('');

  const messageBoxRef = useRef(null);
  const popup = useRef(null);

  useLayoutEffect(() => {
    popup.current = createPopup({
      premadeContentElement: messageBoxRef.current,
      type: 'premade',
      popupSelectors: ['message-box-popup', 'animate-slide-down'],
      onOverlayCreate: function (overlay) {
        overlay.setAttribute('data-simplebar', '');
      }
    });
  }, []);

  useEffect(() => {
    getLoggedInMember();
  }, []);

  const getLoggedInMember = () => {
    userRouter.getLoggedInMember('user-settings-password')
    .done((response) => {
      // console.log('PASSWORD SETTINGS SCREEN - LOGGED IN USER: ', response);

      setLoggedUser(response);
    });
  };

  const save = () => {
    // return if already saving
    if (saving) {
      return;
    }

    setSaving(true);

    // only process data if all fields where entered
    if (currentPassword && newPassword && newPasswordRepeat) {
      // if new password doesn't match confirmation, show error popup
      if (newPassword !== newPasswordRepeat) {
        setMessageBoxTitle(vikinger_translation.new_password_mismatch_error_title);
        setMessageBoxText(vikinger_translation.new_password_mismatch_error_text);

        popup.current.show();

        setSaving(false);

        return;
      }

      // check if current password is correct
      const passwordCheckPromise = memberRouter.checkPassword({
        password_plain: currentPassword,
        password_hash: loggedUser.password,
        user_id: loggedUser.id
      });

      passwordCheckPromise
      .done((passwordMatches) => {
        // console.log('PASSWORD SETTINGS SCREEN - CHECK PASSWORD RESPONSE: ', passwordMatches);
        
        if (passwordMatches) {
          // console.log('PASSWORD SETTINGS SCREEN - ENTERED PASSWORD MATCHES CURRENT PASSWORD');

          // update password
          const updatePasswordPromise = memberRouter.updatePassword({
            password: newPassword,
            user_id: loggedUser.id
          });

          updatePasswordPromise
          .done((response) => {
            // console.log('PASSWORD SETTINGS SCREEN - UPDATE PASSWORD RESPONSE: ', response);

            // if password updated
            if (response) {
              // console.log('PASSWORD SETTINGS SCREEN - PASSWORD UPDATED CORRECTLY');

              window.location.reload();
            } else {
              // password couldn't be updated
              setMessageBoxTitle(vikinger_translation.change_password_error_title);
              setMessageBoxText(vikinger_translation.change_password_error_text);
              setSaving(false);

              popup.current.show();
            }
          })
          .fail((error) => {
            // password couldn't be updated
            setMessageBoxTitle(vikinger_translation.change_password_error_title);
            setMessageBoxText(vikinger_translation.change_password_error_text);
            setSaving(false);

            popup.current.show();
          });
        } else {
          // password doesn't match, show error popup
          setMessageBoxTitle(vikinger_translation.current_password_mismatch_error_title);
          setMessageBoxText(vikinger_translation.current_password_mismatch_error_text);
          setSaving(false);

          popup.current.show();
        }
      })
      .fail((error) => {
        // console.log('PASSWORD SETTINGS SCREEN - CHECK PASSWORD ERROR: ', error);
        setSaving(false);
      });
    } else {
      setSaving(false);
    }
  };

  return (
    <div className="account-hub-content">
      <SectionHeader pretitle={vikinger_translation.account} title={vikinger_translation.change_password} />

      {/* MESSAGE BOX */}
      <MessageBox forwardedRef={messageBoxRef}
                  data={{title: messageBoxTitle, text: messageBoxText}}
                  error
      />
      {/* MESSAGE BOX */}

    {
      !loggedUser &&
        <Loader />
    }
    {
      loggedUser &&
        <div className="grid-column">
          {/* WIDGET BOX */}
          <div className="widget-box">
            {/* WIDGET BOX CONTENT */}
            <div className="widget-box-content">
              {/* FORM */}
              <div className="form">
                {/* FORM ROW */}
                <div className="form-row">
                  {/* FORM ITEM */}
                  <div className="form-item">
                    <FormInputPassword  label={vikinger_translation.enter_your_current_password}
                                        name="current_password"
                                        modifiers="small"
                                        onChange={setCurrentPassword}
                    />
                  </div>
                  {/* FORM ITEM */}
                </div>
                {/* FORM ROW */}

                {/* FORM ROW */}
                <div className="form-row split">
                  {/* FORM ITEM */}
                  <div className="form-item">
                    <FormInputPassword  label={vikinger_translation.your_new_password}
                                        name="new_password"
                                        modifiers="small"
                                        onChange={setNewPassword}
                    />
                  </div>
                  {/* FORM ITEM */}

                  {/* FORM ITEM */}
                  <div className="form-item">
                    <FormInputPassword  label={vikinger_translation.confirm_new_password}
                                        name="new_password_repeat"
                                        modifiers="small"
                                        onChange={setNewPasswordRepeat}
                    />
                  </div>
                  {/* FORM ITEM */}
                </div>
                {/* FORM ROW */}
              </div>
              {/* FORM */}
            </div>
            {/* WIDGET BOX CONTENT */}
          </div>
          {/* WIDGET BOX */}

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

export { PasswordSettingsScreen as default };