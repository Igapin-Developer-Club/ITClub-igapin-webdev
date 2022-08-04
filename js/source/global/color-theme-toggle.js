import { querySelector } from '../utils/core';

import * as userRouter from '../router/user/user-router';

querySelector('.vk-theme-toggle', (el) => {
  let changingColorTheme = false;

  const toggleLoggedUserColorTheme = function (e) {
    // if already changing color theme, return
    if (changingColorTheme) {
      return;
    }

    changingColorTheme = true;

    const toggleLoggedUserColorThemePromise = userRouter.toggleLoggedUserColorTheme();
    
    toggleLoggedUserColorThemePromise
    .done((response) => {
      // console.log('TOGGLE LOGGED USER COLOR THEME - RESPONSE', response);
    })
    .fail((error) => {
      // console.log('TOGGLE LOGGED USER COLOR THEME - ERROR', error);
    })
    .always(() => {
      window.location.reload();
    });
  };

  // add listeners
  for (const toggleThemeElement of el) {
    toggleThemeElement.addEventListener('mousedown', toggleLoggedUserColorTheme);
  }
});