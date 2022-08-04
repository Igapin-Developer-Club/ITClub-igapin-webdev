import React, { useState, useRef } from 'react';

import ExpandableTextarea from '../../form/ExpandableTextarea';

import { stripHTML } from '../../../utils/core';

function CommentFormSimple(props) {
  const previousText = useRef(props.text ? stripHTML(props.text) : '');

  const [replyText, setReplyText] = useState(previousText.current);
  const [disabled, setDisabled] = useState(false);
  const [error, setError] = useState(false);
  const [loading, setLoading] = useState(false);

  const handleSubmit = () => {
    // if no text entered, show error
    if (replyText === '') {
      setError(vikinger_translation.comment_empty_message);
      return;
    }

    // if text didn't change, discard
    if (replyText === previousText.current) {
      props.onDiscard();
      return;
    }

    // return if already loading
    if (loading) {
      return;
    }

    setLoading(true);
    setDisabled(true);
    setError(false);

    // console.log('COMMENT FORM - COMMENT DATA: ', commentData);

    props.onSubmit(replyText);
  };

  const handleReplyTextChange = (e) => {
    setReplyText(e.target.value);
  };

  return (
    <div className="post-comment-form animate-slide-down">
      <form className="form comment-form">
        <div className="form-row">
          <div className="form-item">
            <ExpandableTextarea name='replyText'
                                value={replyText}
                                modifiers='small'
                                maxLength={vikinger_constants.settings.activity_comment_character_limit}
                                userFriends={props.user.friends}
                                handleChange={handleReplyTextChange}
                                loading={loading}
                                focus={props.focus}
                                disabled={disabled}
                                error={error}
                                submitOnEnter
                                onSubmit={handleSubmit}
            />
          </div>
        </div>
      </form>
      {
        error &&
          <p className="post-comment-form-error" dangerouslySetInnerHTML={{__html: error}}></p>
      }
    </div>
  );
}

export { CommentFormSimple as default };