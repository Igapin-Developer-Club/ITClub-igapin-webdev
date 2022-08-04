import { querySelector } from '../utils/core';

import * as memberRouter from '../router/member/member-router';

querySelector('#vk-user-account-delete', (els) => {
  const userDeleteButton = els[0],
        errorMessage = createErrorMessage('An error has ocurred. Please try again later.');

  let loading = false;

  function createErrorMessage(text) {
    const errorElement = document.createElement('p');

    errorElement.classList.add('error-field-message', 'medium');
    errorElement.innerText = text;

    return errorElement;
  };

  function hideErrorMessage() {
    errorMessage.remove();
  };

  function showErrorMessage() {
    userDeleteButton.parentNode.appendChild(errorMessage);
  };

  function deleteUser() {
    // don't do anything if loading previous action
    if (loading) {
      return;
    }

    hideErrorMessage();

    loading = true;

    userDeleteButton.classList.add('button-loader-loading');

    const deleteLoggedUserPromise = memberRouter.deleteLoggedUser();

    deleteLoggedUserPromise
    .done((response) => {
      // console.log('USER DELETE - RESPONSE: ', response);

      // user successfully deleted, reload
      if (response) {
        window.location = vikinger_constants.home_url;
      // user failed to delete, show error message
      } else {
        loading = false;
        userDeleteButton.classList.remove('button-loader-loading');
        showErrorMessage();
      }
    })
    .fail((error) => {
      // console.log('USER DELETE - ERROR: ', error);

      // user failed to delete, show error message
      loading = false;
      userDeleteButton.classList.remove('button-loader-loading');
      showErrorMessage();
    });
  };

  userDeleteButton.addEventListener('mousedown', deleteUser);
});