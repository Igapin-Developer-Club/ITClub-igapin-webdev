import React, { useState, useRef, useEffect } from 'react';

import Avatar from '../avatar/Avatar';

import IconSVG from '../icon/IconSVG';

import BadgeVerified from '../badge/BadgeVerified';

import UserStatusLevel from '../user-status/user-status-level/UserStatusLevel';

import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

import SimpleBar from 'simplebar-react';

import { createDropdown } from '../../utils/plugins';

import * as messageRouter from '../../router/message/message-router';

import { messagePermissions } from '../utils/membership';

function ChatMessageOpen(props) {
  const [sendMessageText, setSendMessageText] = useState('');

  const [starred, setStarred] = useState(props.data.starred || false);
  const [processingStarred, setProcessingStarred] = useState(false);

  const simplebarStyles = useRef({ overflowX: 'hidden', height: '100%', padding: '35px 28px' });

  const sendMessageTextInputRef = useRef(null);

  const settingsDropdownTriggerRef = useRef(null);
  const settingsDropdownContentRef = useRef(null);

  useEffect(() => {
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

  useEffect(() => {
    setStarred(props.data.starred);
  }, [props.data]);

  const scrollableNodeRef = useRef(null);

  useEffect(() => {
    // wait for animation frame before scrolling, otherwise element won't be fully rendered and scroll won't work
    window.requestAnimationFrame(() => {
      // scroll to bottom of messages
      scrollableNodeRef.current.scrollTo(0, scrollableNodeRef.current.scrollHeight);

      // focus send message input
      // sendMessageTextInputRef.current.focus();
    });
  });

  const starMessage = () => {
    // if already processing star, return
    if (processingStarred) {
      return;
    }

    setProcessingStarred(true);

    const starMessagePromise = messageRouter.starMessage(props.data.messages[0].id);

    starMessagePromise
    .done((response) => {
      // console.log('CHAT MESSAGE OPEN - STAR MESSAGE RESPONSE: ', response);

      setStarred(true);

      props.onStarMessage();
    })
    .fail((error) => {
      // console.log('CHAT MESSAGE OPEN - STAR MESSAGE ERROR: ', error);
    })
    .always(() => {
      setProcessingStarred(false);
    });
  };

  const unstarMessage = () => {
    // if already processing star, return
    if (processingStarred) {
      return;
    }

    setProcessingStarred(true);

    const unstarMessagePromise = messageRouter.unstarMessage(props.data.messages[0].id);

    unstarMessagePromise
    .done((response) => {
      // console.log('CHAT MESSAGE OPEN - UNSTAR MESSAGE RESPONSE: ', response);

      setStarred(false);

      props.onUnstarMessage();
    })
    .fail((error) => {
      // console.log('CHAT MESSAGE OPEN - UNSTAR MESSAGE ERROR: ', error);
    })
    .always(() => {
      setProcessingStarred(false);
    });
  };

  const handleSendMessageTextChange = (e) => {
    setSendMessageText(e.target.value);
  };

  const onSubmit = (e) => {
    e.preventDefault();

    // if no message was entered, return
    if (sendMessageText === '') {
      return;
    }

    // console.log('CHAT MESSAGE OPEN - ON SUBMIT: ', props.data.id, sendMessageText);

    props.onSendMessage(props.data.id, sendMessageText, props.data.recipients_ids, () => {
      setSendMessageText('');
    });
  };

  const recipientUser = props.data.recipients.length && props.data.recipients[0].user ? props.data.recipients[0].user : {};

  const displayVerifiedMemberBadge = vikinger_constants.plugin_active['bp-verified-member'] && recipientUser.verified;

  const displayMembershipTag = vikinger_constants.plugin_active['pmpro-buddypress'] && vikinger_constants.settings.pmpro_bp_membership_level_tag_display_on_profile_is_enabled && recipientUser.membership;

  return (
    <div className="chat-widget">
      {/* CHAT WIDGET HEADER */}
      <div className="chat-widget-header">
        {/* CHAT WIDGET SETTINGS */}
        <div className="chat-widget-settings">
          <div className="post-settings-wrap">
            <div ref={settingsDropdownTriggerRef} className="post-settings">
              <IconSVG  icon="more-dots"
                        modifiers="post-settings-icon"
              />
            </div>
    
            <div ref={settingsDropdownContentRef} className="simple-dropdown">
            {
              !starred &&
                <div className="simple-dropdown-link" onClick={starMessage}>{vikinger_translation.star_action} {processingStarred && <LoaderSpinnerSmall />}</div>
            }

            {
              starred &&
                <div className="simple-dropdown-link" onClick={unstarMessage}>{vikinger_translation.unstar} {processingStarred && <LoaderSpinnerSmall />}</div>
            }

              <div className="simple-dropdown-link" onClick={props.onDeleteThread}>{vikinger_translation.delete} {props.deletingThread && <LoaderSpinnerSmall />}</div>
            </div>
          </div>
        </div>
        {/* CHAT WIDGET SETTINGS */}
        
        {/* USER STATUS */}
        <div className="user-status">
          <Avatar size="small"
                  modifiers="user-status-avatar"
                  data={recipientUser}
                  noBorder
          />
          
          <div className="user-status-title">
            <a className="bold" href={recipientUser.link}>{recipientUser.name}</a>
          {
            displayVerifiedMemberBadge &&
              <BadgeVerified />
          }
          {
            displayMembershipTag &&
              <UserStatusLevel  name={recipientUser.membership.name}
                                size="small"
              />
          }
          </div>

          <p className="user-status-timestamp small-space">{`${vikinger_translation.started}: ${props.data.messages[0].timestamp}`}</p>
        </div>
        {/* USER STATUS */}
      </div>
      {/* CHAT WIDGET HEADER */}
  
      {/* CHAT WIDGET CONVERSATION */}
      <div className="chat-widget-conversation">
        <SimpleBar scrollableNodeProps={{ ref: scrollableNodeRef }} style={simplebarStyles.current}>
        {
          props.data.messages.map((message) => {
            return (
              <div className={`chat-widget-speaker animate-slide-down ${(message.user.id !== props.loggedUser.id) ? 'left' : 'right'}`} key={message.id}>
              {
                (message.user.id !== props.loggedUser.id) &&
                  <div className="chat-widget-speaker-avatar">
                    <Avatar size="tiny"
                            data={message.user}
                            noBorder
                            noLink
                    />
                  </div>
              }
        
                <p className="chat-widget-speaker-message">{message.content}</p>
        
                <p className="chat-widget-speaker-timestamp">{message.timestamp}</p>
              </div>
            );
          })
        }
        </SimpleBar>
      </div>
      {/* CHAT WIDGET CONVERSATION */}

      {
        messagePermissions.createMessage &&
          <form className={`chat-widget-form ${props.sendingMessage ? 'disabled' : ''}`} onSubmit={onSubmit}>
            <div className="form-row split">
              <div className="form-item">
                <div className="interactive-input small">
                  <input  ref={sendMessageTextInputRef}
                          type="text"
                          id="send_message_text"
                          name="send_message_text"
                          placeholder={vikinger_translation.write_a_message}
                          value={sendMessageText}
                          onChange={handleSendMessageTextChange}
                          disabled={props.sendingMessage}
                  />
                  {
                    props.sendingMessage &&
                      <LoaderSpinnerSmall />
                  }
                </div>
              </div>

              <div className="form-item auto-width">
                <button className="button primary padded" disabled={props.sendingMessage}>
                  <IconSVG  icon="send-message"
                            modifiers="button-icon no-space"
                  />
                </button>
              </div>
            </div>
          </form>
      }
    </div>
  );
}

export { ChatMessageOpen as default };