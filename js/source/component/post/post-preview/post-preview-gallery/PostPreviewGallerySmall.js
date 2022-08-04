import React, { useRef, useEffect } from 'react';

import ContentActions from '../../../content-actions/ContentActions';

import IconSVG from '../../../icon/IconSVG';

import { truncateText } from '../../../../utils/core';
import { createPopup, createSlider } from '../../../../utils/plugins';

function PostPreviewGallerySmall(props) {
  const titleWordLimit = 75;

  const categories = props.data.categories.slice(0, 3);

  const galleryPopupRef = useRef(null);
  const gallerySliderRef = useRef(null);
  const galleryControlPrevRef = useRef(null);
  const galleryControlNextRef = useRef(null);
  const gallerySlider = useRef(null);

  useEffect(() => {
    createPopup({
      triggerElement: galleryPopupRef.current,
      type: 'gallery'
    });

    gallerySlider.current = createSlider(gallerySliderRef.current, {
      navigation: {
        prevEl: galleryControlPrevRef.current,
        nextEl: galleryControlNextRef.current
      },
      loop: true,
      effect: 'fade',
      speed: 800,
      fadeEffect: {
        crossFade: true
      },
      autoplay: {
        delay: 5000
      }
    });

    return () => {
      if (gallerySlider.current) {
        // Destroy slider instance and detach all events listeners
        gallerySlider.current.destroy();
      }
    };
  }, []);

  const galleryData = [];

  for (const image of props.data.gallery) {
    galleryData.push(image.url);
  }

  return (
    <div className="post-preview small animate-slide-down">
      {/* GALLERY POPUP BUTTON */}
      <div ref={galleryPopupRef} className="gallery-popup-button" data-gallery={JSON.stringify(galleryData)}>
        <IconSVG icon="gallery" />
      </div>
      {/* GALLERY POPUP BUTTON */}
        
      {/* POST PREVIEW GALLERY */}
      <div ref={gallerySliderRef} className="post-preview-gallery swiper-container">
        <div className="post-preview-gallery-slider swiper-wrapper">
          {
            props.data.gallery.map((galleryItem => {
              return (
                <div key={galleryItem.id} className="post-preview-gallery-slider-item swiper-slide" style={{background: `url(${galleryItem.url}) center center / cover no-repeat`}}></div>
              );
            }))
          }
        </div>
      </div>
      {/* POST PREVIEW GALLERY */}

      {/* POST PREVIEW GALLERY CONTROLS */}
      <div className="post-preview-gallery-controls">
        {/* SLIDER CONTROL */}
        <div ref={galleryControlPrevRef} className="slider-control medium solid left">
          <IconSVG  icon="small-arrow"
                    modifiers="slider-control-icon"
          />
        </div>
        {/* SLIDER CONTROL */}
  
        {/* SLIDER CONTROL */}
        <div ref={galleryControlNextRef} className="slider-control medium solid right">
          <IconSVG  icon="small-arrow"
                    modifiers="slider-control-icon"
          />
        </div>
        {/* SLIDER CONTROL */}
      </div>
      {/* POST PREVIEW GALLERY CONTROLS */}

      {/* POST PREVIEW INFO */}
      <div className="post-preview-info">
        <div className="post-preview-info-top">
          <p className="post-preview-timestamp">
            {
              categories.map((category) => {
                return (
                  <span key={category.id}><a href={category.link}>{category.name}</a> - </span>
                );
              })
            }
            {props.data.timestamp}
          </p>
          <p className="post-preview-title"><a href={props.data.permalink}>{truncateText(props.data.title, titleWordLimit)}</a></p>
        </div>
      </div>
      {/* POST PREVIEW INFO */}

      {/* CONTENT ACTIONS */}
      <ContentActions reactionData={props.data.reactions}
                      link={props.data.permalink}
                      commentCount={props.data.comment_count}
                      shareCount={props.data.share_count}
      />
      {/* CONTENT ACTIONS */}
    </div>
  );
}

export { PostPreviewGallerySmall as default };