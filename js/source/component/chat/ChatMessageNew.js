import React, { useState, useRef, useEffect } from 'react';

import MentionBlock from '../mention/MentionBlock';

import IconSVG from '../icon/IconSVG';

import ExpandableTextarea from '../form/ExpandableTextarea';

import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

function ChatMessageNew(props) {
  const [sendMessageText, setSendMessageText] = useState('');
  const [recipientsText, setRecipientsText] = useState('');

  const [recipients, setRecipients] = useState([]);
  
  const [creatingThread, setCreatingThread] = useState(false);

  const sendMessageTextInputRef = useRef(null);

  useEffect(() => {
    // start sending to a user
    if (props.userID) {
      const friend = props.loggedUser.friends.filter(friend => friend.id === props.userID)[0];

      setRecipientsText(friend.mention_name);
      setRecipients([friend]);

      props.clearSendMessageUser();
    }
  }, []);

  const handleSendMessageTextChange = (e) => {
    setSendMessageText(e.target.value);
  };

  const handleRecipientsTextChange = (e) => {
    // console.log('CHAT MESSAGE NEW - ON RECIPIENTS CHANGE: ', e.target);

    if (e.target.user) {
      sendMessageTextInputRef.current.focus();
    }

    setRecipientsText(e.target.value);
    setRecipients(e.target.user ? [e.target.user] : []);
  };

  const deleteRecipients = () => {
    setRecipientsText('');
    setRecipients([]);
  };

  const onSubmit = (e) => {
    e.preventDefault();

    // if already submitting or no recipient or no message was entered, return
    if (creatingThread || (recipients.length === 0) || (sendMessageText === '')) {
      return;
    }

    setCreatingThread(true);

    const recipientsIDs = [];

    for (const recipient of recipients) {
      recipientsIDs.push(recipient.id);
    }

    props.onCreateThread(sendMessageText, recipientsIDs);
  };
  
  return (
    <div className="chat-widget">
      {/* CHAT WIDGET HEADER */}
      <div className="chat-widget-header no-padding">
        <p className="chat-widget-header-title">{vikinger_translation.new_message}</p>

        <div className="chat-widget-header-form">
        {
          (recipients.length > 0) &&
            <div className="chat-widget-header-recipient">
              <MentionBlock data={recipients[0]}
                            onActionClick={deleteRecipients}
              />
            </div>
        }
        {
          (recipients.length === 0) &&
            <ExpandableTextarea name='recipients_text'
                                modifiers='small'
                                value={recipientsText}
                                minHeight={50}
                                placeholder={vikinger_translation.add_friend_placeholder}
                                userFriends={props.loggedUser.friends}
                                handleChange={handleRecipientsTextChange}
                                disabled={creatingThread}
                                hideLimit
                                disableEnter
            />
        }
        </div>
      </div>
      {/* CHAT WIDGET HEADER */}
  
      {/* CHAT WIDGET CONVERSATION */}
      <div className="chat-widget-conversation with-recipient">
      </div>
      {/* CHAT WIDGET CONVERSATION */}
  
      {/* CHAT WIDGET FORM */}
      <form className={`chat-widget-form ${creatingThread ? 'disabled' : ''}`} onSubmit={onSubmit}>
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
                      disabled={creatingThread}
              />
              {
                creatingThread &&
                  <LoaderSpinnerSmall />
              }
            </div>
          </div>

          <div className="form-item auto-width">
            <button className="button primary padded" disabled={creatingThread}>
              <IconSVG  icon="send-message"
                        modifiers="button-icon no-space"
              />
            </button>
          </div>
        </div>
      </form>
      {/* CHAT WIDGET FORM */}
    </div>
  );
}

export { ChatMessageNew as default };