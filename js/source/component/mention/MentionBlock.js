import React from 'react';

import Avatar from '../avatar/Avatar';

import IconSVG from '../icon/IconSVG';

function MentionBlock(props) {
  return (
    <div className="mention-block">
      <Avatar size="tiny"
              modifiers="mention-block-avatar"
              data={props.data}
              noBorder
              noLink
      />

      <p className="mention-block-title">{props.data.mention_name}</p>

      <div className="mention-block-action" onClick={props.onActionClick}>
        <IconSVG  icon="cross"
                  modifiers="mention-block-action-icon"
        />
      </div>
    </div>
  );
}

export { MentionBlock as default };