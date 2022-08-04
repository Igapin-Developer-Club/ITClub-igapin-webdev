import React, { useState, useEffect } from 'react';

import PostFooter from './PostFooter';

import PostCommentList from '../comment/PostCommentList';

import Loader from '../loader/Loader';

import * as userRouter from '../../router/user/user-router';
import * as postRouter from '../../router/post/post-router';
import * as reactionRouter from '../../router/reaction/reaction-router';

import { PostReactionable, updatePostReactions } from '../utils/reaction';

function OpenPostFooter(props) {
  const [post, setPost] = useState(false);
  const [loggedUser, setLoggedUser] = useState(false);
  const [reactions, setReactions] = useState([]);
  const [loading, setLoading] = useState(false);

  const postType = props.postType ? props.postType : 'post';

  useEffect(() => {
    setLoading(true);

    let getPosts = postRouter.getPosts;
      
    const getPostsArgs = { include: [props.postID] };

    if (postType === 'page') {
      getPosts = postRouter.getPages;
    }

    // get posts promise
    const getPostsPromise = getPosts(getPostsArgs),
          getLoggedInMemberPromise = userRouter.getLoggedInMember('user-activity');
          
    let getReactionsPromise = { no_result: true };

    if (vikinger_constants.plugin_active.vkreact) {
      getReactionsPromise = reactionRouter.getReactions();
    }

    jQuery
    .when(getPostsPromise, getLoggedInMemberPromise, getReactionsPromise)
    .done((getPostsResponse, getLoggedInMemberResponse, getReactionsResponse) => {
      // console.log('OPEN POST FOOTER - POST DATA: ', getPostsResponse);
      // console.log('OPEN POST FOOTER - LOGGED IN USER: ', getLoggedInMemberResponse);
      // console.log('OPEN POST FOOTER - REACTIONS: ', getReactionsResponse);

      const postResponse = getPostsResponse[0],
            loggedUserResponse = getLoggedInMemberResponse[0];

      let reactions = [];

      if (vikinger_constants.plugin_active.vkreact) {
        reactions = getReactionsResponse[0];
      }

      setPost(postResponse[0]);
      setLoggedUser(loggedUserResponse);
      setReactions(reactions);
      setLoading(false);
    });
  }, []);

  const onPostUpdate = (newPostData) => {
    // console.log('OPEN POST FOOTER - ON POST UPDATE - NEW POST DATA: ', newPostData);

    setPost(newPostData);
  };

  const postReactionableProps = {
    entityData: { post_id: props.postID },
    user: loggedUser,
    reactions: reactions,
    reactionData: post ? post.reactions : [],
    onUserReactionUpdate: (newReactionData) => {
      const newPostData = updatePostReactions(post, newReactionData);

      onPostUpdate(newPostData);
    }
  };

  const postReactionable = PostReactionable(postReactionableProps);

  return (
    <React.Fragment>
    {
      loading &&
        <Loader />
    }
    {
      !loading &&
        <PostFooter commentCount={post ? post.comment_count : 0}
                    shareType='post'
                    shareData={loggedUser && (postType !== 'page') ? post : false}
                    shareCount={post && (postType !== 'page') ? post.share_count : false}
                    user={loggedUser}
                    reactions={reactions}
                    reactionData={post ? post.reactions : []}
                    userReaction={postReactionable.getUserReaction()}
                    createUserReaction={postReactionable.createUserReaction}
                    deleteUserReaction={postReactionable.deleteUserReaction}
                    disableActions={post.comment_status !== 'open'}
                    postType='post'
        >
        {
          (updateCommentCount) => {
            return (
              <React.Fragment>
              {
                !post.password_required &&
                  <PostCommentList  postID={props.postID}
                                    commentCount={post ? post.comment_count : 0}
                                    updateCommentCount={updateCommentCount}
                                    perPage={2}
                                    order={props.order}
                                    user={loggedUser}
                                    reactions={reactions}
                                    formPosition='bottom'
                                    disableComments={post.comment_status !== 'open'}
                  />
              }
              </React.Fragment>
            );
          }
        }
        </PostFooter>
    }
    </React.Fragment>
  );
}

export { OpenPostFooter as default };