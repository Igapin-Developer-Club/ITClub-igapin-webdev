const deepExtend = (a, b) => {
  for (const prop in b) {
    if (typeof b[prop] === 'object') {
      a[prop] = b[prop] instanceof Array ? [] : {};
      deepExtend(a[prop], b[prop]);
    } else {
      a[prop] = b[prop];
    }
  }
};

const deepMerge = (...objects) => {
  const c = {};

  objects.forEach((obj) => {
    deepExtend(c, obj);
  });

  return c;
};

const query = (options) => {
  const config = {
    method: 'GET',
    async: true,
    header: {
      type: 'Content-type',
      value: 'application/json'
    },
    data: ''
  };

  deepExtend(config, options);

  return new Promise( function (resolve, reject) {
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if (xhttp.readyState !== 4) return;

      if (xhttp.status === 200) {
        resolve(xhttp.responseText);
      } else {
        reject({
          status: xhttp.status,
          statusText: xhttp.statusText
        });
      }
    };

    xhttp.open(config.method, config.url, config.async);
    xhttp.setRequestHeader(config.header.type, config.header.value);

    if (config.method === 'GET') {
      xhttp.send();
    } else if (config.method === 'POST') {
      xhttp.send(config.data);
    }
  });
};

const querySelector = (selector, callback) => {
  const el = document.querySelectorAll(selector);

  if (el.length) {
    callback(el);
  }
};

const dateDiff = (date1, date2 = new Date()) => {
  const timeDiff = Math.abs(date1.getTime() - date2.getTime()),
        secondsDiff = Math.ceil(timeDiff / (1000)),
        minutesDiff = Math.floor(timeDiff / (1000 * 60)),
        hoursDiff = Math.floor(timeDiff / (1000 * 60 * 60)),
        daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24)),
        weeksDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24 * 7)),
        monthsDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24 * 7 * 4)),
        yearsDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24 * 7 * 4 * 12));

  let unit;

  if (secondsDiff < 60) {
    unit = secondsDiff === 1 ? 'second' : 'seconds';

    return {
      unit: unit,
      value: secondsDiff
    }
  } else if (minutesDiff < 60) {
    unit = minutesDiff === 1 ? 'minute' : 'minutes';

    return {
      unit: unit,
      value: minutesDiff
    }
  } else if (hoursDiff < 24) {
    unit = hoursDiff === 1 ? 'hour' : 'hours';

    return {
      unit: unit,
      value: hoursDiff
    }
  } else if (daysDiff < 7) {
    unit = daysDiff === 1 ? 'day' : 'days';

    return {
      unit: unit,
      value: daysDiff
    }
  } else if (weeksDiff < 4) {
    unit = weeksDiff === 1 ? 'week' : 'weeks';

    return {
      unit: unit,
      value: weeksDiff
    }
  } else if (monthsDiff < 12) {
    unit = monthsDiff === 1 ? 'month' : 'months';

    return {
      unit: unit,
      value: monthsDiff
    }
  } else {
    unit = yearsDiff === 1 ? 'year' : 'years';

    return {
      unit: unit,
      value: yearsDiff
    }
  }
};

const dateMinutesDiff = (date1, date2 = new Date()) => {
  const timeDiff = Math.abs(date1.getTime() - date2.getTime()),
        minutesDiff = Math.floor(timeDiff / (1000 * 60));

  return minutesDiff;
};

const truncateText = (text, limit, moreText = '...') => {
  if (text.length <= limit) {
    return text;
  }

  const truncatedText = text.substring(0, limit);

  return truncatedText.trim() + moreText;
};

const joinText = (text, separator = '-') => {
  const joinedText = text.replace(/\s+/igm, separator);

  return joinedText;
};

const getMediaLink = (type, id) => {
  if (type === 'youtube') {
    return `https://www.youtube.com/embed/${id}`;
  }

  if (type === 'twitch') {
    return `//player.twitch.tv/?autoplay=false&video=v${id}&parent=${vikinger_constants.settings.stream_twitch_embeds_parent}`;
  }

  if (type === 'twitch_channel') {
    return `//player.twitch.tv/?channel=${id}&parent=${vikinger_constants.settings.stream_twitch_embeds_parent}`;
  }
};

const extractAttachedMedia = (string) => {
  let attached_media = false,
      minMatchIndex = Number.MAX_SAFE_INTEGER;
  
  // test for youtube link match
  const youtubeLinkRegex = /youtube\.com\/watch\?v=(.*?)(&|\s|$)/igm,
        youtubeLinkShortRegex = /youtu\.be\/(.*?)(&|\s|$)/igm,
        youtubeLinkMatches = youtubeLinkRegex.exec(string) || youtubeLinkShortRegex.exec(string);

  if (youtubeLinkMatches && (youtubeLinkMatches.index < minMatchIndex)) {
    const type = 'youtube',
          id = youtubeLinkMatches[1];

    attached_media = {
      type: type,
      id: id,
      link: getMediaLink(type, id)
    };

    minMatchIndex = youtubeLinkMatches.index;
  }

  // test for twitch link match
  const twitchVideoLinkRegex = /twitch\.tv\/videos\/(.*?)(\?|&|\s|$)/igm,
        twitchChannelLinkRegex = /twitch\.tv\/(.*?)(&|\s|$)/igm,
        twitchVideoLinkMatches = twitchVideoLinkRegex.exec(string),
        twitchChannelLinkMatches = twitchChannelLinkRegex.exec(string);

  if (twitchVideoLinkMatches && (twitchVideoLinkMatches.index < minMatchIndex)) {
    const type = 'twitch',
          id = twitchVideoLinkMatches[1];
          
    attached_media = {
      type: type,
      id: id,
      link: getMediaLink(type, id)
    };

    minMatchIndex = twitchVideoLinkMatches.index;
  }

  if (twitchChannelLinkMatches && (twitchChannelLinkMatches.index < minMatchIndex)) {
    const type = 'twitch_channel',
          id = twitchChannelLinkMatches[1];
          
    attached_media = {
      type: type,
      id: id,
      link: getMediaLink(type, id)
    };

    minMatchIndex = twitchChannelLinkMatches.index;
  }

  return attached_media;
};

