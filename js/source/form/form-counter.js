import { querySelector } from '../utils/core';

querySelector('.vk-form-counter-input', (els) => {
  // console.log('FORM COUNTER - COUNTERS: ', els);

  for (const counter of els) {
    const parent = counter.parentElement,
          counterIncreaseControl = parent.querySelector('.vk-form-counter-control-increase'),
          counterDecreaseControl = parent.querySelector('.vk-form-counter-control-decrease');

    // console.log('FORM COUNTER - PARENT: ', parent);
    // console.log('FORM COUNTER - INCREASE CONTROL: ', counterIncreaseControl);
    // console.log('FORM COUNTER - DECREASE CONTROL: ', counterDecreaseControl);

    if (counterIncreaseControl) {
      counterIncreaseControl.addEventListener('mousedown', () => {counter.stepUp();});
    }

    if (counterDecreaseControl) {
      counterDecreaseControl.addEventListener('mousedown', () => {counter.stepDown();});
    }
  }
});