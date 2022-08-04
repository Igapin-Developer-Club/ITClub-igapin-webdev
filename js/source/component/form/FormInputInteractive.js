import React, { useState } from 'react';

import IconSVG from '../icon/IconSVG';

function FormInputInteractive(props) {
  const [inputData, setInputData] = useState({
    [props.name]: props.value || ''
  });

  const [active, setActive] = useState(props.value ? true : false);

  const resetInput = () => {
    setInputData({
      [props.name]: ''
    });

    setActive(false);

    if (props.onReset) {
      props.onReset('');
    }
  };

  const onFocus = (e) => {
    setActive(true);
  };

  const onBlur = (e) => {
    if (e.target.value === '') {
      setActive(false);
    }
  };

  const onChange = (e) => {
    setInputData({
      [props.name]: e.target.value
    });

    if (props.onChange) {
      props.onChange(e.target.value);
    }
  };

  return (
    <div className={`interactive-input ${props.modifiers || ''} ${active ? 'active' : ''}`}>
      <input  type="text"
              name={props.name}
              placeholder={props.placeholder}
              value={inputData[props.name]}
              onChange={onChange}
              onFocus={onFocus}
              onBlur={onBlur}
      />

      {
        (inputData[props.name] === '') &&
          <div className="interactive-input-icon-wrap">
            <IconSVG  icon="magnifying-glass"
                      modifiers="interactive-input-icon"
            />
          </div>
      }

      {
        (inputData[props.name] !== '') &&
          <div className="interactive-input-action" onClick={resetInput}>
            <IconSVG  icon="cross-thin"
                      modifiers="interactive-input-action-icon"
            />
          </div>
      }
    </div>
  );
}

export { FormInputInteractive as default };