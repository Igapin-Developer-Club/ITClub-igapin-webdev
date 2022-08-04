import React, { useRef, useEffect } from 'react';

import { getMediaLink } from '../../utils/core';

function YTPlayer(props) {
  const iframeSrc = `${getMediaLink('youtube', props.videoID)}?enablejsapi=1`;

  const iframeRef = useRef(null);

  const player = useRef(null);

  const onPlayerStateChange = (e, callback = () => {}) => {
    const playing = e.data === window.YT.PlayerState.PLAYING;

    // console.log('YTPLAYER - ON PLAYER STATE CHANGE STATUS: ', e.data);

    // notify parent that this player started playing
    if (playing) {
      callback();
    }
  };

  const loadPlayer = (onPlayerStateChange) => {
    // console.log('YTPLAYER - LOAD PLAYER: ', iframeRef.current);

    player.current = new window.YT.Player(iframeRef.current, {
      events: {
        onStateChange: onPlayerStateChange
      }
    });
  };

  useEffect(() => {
    // console.log('YTPLAYER - MOUNTING VIDEO: ', iframeRef.current);

    // load YT Iframe player API if it isn't loaded
    if (!window.YT && !document.querySelector('#ytIframePlayerScript')) {
      const ytIframePlayerScript = document.createElement('script');

      ytIframePlayerScript.id = 'ytIframePlayerScript';
      ytIframePlayerScript.src = 'https://www.youtube.com/iframe_api';

      document.body.appendChild(ytIframePlayerScript);
    }

    if (!window.onYouTubeIframeAPIReady) {
      window.onYouTubeIframeAPIReady = () => {
        for (const callback of window.onYouTubeIframeAPIReady.callbacks) {
          callback();
        }
      };

      window.onYouTubeIframeAPIReady.callbacks = [() => {loadPlayer((e) => {onPlayerStateChange(e, props.onPlay);})}];
    // } else {
    //   window.onYouTubeIframeAPIReady.callbacks.push(() => {loadPlayer((e) => {onPlayerStateChange(e, props.onPlay);})});
    // }
    } else if (!window.YT) {
      window.onYouTubeIframeAPIReady.callbacks.push(() => {loadPlayer((e) => {onPlayerStateChange(e, props.onPlay);})});
    } else {
      loadPlayer((e) => {onPlayerStateChange(e, props.onPlay)});
    }
  }, []);

  useEffect(() => {
    // console.log('YTPLAYER - COMPONENT DID UPDATE PLAYER: ', player.current);
    // console.log('YTPLAYER - COMPONENT DID UPDATE PLAYER PAUSE VIDEO: ', player.current.pauseVideo);
    // console.log('YTPLAYER - COMPONENT DID UPDATE IFRAME: ', iframeRef.current);
    // hidden / popup iframes aren't loaded and won't have a player yet
    if (player.current && player.current.pauseVideo) {
      player.current.pauseVideo();
    }
  }, [props.stop]);

  return (
    <iframe ref={iframeRef} src={iframeSrc} allowFullScreen></iframe>
  );
}

export { YTPlayer as default };