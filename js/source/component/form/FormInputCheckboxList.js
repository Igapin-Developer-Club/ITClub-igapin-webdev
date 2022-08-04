import React, { useState, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import { deepMerge } from '../../utils/core';

function FormInputCheckboxList(props) {
  const initialOptions = {};

  for (const option of props.options) {
    initialOptions[option.name] = props.value.includes(option.name);
  }

  const [options, setOptions] = useState(initialOptions);

  const handleChange = (e) => {
    e.persist();

    setOptions(previousOptions => {
      const newOptions = deepMerge(previousOptions);

      newOptions[e.target.name] = e.target.checked;

      return newOptions;
    });
  };

  const generateCheckboxValue = () => {
    const values = [];

    for (const option in options) {
      if (options[option]) {
        values.push(option);
      }
    }

    if (values.length === 0) {
      return '';
    }

    return values;
  };

  useEffect(() => {
    const checkboxValue = generateCheckboxValue();
  
    props.onChange(checkboxValue);
  }, [options]);

  return (
    <div className="form-input-list">
      <p className="form-input-list-title">{props.label}</p>

      {/* FORM INPUT LIST ITEMS */}
      <div className="form-input-list-items">
      {
        props.options.map((checkbox) => {
          return (
            <div key={checkbox.id} className="checkbox-wrap small">
              <label htmlFor={checkbox.name}>{checkbox.name}</label>
              <input  type="checkbox"
                      id={checkbox.name}
                      name={checkbox.name}
                      checked={options[checkbox.name]}
                      onChange={handleChange}
              />
              <div className="checkbox-box small">
                <IconSVG  icon="cross"
                          modifiers="form-input-checkbox-box-icon"
                />
              </div>
            </div>
          );
        })
      }
      </div>
      {/* FORM INPUT LIST ITEMS */}
    </div>
  );
}

export { FormInputCheckboxList as default };