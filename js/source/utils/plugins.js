const existsInDOM = function (selector) {
  return document.querySelectorAll(selector).length;
};

const createTab = (options) => {
  if (existsInDOM(options.triggers) && existsInDOM(options.elements)) {
    return new XM_Tab(options);
  }
};

const createHexagon = (options) => {
  if (existsInDOM(options.container) || (typeof options.containerElement !== 'undefined')) {
    return new XM_Hexagon(options);
  }
};

const createProgressBar = (options) => {
  if (existsInDOM(options.container)) {
    return new XM_ProgressBar(options);
  }
};

const createDropdown = (options) => {
  if (((existsInDOM(options.container) || typeof options.containerElement !== 'undefined') && options.controlToggle) || ((existsInDOM(options.trigger) || typeof options.triggerElement !== 'undefined') && (existsInDOM(options.container) || typeof options.containerElement !== 'undefined'))) {
    return new XM_Dropdown(options);
  }
};

const createTooltip = (options) => {
  if (existsInDOM(options.container) || (typeof options.containerElement !== 'undefined')) {
    return new XM_Tooltip(options);
  }
};

const createSlider = (container, options) => {
  if (container instanceof HTMLElement || existsInDOM(container)) {
    return new Swiper(container, options);
  }
};

const createPopup = (options) => {
  if ((existsInDOM(options.trigger) || typeof options.triggerElement !== 'undefined') || (typeof options.premadeContentElement !== 'undefined')) {
    return new XM_Popup(options);
  }
};

const createAccordion = (options) => {
  if (existsInDOM(options.triggerSelector) && existsInDOM(options.contentSelector)) {
    return new XM_Accordion(options);
  }
};

const createFormInput = (elements) => {
  for (const el of elements) {
    if (el.classList.contains('always-active')) continue;
    
    const input = el.querySelector('input'),
          textarea = el.querySelector('textarea'),
          activeClass = 'active';

    let inputItem = undefined;

    if (input) inputItem = input;
    if (textarea) inputItem = textarea;

    if (inputItem) {
      // if input item has value or is already focused, activate it
      if ((inputItem.value !== '') || ((inputItem.getAttribute('data-pwd') !== null) && (inputItem.getAttribute('data-pwd') !== '')) || (inputItem === document.activeElement)) {
        el.classList.add(activeClass);
      }

      inputItem.addEventListener('focus', function () {
        el.classList.add(activeClass);
      });

      inputItem.addEventListener('blur', function () {
        if (inputItem.value === '') {
          el.classList.remove(activeClass);
        }
      });
    }
  }
};

export {
  createTab,
  createHexagon,
  createProgressBar,
  createDropdown,
  createTooltip,
  createSlider,
  createPopup,
  createAccordion,
  createFormInput
};