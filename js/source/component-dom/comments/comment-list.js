import React from 'react';
import ReactDOM from 'react-dom';

import OpenPostFooter from '../../component/post/OpenPostFooter';

const commentListElement = document.querySelector('#comment-list');

if (commentListElement) {
  const postID = Number.parseInt(commentListElement.getAttribute('data-postid'), 10),
        postType = commentListElement.getAttribute('data-posttype') || false,
        order = 'DESC';

  ReactDOM.render(
    <OpenPostFooter postID={postID}
                    order={order}
                    postType={postType}
    />,
    commentListElement
  );
}