import React, { useRef, useEffect } from 'react';

import ContentActions from '../../../content-actions/ContentActions';

import TagList from '../../../tag/TagList';

import MemberOnlyContentPreview from '../../../membership/MemberOnlyContentPreview';

import IconSVG from '../../../icon/IconSVG';

import { truncateText } from '../../../../utils/core';
import { createPopup, createSlider } from '../../../../utils/plugins';

function PostPreviewGalleryBig(props) {
  const titleWordLimit = 70;
  const excerptWordLimit = 400;

  const categories = props.data.categories.slice(0, 3);

  const galleryPopupRef = useRef(null);
  const gallerySliderRef = useRef(null);
  const gallerySlider = useRef(null);

  useEffect(() => {
    createPopup({
      triggerElement: galleryPopupRef.current,
      type: 'gallery'
    });

    gallerySlider.current = createSlider(gallerySliderRef.current, {
      navigation: {
        prevEl: '.slider-control.left',
        nextEl: '.slider-control.right'
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
    <div className="post-preview medium post-preview-normal post-preview-type-gallery animate-slide-down">
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

        {/* POST PREVIEW GALLERY CONTROLS */}
        <div className="post-preview-gallery-controls">
          {/* SLIDER CONTROL */}
          <div className="slider-control medium solid left">
            <IconSVG  icon="small-arrow"
                      modifiers="slider-control-icon"
            />
          </div>
          {/* SLIDER CONTROL */}
    
          {/* SLIDER CONTROL */}
          <div className="slider-control medium solid right">
            <IconSVG  icon="small-arrow"
                      modifiers="slider-control-icon"
            />
          </div>
          {/* SLIDER CONTROL */}
        </div>
        {/* POST PREVIEW GALLERY CONTROLS */}
      </div>
      {/* POST PREVIEW GALLERY */}

      {/* POST PREVIEW INFO */}
      <div className="post-preview-info fixed-height">
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
          <p className="post-preview-title medium"><a href={props.data.permalink}>{truncateText(props.data.title, titleWordLimit)}</a></p>
        </div>
        <div className="post-preview-info-bottom">
        {
          !props.hidePostExcerpt &&
            <p className="post-preview-text" dangerouslySetInnerHTML={{__html: truncateText(props.data.excerpt, excerptWordLimit)}}></p>
        }
        {
          props.hidePostExcerpt &&
            <MemberOnlyContentPreview modifiers="post-preview-text" />
        }
          <a className="post-preview-link" href={props.data.permalink}>{vikinger_translation.read_more}</a>
        </div>
      </div>
      {/* POST PREVIEW INFO */}

      {/* TAG LIST */}
      <TagList tags={props.data.tags} />
      {/* TAG LIST */}

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

export { PostPreviewGalleryBig as default };