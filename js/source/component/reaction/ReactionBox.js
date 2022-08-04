import React from 'react';

import UserStatusList from '../user-status/UserStatusList';

import { getAllReactionUsers, getAllUsersByReaction } from '../utils/reaction';

function ReactionBox(props) {
  const activeTabSelector = 'active';

  const allReactionUsers = getAllReactionUsers(props.data);

  const reactions = getAllUsersByReaction(props.data.slice().reverse());

  return (
    <div ref={props.forwardedRef} className="reaction-box">
      <div className="reaction-box-options">
        <div className={`reaction-box-option ${(props.activeTab === 0) && activeTabSelector}`} onClick={() => {props.showTab(0);}}>
          <p className="reaction-box-option-text">{`${vikinger_translation.all}: ${props.reactionCount}`}</p>
        </div>

      {
        reactions.map((reaction, i) => {
          return (
            <div key={reaction.id} className={`reaction-box-option ${(props.activeTab === (i + 1)) && activeTabSelector}`} onClick={() => {props.showTab(i + 1);}}>
              <img className="reaction-box-option-image" src={reaction.image_url} alt={`reaction-${reaction.name}`} />
              <p className="reaction-box-option-text">{reaction.reaction_count}</p>
            </div>
          );
        })
      }
      </div>

      <div className="reaction-box-content">
      {
        props.activeTab === 0 &&
          <div className="reaction-box-item" data-simplebar>   
            <UserStatusList data={allReactionUsers}
                            showVerifiedBadge={vikinger_constants.settings.bp_verified_member_display_badge_in_members_lists} />
          </div>
      }
      {
        reactions.map((reaction, i) => {
          return (
            (props.activeTab === (i + 1)) &&
              <div key={reaction.id} className="reaction-box-item" data-simplebar>   
                <UserStatusList data={reaction.users}
                                showVerifiedBadge={vikinger_constants.settings.bp_verified_member_display_badge_in_members_lists} />
              </div>
          );
        })
      }
      </div>
    </div>
  );
}

export { ReactionBox as default };