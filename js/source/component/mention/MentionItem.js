import React from 'react';

import Avatar from '../avatar/Avatar';

function MentionItem(props) {
  const handleClick = () => {
    props.onClick(props.data);
  };

  const wrapSearchTextRegex = new RegExp(props.searchText, 'igm'),
        name = props.data.mention_name,
        wrappedName = props.searchText === '' ? props.data.mention_name : name.replace(wrapSearchTextRegex, '<span class="highlighted">$&</span>');

  return (
    <div className={`mention-list-item ${props.active ? 'active' : ''}`} onClick={handleClick} onMouseEnter={props.activateItem}>
      <Avatar size="micro"
              data={props.data}
              noBorder
              noLink
      />
      <p className="mention-list-item-text" dangerouslySetInnerHTML={{__html: `@${wrappedName}`}}></p>
    </div>
  );
}

export { MentionItem as default };