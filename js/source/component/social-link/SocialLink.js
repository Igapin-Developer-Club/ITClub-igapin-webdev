import React from 'react';

import IconSVG from '../icon/IconSVG';

function SocialLink(props) {
  return (
    <a key={props.data.name} className={`social-link ${props.modifiers || ''} ${props.data.name}`} href={props.data.link} target="_blank">
      <IconSVG  icon={props.data.name}
                modifiers="social-link-icon"
      />
    </a>
  );
}

export { SocialLink as default };