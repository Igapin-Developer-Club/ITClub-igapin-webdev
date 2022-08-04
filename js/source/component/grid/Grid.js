import React from 'react';

function Grid(props) {
  return (
    <div className="grid">
      {props.content}
    </div>
  );
}

export { Grid as default };