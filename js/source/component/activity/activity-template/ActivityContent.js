import React from 'react';

function ActivityContent(props) {
  const ActivityHeader = props.activityHeader;
  const ActivityBody = props.activityBody;

  return (
    <div ref={props.widgetBoxStatusRef} className="widget-box-status">
      <ActivityHeader {...props} />

    { props.editForm && props.editForm }

      <ActivityBody {...props} />
    </div>
  );
}

export { ActivityContent as default };