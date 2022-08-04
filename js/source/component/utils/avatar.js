import AvatarHexagon from '../avatar/avatar-hexagon/AvatarHexagon';
import AvatarHexagonMedium from '../avatar/avatar-hexagon/AvatarHexagonMedium';
import AvatarHexagonSmall from '../avatar/avatar-hexagon/AvatarHexagonSmall';
import AvatarHexagonSmaller from '../avatar/avatar-hexagon/AvatarHexagonSmaller';
import AvatarHexagonTiny from '../avatar/avatar-hexagon/AvatarHexagonTiny';
import AvatarHexagonMicro from '../avatar/avatar-hexagon/AvatarHexagonMicro';

import AvatarCircle from '../avatar/avatar-circle/AvatarCircle';
import AvatarCircleMedium from '../avatar/avatar-circle/AvatarCircleMedium';
import AvatarCircleSmall from '../avatar/avatar-circle/AvatarCircleSmall';
import AvatarCircleSmaller from '../avatar/avatar-circle/AvatarCircleSmaller';
import AvatarCircleTiny from '../avatar/avatar-circle/AvatarCircleTiny';
import AvatarCircleMicro from '../avatar/avatar-circle/AvatarCircleMicro';

import AvatarSquare from '../avatar/avatar-square/AvatarSquare';
import AvatarSquareMedium from '../avatar/avatar-square/AvatarSquareMedium';
import AvatarSquareSmall from '../avatar/avatar-square/AvatarSquareSmall';
import AvatarSquareSmaller from '../avatar/avatar-square/AvatarSquareSmaller';
import AvatarSquareTiny from '../avatar/avatar-square/AvatarSquareTiny';
import AvatarSquareMicro from '../avatar/avatar-square/AvatarSquareMicro';

const avatarTemplate = {
  hexagon: {
    regular: AvatarHexagon,
    medium: AvatarHexagonMedium,
    small: AvatarHexagonSmall,
    smaller: AvatarHexagonSmaller,
    tiny: AvatarHexagonTiny,
    micro: AvatarHexagonMicro
  },
  circle: {
    regular: AvatarCircle,
    medium: AvatarCircleMedium,
    small: AvatarCircleSmall,
    smaller: AvatarCircleSmaller,
    tiny: AvatarCircleTiny,
    micro: AvatarCircleMicro
  },
  square: {
    regular: AvatarSquare,
    medium: AvatarSquareMedium,
    small: AvatarSquareSmall,
    smaller: AvatarSquareSmaller,
    tiny: AvatarSquareTiny,
    micro: AvatarSquareMicro
  }
};

const getAvatarTemplate = (type, size) => {
  return avatarTemplate[type][size];
};

import AvatarHexagonOverlaySmaller from '../avatar/avatar-hexagon/avatar-hexagon-overlay/AvatarHexagonOverlaySmaller';
import AvatarCircleOverlaySmaller from '../avatar/avatar-circle/avatar-circle-overlay/AvatarCircleOverlaySmaller';
import AvatarSquareOverlaySmaller from '../avatar/avatar-square/avatar-square-overlay/AvatarSquareOverlaySmaller';

const avatarOverlayTemplate = {
  hexagon: {
    smaller: AvatarHexagonOverlaySmaller
  },
  circle: {
    smaller: AvatarCircleOverlaySmaller
  },
  square: {
    smaller: AvatarSquareOverlaySmaller
  }
};

const getAvatarOverlayTemplate = (type, size) => {
  return avatarOverlayTemplate[type][size];
};

export { getAvatarTemplate, getAvatarOverlayTemplate };