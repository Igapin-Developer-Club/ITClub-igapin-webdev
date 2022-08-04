const stickyElement = document.querySelector('.vk-docs-section-sidebar');

if (stickyElement) {
  // console.log('ADMIN - SCROLL STICKY: ', stickyElement);

  const getElementYOffset = (el) => {
    const elRect = el.getBoundingClientRect();
    const bodyRect = document.body.getBoundingClientRect();

    return elRect.top - bodyRect.top;
  };

  const elementOffset = getElementYOffset(stickyElement);

  // console.log('ADMIN - STICKY ELEMENT Y OFFSET: ', elementOffset);

  const toggleStickyElement = () => {
    // console.log('ADMIN - TOGGLE STICKY ELEMENT - WINDOW OFFSET: ', window.scrollY);
    // console.log('ADMIN - TOGGLE STICKY ELEMENT - WINDOW OFFSET WITH ADDITIONAL OFFSET: ', window.scrollY - 80);
    // console.log('ADMIN - TOGGLE STICKY ELEMENT - ELEMENT OFFSET: ', elementOffset);

    if ((window.scrollY - 80) >= elementOffset) {
      stickyElement.classList.add('vk-docs-section-sidebar_sticky');
      stickyElement.style.height = `${window.innerHeight - 112}px`;
    } else {
      stickyElement.classList.remove('vk-docs-section-sidebar_sticky');
      stickyElement.style.height = 'auto';
    }
  };

  toggleStickyElement();

  window.addEventListener('scroll', toggleStickyElement);
}