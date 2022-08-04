import React, { useRef, useLayoutEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

import MessageBox from '../message/MessageBox';

import { createDropdown, createPopup } from '../../utils/plugins';

function ActivitySettings(props) {
  const settingsDropdownTriggerRef = useRef(null);
  const settingsDropdownContentRef = useRef(null);

  useLayoutEffect(() => {
    createDropdown({
      triggerElement: settingsDropdownTriggerRef.current,
      containerElement: settingsDropdownContentRef.current,
      offset: {
        top: 30,
        right: 9
      },
      animation: {
        type: 'translate-top',
        speed: .3,
        translateOffset: {
          vertical: 20
        }
      }
    });
  }, []);

  const messageBoxRef = useRef(null);
  const messageBoxTriggerRef = useRef(null);

  const popup = useRef(null);

  useLayoutEffect(() => {
    if (props.userActivityPermissions.delete) {
      popup.current = createPopup({
        triggerElement: messageBoxTriggerRef.current,
        premadeContentElement: messageBoxRef.current,
        type: 'premade',
        popupSelectors: ['message-box-popup', 'animate-slide-down'],
        onOverlayCreate: function (overlay) {
          overlay.setAttribute('data-simplebar', '');
        }
      });
    }
  }, []);

  return (
    <div className="widget-box-settings">
      <div className="post-settings-wrap">
        <div ref={settingsDropdownTriggerRef} className="post-settings">
          <IconSVG  icon="more-dots"
                    modifiers="post-settings-icon"
          />
        </div>

        <div ref={settingsDropdownContentRef} className="simple-dropdown">
          {
            !props.favorite &&
              <div className="simple-dropdown-link" onClick={props.addFavorite}>{vikinger_translation.add_favorite} {props.processingFavorite && <LoaderSpinnerSmall />}</div> 
          }
          {
            props.favorite &&
              <div className="simple-dropdown-link" onClick={props.removeFavorite}>{vikinger_translation.remove_favorite} {props.processingFavorite && <LoaderSpinnerSmall />}</div>
          }
          {
            props.userActivityPermissions.pin && !props.pinned &&
              <div className="simple-dropdown-link" onClick={props.pinActivity}>{vikinger_translation.pin_to_top} {props.processingPinned && <LoaderSpinnerSmall />}</div> 
          }
          {
            props.userActivityPermissions.pin && props.pinned &&
              <div className="simple-dropdown-link" onClick={props.unpinActivity}>{vikinger_translation.unpin_from_top} {props.processingPinned && <LoaderSpinnerSmall />}</div>
          }
          {
            props.userActivityPermissions.edit &&
              <div className="simple-dropdown-link" onClick={props.startEditingActivity}>{vikinger_translation.edit_post}</div>
          }
          {
            props.userActivityPermissions.delete &&
              <React.Fragment>
                <div ref={messageBoxTriggerRef} className="simple-dropdown-link">{vikinger_translation.delete_post} {props.processingDelete && <LoaderSpinnerSmall />}</div>

                <MessageBox forwardedRef={messageBoxRef}
                            data={{title: vikinger_translation.delete_activity_message_title, text: vikinger_translation.delete_activity_message_text}}
                            error
                            confirm
                            onAccept={() => {popup.current.hide(); props.deleteActivity();}}
                            onCancel={() => {popup.current.hide();}}
                />
              </React.Fragment>
          }
        </div>
      </div>
    </div>
  );
}

export { ActivitySettings as default };