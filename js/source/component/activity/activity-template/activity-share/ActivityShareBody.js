import React from 'react';

import AlertLine from '../../../alert/AlertLine';

import { getActivityTemplate } from '../../../utils/activity/activity-template';
import { filterActivityContentForDisplay } from '../../../utils/activity/activity-filter';

function ActivityShareBody(props) {
  let ActivityFormat, ActivityTemplate;

  if (props.data.shared_item) {
    ActivityFormat = props.data.shared_item.format ? props.data.shared_item.format : false,
    ActivityTemplate = getActivityTemplate(props.data.shared_item.type, ActivityFormat)({
      data: props.data.shared_item,
      updateSlider: props.updateSlider,
      loggedUser: props.user,
      simpleActivity: true,
      sharePopupActivity: props.sharePopupActivity
    });
  }

  const filteredActivityContent = filterActivityContentForDisplay(props.data.content);

  return (
    <div className="widget-box-status-content">
    {
      !props.editForm &&
        <p className="widget-box-status-text" dangerouslySetInnerHTML={{__html: filteredActivityContent}}></p>
    }
    {
      !props.data.shared_item &&
        <AlertLine  type="info"
                    title={vikinger_translation.shared_content_deleted_title}
                    text={vikinger_translation.shared_content_deleted_text}
        /> 
    }
    {
      props.data.shared_item &&
        <div className="widget-box no-padding">
          { ActivityTemplate }
        </div>
    }
    </div>
  );
}

export { ActivityShareBody as default };