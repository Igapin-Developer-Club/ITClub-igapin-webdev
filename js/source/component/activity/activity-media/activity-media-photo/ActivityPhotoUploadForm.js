import React, { useState } from 'react';

import UploadableMediaList from '../../../media/UploadableMediaList';

import ExpandableTextarea from '../../../form/ExpandableTextarea';

const textareaPlaceholderEnd = vikinger_constants.plugin_active.buddypress_friends ? vikinger_translation.activity_form_placeholder_2 : vikinger_translation.activity_form_placeholder_3;

function ActivityPhotoUploadForm(props) {
  const [formData, setFormData] = useState({
    text: '',
    submitting: false,
    uploadable_media: [],
    uploadable_media_type: 'image',
    errors: []
  });

  const discardContent = () => {
    setFormData(previousFormData => {
      return {
        ...previousFormData,
        text: '',
        uploadable_media: [],
        errors: []
      };
    });

    // console.log('DISCARD CONTENT - POPUP: ', props.popup);

    if (props.popup && props.popup.current) {
      props.popup.current.hide();
    }
  };

  const submitContent = () => {
    // if didn't select any media, or already submitting form, return
    if ((formData.uploadable_media.length === 0) || formData.submitting) {
      setFormData(previousFormData => {
        return {
          ...previousFormData,
          errors: [
            {
              text: vikinger_translation.upload_form_photo_empty_error
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

    // console.log('ACTIVITY MEDIA UPLOAD FORM - POST CONTENT: ', formData);

    props.onSubmit(formData, (response) => {
      // console.log('ACTIVITY MEDIA UPLOAD FORM - CREATED ACTIVITY: ', response);

      if (response) {
        discardContent();
      } else {
        // console.log('ACTIVITY MEDIA UPLOAD FORM - ERROR CREATING ACTIVITY');
      }

      setFormData(previousFormData => {
        return {
          ...previousFormData,
          submitting: false
        };
      });
    });
  }

  const handleTextChange = (e) => {
    // e can be default event or user generated with only target and value properties
    if (e.persist) {
      e.persist();
    }

    setFormData(previousFormData => {
      return {
        ...previousFormData,
        text: e.target.value
      };
    });

    // console.log('ACTIVITY MEDIA UPLOAD FORM - STATE:', formData);
  };

  const addUploadableMedia = (data) => {
    // console.log('ACTIVITY MEDIA UPLOAD FORM - ADD UPLOADABLE MEDIA: ', data);

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

        // console.log('ACTIVITY MEDIA UPLOAD FORM - UPLOADABLE MEDIA: ', newUploadableMedia);

        return {
          ...previousFormData,
          uploadable_media: newUploadableMedia,
          errors: errors
        };
      });
    }
  };

  const removeUploadableMedia = (id) => {
    // console.log('ACTIVITY MEDIA UPLOAD FORM - REMOVE UPLOADABLE MEDIA: ', id);

    setFormData(previousFormData => {
      const uploadableMedia = previousFormData.uploadable_media.filter((media, i) => {
        if (media.id === id) {
          // release object URL reference
          URL.revokeObjectURL(media.url);
        }

        return media.id !== id;
      });

      // console.log('ACTIVITY MEDIA UPLOAD FORM - UPLOADABLE MEDIA: ', uploadableMedia);

      return {
        ...previousFormData,
        uploadable_media: uploadableMedia
      };
    });
  };

  return (
    <div ref={props.forwardedRef} className={`quick-post ${formData.submitting ? 'disabled' : ''}`}>
      <div className="quick-post-header">
        <div className="quick-post-header-filters-wrap">
          {/* QUICK POST HEADER TITLE */}
          <p className="quick-post-header-title">{vikinger_translation.upload_photos}</p>
          {/* QUICK POST HEADER TITLE */}
        </div>
      </div>
      
      {/* QUICK POST BODY */}
      <div className="quick-post-body">
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

        <UploadableMediaList  data={formData.uploadable_media}
                              onSelect={addUploadableMedia}
                              onRemove={removeUploadableMedia}
                              disabled={formData.submitting}
        />
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

export { ActivityPhotoUploadForm as default };