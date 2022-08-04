import React, { useState, useRef, useEffect } from 'react';

import LoaderSpinner from '../../loader/LoaderSpinner';

import { createFormInput } from '../../../utils/plugins';

function CommentFormGuest(props) {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [replyText, setReplyText] = useState('');

  const [nameError, setNameError] = useState(false);
  const [emailError, setEmailError] = useState(false);
  const [replyTextError, setReplyTextError] = useState(false);

  const [disabled, setDisabled] = useState(false);
  const [error, setError] = useState(false);
  const [loading, setLoading] = useState(false);
  const [notification, setNotification] = useState(false);

  const nameInputRef = useRef(null);
  const emailInputRef = useRef(null);
  const replyTextInputRef = useRef(null);

  useEffect(() => {
    createFormInput([nameInputRef.current]);
    createFormInput([emailInputRef.current]);
    createFormInput([replyTextInputRef.current]);
  }, []);

  const resetInput = () => {
    setName('');
    setEmail('');
    setReplyText('');

    setNameError(false);
    setEmailError(false);
    setReplyTextError(false);

    setError(false);
    setNotification(false);

    nameInputRef.current.classList.remove('active');
    emailInputRef.current.classList.remove('active');
    replyTextInputRef.current.classList.remove('active');
  };

  const emailIsValid = (email) => {
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email);
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    // check if there is an empty field
    const nameIsEmpty = name === '';
    const emailIsEmpty = email === '';
    const replyTextIsEmpty = replyText === '';

    if (nameIsEmpty || emailIsEmpty || replyTextIsEmpty) {
      setNameError(nameIsEmpty);
      setEmailError(emailIsEmpty);
      setReplyTextError(replyTextIsEmpty);

      setError('Please complete all fields');
      return;
    }

    // validate email
    if (!emailIsValid(email)) {
      setEmailError(true);
      setError('Please enter a valid email address');
      return;
    }

    setLoading(true);
    setDisabled(true);
    setError(false);
    setNotification(false);

    const commentData = {
      parentID: props.parent ? props.parent : 0,
      author: name,
      email: email,
      content: replyText.trim()
    };

    props.createComment(commentData, (response) => {
      // console.log('COMMENT FORM GUEST - COMMENT ID: ', response);

      setLoading(false);
      setDisabled(false);

      // if comment was not created
      if (Number.isNaN(Number.parseInt(response, 10))) {
        // console.log('COMMENT FORM GUEST - COULDN\'T CREATE COMMENT: ', response);
        setError(response);
        setReplyTextError(true);
      } else {
        resetInput();
      }
    });
  };

  const handleNameChange = (e) => {
    setName(e.target.value);
  };

  const handleEmailChange = (e) => {
    setEmail(e.target.value);
  };

  const handleReplyTextChange = (e) => {
    setReplyText(e.target.value);
  };

  return (
    <div className="post-comment-form guest-form animate-slide-down">
      <p className="post-comment-form-title">{vikinger_translation.leave_a_comment}</p>
      <p className="post-comment-form-text">Please sign in or register to comment with your account!</p>
      <form className="form comment-form" onSubmit={handleSubmit}>
        <div className="form-row split">
          <div className="form-item">
            <div ref={nameInputRef} className="form-input small">
              <label className={`${loading ? 'label-disabled' : ''}`}>Name</label>
              <input type="text" name="name" 
                    className={`${nameError ? 'input-error' : ''} ${loading ? 'input-disabled' : ''}`}
                    disabled={disabled}
                    onChange={handleNameChange}
                    value={name} />
            </div>
          </div>
          <div className="form-item">
            <div ref={emailInputRef} className="form-input small">
              <label className={`${loading ? 'label-disabled' : ''}`}>Email</label>
              <input type="text" name="email"
                    className={`${emailError ? 'input-error' : ''} ${loading ? 'input-disabled' : ''}`}
                    disabled={disabled}
                    onChange={handleEmailChange}
                    value={email} />
            </div>
          </div>
        </div>
        <div className="form-row">
          <div className="form-item">
            <div ref={replyTextInputRef} className="form-input small medium-textarea">
              <label className={`${loading ? 'label-disabled' : ''}`}>Write your comment here</label>
              <textarea name="replyText"
                        className={`${replyTextError ? 'input-error' : ''} ${loading ? 'input-disabled' : ''}`}
                        disabled={disabled}
                        onChange={handleReplyTextChange}
                        value={replyText} />
            </div>
          </div>
        </div>
        {
          error &&
            <p className="post-comment-form-error" dangerouslySetInnerHTML={{__html: error}}></p>
        }
        {
          notification &&
            <p className="post-comment-form-notification">{notification}</p>
        }
        {
          loading &&
            <LoaderSpinner />
        }
        <div className="post-comment-form-actions">
          <p className="button void" onClick={resetInput}>{vikinger_translation.discard}</p>
          <button type="submit" className="button secondary">{vikinger_translation.post_reply}</button>
        </div>
      </form>
    </div>
  );
}

export { CommentFormGuest as default };