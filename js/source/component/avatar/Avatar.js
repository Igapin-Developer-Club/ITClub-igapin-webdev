import React from 'react';

import { getAvatarTemplate } from '../utils/avatar';

const avatarType = vikinger_constants.settings.avatar_type;

function Avatar(props) {
  const avatarSize = props.size ? props.size : 'regular';
  const AvatarElement = getAvatarTemplate(avatarType, avatarSize);

  return (
    <AvatarElement {...props} />
  );
}

export { Avatar as default };