import React, { useState } from 'react';

import Avatar from '../../avatar/Avatar';

import ExpandableTextarea from '../../form/ExpandableTextarea';

function CommentFormBig(props) {
  const [replyText, setReplyText] = useState('');
  const [disabled, setDisabled] = useState(false);
  const [error, setError] = useState(false);
  const [loading, setLoading] = useState(false);
  const [clearInput, setClearInput] = useState(false);

  const resetInput = () => {
    setReplyText('');
    setError(false);
    setClearInput(previousClearInput => {
      return !previousClearInput;
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    if (replyText === '') {
      setError(vikinger_translation.comment_empty_message);
      return;
    }

    // return if already loading
    if (loading) {
      return;
    }

    setLoading(true);
    setDisabled(true);
    setError(false);

    const commentData = {
      parentID: props.parent ? props.parent : 0,
      content: replyText.trim(),
      userID: props.user.id,
      author: props.user.name
    };

    props.createComment(commentData, (response) => {
      // console.log('COMMENT FORM BIG - COMMENT ID: ', response);

      setLoading(false);
      setDisabled(false);

      // if comment was not created
      if (Number.isNaN(Number.parseInt(response, 10))) {
        // console.log('COMMENT FORM BIG - COULDN\'T CREATE COMMENT: ', response);
        setError(response);
      } else {
        resetInput();
      }
    });
  };

  const handleReplyTextChange = (e) => {
    setReplyText(e.target.value);
  };

  return (
    <div className="post-comment-form with-title animate-slide-down">
      <p className="post-comment-form-title">{vikinger_translation.leave_a_comment}</p>
      <Avatar size="small"
              data={props.user}
              noBorder
      />
      <form className="form comment-form" onSubmit={handleSubmit}>
        <div className="form-row">
          <div className="form-item">
            <ExpandableTextarea name='replyText'
                                value={replyText}
                                label={vikinger_translation.your_reply}
                                modifiers='small'
                                minHeight={124}
                                maxLength={vikinger_constants.settings.activity_comment_character_limit}
                                userFriends={props.userFriends}
                                handleChange={handleReplyTextChange}
                                loading={loading}
                                error={error}
                                disabled={disabled}
                                clearInput={clearInput}
              />
          </div>
        </div>
        {
          error &&
            <p className="post-comment-form-error" dangerouslySetInnerHTML={{__html: error}}></p>
        }
        <div className="post-comment-form-actions">
          <p className="button void" onClick={resetInput}>{vikinger_translation.discard}</p>
          <button type="submit" className="button secondary">{vikinger_translation.post_reply}</button>
        </div>
      </form>
    </div>
  );
}

export { CommentFormBig as default };