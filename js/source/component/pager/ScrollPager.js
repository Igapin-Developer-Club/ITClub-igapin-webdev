import React, { useRef, useEffect } from 'react';

import Loader from '../loader/Loader';

function ScrollPager(props) {
  const loaderRef = useRef(null);

  useEffect(() => {
    if (!props.initialFetch && props.moreItems) {
      window.addEventListener('scroll', loadMoreOnScroll);
    }

    return () => {
      window.removeEventListener('scroll', loadMoreOnScroll);
    };
  }, [props.initialFetch]);

  const scrolledThrough = (el) => {
    const elementScrollPosition = {
            y: el.offsetTop + el.offsetHeight - window.innerHeight
          },
          windowScrollPosition = {
            y: window.scrollY
          };

    return windowScrollPosition.y > elementScrollPosition.y;
  };

  const loadMoreOnScroll = () => {
    // console.log('SCROLL PAGER - LOAD MORE ON SCROLL: ', this.loaderRef.current);

    if (scrolledThrough(loaderRef.current)) {
      window.removeEventListener('scroll', loadMoreOnScroll);
      loadMoreItems();
    }
  };

  const loadMoreItems = () => {
    props.loadMoreItems((moreItems) => {
      if (moreItems) {
        window.addEventListener('scroll', loadMoreOnScroll);
      }
    });
  };

  return (
    <div ref={loaderRef} className={`${props.modifiers || ''}`}>
      { props.children }
      {
        props.moreItems &&
          <Loader />
      }
    </div>
  );
}

export { ScrollPager as default };