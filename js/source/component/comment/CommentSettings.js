import React, { useState, useRef, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

import MessageBox from '../message/MessageBox';

import { createDropdown, createPopup } from '../../utils/plugins';

function CommentSettings(props) {
  const [processingDelete, setProcessingDelete] = useState(false);

  const settingsDropdownTriggerRef = useRef(null);
  const settingsDropdownContentRef = useRef(null);

  useEffect(() => {
    createDropdown({
      triggerElement: settingsDropdownTriggerRef.current,
      containerElement: settingsDropdownContentRef.current,
      offset: {
        bottom: 30,
        left: 0
      },
      animation: {
        type: 'translate-bottom',
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

  useEffect(() => {
    if (props.userCommentPermissions.delete) {
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

  const deleteComment = () => {
    // return if already processing delete
    if (processingDelete) {
      return;
    }

    setProcessingDelete(true);

    const commentData = {
      id: props.data.id,
      hasChildren: props.data.hasChildren
    };

    props.deleteComment(commentData, () => {
      setProcessingDelete(false);
    });
  };

  return (
    <div className="post-settings-wrap">
      <div ref={settingsDropdownTriggerRef} className="post-settings">
        <IconSVG  icon="more-dots"
                  modifiers="post-settings-icon small"
        />
      </div>

      <div ref={settingsDropdownContentRef} className="simple-dropdown">
      {
        props.userCommentPermissions.edit &&
          <React.Fragment>
          {
            !props.editingComment &&
              <div className="simple-dropdown-link" onClick={props.startEditingComment}>
                { vikinger_translation.edit_comment }
              </div>
          }
          {
            props.editingComment &&
              <div className="simple-dropdown-link" onClick={props.stopEditingComment}>
                { vikinger_translation.cancel_edit }
              </div>
          }
          </React.Fragment>
      }
      {
        props.userCommentPermissions.delete &&
          <React.Fragment>
            <div ref={messageBoxTriggerRef} className="simple-dropdown-link">
              { vikinger_translation.delete_comment }
              { processingDelete && <LoaderSpinnerSmall /> }
            </div>

            <MessageBox forwardedRef={messageBoxRef}
                        data={{title: vikinger_translation.delete_comment_message_title, text: vikinger_translation.delete_comment_message_text}}
                        error
                        confirm
                        onAccept={() => { popup.current.hide(); deleteComment(); }}
                        onCancel={() => { popup.current.hide(); }}
            />
          </React.Fragment>
      }
      </div>
    </div>
  );
}

export { CommentSettings as default };