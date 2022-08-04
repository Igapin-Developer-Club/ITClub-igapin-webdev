import React from 'react';
import ReactDOM from 'react-dom';

import SearchForm from '../../component/search/SearchForm';

const searchFormElement = document.querySelector('#vk-search-form');

if (searchFormElement) {
  const userID = Number.parseInt(searchFormElement.getAttribute('data-userid'), 10) || false,
        categoryExclude = searchFormElement.getAttribute('data-category-exclude') || false,
        postExclude = searchFormElement.getAttribute('data-post-exclude') || false;

  ReactDOM.render(
    <SearchForm userID={userID}
                categoryExclude={categoryExclude}
                postExclude={postExclude}
    />,
    searchFormElement
  );
}