import React from 'react';

function BadgeVerified(props) {
  return (
    <span dangerouslySetInnerHTML={{__html: vikinger_constants.settings.bp_verified_member_badge}}></span>
  );
}

export { BadgeVerified as default };