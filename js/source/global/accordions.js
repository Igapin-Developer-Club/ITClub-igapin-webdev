import { createAccordion } from '../utils/plugins';

createAccordion({
  triggerSelector: '.accordion-trigger-linked',
  contentSelector: '.accordion-content-linked',
  startOpenClass: 'accordion-open',
  selectedClass: 'selected',
  linkTriggers: true
});