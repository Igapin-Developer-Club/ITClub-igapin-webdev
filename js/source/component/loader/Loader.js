import React from 'react';

function Loader(props) {
  return (
    <div className="page-loader-indicator">
      <div className="loader-bars">
        <div className="loader-bar"></div>
        <div className="loader-bar"></div>
        <div className="loader-bar"></div>
        <div className="loader-bar"></div>
        <div className="loader-bar"></div>
        <div className="loader-bar"></div>
        <div className="loader-bar"></div>
        <div className="loader-bar"></div>
      </div>
    </div>
  );
}

export { Loader as default };