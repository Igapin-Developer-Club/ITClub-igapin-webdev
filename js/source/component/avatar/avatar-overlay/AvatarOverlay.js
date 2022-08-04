import React from 'react';

import { getAvatarOverlayTemplate } from '../../utils/avatar';

const avatarOverlayType = vikinger_constants.settings.avatar_type;

function AvatarOverlay(props) {
  const avatarOverlaySize = props.size ? props.size : 'regular';
  const AvatarElement = getAvatarOverlayTemplate(avatarOverlayType, avatarOverlaySize);

  return (
    <AvatarElement {...props} />
  );
}

export { AvatarOverlay as default };