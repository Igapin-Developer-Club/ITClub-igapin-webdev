import React from 'react';

function UserStatusLevel(props) {
  let modifierClasses = false;

  if (props.size === 'small') {
    modifierClasses = 'vikinger-pmpro-level-tag_small'
  }

  return (
    <div className={`vikinger-pmpro-level-tag ${modifierClasses || ''}`}>
      <p className="vikinger-pmpro-level-tag-text">{props.name}</p>
    </div>
  );
}

export { UserStatusLevel as default };