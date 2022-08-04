import React, { useState, useRef, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import GridOptions from '../grid/GridOptions';

import { createFormInput } from '../../utils/plugins';

function GroupMemberFilterBar(props) {
  const [status, setStatus] = useState('alphabetical');
  const [search, setSearch] = useState(props.searchTerm || '');

  const searchInputRef = useRef(null);

  useEffect(() => {
    if (!props.searchTerm) {
      createFormInput([searchInputRef.current]);
    }
  }, []);

  useEffect(() => {
    props.applyFilters({status, search});
  }, [status]);

  const handleSubmit = (e) => {
    e.preventDefault();

    props.applyFilters({status, search});
  };

  return (
    <div className="section-filters-bar v2">
      <div className="section-filters-bar-actions full">
        <form className="form" onSubmit={handleSubmit}>
          <div className="form-row split">
          {
            !props.searchTerm &&
              <div className="form-item">
                <div ref={searchInputRef} className="form-input small with-button">
                  <label htmlFor="member-name">{vikinger_translation.search_members}</label>
                  <input type="text" id="member-name" name="search" onChange={(e) => { setSearch(e.target.value); }} />

                  <button type="submit" className={`button ${props.themeColor}`}>
                    <IconSVG icon="magnifying-glass" />
                  </button>
                </div>
              </div>
          }
            <div className="form-item">
              <div className="form-select">
                <label htmlFor="member-order-by">{vikinger_translation.order_by}</label>
                <select id="member-order-by" name="status" value={status} onChange={(e) => { setStatus(e.target.value); }}>
                  <option value="alphabetical">{vikinger_translation.alphabetical}</option>
                  <option value="last_joined">{vikinger_translation.newest_members}</option>
                  <option value="group_activity">{vikinger_translation.recently_active}</option>
                </select>
                <IconSVG  icon="small-arrow"
                          modifiers="form-select-icon"
                />
              </div>
            </div>
          </div>
        </form>
      </div>

      <div className="section-filters-bar-actions">
        <GridOptions  gridTypes={['big', 'small', 'list']}
                      activeGrid={props.gridType}
                      onGridOptionClick={props.setGrid}
        />
      </div>
    </div>
  );
}

export { GroupMemberFilterBar as default };