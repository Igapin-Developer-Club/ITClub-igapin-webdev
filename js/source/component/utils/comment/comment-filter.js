import { filterString, wrapLinks, limitLineBreaks, replaceEnterWithBr } from '../../../utils/core';

const lineBreakLimit = vikinger_constants.settings.activity_line_break_limit;

const filterCommentContentForSave = (string) => {
  return filterString(string.trim(), [{filterFN: limitLineBreaks, filterArgs: [lineBreakLimit]}]);
};

const filterCommentContentForDisplay = (string) => {
  return filterString(string.trim(), [wrapLinks, {filterFN: limitLineBreaks, filterArgs: [lineBreakLimit]}, replaceEnterWithBr]);
};

export {
  filterCommentContentForSave,
  filterCommentContentForDisplay
};