const wrapLinks = (string) => {
  const linkRegex = /((^|[^"'])https?:\/\/[^\s]*)/igm;
  
  return string.replace(linkRegex, '<a href="$1" target="_blank">$1</a>');
};

const getWordInPosition = (text, position) => {
  let wordStartIndex = 0,
      wordEndIndex = text.length;
  
  const isSeparator = function (character) {
    return (character === ' ') || (character === '\n');
  };

  // search word ending after cursor position
  for (let i = position - 1; i < text.length; i++) {
    // if word ends
    if (isSeparator(text[i])) {
      wordEndIndex = i;
      break;
    }
  }

  // search word ending before cursor position
  for (let i = position - 1; i >= 0; i--) {
    // if word ends
    if (isSeparator(text[i])) {
      wordStartIndex = i + 1;
      break;
    }
  }

  // console.log('GET WORD INDEX - START: ', wordStartIndex);
  // console.log('GET WORD INDEX - END: ', wordEndIndex);

  return {
    word: text.substring(wordStartIndex, wordEndIndex),
    startIndex: wordStartIndex,
    endIndex: wordEndIndex
  };
};

const getPositionInInput = (input, shadowInput, index) => {
  if (shadowInput.children && index > 0) {
    const inputDimensions = input.getBoundingClientRect(),
          shadowInputDimensions = shadowInput.children[index - 1].getBoundingClientRect();

    // console.log('INPUT CLIENT RECT: ', inputDimensions);
    // console.log('SHADOW INPUT CLIENT RECT: ', shadowInput.getBoundingClientRect());
    // console.log('SHADOW INPUT CURRENT SPAN: ', shadowInput.children[index - 1]);
    // console.log('SHADOW INPUT CURRENT SPAN CLIENT RECT: ', shadowInputDimensions);

    return {
      width: shadowInputDimensions.width,
      height: shadowInputDimensions.height,
      top: shadowInputDimensions.top,
      left: shadowInputDimensions.left,
      relTop: shadowInputDimensions.top - inputDimensions.top,
      relLeft: shadowInputDimensions.left - inputDimensions.left
    };
  }
  
  return {
    width: 0,
    height: 0,
    top: 0,
    left: 0,
    relTop: 0,
    relLeft: 0
  };
};

const updateShadowInput = (shadowInput, text) => {
  shadowInput.innerHTML = '';

  const textCharacters = text.split('');

  // console.log('TEXT CHARACTERS: ', textCharacters);

  for (const character of textCharacters) {
    const span = document.createElement('span');

    if (character === ' ') {
      span.innerHTML = '&nbsp;';
    } else if (character === '\n' ) {
      span.innerHTML = '<br>';
    } else {
      span.innerHTML = character;
    }

    shadowInput.appendChild(span);
  }

  // console.log('UPDATE SHADOW INPUT: ', shadowInput);
};

const insertWordInText = (text, word, index, offset = 0) => {
  const textBeforeWord = text.substring(0, index),
        textAfterWord = text.substring(index + offset);

  // console.log('TEXT BEFORE WORD: ', textBeforeWord);
  // console.log('TEXT AFTER WORD: ', textAfterWord);

  return textBeforeWord + word + textAfterWord;
};

const replaceEnterWithBr = (text) => {
  const enterRegex = /\r\n/gim,
        newText = text.replace(enterRegex, '<br>');
    
  return newText;
};

const ucfirst = (string) => {
  return string[0].toUpperCase() + string.substring(1);
};

const hexaToRGB = (hexa, opacity = 1) => {
  const hex = hexa.substring(1);

  return `rgba(${Number.parseInt(hex.substring(0, 2), 16)}, ${Number.parseInt(hex.substring(2, 4), 16)}, ${Number.parseInt(hex.substring(4, 6), 16)}, ${opacity})`;
};

const stripHTML = (string) => {
  const DP = new DOMParser();
  const parsedString = DP.parseFromString(string, 'text/html');

  return parsedString.body.textContent;
};

const limitLineBreaks = (string, maxLineBreakCount = 2) => {
  const limitLineBreakRegex = new RegExp(`(\s*\n\s*){${maxLineBreakCount + 1},}`, 'igm');

  return string.replace(limitLineBreakRegex, '\n'.repeat(maxLineBreakCount));
};

const filterString = (string, filters) => {
  return filters.reduce((filteredString, filter) => {
    if (typeof filter === 'function') {
      return filter(filteredString);
    } else if (typeof filter === 'object') {
      if (typeof filter.filterFN === 'function') {
        if ((filter.filterArgs instanceof Array) && (filter.filterArgs.length > 0)) {
          return filter.filterFN(filteredString, ...filter.filterArgs);
        }
  
        return filter.filterFN(filteredString);
      }
    }

    return filteredString;
  }, string);
};

export {
  deepExtend,
  deepMerge,
  querySelector,
  truncateText,
  joinText,
  getMediaLink,
  extractAttachedMedia,
  wrapLinks,
  getWordInPosition,
  getPositionInInput,
  updateShadowInput,
  insertWordInText,
  replaceEnterWithBr,
  ucfirst,
  hexaToRGB,
  stripHTML,
  dateMinutesDiff,
  limitLineBreaks,
  filterString
};