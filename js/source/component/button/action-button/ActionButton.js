import React, { useState } from 'react';

import Button from '../Button';

function ActionButton(props) {
  const [loading, setLoading] = useState(false);

  const doAction = () => {
    if (loading || props.locked) {
      return;
    }

    if (props.onActionStart) {
      props.onActionStart();
    }

    if (props.action) {
      setLoading(true);

      props.action()
      .done((result) => {
        // console.log('ACTION BUTTON - RESULT: ', result);

        if (result) {
          if (props.onActionComplete) {
            props.onActionComplete();
          }
        } else {
          setLoading(false);
        }
      })
      .fail((error) => {
        // console.log('ACTION BUTTON - ERROR: ', error);
  
        setLoading(false);
      });
    }
  };

  return (
    <Button modifiers={props.modifiers}
            text={props.text}
            icon={props.icon}
            title={props.title}
            loading={loading}
            onClick={doAction}
    />
  );
}

export { ActionButton as default };