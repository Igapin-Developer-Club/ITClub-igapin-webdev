const getAttachments = function (attachmentIDS, callback) {
  const data = {
    action: 'vkmetaboxes_get_attachments_ajax',
    attachmentIDS: attachmentIDS
  };

  jQuery.post(ajaxurl, data, callback);
};

function loadPostFormatMetaboxes(postFormatSelect) {
  const videoMetaContainer = document.querySelector('#vikinger_meta_video'),
        audioMetaContainer = document.querySelector('#vikinger_meta_audio'),
        galleryMetaContainer = document.querySelector('#vikinger_meta_gallery'),
        galleryUploadImageButton = document.querySelector('#vikinger_upload_image_button'),
        galleryImagesContainer = document.querySelector('#vikinger-meta-gallery-images'),
        galleryInput = document.querySelector('#vikinger_gallery_ids');

  let gallery = [];

  const galleryImages = document.createElement('div');

  galleryImages.classList.add('vikinger_gallery-images');

  const removeGalleryImage = function (id) {
    // console.log('REMOVING IMAGE: ', id);
    for (let i = 0; i < gallery.length; i++) {
      const image = gallery[i];

      if (image.id === id) {
        gallery.splice(i, 1);
        return;
      }
    }
  };

  const createSVGCross = function () {
    const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg'),
          path = document.createElementNS('http://www.w3.org/2000/svg', 'path');

    svg.setAttribute('viewBox', '0 0 12 12');
    svg.setAttribute('preserveAspectRatio', 'xMinYMin meet');
    path.setAttribute('d', 'M12,9.6L9.6,12L6,8.399L2.4,12L0,9.6L3.6,6L0,2.4L2.4,0L6,3.6L9.6,0L12,2.4L8.399,6L12,9.6z');

    svg.appendChild(path);

    return svg;
  };

  const createGalleryImage = function (imageData) {
    const image = document.createElement('div'),
          removeButton = document.createElement('div'),
          removeButtonIcon = createSVGCross();


    image.classList.add('vikinger_gallery-image');
    removeButton.classList.add('vikinger_remove-button');
    removeButtonIcon.classList.add('vikinger_remove-button-icon');

    removeButton.appendChild(removeButtonIcon);
    image.appendChild(removeButton);

    removeButton.addEventListener('click', function () {
      removeGalleryImage(imageData.id);
      updateGalleryContent();
    });

    image.style.background = `url("${imageData.url}") no-repeat center`;
    image.style.backgroundSize = 'cover';

    return image;
  };

  const loadSavedGallery = function (callback) {
    if (galleryInput.value !== '') {
      getAttachments(galleryInput.value, function (response) {
        // console.log('SAVED GALLERY ITEMS: ', response);
        gallery = gallery.concat(response);
        callback();
      });

      return;
    }

    callback();
  };

  const updateGalleryInput = function () {
    const ids = [];
    for (const image of gallery) {
      ids.push(image.id);
    }

    galleryInput.value = ids.join(',');
  };

  const updateGalleryContent = function () {
    galleryImagesContainer.innerHTML = '';

    if (!gallery.length) {
      const info = document.createElement('p');
      info.classList.add('vikinger_gallery-info');
      info.innerHTML = 'You haven\'t added any images to the gallery yet!';
      galleryImagesContainer.appendChild(info);
      return;
    }

    galleryImages.innerHTML = '';

    for (const image of gallery) {
      galleryImages.appendChild(createGalleryImage(image));
    }

    galleryImagesContainer.appendChild(galleryImages);

    updateGalleryInput();
  };

  const toggleMetaDataFields = function () {
    // console.log(postFormatSelect.value);

    if (postFormatSelect.value === 'video') {
      videoMetaContainer.style.display = 'block';
      galleryMetaContainer.style.display = 'none';
      audioMetaContainer.style.display = 'none';
    } else if (postFormatSelect.value === 'gallery') {
      galleryMetaContainer.style.display = 'block';
      videoMetaContainer.style.display = 'none';
      audioMetaContainer.style.display = 'none';
    } else if (postFormatSelect.value === 'audio') {
      audioMetaContainer.style.display = 'block';
      videoMetaContainer.style.display = 'none';
      galleryMetaContainer.style.display = 'none';
    } else {
      galleryMetaContainer.style.display = 'none';
      videoMetaContainer.style.display = 'none';
      audioMetaContainer.style.display = 'none';
    }
  };

  const metaImageFrame = wp.media(
    {
      title: 'Choose or upload images',
      button: {
        text:  'Add Images to Gallery'
      },
      library: {
        type: 'image'
      },
      multiple: true
    }
  );

  const openImageSelector = function (e) {
    // console.log('UPLOAD IMAGE');
    e.preventDefault();

    metaImageFrame.open();
  };

  const processSelectedImages = function () {
    const selectedImages = metaImageFrame.state().get('selection').toJSON();

    // console.log('SELECTED IMAGES: ', selectedImages);

    // remove duplicates
    for (let i = selectedImages.length - 1; i >= 0; i--) {
      const selectedImage = selectedImages[i];

      for (let j = 0; j < gallery.length; j++) {
        const galleryImage = gallery[j];

        // image already in gallery
        if (selectedImage.id == galleryImage.id) {
          // remove image
          selectedImages.splice(i, 1);
          break;
        }
      }
    }

    gallery = gallery.concat(selectedImages);
    updateGalleryContent();
  };

  galleryUploadImageButton.addEventListener('click', openImageSelector);
  metaImageFrame.on('select', processSelectedImages);

  postFormatSelect.addEventListener('change', toggleMetaDataFields);

  toggleMetaDataFields();


  loadSavedGallery(updateGalleryContent);
  
  // console.log(wp);
}

window.addEventListener('load', function () {
  // console.log('POST FORMAT METABOXES');
  const postFormatSelect = document.querySelector('#post-format-selector-0');

  // continue searching for postFormatSelect until found, otherwise don't do anything
  if (!postFormatSelect) {
    const intervalID = window.setInterval(() => {
      const postFormatSelect = document.querySelector('#post-format-selector-0');

      if (postFormatSelect) {
        loadPostFormatMetaboxes(postFormatSelect);
        window.clearInterval(intervalID);
      }
    }, 1000);
  }
});
