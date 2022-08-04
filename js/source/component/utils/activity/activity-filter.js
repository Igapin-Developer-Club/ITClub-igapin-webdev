import { filterString, wrapLinks, limitLineBreaks, replaceEnterWithBr } from '../../../utils/core';

const lineBreakLimit = vikinger_constants.settings.activity_line_break_limit;

const filterActivityContentForSave = (string) => {
  return filterString(string.trim(), [{filterFN: limitLineBreaks, filterArgs: [lineBreakLimit]}]);
};

const filterActivityContentForDisplay = (string) => {
  return filterString(string.trim(), [wrapLinks, {filterFN: limitLineBreaks, filterArgs: [lineBreakLimit]}, replaceEnterWithBr]);
};

export {
  filterActivityContentForSave,
  filterActivityContentForDisplay
};