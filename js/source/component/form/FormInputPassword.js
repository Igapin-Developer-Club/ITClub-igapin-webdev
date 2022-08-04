import React, { useState, useRef, useEffect } from 'react';

function FormInputPassword(props) {
  const [inputData, setInputData] = useState({
    [props.name]: props.value || ''
  });

  const [active, setActive] = useState(props.value ? true : false);

  const inputRef = useRef(null);

  const blurInput = (value) => {
    if (value === '') {
      setActive(false);
    }
  };

  const focusInput = () => {
    setActive(true);
  };

  const onFocus = (e) => {
    focusInput();
  };

  const onBlur = (e) => {
    blurInput(e.target.value);
  };

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

  useEffect(() => {
    // handling input value and value changed
    if (props.handleValue) {
      // if input isn't focused, blur it
      if (inputRef.current !== document.activeElement) {
        focusInput();
        blurInput(props.value);
      }
    }
  }, [props.value]);

  return (
    <div className={`form-input ${props.modifiers || ''} ${active ? 'active' : ''} ${props.markAsRequired ? 'required' : ''}`}>
      <label htmlFor={props.name}>{props.label} {props.required && <span className="label-required">*</span>}</label>
      <input  ref={inputRef}
              type="password"
              className={`${props.error ? 'input-error' : ''} ${props.disabled ? 'input-disabled' : ''}`}
              name={props.name}
              value={inputData[props.name]}
              onChange={onChange}
              onFocus={onFocus}
              onBlur={onBlur}
              disabled={props.disabled}
      />
    </div>
  );
}

export { FormInputPassword as default };