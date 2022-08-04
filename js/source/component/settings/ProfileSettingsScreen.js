import React, { useState, useRef, useEffect, useLayoutEffect } from 'react';

import SectionHeader from '../section/SectionHeader';

import UserPreview from '../user-preview/UserPreview';

import UploadBox from '../upload/UploadBox';

import Loader from '../loader/Loader';
import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

import MessageBox from '../message/MessageBox';

import SettingsWidget from './SettingsWidget';

import { createPopup } from '../../utils/plugins';

import * as userRouter from '../../router/user/user-router';
import * as memberRouter from '../../router/member/member-router';

import { getGroups } from '../utils/xprofile';

function ProfileSettingsScreen(props) {
  const [loggedUser, setLoggedUser] = useState(false);

  const [avatarFile, setAvatarFile] = useState(false);
  const [deleteAvatar, setDeleteAvatar] = useState(false);

  const [coverFile, setCoverFile] = useState(false);
  const [deleteCover, setDeleteCover] = useState(false);

  const [profileDataGroups, setProfileDataGroups] = useState([]);
  const [profileDataFields, setProfileDataFields] = useState({});

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
    userRouter.getLoggedInMember('user-settings-profile')
    .done((response) => {
      // console.log('PROFILE SETTINGS SCREEN - LOGGED IN USER: ', response);

      // get profile data
      const loggedUserProfileDataGroups = getGroups(response.profile_data, 'profile');

      setLoggedUser(response);
      setProfileDataGroups(loggedUserProfileDataGroups);
    });
  };

  const updateAvatarFile = (file) => {
    // console.log('PROFILE SETTINGS SCREEN - AVATAR FILE: ', file);

    setAvatarFile(file);
    setDeleteAvatar(false);

    setLoggedUser(previousLoggedUser => {
      return {
        ...previousLoggedUser,
        avatar_url: file.url
      };
    });
  };

  const deleteAvatarFile = () => {
    setLoggedUser(previousLoggedUser => {
      return {
        ...previousLoggedUser,
        avatar_url: vikinger_constants.settings.member_avatar_url_default
      };
    });

    setDeleteAvatar(true);
  };

  const updateCoverFile = (file) => {
    // console.log('PROFILE SETTINGS SCREEN - COVER FILE: ', file);

    setCoverFile(file);
    setDeleteCover(false);

    setLoggedUser(previousLoggedUser => {
      return {
        ...previousLoggedUser,
        cover_url: file.url
      };
    });
  };

  const deleteCoverFile = () => {
    setLoggedUser(previousLoggedUser => {
      return {
        ...previousLoggedUser,
        cover_url: vikinger_constants.settings.member_cover_image_url_default
      };
    });

    setDeleteCover(true);
  };

  const updateProfileData = (field, value) => {
    // console.log('PROFILE SETTINGS SCREEN - UPDATE PROFILE DATA: ', field, value);

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
    if (avatarFile || coverFile || deleteAvatar || deleteCover || profileDataChanged) {
      let uploadAvatarPromise = { no_result: true },
          deleteAvatarPromise = { no_result: true },
          uploadCoverPromise = { no_result: true },
          deleteCoverPromise = { no_result: true },
          updateProfileDataPromise = { no_result: true };

      // if user changed avatar, save it
      if (avatarFile) {
        uploadAvatarPromise = memberRouter.uploadMemberAvatar({
          user_id: loggedUser.id,
          file: avatarFile.file
        });
      }

      // if user wants to delete avatar, delete it
      if (deleteAvatar) {
        deleteAvatarPromise = memberRouter.deleteMemberAvatar({
          user_id: loggedUser.id
        });
      }

      // if user changed cover, save it
      if (coverFile) {
        uploadCoverPromise = memberRouter.uploadMemberCover({
          user_id: loggedUser.id,
          file: coverFile.file
        });
      }

      // if user wants to delete cover, delete it
      if (deleteCover) {
        deleteCoverPromise = memberRouter.deleteMemberCover({
          user_id: loggedUser.id
        });
      }

      // if user changed profile data
      if (profileDataChanged) {
        updateProfileDataPromise = memberRouter.updateMemberXProfileData({
          fields: profileDataFields,
          member_id: loggedUser.id
        });
      }

      jQuery
      .when(uploadAvatarPromise, deleteAvatarPromise, uploadCoverPromise, deleteCoverPromise, updateProfileDataPromise)
      .done((avatarUploadResponse, deleteAvatarResponse, coverUploadResponse, deleteCoverResponse, updateProfileDataResponse) => {
        // console.log('PROFILE SETTINGS SCREEN - AVATAR UPLOAD RESPONSE:', avatarUploadResponse);
        // console.log('PROFILE SETTINGS SCREEN - COVER UPLOAD RESPONSE:', coverUploadResponse);
        // console.log('PROFILE SETTINGS SCREEN - UPDATE PROFILE DATA RESPONSE:', updateProfileDataResponse);
  
        // check if avatar was selected to be uploaded
        if (typeof avatarUploadResponse.no_result !== 'undefined') {
          // console.log('PROFILE SETTINGS SCREEN - USER DIDN\'T SELECT AVATAR TO CHANGE');
        } else {
          // success, release blob image resource
          // console.log('PROFILE SETTINGS SCREEN - AVATAR UPLOAD RESPONSE:', avatarUploadResponse);
        }

        // check if avatar was selected to be deleted
        if (typeof deleteAvatarResponse.no_result !== 'undefined') {
          // console.log('PROFILE SETTINGS SCREEN - USER DIDN\'T SELECT AVATAR TO DELETE');
        } else {
          // console.log('PROFILE SETTINGS SCREEN - AVATAR DELETE RESPONSE:', deleteAvatarResponse);
        }

        // check if cover was selected to be uploaded
        if (typeof coverUploadResponse.no_result !== 'undefined') {
          // console.log('PROFILE SETTINGS SCREEN - USER DIDN\'T SELECT COVER TO CHANGE');
        } else {
          // success, release blob image resource
          // console.log('PROFILE SETTINGS SCREEN - COVER UPLOAD SUCCESS');
        }

        // check if cover was selected to be deleted
        if (typeof deleteCoverResponse.no_result !== 'undefined') {
          // console.log('PROFILE SETTINGS SCREEN - USER DIDN\'T SELECT COVER TO DELETE');
        } else {
          // console.log('PROFILE SETTINGS SCREEN - COVER DELETE RESPONSE:', deleteCoverResponse);
        }

        // check if profile data was updated
        if (typeof updateProfileDataResponse.no_result !== 'undefined') {
          // console.log('PROFILE SETTINGS SCREEN - USER DIDN\'T CHANGE ANY PROFILE FIELDS');
        } else {
          // success
          // console.log('PROFILE SETTINGS SCREEN - USER UPDATED PROFILE FIELDS');
        }
  
        // refresh page
        window.location.reload();
      })
      .fail((error) => {
        // console.log('PROFILE SETTINGS SCREEN - ERROR WHEN SAVING: ', error);

        const errorJSON = error.responseJSON;

        let messageBoxErrorTitle;
        let messageBoxErrorText;

        if (typeof errorJSON !== 'undefined') {
          messageBoxErrorText = errorJSON.message;
          if (errorJSON.code === 'bp_rest_attachments_user_avatar_upload_error') {
            messageBoxErrorTitle = vikinger_translation.avatar_upload_error;
          } else if (errorJSON.code === 'bp_rest_attachments_user_cover_upload_error') {
            messageBoxErrorTitle = vikinger_translation.cover_upload_error;
          } else if (errorJSON.code === 'bp_rest_attachments_user_avatar_error') {
            messageBoxErrorTitle = vikinger_translation.avatar_upload_error;
          }
        } else {
          messageBoxErrorTitle = vikinger_translation.upload_error;
          messageBoxErrorText = vikinger_translation.upload_error_message;
        }

        setMessageBoxTitle(messageBoxErrorTitle);
        setMessageBoxText(messageBoxErrorText);
        popup.current.show();

        setSaving(false);
      });
    } else {
      setSaving(false);
    }
  };

  return (
    <div className="account-hub-content">
      <SectionHeader pretitle={vikinger_translation.my_profile} title={vikinger_translation.profile_info} />

      {/* MESSAGE BOX */}
      <MessageBox forwardedRef={messageBoxRef}
                  data={{title: messageBoxTitle, text: messageBoxText}}
                  error
                  continue
                  onContinue={() => {popup.current.hide(); window.location.reload();}}
      />
      {/* MESSAGE BOX */}

    {
      !loggedUser &&
        <Loader />
    }
    {
      loggedUser &&
        <div className="grid-column">
          {/* GRID */}
          <div className="grid grid-3-3-3 centered">
            <UserPreview  data={loggedUser}
                          actionableAvatar={loggedUser.avatar_url !== vikinger_constants.settings.member_avatar_url_default}
                          actionableCover={loggedUser.cover_url !== vikinger_constants.settings.member_cover_image_url_default}
                          onAvatarActionClick={deleteAvatarFile}
                          onCoverActionClick={deleteCoverFile}
            />

            <UploadBox  title={vikinger_translation.change_avatar}
                        onFileSelect={updateAvatarFile} />

            <UploadBox  title={vikinger_translation.change_cover}
                        onFileSelect={updateCoverFile} />
          </div>
          {/* GRID */}

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
    </div>
  );
}

export { ProfileSettingsScreen as default };