import React from 'react';

import FormRow from '../form/FormRow';

const splitFieldsInRows = (fields, rowLength = 2) => {
  const formRows = [];

  let i = 0;
  let formItems = [];

  for (const field of fields) {
    if (i === rowLength) {
      formRows.push(formItems);
      i = 0;
      formItems = [];
    }

    formItems.push(field);
    i++;
  }

  // dump remaining fields
  if (formItems.length > 0) {
    formRows.push(formItems);
  }

  return formRows;
};

function SettingsWidget(props) {
  const formRows = splitFieldsInRows(props.data.fields);

  const renderedFormRows = formRows.map((formItems, i) => {
    return (
      <FormRow  key={i}
                data={formItems}
                modifiers="split"
                onFieldUpdate={props.onFieldUpdate}
      />
    );
  });

  return (
    <div className="widget-box">
      {/* WIDGET BOX TITLE */}
      <p className="widget-box-title">{props.data.name}</p>
      {/* WIDGET BOX TITLE */}

      {/* WIDGET BOX CONTENT */}
      <div className="widget-box-content">
        {/* FORM */}
        <div className="form">
          { renderedFormRows }
        </div>
        {/* FORM */}
      </div>
      {/* WIDGET BOX CONTENT */}
    </div>
  );
}

export { SettingsWidget as default };