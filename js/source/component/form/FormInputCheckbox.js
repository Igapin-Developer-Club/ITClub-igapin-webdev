import React from 'react';

import Checkbox from './Checkbox';

function FormInputCheckbox(props) {
  return (
    <div className="form-input-checkbox">
      <Checkbox active={props.active}
                toggleActive={props.toggleActive}
      />

      <p className="form-input-checkbox-text" onClick={props.toggleActive}>{props.text}</p>
    </div>
  );
}

export { FormInputCheckbox as default };