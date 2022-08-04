import React, { useState } from 'react';

import IconSVG from '../icon/IconSVG';

function FormInputSelect(props) {
  const [value, setValue] = useState(props.value);

  const handleValueChange = (e) => {
    setValue(e.target.value);

    if (props.onChange) {
      props.onChange(e.target.value);
    }
  };

  return (
    <div className={`form-select ${props.is_required ? 'required' : ''}`}>
      <label htmlFor={props.name}>{props.label} {props.is_required && <span className="label-required">*</span>}</label>
      <select name={props.name}
              value={value}
              onChange={handleValueChange}
      >
        <option value="">{vikinger_translation.select_an_option}</option>
      {
        props.options.map((option) => {
          return (
            <option key={option.id} value={option.name}>{option.name}</option>
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

export { FormInputSelect as default };