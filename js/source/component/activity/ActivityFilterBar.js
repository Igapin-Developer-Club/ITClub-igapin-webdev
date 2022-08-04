import React, { useState, useRef, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

function ActivityFilterBar(props) {
  const [action, setAction] = useState('all');
  const [filters, setFilters] = useState({
    scope: false,
    filter: {}
  });

  const mounting = useRef(true);

  useEffect(() => {
    if (!mounting.current) {
      props.onFiltersChange(filters);
    } else {
      mounting.current = false;
    }
  }, [filters]);

  const setScopeAll = () => { changeScope(false); };
  const setScopeMentions = () => { changeScope('mentions'); };
  const setScopeFavorites = () => { changeScope('favorites'); };
  const setScopeFriends = () => { changeScope('friends'); };
  const setScopeGroups = () => { changeScope('groups'); };

  const changeScope = (newScope) => {
    // if scope didn't change, return
    if (newScope === filters.scope) {
      return;
    }

    const newFilters = {
      ...filters,
      scope: newScope
    };

    setFilters(newFilters);
  };

  const handleScopeChange = (e) => {
    const value = e.target.value === 'false' ? false : e.target.value;

    changeScope(value);
  };

  const handleActionChange = (e) => {
    const actionValue = e.target.value,
          filter = actionValue === 'all' ? {} : { action: actionValue };

    setAction(actionValue);

    setFilters({
      ...filters,
      filter: filter
    });
  };

  return (
    <div className="quick-filters">
      {/* QUICK FILTERS TABS */}
      <div className="quick-filters-tabs">
        <p className={`quick-filters-tab ${!filters.scope ? 'active' : ''}`} onClick={setScopeAll}>{vikinger_translation.all_updates}</p>
      {
        !props.hideSecondaryFilters &&
          <React.Fragment>
            <p className={`quick-filters-tab ${filters.scope === 'mentions' ? 'active' : ''}`} onClick={setScopeMentions}>
              {vikinger_translation.mentions}
            </p>

            <p className={`quick-filters-tab ${filters.scope === 'favorites' ? 'active' : ''}`} onClick={setScopeFavorites}>
              {vikinger_translation.favorites}
            </p>
          {
            vikinger_constants.plugin_active.buddypress_friends &&
              <p className={`quick-filters-tab ${filters.scope === 'friends' ? 'active' : ''}`} onClick={setScopeFriends}>
                {vikinger_translation.friends}
              </p>
          }
          {
            vikinger_constants.plugin_active.buddypress_groups && !props.hideGroupsFilter &&
              <p className={`quick-filters-tab ${filters.scope === 'groups' ? 'active' : ''}`} onClick={setScopeGroups}>
                {vikinger_translation.groups}
              </p>
          }
          </React.Fragment>
      }
      </div>
      {/* /QUICK FILTERS TABS */}

      {/* QUICK FILTERS FORM */}
      <form className="quick-filters-form quick-filters-form-mobile">
        <div className="form-row">
          <div className="form-item">
            <div className="form-select">
              <label htmlFor="activity-scope">{vikinger_translation.scope}</label>
              <select id="activity-scope" name="scope" value={filters.scope} onChange={handleScopeChange}>
                <option value="false">{vikinger_translation.all_updates}</option>
              {
                !props.hideSecondaryFilters &&
                  <React.Fragment>
                    <option value="mentions">{vikinger_translation.mentions}</option>
                    <option value="favorites">{vikinger_translation.favorites}</option>
                  {
                    vikinger_constants.plugin_active.buddypress_friends &&
                      <option value="friends">{vikinger_translation.friends}</option>
                  }
                  {
                    vikinger_constants.plugin_active.buddypress_groups && !props.hideGroupsFilter &&
                      <option value="groups">{vikinger_translation.groups}</option>
                  }
                  </React.Fragment>
              }
              </select>
              <IconSVG  icon="small-arrow"
                        modifiers="form-select-icon"
              />
            </div>
          </div>
        </div>
      </form>
      {/* QUICK FILTERS FORM */}

      {/* QUICK FILTERS FORM */}
      <form className="quick-filters-form">
        <div className="form-row">
          <div className="form-item">
            <div className="form-select">
              <label htmlFor="activity-show">{vikinger_translation.show}</label>
              <select id="activity-show" name="action" value={action} onChange={handleActionChange}>
                <option value="all">{vikinger_translation.everything}</option>
                <option value="activity_update">{vikinger_translation.status}</option>
                <option value="activity_share,post_share">{vikinger_translation.shares}</option>
              {
                vikinger_constants.plugin_active.vkmedia &&
                  <React.Fragment>
                  {
                    vikinger_constants.settings.media_photo_upload_enabled && vikinger_constants.settings.media_video_upload_enabled &&
                      <option value="activity_media_update,activity_media_upload,activity_video_update,activity_video_upload">{vikinger_translation.media}</option>
                  }
                  {
                    vikinger_constants.settings.media_photo_upload_enabled &&
                      <option value="activity_media_update,activity_media_upload">{vikinger_translation.photos}</option>
                  }
                  {
                    vikinger_constants.settings.media_video_upload_enabled &&
                      <option value="activity_video_update,activity_video_upload">{vikinger_translation.videos}</option>
                  }
                  </React.Fragment>
              }
              {
                vikinger_constants.plugin_active.buddypress_friends &&
                  <option value="friendship_created">{vikinger_translation.friendships}</option>
              }
              {
                vikinger_constants.plugin_active.buddypress_groups &&
                  <option value="created_group">{vikinger_translation.new_groups}</option>
              }
              {
                vikinger_constants.plugin_active.bbpress &&
                  <React.Fragment>
                    <option value="bbp_topic_create">{vikinger_translation.forum_topics}</option>
                    <option value="bbp_reply_create">{vikinger_translation.forum_replies}</option>
                  </React.Fragment>
              }
              </select>
              <IconSVG  icon="small-arrow"
                        modifiers="form-select-icon"
              />
            </div>
          </div>
        </div>
      </form>
      {/* QUICK FILTERS FORM */}
    </div>
  );
}

export { ActivityFilterBar as default };