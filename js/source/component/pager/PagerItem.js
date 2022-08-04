import React from 'react';

function PagerItem(props) {
  const handlePageClick = () => {
    props.pageClicked(props.pageNumber);
  };

  return (
    <div className={`section-pager-item ${props.static ? 'section-pager-item-no-link' : ''} ${props.active ? 'active' : ''}`} onClick={handlePageClick}>
      <p className="section-pager-item-text">{props.pageNumber < 10 ? `0${props.pageNumber}` : props.pageNumber}</p>
    </div>
  );
}

export { PagerItem as default };