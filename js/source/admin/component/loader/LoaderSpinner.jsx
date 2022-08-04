const React = require('react');

class LoaderSpinner extends React.Component {
  render() {
    return (
      <div className="loader-spinner-wrap">
        <div className="loader-spinner"></div>
      </div>
    );
  }
}

module.exports = LoaderSpinner;