import { querySelector } from '../utils/core';

import * as userRouter from '../router/user/user-router';

// if side menu is showing, center content grid based on its size
if (vikinger_constants.settings.sidemenu_status === 'display') {
  let gridElements = [];

  const sidebar = {
    navigation: {
      active: vikinger_constants.settings.sidemenu_active,
      minWidth: 80,
      maxWidth: 300
    }
  };

  const breakpointWidth = 1365;

  const updateGridPosition = function (contentGrid) {
    if (window.innerWidth > breakpointWidth) {
      const navigationWidth = sidebar.navigation.active ? sidebar.navigation.maxWidth : sidebar.navigation.minWidth,
            availableWidth = document.body.clientWidth - contentGrid.offsetWidth - navigationWidth,
            offsetX = (availableWidth / 2) + navigationWidth;

      contentGrid.style.transform = `translate(${offsetX}px, 0)`;
      contentGrid.style.margin = 0;
    } else {
      contentGrid.style.transform = `translate(0, 0)`;
      contentGrid.style.margin = '0 auto';
    }
  };

  const updateGridPositions = function () {
    for (const grid of gridElements) {
      updateGridPosition(grid);
    }
  };

  const setGridTransition = function (grid) {
    grid.style.transition = `transform .4s ease-in-out`;
  };

  const setGridTransitions = function () {
    for (const grid of gridElements) {
      setGridTransition(grid);
    }
  };

  /*-------------------
      CONTENT GRID 
  -------------------*/
  querySelector('.content-grid', function (el) {
    gridElements = el;

    updateGridPositions();
    window.addEventListener('resize', updateGridPositions);
    // delay transition setup to avoid loading animation
    window.setTimeout(setGridTransitions, 300);
  });

  /*------------------------
      NAVIGATION WIDGET 
  ------------------------*/
  querySelector('.navigation-widget-trigger', function (el) {
    const navigationTrigger = el[0],
          topOffset = 80,
          navigationWidget = document.querySelector('#navigation-widget'),
          navigationWidgetSmall = document.querySelector('#navigation-widget-small'),
          activeClass = 'active',
          hiddenClass = 'navigation-widget-hidden',
          delayedClass = 'navigation-widget-delayed';
  
    const setNavigationWidgetDimensions = function () {
      navigationWidget.style.height = `${window.innerHeight - topOffset}px`;
    };
  
    const toggleNavigationWidget = function () {
      navigationTrigger.classList.toggle(activeClass);

      navigationWidget.classList.toggle(delayedClass);
      navigationWidget.classList.toggle(hiddenClass);
      navigationWidgetSmall.classList.toggle(delayedClass);
      navigationWidgetSmall.classList.toggle(hiddenClass);

      sidebar.navigation.active = !navigationWidget.classList.contains(hiddenClass);

      const sidemenuStatus = sidebar.navigation.active ? 'open' : 'closed',
            updateLoggedUserSidemenuStatusPromise = userRouter.updateLoggedUserSidemenuStatus({sidemenu_status: sidemenuStatus});
            
      updateGridPositions();
    };
  
    navigationTrigger.addEventListener('click', toggleNavigationWidget);
  
    setNavigationWidgetDimensions();
    window.addEventListener('resize', setNavigationWidgetDimensions);
  });
}

/*-------------------------------
    NAVIGATION WIDGET MOBILE
-------------------------------*/
querySelector('.navigation-widget-mobile-trigger', function (el) {
  const navigationMobileTrigger = el[0],
        navigationWidgetMobile = document.querySelector('#navigation-widget-mobile'),
        navigationWidgetMobileCloseButton = navigationWidgetMobile.querySelector('.navigation-widget-close-button'),
        hiddenClass = 'navigation-widget-hidden';

  const cssVariables = window.getComputedStyle(document.documentElement);

  const overlay = document.createElement('div');

  overlay.style.width = '100%';
  overlay.style.height = '100%';
  overlay.style.position = 'fixed';
  overlay.style.top = '0';
  overlay.style.left = '0';
  overlay.style.zIndex = 99998;
  overlay.style.backgroundColor = cssVariables.getPropertyValue('--color-overlay');
  overlay.style.opacity = 0;
  overlay.style.visibility = 'hidden';
  overlay.style.transition = 'opacity .3s ease-in-out, visibility .3s ease-in-out';

  document.body.appendChild(overlay);

  const showOverlay = function () {
    overlay.style.opacity = 1;
    overlay.style.visibility = 'visible';
  };

  const hideOverlay = function () {
    overlay.style.opacity = 0;
    overlay.style.visibility = 'hidden';
  };

  const setNavigationWidgetMobileDimensions = function () {
    navigationWidgetMobile.style.height = `${window.innerHeight}px`;
  };

  const toggleNavigationWidgetMobile = function () {
    navigationWidgetMobile.classList.toggle(hiddenClass);

    const toggleOverlay = navigationWidgetMobile.classList.contains(hiddenClass) ? hideOverlay : showOverlay;
    toggleOverlay();
  };

  navigationMobileTrigger.addEventListener('click', toggleNavigationWidgetMobile);
  navigationWidgetMobileCloseButton.addEventListener('click', toggleNavigationWidgetMobile);
  overlay.addEventListener('click', toggleNavigationWidgetMobile);

  setNavigationWidgetMobileDimensions();
  window.addEventListener('resize', setNavigationWidgetMobileDimensions);
});