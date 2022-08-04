import React, { useRef, useEffect } from 'react';

import friendUtils from '../utils/friend';

import Avatar from '../avatar/Avatar';

import IconSVG from '../icon/IconSVG';

import BadgeItemList from '../badge/BadgeItemList';
import BadgeVerified from '../badge/BadgeVerified';

import UserStatusLevel from '../user-status/user-status-level/UserStatusLevel';

import SocialLinkList from '../social-link/SocialLinkList';
import SocialLink from '../social-link/SocialLink';

import AddFriendButton from '../button/action-button/action-button-friend/AddFriendButton';
import AcceptFriendRequestButton from '../button/action-button/action-button-friend/AcceptFriendRequestButton';
import WithdrawFriendRequestButton from '../button/action-button/action-button-friend/WithdrawFriendRequestButton';
import RemoveFriendButton from '../button/action-button/action-button-friend/RemoveFriendButton';

import ButtonLink from '../button/ButtonLink';

import { createSlider } from '../../utils/plugins';

import { getURLIcon } from '../utils/xprofile';

import { friendshipPermissions } from '../utils/membership';
import { messagePermissions } from '../utils/membership';

function MemberPreviewSmall(props) {
  const socialLinksSlidesPerView = 4;

  const socialLinks = [];

  if (props.data.profile_data.group.Social_Links) {
    for (const socialField of props.data.profile_data.group.Social_Links) {
      if (socialField.value !== '') {
        socialLinks.push({
          name: getURLIcon(socialField.name),
          link: socialField.value
        });
      }
    }
  }

  const socialLinksSliderRef = useRef(null);
  const socialLinksControlPrevRef = useRef(null);
  const socialLinksControlNextRef = useRef(null);

  let socialLinksSlider = undefined;

  useEffect(() => {
    if (socialLinks.length > socialLinksSlidesPerView) {
      socialLinksSlider = createSlider(socialLinksSliderRef.current, {
        navigation: {
          prevEl: socialLinksControlPrevRef.current,
          nextEl: socialLinksControlNextRef.current
        },
        slidesPerView: socialLinksSlidesPerView,
        spaceBetween: 8
      });
    }

    return () => {
      if (socialLinksSlider) {
        // Destroy slider instance and detach all events listeners
        socialLinksSlider.destroy();
      }
    };
  }, []);

  const friendable = friendUtils(props.loggedUser, props.data.id);

  const postCountText = props.data.stats.post_count === 1 ? vikinger_translation.post : vikinger_translation.posts,
        friendCountText = props.data.stats.friend_count === 1 ? vikinger_translation.friend : vikinger_translation.friends,
        commentCountText = props.data.stats.comment_count === 1 ? vikinger_translation.comment : vikinger_translation.comments;

  const displayVerifiedMemberBadge = vikinger_constants.plugin_active['bp-verified-member'] && vikinger_constants.settings.bp_verified_member_display_badge_in_members_lists && props.data.verified;

  const displayMembershipTag = vikinger_constants.plugin_active['pmpro-buddypress'] && vikinger_constants.settings.pmpro_bp_membership_level_tag_display_on_profile_is_enabled && props.data.membership;

  return (
    <div className="user-preview landscape animate-slide-down">
      {/* USER PREVIEW COVER */}
      <div className="user-preview-cover" style={{background: `url(${props.data.cover_url}) center center / cover no-repeat`}}></div>
      {/* USER PREVIEW COVER */}
  
      {/* USER PREVIEW INFO */}
      <div className="user-preview-info">
        <div className="user-short-description landscape tiny">
          <Avatar size="small"
                  modifiers="user-short-description-avatar"
                  data={props.data}
          />
    
          <p className="user-short-description-title">
            <a href={props.data.link}>{props.data.name}</a>
          {
            displayVerifiedMemberBadge && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_fullname &&
              <BadgeVerified />
          }
          </p>
          {
            displayMembershipTag &&
              <UserStatusLevel name={props.data.membership.name} />
          }
          <p className="user-short-description-text">
            <a href={props.data.link}>&#64;{props.data.mention_name}</a>
          {
            displayVerifiedMemberBadge && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_username &&
              <BadgeVerified />
          }
          </p>
        </div>

        {
          vikinger_constants.gamipress_badge_type_exists &&
            <React.Fragment>
            {
              (props.data.badges.length > 0) &&
                <BadgeItemList data={props.data.badges} maxDisplayCount={4} moreLink={props.data.badges_link} modifiers="small" />
            }
            {
              (props.data.badges.length === 0) &&
                <p className="no-results-text">{vikinger_translation.no_badges_unlocked}</p>
            }
            </React.Fragment>
        }

        <div className="user-stats">
          <div className="user-stat">
            <p className="user-stat-title">{props.data.stats.post_count}</p>
            <p className="user-stat-text">{postCountText}</p>
          </div>
        {
          vikinger_constants.plugin_active.buddypress_friends &&
            <div className="user-stat">
              <p className="user-stat-title">{props.data.stats.friend_count}</p>
              <p className="user-stat-text">{friendCountText}</p>
            </div>
        }
          <div className="user-stat">
            <p className="user-stat-title">{props.data.stats.comment_count}</p>
            <p className="user-stat-text">{commentCountText}</p>
          </div>
        </div>

        {/* SOCIAL LINKS */}
        {
          (socialLinks.length > 0) && (socialLinks.length <= socialLinksSlidesPerView) &&
            <SocialLinkList data={socialLinks}
                            modifiers="small"
            />
        }
        {
          (socialLinks.length > socialLinksSlidesPerView) &&
            <div className="user-preview-social-links-wrap">
              {/* USER PREVIEW SOCIAL LINKS SLIDER */}
              <div ref={socialLinksSliderRef} className="user-preview-social-links-slider swiper-container">
                {/* USER PREVIEW SOCIAL LINKS */}
                <div className="user-preview-social-links swiper-wrapper">
                  {
                    socialLinks.map((socialItem, i) => {
                      return (
                        <div key={i} className="user-preview-social-link swiper-slide">
                          <SocialLink data={socialItem}
                                      modifiers="small"
                          />
                        </div>
                      );
                    })
                  }
                </div>
                {/* USER PREVIEW SOCIAL LINKS */}
              </div>
              {/* USER PREVIEW SOCIAL LINKS SLIDER */}

              {/* SLIDER CONTROLS */}
              <div className="slider-controls">
                {/* SLIDER CONTROL */}
                <div ref={socialLinksControlPrevRef} className="slider-control left">
                  <IconSVG  icon="small-arrow"
                            modifiers="slider-control-icon"
                  />
                </div>
                {/* SLIDER CONTROL */}
          
                {/* SLIDER CONTROL */}
                <div ref={socialLinksControlNextRef} className="slider-control right">
                  <IconSVG  icon="small-arrow"
                            modifiers="slider-control-icon"
                  />
                </div>
                {/* SLIDER CONTROL */}
              </div>
              {/* SLIDER CONTROLS */}
            </div>
        }
        {/* SOCIAL LINKS */}

        {
          (socialLinks.length === 0) &&
            <p className="no-results-text no-results-social">{vikinger_translation.no_social_networks_linked}</p>
        }

      {/* USER PREVIEW ACTIONS */}
      {
        vikinger_constants.plugin_active.buddypress_friends &&
          <div className="user-preview-actions">
          {
            props.loggedUser && (props.loggedUser.id !== props.data.id) &&
              <React.Fragment>
              {
                !friendable.isFriend() &&
                  <React.Fragment>
                  {
                    friendshipPermissions.sendFriendRequest && !friendable.friendRequestSent() && !friendable.friendRequestReceived() &&
                      <AddFriendButton  modifiers="secondary"
                                        icon="add-friend"
                                        title={vikinger_translation.add_friend}
                                        loggedUser={props.loggedUser}
                                        userID={props.data.id}
                                        onActionComplete={props.onActionComplete}
                      />
                  }
                  {
                    friendable.friendRequestSent() &&
                      <WithdrawFriendRequestButton  modifiers="tertiary"
                                                    icon="remove-friend"
                                                    title={vikinger_translation.withdraw_friend}
                                                    loggedUser={props.loggedUser}
                                                    userID={props.data.id}
                                                    onActionComplete={props.onActionComplete}
                      />
                  }
                  {
                    friendable.friendRequestReceived() &&
                      <AcceptFriendRequestButton  modifiers="secondary"
                                                  icon="add-friend"
                                                  title={vikinger_translation.accept_friend}
                                                  loggedUser={props.loggedUser}
                                                  userID={props.data.id}
                                                  onActionComplete={props.onActionComplete}
                      />
                  }
                  </React.Fragment>
              }
              {
                friendable.isFriend() &&
                  <RemoveFriendButton modifiers="tertiary"
                                      icon="remove-friend"
                                      title={vikinger_translation.remove_friend}
                                      loggedUser={props.loggedUser}
                                      userID={props.data.id}
                                      onActionComplete={props.onActionComplete}
                  />
              }
              {
                messagePermissions.createMessage && vikinger_constants.plugin_active.buddypress_messages && friendable.isFriend() &&
                  <ButtonLink modifiers="primary"
                              title={vikinger_translation.send_message}
                              icon="messages"
                              link={`${props.loggedUser.messages_link}?user_id=${props.data.id}`}
                  />
              }
              </React.Fragment>
          }
          </div>
      }
      {/* USER PREVIEW ACTIONS */}
      </div>
      {/* USER PREVIEW INFO */}
    </div>
  );
}

export { MemberPreviewSmall as default };