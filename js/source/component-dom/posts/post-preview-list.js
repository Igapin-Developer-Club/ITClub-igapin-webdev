import React from 'react';
import ReactDOM from 'react-dom';

import PostFilterableList from '../../component/filter/PostFilterableList';

import { querySelector } from '../../utils/core';

querySelector('.post-preview-filterable-list', (postFilterableListElements) => {
  for (const postFilterableListElement of postFilterableListElements) {
    const user_id = Number.parseInt(postFilterableListElement.getAttribute('data-userid'), 10) || false,
          category = postFilterableListElement.getAttribute('data-category') || false,
          categoryExclude = postFilterableListElement.getAttribute('data-category-exclude') || false,
          postExclude = postFilterableListElement.getAttribute('data-post-exclude') || false,
          postTypes = postFilterableListElement.getAttribute('data-posttypes') || false,
          tag = postFilterableListElement.getAttribute('data-tag') || false,
          year = Number.parseInt(postFilterableListElement.getAttribute('data-year'), 10) || false,
          month = Number.parseInt(postFilterableListElement.getAttribute('data-month'), 10) || false,
          day = Number.parseInt(postFilterableListElement.getAttribute('data-day'), 10) || false,
          searchTerm = postFilterableListElement.getAttribute('data-searchterm') || false,
          gridType = postFilterableListElement.getAttribute('data-grid-type') || false;

    ReactDOM.render(
      <PostFilterableList itemsPerPage={vikinger_constants.settings.posts_per_page}
                          user_id={user_id}
                          category={category}
                          categoryExclude={categoryExclude}
                          postExclude={postExclude}
                          postTypes={postTypes}
                          tag={tag}
                          year={year}
                          month={month}
                          day={day}
                          searchTerm={searchTerm}
                          gridType={gridType}
      />,
      postFilterableListElement
    );
  }
});

// const postFilterableListElement = document.querySelector('.post-preview-filterable-list');

// if (postFilterableListElement) {
//   const user_id = Number.parseInt(postFilterableListElement.getAttribute('data-userid'), 10) || false,
//         category = postFilterableListElement.getAttribute('data-category') || false,
//         postTypes = postFilterableListElement.getAttribute('data-posttypes') || false,
//         tag = postFilterableListElement.getAttribute('data-tag') || false,
//         year = Number.parseInt(postFilterableListElement.getAttribute('data-year'), 10) || false,
//         month = Number.parseInt(postFilterableListElement.getAttribute('data-month'), 10) || false,
//         day = Number.parseInt(postFilterableListElement.getAttribute('data-day'), 10) || false,
//         searchTerm = postFilterableListElement.getAttribute('data-searchterm') || false,
//         gridType = postFilterableListElement.getAttribute('data-grid-type') || false;

//   ReactDOM.render(
//     <PostFilterableList itemsPerPage={vikinger_constants.settings.posts_per_page}
//                         user_id={user_id}
//                         category={category}
//                         postTypes={postTypes}
//                         tag={tag}
//                         year={year}
//                         month={month}
//                         day={day}
//                         searchTerm={searchTerm}
//                         gridType={gridType}
//     />,
//     postFilterableListElement
//   );
// }