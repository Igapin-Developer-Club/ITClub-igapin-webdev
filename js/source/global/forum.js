import { querySelector } from '../utils/core';

querySelector('#bbpress-forums .hentry .bbp-reply-content > p', (elements) => {
  for (const p of elements) {
    const hasIframe = p.querySelector('iframe');

    // p element has an iframe
    if (hasIframe !== null) {
    // add iframe wrapper class
      p.classList.add('vikinger-forum-media-wrap');
    }
  }
});