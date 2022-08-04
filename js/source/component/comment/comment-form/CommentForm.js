import React, { useState } from 'react';

import Avatar from '../../avatar/Avatar';

import ExpandableTextarea from '../../form/ExpandableTextarea';

function CommentForm(props) {
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

  const handleSubmit = () => {
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

    // console.log('COMMENT FORM - COMMENT DATA: ', commentData);

    props.createComment(commentData, (response) => {
      // console.log('COMMENT FORM - FORM CREATE COMMENT WITH ID: ', response);

      setLoading(false);
      setDisabled(false);

      // if comment was not created
      if (Number.isNaN(Number.parseInt(response, 10))) {
        // console.log('COMMENT FORM - COULDN\'T CREATE COMMENT: ', response);
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
    <div className="post-comment-form animate-slide-down">
      <Avatar size="small"
              data={props.user}
              noBorder
      />
      <form className="form comment-form">
        <div className="form-row">
          <div className="form-item">
            <ExpandableTextarea name='replyText'
                                value={replyText}
                                label={vikinger_translation.your_reply}
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
                                clearInput={clearInput}
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

export { CommentForm as default };