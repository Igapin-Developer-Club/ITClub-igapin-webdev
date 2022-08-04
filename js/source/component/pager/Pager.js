import React from 'react';

import PagerItem from './PagerItem';

import SliderControl from '../controls/SliderControl';

function Pager(props) {
  const pagerLength = 3;

  const showPreviousPage = () => {
    if (props.activePage !== 1) {
      props.showPage(props.activePage - 1);
    }
  };

  const showNextPage = () => {
    if (props.activePage !== props.pageCount) {
      props.showPage(props.activePage + 1);
    }
  };

  const renderedPages = [];

  let startPage,
      endPage;

  // if page count is lower than pager length, then show all pages
  if (props.pageCount < pagerLength) {
    startPage = 1;
    endPage = props.pageCount;
  } else if ((props.activePage + pagerLength - 1) < props.pageCount) {
  // if active page plus pager length is lower than last page, show active page first
    startPage = props.activePage;
    endPage = props.activePage + pagerLength - 1;
  } else {
  // if active page plus pager length is higher than last page, show last page minus pager length first
    startPage = props.pageCount - pagerLength + 1;
    endPage = props.pageCount;
  }

  // show go previous page
  if (props.activePage > 1) {
    renderedPages.push(
      <SliderControl  key={startPage - 1}
                      direction='left'
                      disabled={props.activePage === 1}
                      controlClicked={showPreviousPage}
      />
    );
  }

  // show pagerLength pages
  for (let i = startPage; i <= endPage; i++) {
    renderedPages.push(
      <PagerItem  key={i}
                  pageNumber={i}
                  active={props.activePage === i}
                  pageClicked={props.showPage}
      />
    );
  }

  // show go to next page
  if (props.activePage !== props.pageCount) {
    renderedPages.push(
      <SliderControl  key={endPage + 1}
                      direction='right'
                      disabled={props.activePage === props.pageCount}
                      controlClicked={showNextPage}
      />
    );
  }

  return (
    <div className="section-pager-bar-wrap align-center">
      <div className="section-pager-bar">
        <div className={`section-pager ${props.themeColor}`}>
          { renderedPages }
        </div>
      </div>
    </div>
  );
}

export { Pager as default };