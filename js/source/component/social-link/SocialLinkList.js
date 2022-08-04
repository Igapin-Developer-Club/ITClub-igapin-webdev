import React from 'react';

import SocialLink from './SocialLink';

function SocialLinkList(props) {
  const renderedSocialLinkList = props.data.map((socialItem, i) => {
    return (
      <SocialLink key={i}
                  data={socialItem}
                  modifiers={props.modifiers}
      />
    );
  });

  return (
    <div className={`social-links ${props.modifiers || ''}`}>
      { renderedSocialLinkList }
    </div>
  );
}

export { SocialLinkList as default };