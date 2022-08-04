import { deepExtend } from '../../utils/core';

const Paginator = {
  getNextPageToFetch: function (options) {
    const config = {
      createCount: 0,
      deleteCount: 0
    };

    deepExtend(config, options);

    // console.log('PAGINATOR - CREATE COUNT: ', config.createCount);
    // console.log('PAGINATOR - DELETE COUNT: ', config.deleteCount);

    let pageOffset = 0,
        countDiff = config.createCount - config.deleteCount;
  
    if (countDiff === 0) {
      return config.page;
    }
  
    if (countDiff > 0) {
      pageOffset = Math.floor(Math.abs(countDiff) / config.per_page);
    } else {
      pageOffset = -Math.ceil(Math.abs(countDiff) / config.per_page);
    }

    // console.log('PAGINATOR - PAGE OFFSET: ', pageOffset);
    // console.log('PAGINATOR - PAGE: ', config.page);
    // console.log('PAGINATOR - PAGE WITH OFFSET: ', config.page + pageOffset);
  
    return config.page + pageOffset;
  },
  removeDuplicates: function (items, newItems, compareKey) {
    const duplicateItemKeys = [];

    for (const item of items) {
      for (const newItem of newItems) {
        // if duplicate found
        if (item[compareKey] === newItem[compareKey]) {
          duplicateItemKeys.push(item[compareKey]);

          // console.log('PAGINATOR - DUPLICATE FOUND: ', newItem);
          break;
        }
      }
    }

    // if any duplicates were found
    if (duplicateItemKeys.length > 0) {
      // console.log('PAGINATOR - DUPLICATE ITEM KEYS: ', duplicateItemKeys);

      const itemsWithoutDuplicates = newItems.filter((item) => {
        return !(duplicateItemKeys.includes(item[compareKey]));
      });

      // console.log('PAGINATOR - ITEMS WITHOUT DUPLICATES: ', itemsWithoutDuplicates);

      return itemsWithoutDuplicates;
    }

    // console.log('PAGINATOR - NO DUPLICATES FOUND: ', newItems);

    return newItems;
  }
};

export { Paginator as default };