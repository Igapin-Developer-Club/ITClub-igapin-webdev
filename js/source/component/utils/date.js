const pad = (number) => {
  return number < 10 ? `0${number}` : number;
};

const getMaxDaysInMonthYear = (month, year) => {
  return (new Date(year, month, 0)).getDate();
};

const dater = {
  getMaxDaysInMonthYear,
  getDaysInMonthYear: (month, year) => {
    const maxDay = getMaxDaysInMonthYear(month, year),
          days = [];

    for (let i = 1; i <= maxDay; i++) {
      days.push(i);
    }

    return days;
  },
  validDay: (day, month, year) => {
    const maxDay = getMaxDaysInMonthYear(month, year);

    return day <= maxDay;
  },
  getMonths: () => {
    const months = [];

    for (let i = 1; i <= 12; i++) {
      months.push(i);
    }

    return months;
  },
  getYears: (start, end) => {
    const years = [];

    for (let i = end; i >= start; i--) {
      years.push(i);
    }

    return years;
  },
  getDay: (date) => {
    return (new Date(date)).getDate();
  },
  getMonth: (date) => {
    return (new Date(date)).getMonth() + 1;
  },
  getYear: (date) => {
    return (new Date(date)).getFullYear();
  },
  getDateString: (day, month, year, dateSeparator = '-', hourSeparator = ':') => {
    const date = new Date(year, month - 1, day),
          displayYear = date.getFullYear(),
          displayMonth = pad(date.getMonth() + 1),
          displayDay = pad(date.getDate()),
          displayHours = pad(date.getHours()),
          displayMinutes = pad(date.getMinutes()),
          displaySeconds = pad(date.getSeconds());

    return `${displayYear}${dateSeparator}${displayMonth}${dateSeparator}${displayDay} ${displayHours}${hourSeparator}${displayMinutes}${hourSeparator}${displaySeconds}`;
  }
};

export { dater as default };