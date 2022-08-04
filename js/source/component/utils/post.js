const supportedFormat = {
  standard: {
    icon: 'blog-posts'
  },
  video: {
    icon: 'videos'
  },
  audio: {
    icon: 'headphones'
  },
  gallery: {
    icon: 'gallery'
  }
};

const postUtils = {
  getPostFormatIcon: (format) => {
    return supportedFormat[format] ? supportedFormat[format].icon : supportedFormat.standard.icon;
  }
};

export { postUtils as default };