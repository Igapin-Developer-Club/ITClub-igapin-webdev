import React, { useState } from 'react';

import IconButton from '../IconButton';

function ActionIconButton(props) {
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
      .done((response) => {
        // console.log('ACTION ICON BUTTON - ACTION RESPONSE: ', response);

        if (response) {
          if (props.onActionComplete) {
            props.onActionComplete();
          }
        } else {
          setLoading(false);
        }

      })
      .fail((error) => {
        // console.log('ACTION ICON BUTTON - ACTION ERROR: ', error);

        setLoading(false);
      });
    }
  }

  return (
    <IconButton icon={props.icon}
                type={props.type}
                title={props.title}
                loading={loading}
                onClick={doAction}
    />
  );
}

export { ActionIconButton as default };