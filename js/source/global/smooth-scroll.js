jQuery(document).ready(function () {
  const exceptions = [
    '#tab-description',
    '#tab-additional_information',
    '#tab-reviews'
  ];
  
  // Add smooth scrolling to all links
  jQuery('a').on('click', function (event) {
    // Make sure this.hash has a value before overriding default behavior
    // and that this.hash exists in the current page (else the link refers to other page)
    const hash = this.hash;

    if ((hash !== '') && (jQuery(hash).length > 0) && !exceptions.includes(hash)) {
      const hashElementTopOffset = jQuery(hash).offset().top;

      // if hash element doesn't have an offset top, preserve normal behaviour
      if (hashElementTopOffset === 0) {
        return;
      }

      // Prevent default anchor click behavior
      event.preventDefault();

      // Using jQuery's animate() method to add smooth page scroll
      jQuery('html, body').animate({
        scrollTop: jQuery(hash).offset().top - (jQuery('.header').outerHeight() * 1.5)
      }, 600, function () {

        // Add hash (#) to URL when done scrolling (default click behavior)
        // use history.replaceState on supported browsers to prevent page jump
        // caused by modifying the offset because of the floating header
        if (typeof history.replaceState !== 'undefined') {
          history.replaceState(null, null, hash);
        } else {
          window.location.hash = hash;
        }
      });
    }
  });

  // if there is a hash on page load
  // navigate to it taking the floating header height into account
  if (window.location.hash !== '') {
    window.scrollTo(0, jQuery(window.location.hash).offset().top - (jQuery('.header').outerHeight() * 1.5));
  }
});