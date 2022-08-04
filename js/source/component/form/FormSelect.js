import React, { useState } from 'react';

import IconSVG from '../icon/IconSVG';

function FormSelect(props) {
  const [inputData, setInputData] = useState({
    [props.name]: props.value || ''
  });

  const onChange = (e) => {
    setInputData({
      [props.name]: e.target.value
    });

    if (props.onChange) {
      if (props.handleValue) {
        props.onChange({target: { name: props.name, value: e.target.value }});
      } else {
        props.onChange(e.target.value);
      }
    }
  };

  return (
    <div className={`form-select ${props.markAsRequired ? 'required' : ''}`}>
      <label htmlFor={props.name}>{props.label} {props.required && <span className="label-required">*</span>}</label>
      <select name={props.name}
              value={inputData[props.name]}
              onChange={onChange}
      >
      {
        props.options.map((option) => {
          return (
            <option key={option.id} value={option.id}>{option.name}</option>
          );
        })
      }
      </select>

      <IconSVG  icon="small-arrow"
                modifiers="form-select-icon"
      />
    </div>
  );
}

export { FormSelect as default };