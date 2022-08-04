import React from 'react';

import Tag from './Tag';

function TagList(props) {
  const tagItems = props.tags.map((tag) => {
    return (
      <Tag  key={tag.id}
            name={tag.name}
            link={tag.link}
      />
    );
  });

  return (
    <div className="tag-list">
    {tagItems}
    </div>
  );
}

export { TagList as default };