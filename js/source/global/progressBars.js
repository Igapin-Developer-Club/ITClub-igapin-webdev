import { createProgressBar } from '../utils/plugins';

/**
 * ACHIEVEMENT PROGRESS
 */
createProgressBar({
  container: '.achievement-progress',
  height: 4,
  lineColor: vikinger_constants.colors['--color-progressbar-underline']
});

createProgressBar({
  container: '.achievement-progress',
  height: 4,
  gradient: {
    colors: [vikinger_constants.colors['--color-progressbar-line-gradient-start'], vikinger_constants.colors['--color-progressbar-line-gradient-end']]
  },
  scale: {
    start: 0,
    end: 1,
    stop: 1
  },
  linkText: true,
  linkUnits: '/',
  emptyText: vikinger_translation.locked,
  completeText: vikinger_translation['unlocked!']
});

/**
 * ACHIEVEMENT SIMPLE PROGRESS
 */
createProgressBar({
  container: '.achievement-simple-progress',
  height: 4,
  lineColor: vikinger_constants.colors['--color-progressbar-underline']
});

createProgressBar({
  container: '.achievement-simple-progress',
  height: 4,
  gradient: {
    colors: [vikinger_constants.colors['--color-progressbar-line-gradient-start'], vikinger_constants.colors['--color-progressbar-line-gradient-end']]
  },
  scale: {
    start: 0,
    end: 1,
    stop: 1
  }
});

/**
 * RANK PROGRESS
 */
createProgressBar({
  container: '.user-rank-pgb',
  height: 4,
  lineColor: vikinger_constants.colors['--color-header-progressbar-underline']
});

createProgressBar({
  container: '.user-rank-pgb',
  height: 4,
  gradient: {
    colors: [vikinger_constants.colors['--color-header-progressbar-line-gradient-start'], vikinger_constants.colors['--color-header-progressbar-line-gradient-end']]
  },
  scale: {
    start: 0,
    end: 1,
    stop: 1
  },
  linkText: true,
  linkUnits: '/'
});