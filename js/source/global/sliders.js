import { createSlider } from '../utils/plugins';

createSlider('.member-preview-big-social-links-slides', {
  navigation: {
    prevEl: '.slider-control.left',
    nextEl: '.slider-control.right'
  },
  slidesPerView: 5,
  spaceBetween: 8
});

createSlider('.member-preview-big-slides', {
  pagination: {
    el: '.slider-roster',
    type: 'bullets',
    clickable: true,
    bulletClass: 'slider-roster-item',
    bulletActiveClass: 'active',
    renderBullet: function (index, className) {
      return `<div class="${className}"></div>`;
    }
  }
});

createSlider('#post-open-gallery-slider', {
  navigation: {
    prevEl: '#post-open-gallery-control-prev',
    nextEl: '#post-open-gallery-control-next'
  },
  loop: true,
  speed: 600,
  autoplay: {
    delay: 5000
  }
});

createSlider('#profile-header-social-links-slider', {
  navigation: {
    prevEl: '#profile-header-social-links-control-prev',
    nextEl: '#profile-header-social-links-control-next'
  },
  slidesPerView: 7,
  spaceBetween: 12
});

createSlider('#profile-header-social-links-mobile-slider', {
  navigation: {
    prevEl: '#profile-header-social-links-mobile-control-prev',
    nextEl: '#profile-header-social-links-mobile-control-next'
  },
  slidesPerView: 4,
  spaceBetween: 8
});

createSlider('#section-navigation-slider', {
  navigation: {
    prevEl: '#section-navigation-control-prev',
    nextEl: '#section-navigation-control-next'
  },
  slidesPerView: 'auto'
});