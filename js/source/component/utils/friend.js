import * as friendRouter from '../../router/friend/friend-router';

const friendUtils = (loggedUser, userID) => {
  const me = {};

  me.isFriend = function () {
    for (const friend of loggedUser.friends) {
      // if logged user has that friend in their friends list
      if (userID === friend.id) {
        return true;
      }
    }

    return false;
  };

  me.friendRequestSent = function () {
    for (const request of loggedUser.friend_requests_sent) {
      // if logged user sent a request to that user
      if (userID === request.user.id) {
        return true;
      }
    }

    return false;
  };

  me.friendRequestReceived = function () {
    for (const request of loggedUser.friend_requests_received) {
      // if logged user received a request from that user
      if (userID === request.user.id) {
        return true;
      }
    }

    return false;
  };

  me.getReceivedRequestFriendshipID = function () {
    for (const request of loggedUser.friend_requests_received) {
      // if logged user sent a request to that user
      if (userID === request.user.id) {
        return request.id;
      }
    }
  };

  me.getFriendFriendshipID = function () {
    for (const friend of loggedUser.friends) {
      // if logged user has that user as a friend
      if (userID === friend.id) {
        return friend.friendship_id;
      }
    }
  };

  me.addFriend = function () {
    return friendRouter.addFriend({
      initiator_userid: loggedUser.id,
      friend_userid: userID
    });
  };

  me.withdrawFriendRequest = function () {
    return friendRouter.withdrawFriendRequest({
      initiator_userid: loggedUser.id,
      friend_userid: userID
    });
  };

  me.rejectFriendRequest = function () {
    return friendRouter.rejectFriendRequest({
      friendship_id: me.getReceivedRequestFriendshipID()
    });
  };

  me.acceptFriendRequest = function () {
    return friendRouter.acceptFriendRequest({
      friendship_id: me.getReceivedRequestFriendshipID()
    });
  };

  me.removeFriend = function () {
    return friendRouter.removeFriend({
      friendship_id: me.getFriendFriendshipID()
    });
  };

  return me;
};

export { friendUtils as default };