import React from 'react';

import SearchStatus from '../user-status/user-status-search/SearchStatus';

import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

function SearchFormSection(props) {
  return (
    <React.Fragment>
      <div className="dropdown-box-category">
        <p className="dropdown-box-category-title">{props.title}</p>
      </div>
    {
      props.loading &&
        <LoaderSpinnerSmall />
    }
    {
      !props.loading &&
        <React.Fragment>
        {
          (props.data.length === 0) &&
            <p className="no-results-text">{props.noResultsText || vikinger_translation.no_results_found}</p>
        }
        {
          (props.data.length > 0) &&
            <div className="dropdown-box-list small no-scroll">
            {
              props.data.map((item) => {
                return (
                  <a key={item.id} className="dropdown-box-list-item" href={item[props.itemLinkProp]}>
                    <SearchStatus type={props.type}
                                  data={item}
                    />
                  </a>
                );
              }) 
            }
            </div>
        }
        </React.Fragment>
    }
    </React.Fragment>
  );
}

export { SearchFormSection as default };