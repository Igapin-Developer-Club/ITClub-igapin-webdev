import React from 'react';

import FormInput from '../form/FormInput';
import FormDatepicker from '../form/FormDatepicker';
import FormInputRadioList from '../form/FormInputRadioList';
import FormInputSelect from '../form/FormInputSelect';
import FormInputCheckboxList from '../form/FormInputCheckboxList';
import FormInputURL from '../form/FormInputURL';
import FormTextarea from '../form/FormTextarea';

import { getURLIcon } from '../utils/xprofile';

function FormRow(props) {
  return (
    <div className={`form-row ${props.modifiers || ''}`}>
      {
        props.data.map((field) => {
          let Input = FormInput,
              icon = getURLIcon(field.name),
              modifiers = 'small';

          if (field.type === 'textarea') {
            Input = FormTextarea;
            modifiers += ' mid-textarea';
          } else if (field.type === 'datebox') {
            Input = FormDatepicker;
          } else if (field.type === 'url') {
            Input = FormInputURL;
          } else if (field.type === 'checkbox') {
            Input = FormInputCheckboxList;
          } else if (field.type === 'radio') {
            Input = FormInputRadioList;
          } else if (field.type === 'selectbox') {
            Input = FormInputSelect;
          }

          return (
            <div key={field.name} className="form-item">
              <Input  label={field.name}
                      name={field.name.toLowerCase()}
                      value={field.value}
                      meta={field.meta}
                      options={field.options}
                      icon={icon}
                      modifiers={modifiers}
                      handleValue={props.handleValue}
                      onChange={(data) => {props.onFieldUpdate(field, data);}}
              />
            </div>
          );
        })
      }
    </div>
  );
}

export { FormRow as default };