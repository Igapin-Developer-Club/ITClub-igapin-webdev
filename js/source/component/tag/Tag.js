import React from 'react';

function Tag(props) {
  return (
    <a className="tag-item secondary" href={props.link}>{props.name}</a>
  );
}

export { Tag as default };