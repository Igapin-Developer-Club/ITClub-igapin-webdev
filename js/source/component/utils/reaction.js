import { deepExtend, deepMerge } from '../../utils/core';

import * as reactionRouter from '../../router/reaction/reaction-router';

const Reactionable = (props) => {
  const sortUserReactions = (reactionData, order = 'DESC') => {
    const reactions = [];
  
    deepExtend(reactions, reactionData);
  
    const sortedReactionData = reactions.sort((firstEl, secondEl) => {
      if (firstEl.reaction_count < secondEl.reaction_count) {
        // console.log(firstEl.reaction_count + '<' + secondEl.reaction_count);
        return -1;
      }
  
      if (firstEl.reaction_count > secondEl.reaction_count) {
        // console.log(firstEl.reaction_count + '>' + secondEl.reaction_count);
        return 1;
      }
  
      return 0;
    });
  
    // console.log('REACTIONABLE - SORTED REACTION DATA: ', sortedReactionData);
  
    return sortedReactionData;
  };
  
  const createUserReactionStatic = (reactionData, reactionID) => {
    const reactions = [];
  
    deepExtend(reactions, reactionData);
  
    for (let i = 0; i < reactionData.length; i++) {
      const reaction = reactionData[i];
  
      // found reaction
      if (reaction.id === reactionID) {
        // increase reaction count
        reactions[i].reaction_count = (Number.parseInt(reactions[i].reaction_count, 10) + 1) + '';
        // add user
        reactions[i].users.push(props.user);
  
        // console.log('CREATE MODIFIED REACTION DATA: ', reactions);
  
        return reactions;
      }
    }
  
    // reaction not found, create it
    for (const reaction of props.reactions) {
      // reaction found
      if (reaction.id == reactionID) {
        const newReaction = {};
        deepExtend(newReaction, reaction);
        newReaction.reaction_count = '1';
        newReaction.users = [];
        newReaction.users.push(props.user);
  
        reactions.unshift(newReaction);
  
        // console.log('CREATE MODIFIED REACTION DATA: ', reactions);
  
        return reactions;
      }
    }
  
    return reactions;
  };
  
  const deleteUserReactionStatic = (reactionData) => {
    const reactions = [];
  
    deepExtend(reactions, reactionData);
  
    for (let i = 0; i < reactionData.length; i++) {
      const reaction = reactionData[i];
  
      for (let j = 0; j < reaction.users.length; j++) {
        const user = reaction.users[j];
        // found user
        if (user.id === props.user.id) {
          // console.log('FOUND USER: ', user);
  
          // decrease reaction count
          const newReactionCount = Number.parseInt(reaction.reaction_count, 10) - 1;
  
          // if last reaction of this type
          if (newReactionCount === 0) {
            // remove reaction
            reactions.splice(i, 1);
          } else {
            // remove user
            reactions[i].users.splice(j, 1);
            // decrease reaction count
            reactions[i].reaction_count = newReactionCount + '';
          }
  
          // console.log('DELETE MODIFIED REACTION DATA: ', reactions);
  
          break;
        }
      }
    }
  
    return reactions;
  };

  const getUserReaction = () => {
    if (!props.user) {
      return false;
    }

    for (const reaction of props.reactionData) {
      for (const user of reaction.users) {
        // user found
        if (user.id === props.user.id) {
          return {
            id: reaction.id,
            image_url: reaction.image_url,
            name: reaction.name
          };
        }
      }
    }

    return false;
  };

  const createUserReaction = (reactionID) => {
    // console.log('REACTIONABLE - CREATE USER REACTION: ', reactionID);

    const userReaction = getUserReaction();

    if (userReaction && (userReaction.id == reactionID)) {
      // reaction already selected
      return;
    }

    // console.log('REACTIONABLE - CREATE WITH: ', props.entityData);

    const config = {
      user_id: props.user.id,
      reaction_id: reactionID
    };

    deepExtend(config, props.entityData);

    // create user reaction
    props.createUserReaction(config, (response) => {
      // console.log('REACTIONABLE - CREATE USER REACTION: ', response);

      // check if created correctly
    });

    // remove other reaction from this user on this activity if exists
    // and reduce reaction count
    let newReactionData = deleteUserReactionStatic(props.reactionData);

    // add reaction from this user to this activity
    // and increse reaction count
    newReactionData = createUserReactionStatic(newReactionData, reactionID);
    
    newReactionData = sortUserReactions(newReactionData);

    props.onUserReactionUpdate(newReactionData);
  };

  const deleteUserReaction = () => {
    // const userReaction = getUserReaction();
    // console.log('REACTIONABLE - DELETE USER REACTION: ', userReaction);

    const config = {
      user_id: props.user.id
    };

    deepExtend(config, props.entityData);

    // delete user reaction
    props.deleteUserReaction(config, (response) => {
      // console.log('REACTIONABLE - DELETE USER REACTION: ', response);

      // check if deleted correctly
    });

    // remove other reaction from this user on this activity if exists
    // and reduce reaction count
    let newReactionData = deleteUserReactionStatic(props.reactionData);

    newReactionData = sortUserReactions(newReactionData);

    props.onUserReactionUpdate(newReactionData);
  };

  return { getUserReaction, createUserReaction, deleteUserReaction };
};

const ActivityReactionable = (props) => {
  return Reactionable({
    ...props,
    createUserReaction: reactionRouter.createActivityUserReaction,
    deleteUserReaction: reactionRouter.deleteActivityUserReaction
  });
};

const PostReactionable = (props) => {
  return Reactionable({
    ...props,
    createUserReaction: reactionRouter.createPostUserReaction,
    deleteUserReaction: reactionRouter.deletePostUserReaction
  });
};

const PostCommentReactionable = (props) => {
  return Reactionable({
    ...props,
    createUserReaction: reactionRouter.createPostCommentUserReaction,
    deleteUserReaction: reactionRouter.deletePostCommentUserReaction
  });
};

const updatePostReactions = (post, newReactions) => {
  const newPost = deepMerge(post);

  newPost.reactions = newReactions;

  return newPost;
};

const updatePosts = (posts, newPostData) => {
  const newPosts = posts.map((post) => {
    if (post.id === newPostData.id) {
      return newPostData;
    }

    return post;
  });

  return newPosts;
};

const getAllReactionUsers = (reactionData) => {
  let allReactionUsers = [];

  for (const reaction of reactionData) {
    const users = [];

    for (const user of reaction.users) {
      const userReaction = deepMerge(user);
      userReaction.reaction = {};
      userReaction.reaction.id = reaction.id;
      userReaction.reaction.name = reaction.name;
      userReaction.reaction.image_url = reaction.image_url;

      users.push(userReaction);
    }

    allReactionUsers = allReactionUsers.concat(users);
  }

  return allReactionUsers;
};

const getAllUsersByReaction = (reactionData) => {
  const reactions = [];

  for (const reaction of reactionData) {
    const users = [];

    for (const user of reaction.users) {
      const userReaction = deepMerge(user);
      userReaction.reaction = {};
      userReaction.reaction.id = reaction.id;
      userReaction.reaction.name = reaction.name;
      userReaction.reaction.image_url = reaction.image_url;

      users.push(userReaction);
    }

    reaction.users = users;
    reactions.push(reaction);
  }

  return reactions;
};

export {
  ActivityReactionable,
  PostReactionable, updatePostReactions, updatePosts,
  PostCommentReactionable,
  getAllReactionUsers, getAllUsersByReaction
};