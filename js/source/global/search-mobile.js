import { querySelector } from '../utils/core';

querySelector('.header-actions.search-bar', (searchBarElements) => {
  const searchBarElement = searchBarElements[0];

  querySelector('.header-search-push-open', (els) => {
    const searchBarOpenTrigger = els[0];

    querySelector('.header-search-push-close', (els) => {
      const searchBarCloseTrigger = els[0];

      const openSearchBar = () => {
        searchBarElement.classList.add('search-bar-active');
        searchBarOpenTrigger.classList.add('action-list-item-hidden');
        searchBarCloseTrigger.classList.remove('action-list-item-hidden');
      };

      const closeSearchBar = () => {
        searchBarElement.classList.remove('search-bar-active');
        searchBarOpenTrigger.classList.remove('action-list-item-hidden');
        searchBarCloseTrigger.classList.add('action-list-item-hidden');
      };

      searchBarOpenTrigger.addEventListener('mousedown', openSearchBar);
      searchBarCloseTrigger.addEventListener('mousedown', closeSearchBar);
    });
  });
});