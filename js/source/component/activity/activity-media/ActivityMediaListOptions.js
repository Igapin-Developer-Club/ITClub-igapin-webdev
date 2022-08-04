import React, { useState, useRef, useEffect } from 'react';

import LoaderSpinnerSmall from '../../loader/LoaderSpinnerSmall';

import { createPopup } from '../../../utils/plugins';

function ActivityMediaListOptions(props) {
  const [processingDelete, setProcessingDelete] = useState(false);

  const uploadPhotoBoxTriggerRef = useRef(null);
  const uploadPhotoBoxRef = useRef(null);

  const popup = useRef(null);

  useEffect(() => {
    popup.current = createPopup({
      triggerElement: uploadPhotoBoxTriggerRef.current,
      premadeContentElement: uploadPhotoBoxRef.current,
      type: 'premade',
      popupSelectors: ['upload-box-popup', 'animate-slide-down'],
      onOverlayCreate: function (overlay) {
        overlay.setAttribute('data-simplebar', '');
      }
    });
  }, []);

  const deleteSelected = () => {
    if (processingDelete) {
      return;
    }

    setProcessingDelete(true);

    props.deleteSelected(() => {
      setProcessingDelete(false);
    });
  };

  const ActivityUploadForm = props.activityUploadForm;

  return (
    <div className="item-list-options">
      <div className="item-list-option-wrap">
        <p ref={uploadPhotoBoxTriggerRef} className="item-list-option">{props.uploadButtonText}</p>
        <ActivityUploadForm forwardedRef={uploadPhotoBoxRef}
                            user={props.user}
                            postIn={props.postIn}
                            onSubmit={props.onUpload}
                            popup={popup}
        />
      </div>
      {
        props.allowDelete && (props.activities.length > 0) &&
          <React.Fragment>
          {
            props.activitiesSelected() &&
              <div className="item-list-option-wrap">
                <p className="item-list-option" onClick={deleteSelected}>{vikinger_translation.delete}</p>
                {
                  processingDelete &&
                    <LoaderSpinnerSmall />
                }
              </div>
          }
            <p className="item-list-option" onClick={props.toggleAllSelectable}>{!props.selectedAll ? vikinger_translation.select_all : vikinger_translation.unselect_all}</p>
          </React.Fragment>
      }
    </div>
  );
}

export { ActivityMediaListOptions as default };