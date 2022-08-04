import React from 'react';

function Grid_3(props) {
  return (
    <div className="grid grid-3-3-3-3 centered-on-mobile">
      {props.content}
    </div>
  );
}

export { Grid_3 as default };