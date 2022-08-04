import React from 'react';

function MemberOnlyContentPreview(props) {
  return (
    <p className={`${props.modifiers || ''}`}>
      {`${vikinger_translation.members_only_content_text} `}
      <a href={vikinger_constants.settings.membership_levels_page_link}>{vikinger_translation.join_now}</a>
    </p>
  );
}

export { MemberOnlyContentPreview as default };