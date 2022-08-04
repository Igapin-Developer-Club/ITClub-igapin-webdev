import React from 'react';

import Notification from '../notification/Notification';

import gridUtils from '../utils/grid';

import { getAdsForPlacementIndex } from '../utils/ads';

const postExcerptDisplayIsEnabled = vikinger_constants.settings.post_excerpt_display_is_enabled;

function ItemPreviewList(props) {
  let grid;

  // if there are items, show them
  if (props.data.length) {
    const GridTemplate = gridUtils.getGridTemplate(props.itemType, props.gridType);

    const items = props.data.map((item, i) => {
      let renderedItem = [];

      const adsForPlacement = getAdsForPlacementIndex(props.ads, props.adsPlacement, i);

      if (adsForPlacement) {
        renderedItem = renderedItem.concat(adsForPlacement);
      }

      const ItemPreviewTemplate = gridUtils.getItemPreviewTemplate(props.itemType, props.gridType, item);

      const hidePostExcerpt = props.itemType === 'post' && !postExcerptDisplayIsEnabled && !item.has_membership_access;

      renderedItem.push(
        <ItemPreviewTemplate  key={item.id}
                              data={item}
                              loggedUser={props.loggedUser}
                              onActionComplete={props.onActionComplete}
                              hidePostExcerpt={hidePostExcerpt}
        />
      );

      return renderedItem;
    });
    
    grid = <GridTemplate content={items} />;
  } else {
  // no items, show message
    grid = <Notification  title={vikinger_translation.no_results_found}
                          text={vikinger_translation.item_list_no_results_text}
           />;
  }

  return grid;
}

export { ItemPreviewList as default };