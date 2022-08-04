import React, { useState, useRef, useEffect } from 'react';

import Avatar from '../../avatar/Avatar';

import MediaLinkPreview from '../../media/MediaLinkPreview';
import UploadableMediaList from '../../media/UploadableMediaList';

import IconSVG from '../../icon/IconSVG';

import BadgeVerified from '../../badge/BadgeVerified';

import UserStatusLevel from '../../user-status/user-status-level/UserStatusLevel';

import ExpandableTextarea from '../../form/ExpandableTextarea';

import UploadVideoButton from '../../video/UploadVideoButton';
import VideoPreview from '../../video/VideoPreview';

import { extractAttachedMedia } from '../../../utils/core';
import { createTooltip } from '../../../utils/plugins';

import { getActivityTemplate } from '../../utils/activity/activity-template';

const textareaPlaceholderEnd = vikinger_constants.plugin_active.buddypress_friends ? vikinger_translation.activity_form_placeholder_2 : vikinger_translation.activity_form_placeholder_3;

function ActivityForm(props) {
  const [formData, setFormData] = useState({
    text: '',
    postIn: props.postIn ? props.postIn : '0',
    attached_media: false,
    uploadable_media_type: false,
    uploadable_media: false,
    uploadable_gif: false,
    submitting: false,
    errors: []
  });

  const photoTooltipRef = useRef(null);

  useEffect(() => {
    if (!props.shareData && vikinger_constants.plugin_active.vkmedia && vikinger_constants.settings.media_photo_upload_enabled) {
      createTooltip({
        containerElement: photoTooltipRef.current,
        offset: 8,
        direction: 'top',
        animation: {
          type: 'translate-out-fade'
        }
      });
    }
  }, []);

  const discardContent = () => {
    setFormData(previousFormData => {
      return {
        ...previousFormData,
        text: '',
        attached_media: false,
        uploadable_media_type: false,
        uploadable_media: false,
        errors: []
      };
    });

    // console.log('DISCARD CONTENT - POPUP: ', props.popup);

    if (props.popup && props.popup.current) {
      props.popup.current.hide();
    }
  };

  const toggleUploadablePhotosBar = () => {
    setFormData(previousFormData => {
      if (previousFormData.uploadable_media && (previousFormData.uploadable_media_type === 'image')) {
        return {
          ...previousFormData,
          uploadable_media: false,
          uploadable_media_type: false,
          errors: []
        };
      }

      return {
        ...previousFormData,
        uploadable_media: [],
        uploadable_media_type: 'image',
        errors: []
      };
    });
  };

  const submitContent = () => {
    // if already submitting form or not sharing post and no message entered, return
    if (formData.submitting || (!props.shareData && (formData.text === '') && !formData.uploadable_media || (formData.uploadable_media && formData.uploadable_media.length === 0))) {
      setFormData(previousFormData => {
        return {
          ...previousFormData,
          errors: [
            {
              text: vikinger_translation.activity_form_empty_error
            }
          ]
        };
      });

      return;
    }

    setFormData(previousFormData => {
      return {
        ...previousFormData,
        submitting: true,
        errors: []
      };
    });

    // console.log('ACTIVITY FORM - POST CONTENT: ', formData);

    props.onSubmit(formData, (response) => {
      // console.log('ACTIVITY FORM - CREATED ACTIVITY: ', response);

      if (response) {
        discardContent();
      } else {
        // console.log('ACTIVITY FORM - ERROR CREATING ACTIVITY');
      }

      setFormData(previousFormData => {
        return {
          ...previousFormData,
          submitting: false
        };
      });
    });
  };

  const resetAttachedMedia = () => {
    setFormData(previousFormData => {
      return {
        ...previousFormData,
        attached_media: false
      };
    });
  };

  const handlePostInChange = (e) => {
    e.persist();

    setFormData(previousFormData => {
      return {
        ...previousFormData,
        postIn: e.target.value
      };
    });
  };

  const handleTextChange = (e) => {
    // check if there is a media link in the text content
    const attached_media = extractAttachedMedia(e.target.value);

    // e can be default event or user generated with only target and value properties
    if (e.persist) {
      e.persist();
    }

    // console.log('ACTIVITY FORM - EXTRACTED ATTACHED MEDIA: ', attached_media);

    setFormData(previousFormData => {
      return {
        ...previousFormData,
        text: e.target.value,
        attached_media: attached_media
      };
    });
  };

  const addUploadableVideo = (data) => {
    // only add video data if user didn't cancel
    if (data.length > 0) {
      // only add video if size is not higher than maximum allowed
      const videoData = data[0],
            videoSizeInMB = videoData.file.size / (1024 * 1024);

      // only add video if file extension is allowed
      const extensionAllowed = vikinger_constants.settings.media_video_allowed_extensions.some((fileExtension) => {
        const fileExtensionCaseSensitiveIsMatch = fileExtension === videoData.extension;
        const fileExtensionCaseInsensitiveIsMatch = fileExtension.toLowerCase() === videoData.extension.toLowerCase();

        return vikinger_constants.settings.media_video_allowed_extensions_case_sensitive ? fileExtensionCaseSensitiveIsMatch : fileExtensionCaseInsensitiveIsMatch;
      });

      // if video extension is not allowed, add error
      if (!extensionAllowed) {
        setFormData(previousFormData => {
          return {
            ...previousFormData,
            errors: [
              {
                text: `"${videoData.file.name}" ${vikinger_translation.file_extension_is_not_allowed}.`
              }
            ]
          };
        });
      // if video size is higher than allowed, show error
      } else if (videoSizeInMB > vikinger_constants.settings.media_video_upload_maximum_size) {
        setFormData(previousFormData => {
          return {
            ...previousFormData,
            errors: [
              {
                text: `"${videoData.file.name}" ${vikinger_translation.size_is_too_big} (${Number.parseFloat(videoSizeInMB).toFixed(2)}MB).`
              },
              {
                text: `${vikinger_translation.maximum_size_accepted_is} ${vikinger_constants.settings.media_video_upload_maximum_size}MB.`
              }
            ]
          };
        });
      } else {
        setFormData(previousFormData => {
          return {
            ...previousFormData,
            uploadable_media: data,
            uploadable_media_type: 'video',
            errors: []
          };
        });
      }
    }
  };

  const addUploadableMedia = (data) => {
    // console.log('ACTIVITY FORM - ADD UPLOADABLE MEDIA: ', data);

    // only add photos data if user didn't cancel
    if (data.length > 0) {
      const errors = [],
            photosData = [];

      let fileSizeError = false;

      for (const photoData of data) {
        // only add photo if size is not higher than maximum allowed
        const photoSizeInMB = photoData.file.size / (1024 * 1024);

        // only add photo if file extension is allowed
        const extensionAllowed = vikinger_constants.settings.media_photo_allowed_extensions.some((fileExtension) => {
          const fileExtensionCaseSensitiveIsMatch = fileExtension === photoData.extension;
          const fileExtensionCaseInsensitiveIsMatch = fileExtension.toLowerCase() === photoData.extension.toLowerCase();

          return vikinger_constants.settings.media_photo_allowed_extensions_case_sensitive ? fileExtensionCaseSensitiveIsMatch : fileExtensionCaseInsensitiveIsMatch;
        });

        // if photo extension is not allowed, add error
        if (!extensionAllowed) {
          errors.push({
            text: `"${photoData.file.name}" ${vikinger_translation.file_extension_is_not_allowed}.`
          });
        // if photo size is higher than allowed, add error
        } else if (photoSizeInMB > vikinger_constants.settings.media_photo_upload_maximum_size) {
          fileSizeError = true;

          errors.push({
            text: `"${photoData.file.name}" ${vikinger_translation.size_is_too_big} (${Number.parseFloat(photoSizeInMB).toFixed(2)}MB).`
          });
        } else {
          photosData.push(photoData);
        }
      }

      if ((errors.length > 0) && fileSizeError) {
        errors.push({
          text: `${vikinger_translation.maximum_size_accepted_is} ${vikinger_constants.settings.media_photo_upload_maximum_size}MB.`
        });
      }

      setFormData(previousFormData => {
        const newUploadableMedia = previousFormData.uploadable_media.concat(photosData);

        // console.log('ACTIVITY FORM - UPLOADABLE MEDIA: ', newUploadableMedia);

        return {
          ...previousFormData,
          uploadable_media: newUploadableMedia,
          errors: errors
        };
      });
    }
  }

  const removeUploadableMedia = (id) => {
    // console.log('ACTIVITY FORM - REMOVE UPLOADABLE MEDIA: ', id);

    setFormData(previousFormData => {
      const uploadableMedia = previousFormData.uploadable_media.filter((media, i) => {
        if (media.id === id) {
          // release object URL reference
          URL.revokeObjectURL(media.url);
        }

        return media.id !== id;
      });

      // console.log('ACTIVITY FORM - UPLOADABLE MEDIA: ', uploadableMedia);

      return {
        ...previousFormData,
        uploadable_media: uploadableMedia
      };
    });
  };

  const addUploadableGif = (data) => {
    console.log('ACTIVITY FORM - ADD UPLOADABLE GIF DATA: ', data);

    setFormData(previousFormData => {
      return {
        ...previousFormData,
        uploadable_gif: data
      };
    });
  };

  const removeUploadableGif = () => {
    console.log('ACTIVITY FORM - REMOVE UPLOADABLE GIF');

    setFormData(previousFormData => {
      return {
        ...previousFormData,
        uploadable_gif: false
      };
    });
  };

  const toggleUploadableGifBar = () => {
    setFormData(previousFormData => {
      return {
        ...previousFormData,
        uploadable_gif: previousFormData.uploadable_gif ? false : {}
      };
    })
  };

  let ActivityFormat = false;

  if (props.shareData) {
    if (props.shareData.format) {
      ActivityFormat = props.shareData.format;
    }
  }

  const ActivityTemplate = props.shareData ? getActivityTemplate(props.shareData.type, ActivityFormat)({
    data: props.shareData,
    simpleActivity: true,
    sharePopupActivity: true,
    user: props.user
  }) : '';

  const displayVerifiedMemberBadge = vikinger_constants.plugin_active['bp-verified-member'] && vikinger_constants.settings.bp_verified_member_display_badge_in_activity_stream && props.user.verified;

  const displayMembershipTag = vikinger_constants.plugin_active['pmpro-buddypress'] && vikinger_constants.settings.pmpro_bp_membership_level_tag_display_on_profile_is_enabled && props.user.membership;

  const userGroups = props.user.groups.filter(group => !group.is_banned);

  return (
    <div ref={props.forwardedRef} className={`quick-post ${formData.submitting ? 'disabled' : ''}`}>
      <div className="quick-post-header">
        <div className="quick-post-header-filters-wrap">
          {/* USER STATUS */}
          <div className="user-status">
            <div className="user-status-avatar">
              <Avatar size="small"
                      data={props.user}
                      noBorder
                      noLink
              />
            </div>
        
            <div className="user-status-title medium">
              <span className="bold">{props.user.name}</span>
            {
              displayVerifiedMemberBadge &&
                <BadgeVerified />
            }
            {
              displayMembershipTag &&
                <UserStatusLevel  name={props.user.membership.name}
                                  size="small"
                />
            }
            </div>
            <p className="user-status-text small">{vikinger_translation.status_update}</p>
          </div>  
          {/* USER STATUS */}

          {/* QUICK POST HEADER FILTERS */}
          <form className="quick-post-header-filters">
            <div className="form-row split">
              <div className="form-item">
                <div className="form-select">
                  <label htmlFor="post-in">{vikinger_translation.post_in}</label>
                  <select id="post-in" name="postIn" value={formData.postIn} onChange={handlePostInChange}>
                    <option value="0">{vikinger_translation.my_profile}</option>
                    {
                      vikinger_constants.plugin_active.buddypress_groups &&
                        userGroups.map((group) => {
                          return (
                            <option key={group.id} value={group.id}>{group.name}</option>
                          );
                        })
                    }
                  </select>
                  <IconSVG  icon="small-arrow"
                            modifiers="form-select-icon"
                  />
                </div>
              </div>
            </div>
          </form>
          {/* QUICK POST HEADER FILTERS */}
        </div>
      </div>
      
      {/* QUICK POST BODY */}
      <div className={`quick-post-body ${props.shareData ? 'with-share-data' : ''}`}>
        <form className={`form ${formData.submitting ? 'disabled' : ''}`}>
          <div className="form-row">
            <div className="form-item">
              <ExpandableTextarea name='text'
                                  value={formData.text}
                                  maxLength={vikinger_constants.settings.activity_character_limit}
                                  minHeight={120}
                                  placeholder={`${vikinger_translation.activity_form_placeholder_1} ${props.user.name}! ${textareaPlaceholderEnd}`}
                                  userFriends={props.user.friends}
                                  handleChange={handleTextChange}
                                  loading={formData.submitting}
                                  disabled={formData.submitting}
              />
            </div>
          </div>
        </form>
        
        {
          formData.attached_media &&
            <MediaLinkPreview iframeSrc={formData.attached_media.link}
                              onCloseButtonClick={resetAttachedMedia}
                              disabled={formData.submitting}
            />
        }

        {
          !props.shareData &&
            <React.Fragment>
            {
              formData.uploadable_media &&
                <React.Fragment>
                {
                  (formData.uploadable_media_type === 'video') &&
                    <VideoPreview src={formData.uploadable_media[0].url} />
                }
                {
                  (formData.uploadable_media_type === 'image') &&
                    <UploadableMediaList  data={formData.uploadable_media}
                                          onSelect={addUploadableMedia}
                                          onRemove={removeUploadableMedia}
                                          disabled={formData.submitting}
                    />
                }
                </React.Fragment>
            }
            {
              formData.uploadable_gif &&
                <UploadableGifList  onSelect={addUploadableGif}                    
                                    onRemove={removeUploadableGif}
                                    disabled={formData.submitting}
                />
            }
            </React.Fragment>
        }

        {
          props.shareData &&
            <div className="widget-box no-padding">
              { ActivityTemplate }
            </div>
        }
      </div>
      {/* QUICK POST BODY */}

      {/* QUICK POST FOOTER WRAP */}
      <div className="quick-post-footer-wrap">
      {
        formData.errors.length > 0 &&
          <div className="quick-post-footer-errors">
          {
            formData.errors.map((error, i) => {
              return (
              <p key={i} className="quick-post-footer-error error-field-message">* {error.text}</p>
              );
            })
          }
          </div>
      }

        {/* QUICK POST FOOTER */}
        <div className="quick-post-footer">
          {/* QUICK POST FOOTER ACTIONS */}
          <div className="quick-post-footer-actions">
          {
            !props.shareData &&
              <React.Fragment>
              {
                vikinger_constants.plugin_active.vkmedia &&
                  <React.Fragment>
                  {
                    vikinger_constants.settings.media_photo_upload_enabled && 
                      <div className="quick-post-footer-action" ref={photoTooltipRef} data-title={vikinger_translation.add_photo} onClick={toggleUploadablePhotosBar}>
                        <IconSVG  icon="camera"
                                  modifiers="quick-post-footer-action-icon"
                        />
                      </div>
                  }
                  {
                    vikinger_constants.settings.media_video_upload_enabled &&
                      <UploadVideoButton onSelect={addUploadableVideo} />
                  }
                  </React.Fragment>
              }
              </React.Fragment>
          }
          </div>
          {/* QUICK POST FOOTER ACTIONS */}

          {/* QUICK POST FOOTER ACTIONS */}
          <div className="quick-post-footer-actions">
            <p className="button small void" onClick={discardContent}>{vikinger_translation.discard}</p>
            <p className="button small secondary" onClick={submitContent}>{vikinger_translation.post_action}</p>
          </div>
          {/* QUICK POST FOOTER ACTIONS */}
        </div>
        {/* QUICK POST FOOTER */}
      </div>
      {/* QUICK POST FOOTER WRAP */}
    </div>
  );
}

export { ActivityForm as default };