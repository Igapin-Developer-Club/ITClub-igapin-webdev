import { createTooltip } from '../utils/plugins';

createTooltip({
  container: '.text-tooltip-tfr',
  offset: 4,
  direction: 'right',
  animation: {
    type: 'translate-in-fade'
  }
});

createTooltip({
  container: '.text-tooltip-tft',
  offset: 4,
  direction: 'top',
  animation: {
    type: 'translate-out-fade'
  }
});