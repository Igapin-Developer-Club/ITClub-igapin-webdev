import React, { useState, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import { ucfirst } from '../../utils/core';

import dater from '../utils/date';

function FormDatepicker(props) {
  const dateValue = props.value !== '' ? props.value : new Date();

  const dateState = {
    day: {
      name: `${props.name}_day`,
      value: dater.getDay(dateValue)
    },
    month: {
      name: `${props.name}_month`,
      value: dater.getMonth(dateValue)
    },
    year: {
      name: `${props.name}_year`,
      value: dater.getYear(dateValue)
    }
  };

  const [date, setDate] = useState({
    [dateState.day.name]: dateState.day.value,
    [dateState.month.name]: dateState.month.value,
    [dateState.year.name]: dateState.year.value,
    daysInMonthYear: dater.getDaysInMonthYear(dateState.month.value, dateState.year.value)
  });

  const months = dater.getMonths();

  const currentYear = (new Date()).getFullYear();

  let years = dater.getYears(currentYear - 60, currentYear + 10);

  if (props.meta.range_type) {
    if (props.meta.range_type[0] === 'relative') {
      const currentYear = (new Date()).getFullYear(),
            yearRelativeStart = Number.parseInt(props.meta.range_relative_start[0], 10),
            yearRelativeEnd = Number.parseInt(props.meta.range_relative_end[0], 10);

      years = dater.getYears(currentYear + yearRelativeStart, currentYear + yearRelativeEnd);
    } else {
      const yearAbsoluteStart = Number.parseInt(props.meta.range_absolute_start[0], 10),
            yearAbsoluteEnd = Number.parseInt(props.meta.range_absolute_end[0], 10);

      years = dater.getYears(yearAbsoluteStart, yearAbsoluteEnd);
    }
  }

  const onChange = (e) => {
    e.persist();

    const yearChanged = e.target.name === dateState.year.name,
          monthChanged = e.target.name === dateState.month.name;

    // if month or year changed
    if (monthChanged || yearChanged) {
      // validate that the current day value is still valid
      const newDate = {
        day: date[dateState.day.name],
        month: monthChanged ? e.target.value: date[dateState.month.name],
        year: yearChanged ? e.target.value: date[dateState.year.name]
      };

      // if current day value is not valid, set it to max possible value
      if (!dater.validDay(newDate.day, newDate.month, newDate.year)) {
        setDate(previousDate => {
          return {
            ...previousDate,
            [dateState.day.name]: dater.getMaxDaysInMonthYear(newDate.month, newDate.year)
          }
        });
      }
    }

    setDate(previousDate => {
      return {
        ...previousDate,
        [e.target.name]: e.target.value
      };
    });
  };

  useEffect(() => {
    setDate(previousDate => {
      return {
        ...previousDate,
        daysInMonthYear: dater.getDaysInMonthYear(previousDate[dateState.month.name], previousDate[dateState.year.name])
      };
    });

    const newDate = dater.getDateString(date[dateState.day.name], date[dateState.month.name], date[dateState.year.name]);

    props.onChange(newDate);
  }, [date[dateState.day.name], date[dateState.month.name], date[dateState.year.name]]);

  return (
    <div className="form-select-wrap">
      {/* FORM SELECT */}
      <div className="form-select">
        <label htmlFor={dateState.day.name}>{ucfirst(props.name)} - {vikinger_translation.day}</label>
        <select id={dateState.day.name} name={dateState.day.name} value={date[dateState.day.name]} onChange={onChange}>
        {
          date.daysInMonthYear.map((day) => {
            return (
              <option key={day} value={day}>{day}</option>
            );
          })
        }
        </select>

        <IconSVG  icon="small-arrow"
                  modifiers="form-select-icon"
        />
      </div>
      {/* FORM SELECT */}

      {/* FORM SELECT */}
      <div className="form-select">
        <label htmlFor={dateState.month.name}>{ucfirst(props.name)} - {vikinger_translation.month}</label>
        <select id={dateState.month.name} name={dateState.month.name} value={date[dateState.month.name]} onChange={onChange}>
        {
          months.map((month) => {
            return (
              <option key={month} value={month}>{month}</option>
            );
          })
        }
        </select>

        <IconSVG  icon="small-arrow"
                  modifiers="form-select-icon"
        />
      </div>
      {/* FORM SELECT */}

      {/* FORM SELECT */}
      <div className="form-select">
        <label htmlFor={dateState.year.name}>{ucfirst(props.name)} - {vikinger_translation.year}</label>
        <select id={dateState.year.name} name={dateState.year.name} value={date[dateState.year.name]} onChange={onChange}>
        {
          years.map((year) => {
            return (
              <option key={year} value={year}>{year}</option>
            );
          })
        }
        </select>

        <IconSVG  icon="small-arrow"
                  modifiers="form-select-icon"
        />
      </div>
      {/* FORM SELECT */}
    </div>
  );
}

export { FormDatepicker as default };