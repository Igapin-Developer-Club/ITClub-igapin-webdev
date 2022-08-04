import React from 'react';

function SectionHeader(props) {
  return (
    <div className="section-header">
      {/* SECTION HEADER INFO */}
      <div className="section-header-info">
        <p className="section-pretitle">{props.pretitle}</p>
        <h2 className="section-title">
          { props.title }
          {
            (typeof props.titleCount !== 'undefined') &&
              <span className="highlighted">{` ${props.titleCount}`}</span>
          }
        </h2>
      </div>
      {/* SECTION HEADER INFO */}

      { props.children }
    </div>
  );
}

export { SectionHeader as default };