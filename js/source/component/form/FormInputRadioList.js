import React, { useState } from 'react';

function FormInputRadioList(props) {
  const [value, setValue] = useState(props.value);

  const handleValueChange = (e) => {
    setValue(e.target.value);

    if (props.onChange) {
      props.onChange(e.target.value);
    }
  };

  return (
    <div className="form-input-list">
      <p className="form-input-list-title">{props.label}</p>

      {/* FORM INPUT LIST ITEMS */}
      <div className="form-input-list-items">
      {
        props.options.map((radio) => {
          return (
            <div key={radio.id} className="checkbox-wrap small">
              <label htmlFor={radio.name}>{radio.name}</label>
              <input  type="radio"
                      id={radio.name}
                      name={props.name}
                      value={radio.name}
                      checked={value === radio.name}
                      onChange={handleValueChange}
              />
              <div className="checkbox-box small round"></div>
            </div>
          );
        })
      }
      </div>
      {/* FORM INPUT LIST ITEMS */}
    </div>
  );
}

export { FormInputRadioList as default };