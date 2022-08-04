import * as groupMemberRouter from '../../router/group-member/group-member-router';

const groupUtils = (loggedUser, group, member = false) => {
  const me = {};

  me.isGroupPublic = () => {
    return group.status === 'public';
  };

  me.isGroupPrivate = () => {
    return group.status === 'private';
  };

  me.isGroupCreator = () => {
    return group.creator_id === loggedUser.id;
  };

  me.isGroupAdmin = () => {
    for (const loggedUserGroup of loggedUser.groups) {
      if (loggedUserGroup.id === group.id) {
        return loggedUserGroup.is_admin;
      }
    }

    return false;
  };

  me.isGroupMod = () => {
    for (const loggedUserGroup of loggedUser.groups) {
      if (loggedUserGroup.id === group.id) {
        return loggedUserGroup.is_mod;
      }
    }

    return false;
  };

  me.isBannedFromGroup = () => {
    for (const loggedUserGroup of loggedUser.groups) {
      if (loggedUserGroup.id === group.id) {
        return loggedUserGroup.is_banned;
      }
    }

    return false;
  };

  me.isGroupMember = () => {
    for (const loggedUserGroup of loggedUser.groups) {
      if (loggedUserGroup.id === group.id) {
        return true;
      }
    }

    return false;
  };

  me.groupMembershipRequestSent = () => {
    for (const membershipRequest of loggedUser.group_membership_requests_sent) {
      if (membershipRequest.group.id === group.id) {
        return true;
      }
    }

    return false;
  };

  me.isLastGroupMember = () => {
    return group.total_member_count === 1;
  };

  me.requestGroupMembership = () => {
    return groupMemberRouter.requestGroupMembership({
      group_id: group.id,
      user_id: loggedUser.id
    });
  };

  me.removeGroupMembership = () => {
    let requestID = 0;

    for (const membershipRequest of loggedUser.group_membership_requests_sent) {
      if (membershipRequest.group.id === group.id) {
        requestID = membershipRequest.id;
        break;
      }
    }

    return groupMemberRouter.removeGroupMembership(requestID);
  };

  me.joinGroup = () => {
    return groupMemberRouter.joinGroup({
      group_id: group.id,
      user_id: loggedUser.id
    });
  };

  me.leaveGroup = () => {
    return groupMemberRouter.leaveGroup({
      group_id: group.id,
      user_id: loggedUser.id
    });
  };

  me.groupMemberIsCreator = () => {
    return group.creator_id === member.id;
  };

  me.groupMemberIsAdmin = () => {
    return group.admins.some(admin => admin.id === member.id);
  };

  me.groupMemberIsMod = () => {
    return group.mods.some(mod => mod.id === member.id);
  };

  me.groupMemberIsBanned = () => {
    return group.banned.some(bannedMember => bannedMember.id === member.id);
  };

  me.canPromoteMemberToAdmin = () => {
    return me.isGroupAdmin();
  };

  me.canPromoteMemberToMod = () => {
    return me.isGroupAdmin();
  };

  me.canDemoteMemberToMod = () => {
    return me.isGroupAdmin();
  };

  me.canDemoteMemberToMember = () => {
    return me.isGroupAdmin() && !me.groupMemberIsCreator() && !me.groupMemberIsAdmin();
  };

  me.canRemoveGroupMember = () => {
    return me.isGroupAdmin() && !me.groupMemberIsCreator() && !me.groupMemberIsAdmin();
  };

  me.canBanMember = () => {
    return me.isGroupAdmin() && !me.groupMemberIsCreator() && !me.groupMemberIsAdmin();
  };

  me.canUnbanMember = () => {
    return me.isGroupAdmin();
  };

  me.promoteGroupMemberToAdmin = () => {
    return groupMemberRouter.promoteGroupMemberToAdmin({
      group_id: group.id,
      member_id: member.id
    });
  };

  me.promoteGroupMemberToMod = () => {
    return groupMemberRouter.promoteGroupMemberToMod({
      group_id: group.id,
      member_id: member.id
    });
  };

  me.demoteGroupMemberToMod = () => {
    return groupMemberRouter.demoteGroupMemberToMod({
      group_id: group.id,
      member_id: member.id
    });
  };

  me.demoteGroupMemberToMember = () => {
    return groupMemberRouter.demoteGroupMemberToMember({
      group_id: group.id,
      member_id: member.id
    });
  };

  me.removeGroupMember = () => {
    return groupMemberRouter.removeGroupMember({
      group_id: group.id,
      member_id: member.id
    });
  };

  me.banGroupMember = () => {
    return groupMemberRouter.banGroupMember({
      group_id: group.id,
      member_id: member.id
    });
  };

  me.unbanGroupMember = () => {
    return groupMemberRouter.unbanGroupMember({
      group_id: group.id,
      member_id: member.id
    });
  };

  return me;
};

export { groupUtils as default };