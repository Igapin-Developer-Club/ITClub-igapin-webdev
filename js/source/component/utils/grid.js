import MemberPreview from '../member/MemberPreview';
import MemberPreviewBig from '../member/MemberPreviewBig';
import MemberPreviewSmall from '../member/MemberPreviewSmall';

import GroupPreview from '../group/GroupPreview';
import GroupPreviewBig from '../group/GroupPreviewBig';
import GroupPreviewSmall from '../group/GroupPreviewSmall';

import PostPreview from '../post/post-preview/PostPreview';
import PostPreviewBig from '../post/post-preview/PostPreviewBig';
import PostPreviewSmall from '../post/post-preview/PostPreviewSmall';

import PostPreviewIframe from '../post/post-preview/post-preview-iframe/PostPreviewIframe';
import PostPreviewIframeBig from '../post/post-preview/post-preview-iframe/PostPreviewIframeBig';
import PostPreviewIframeSmall from '../post/post-preview/post-preview-iframe/PostPreviewIframeSmall';

import PostPreviewGallery from '../post/post-preview/post-preview-gallery/PostPreviewGallery';
import PostPreviewGalleryBig from '../post/post-preview/post-preview-gallery/PostPreviewGalleryBig';
import PostPreviewGallerySmall from '../post/post-preview/post-preview-gallery/PostPreviewGallerySmall';

const itemPreviewTemplate = {
  member: {
    big: MemberPreviewBig,
    small: MemberPreview,
    list: MemberPreviewSmall
  },
  group: {
    big: GroupPreviewBig,
    small: GroupPreview,
    list: GroupPreviewSmall
  },
  post: {
    big: PostPreviewBig,
    small: PostPreview,
    list: PostPreviewSmall
  },
  postIframe: {
    big: PostPreviewIframeBig,
    small: PostPreviewIframe,
    list: PostPreviewIframeSmall
  },
  postGallery: {
    big: PostPreviewGalleryBig,
    small: PostPreviewGallery,
    list: PostPreviewGallerySmall
  }
};

import Grid from '../grid/Grid';
import Grid_3 from '../grid/Grid_3';
import Grid_4 from '../grid/Grid_4';
import Grid_6 from '../grid/Grid_6';

const gridTemplate = {
  member: {
    big: Grid_4,
    small: Grid_3,
    list: Grid
  },
  group: {
    big: Grid_4,
    small: Grid_3,
    list: Grid
  },
  post: {
    big: Grid_6,
    small: Grid_4,
    list: Grid_6
  }
};

const gridUtils = {
  getItemPreviewTemplate: (entity, gridType, entityData) => {
    let entityType = entity;

    if (entityType === 'post') {
      if (((entityData.format === 'video') && entityData.video_url !== '') || ((entityData.format === 'audio') && entityData.audio_url !== '')) {
        entityType = 'postIframe';
      } else if ((entityData.format === 'gallery') && entityData.gallery) {
        entityType = 'postGallery'
      }
    }

    return itemPreviewTemplate[entityType][gridType];
  },
  getGridTemplate: (entity, gridType) => {
    return gridTemplate[entity][gridType];
  }
};

export { gridUtils as default };