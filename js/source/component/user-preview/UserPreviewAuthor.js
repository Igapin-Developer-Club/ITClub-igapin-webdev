import React from 'react';

import Avatar from '../avatar/Avatar';

import BadgeVerified from '../badge/BadgeVerified';

function UserPreviewAuthor(props) {
  const displayVerifiedMemberBadge = vikinger_constants.plugin_active['bp-verified-member'] && props.data.verified;

  return (
    <div className="user-preview-author">
      <Avatar size="micro"
              modifiers="user-preview-author-image"
              data={props.data}
              noBorder
      />

      <p className="user-preview-author-title">{props.title || vikinger_translation.invited_by}</p>
      <p className="user-preview-author-text">
        <a href={props.data.link}>{props.data.name}</a>
        {
          displayVerifiedMemberBadge &&
            <BadgeVerified />
        }
      </p>
    </div>
  );
}

export { UserPreviewAuthor as default };