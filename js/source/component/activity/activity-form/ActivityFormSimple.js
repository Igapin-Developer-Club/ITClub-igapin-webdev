import React, { useState, useRef } from 'react';

import ExpandableTextarea from '../../form/ExpandableTextarea';

import { stripHTML } from '../../../utils/core';

const textareaPlaceholderEnd = vikinger_constants.plugin_active.buddypress_friends ? vikinger_translation.activity_form_placeholder_2 : vikinger_translation.activity_form_placeholder_3;

function ActivityFormSimple(props) {
  const previousText = useRef(props.text ? stripHTML(props.text) : '');

  const [text, setText] = useState(previousText.current);
  const [submitting, setSubmitting] = useState(false);

  const submitContent = () => {
    // if already submitting return
    if (submitting) {
      return;
    }

    // if text wasn't changed, discard
    if (previousText.current === text) {
      props.onDiscard();
      return;
    }

    setSubmitting(true);

    props.onSubmit(text);
  };

  const handleTextChange = (e) => {
    setText(e.target.value);
  };

  return (
    <div className={`quick-post ${submitting ? 'disabled' : ''}`}>
      {/* QUICK POST BODY */}
      <div className={`quick-post-body ${props.shareData ? 'with-share-data' : ''}`}>
        <form className={`form ${submitting ? 'disabled' : ''}`}>
          <div className="form-row">
            <div className="form-item">
              <ExpandableTextarea name='text'
                                  value={text}
                                  maxLength={vikinger_constants.settings.activity_character_limit}
                                  minHeight={120}
                                  placeholder={`${vikinger_translation.activity_form_placeholder_1} ${props.user.name}! ${textareaPlaceholderEnd}`}
                                  userFriends={props.user.friends}
                                  handleChange={handleTextChange}
                                  loading={submitting}
                                  disabled={submitting}
                                  focus={props.focus}
              />
            </div>
          </div>
        </form>
      </div>
      {/* QUICK POST BODY */}

      {/* QUICK POST FOOTER WRAP */}
      <div className="quick-post-footer-wrap">
        {/* QUICK POST FOOTER */}
        <div className="quick-post-footer">
          {/* QUICK POST FOOTER ACTIONS */}
          <div className="quick-post-footer-actions"></div>
          {/* QUICK POST FOOTER ACTIONS */}

          {/* QUICK POST FOOTER ACTIONS */}
          <div className="quick-post-footer-actions">
            <p className="button small void" onClick={props.onDiscard}>{vikinger_translation.discard}</p>
            <p className="button small secondary" onClick={submitContent}>{vikinger_translation.save}</p>
          </div>
          {/* QUICK POST FOOTER ACTIONS */}
        </div>
        {/* QUICK POST FOOTER */}
      </div>
      {/* QUICK POST FOOTER WRAP */}
    </div>
  );
}

export { ActivityFormSimple as default };