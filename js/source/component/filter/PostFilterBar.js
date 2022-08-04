import React, { useState, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import GridOptions from '../grid/GridOptions';

import { ucfirst } from '../../utils/core';

import * as postRouter from '../../router/post/post-router';

function PostFilterBar(props) {
  const [categories, setCategories] = useState([]);
  const [category, setCategory] = useState(props.extraFilters.category || 0);
  const [filterBy, setFilterBy] = useState('date');
  const [orderBy, setOrderBy] = useState('DESC');
  const [postType, setPostType] = useState(0);

  const postTypes = props.extraFilters.postTypes;
  const postTypeFilterIsEnabled = vikinger_constants.settings.post_type_filter_display_is_enabled && (postTypes.length > 1);

  useEffect(() => {
    if (!props.hideCategories) {
      postRouter.getCategories((categories) => {
        // console.log('POST FILTER BAR - CATEGORIES: ', categories);

        setCategories(categories);
      });
    }
  }, []);

  useEffect(() => {
    const newFilters = {
      category,
      orderby: filterBy,
      order: orderBy
    };

    if (postTypeFilterIsEnabled) {
      if (postType === 0) {
        newFilters.post_type = postTypes;
      } else {
        newFilters.post_type = [postTypes[postType - 1]];
      }
    }

    props.applyFilters(newFilters);
  }, [category, filterBy, orderBy, postType]);

  const showCategoryFilter = !props.extraFilters.category;

  return (
    <div className="section-filters-bar v2">
      <div className="section-filters-bar-actions full">
        <form className="form">
          <div className="form-row split">
          {
            showCategoryFilter &&
              <div className="form-item">
                <div className="form-select">
                  <label>{vikinger_translation.category}</label>
                  <select name="category" value={category} onChange={(e) => {setCategory(e.target.value);}}>
                    <option value="0">{vikinger_translation.all_categories}</option>
                    {
                      categories.map((category) => {
                        return (
                          <option key={category.id} value={category.id}>{category.name}</option>
                        );
                      })
                    }
                  </select>
                  <IconSVG  icon="small-arrow"
                            modifiers="form-select-icon"
                  />
                </div>
              </div>
          }

            <div className="form-item">
              <div className="form-select">
                <label>{vikinger_translation.filter_by}</label>
                <select name="orderby" value={filterBy} onChange={(e) => {setFilterBy(e.target.value);}}>
                  <option value="date">{vikinger_translation.date}</option>
                  <option value="comment_count">{vikinger_translation.popularity}</option>
                </select>
                <IconSVG  icon="small-arrow"
                          modifiers="form-select-icon"
                />
              </div>
            </div>
      
            <div className="form-item">
              <div className="form-select">
                <label>{vikinger_translation.order_by}</label>
                <select name="order" value={orderBy} onChange={(e) => {setOrderBy(e.target.value);}}>
                  <option value="DESC">{vikinger_translation.descending}</option>
                  <option value="ASC">{vikinger_translation.ascending}</option>
                </select>
                <IconSVG  icon="small-arrow"
                          modifiers="form-select-icon"
                />
              </div>
            </div>

          {
            postTypeFilterIsEnabled &&
              <div className="form-item">
                <div className="form-select">
                  <label>{vikinger_translation.type}</label>
                  <select name="postType" value={postType} onChange={(e) => {setPostType(e.target.value);}}>
                    <option value="0">{vikinger_translation.all}</option>
                    {
                      postTypes.map((postType, i) => {
                        return (
                          <option key={i} value={i + 1}>{ucfirst(postType)}</option>
                        );
                      })
                    }
                  </select>
                  <IconSVG  icon="small-arrow"
                            modifiers="form-select-icon"
                  />
                </div>
              </div>
          }
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

export { PostFilterBar as default };