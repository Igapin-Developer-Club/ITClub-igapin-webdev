import React from 'react';

function EditedByStatus(props) {
  return (
    <React.Fragment>
      {` ${vikinger_translation.edited_by}`}
      <a href={props.user.link}>{` ${props.user.name} `}</a>
    </React.Fragment>
  );
}

export { EditedByStatus as default };