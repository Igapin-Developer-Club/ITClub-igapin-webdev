import { querySelector } from '../utils/core';

querySelector('.vk-el-navigation-mobile-trigger-open', (triggers) => {
  const navigationActiveSelector = 'vk-el-navigation-mobile-active',
        overlaySelector = 'vk-el-navigation-mobile-overlay',
        overlayActiveSelector = 'vk-el-navigation-mobile-overlay-active';
  
  const createOverlay = () => {
    const overlay = document.createElement('div');

    overlay.classList.add(overlaySelector);

    return overlay;
  };

  const showOverlay = (overlay) => {
    overlay.classList.add(overlayActiveSelector);
  };

  const hideOverlay = (overlay, navigations) => {
    overlay.classList.remove(overlayActiveSelector);

    for (const navigation of navigations) {
      hideNavigation(navigation);
    };
  };

  const overlay = createOverlay();

  document.body.append(overlay);

  const showNavigation = (navigation) => {
    navigation.classList.add(navigationActiveSelector);
  };

  const hideNavigation = (navigation) => {
    navigation.classList.remove(navigationActiveSelector);
  };

  const toggleNavigation = (navigation, overlay) => {
    if (navigation.classList.contains(navigationActiveSelector)) {
      hideOverlay(overlay, [navigation]);
    } else {
      showNavigation(navigation);
      showOverlay(overlay);
    }
  };

  const navigations = [];

  for (const trigger of triggers) {
    const navigation = trigger.parentElement.querySelector('.vk-el-navigation-mobile');

    if (navigation) {
      navigations.push(navigation);

      trigger.addEventListener('mousedown', () => {toggleNavigation(navigation, overlay)});
    }
  }

  querySelector('.vk-el-navigation-mobile-trigger-close', (closeTriggers) => {
    for (const closeTriggers of closeTriggers) {
      closeTriggers.addEventListener('mousedown', () => {hideOverlay(overlay, navigations)});
    }
  });

  overlay.addEventListener('mousedown', () => {hideOverlay(overlay, navigations)});
});