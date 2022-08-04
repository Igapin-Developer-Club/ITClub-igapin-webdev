const React = require('react');

class LoaderSpinnerSmall extends React.Component {
  render() {
    return (
      <div className="loader-spinner-wrap small">
        <div className="loader-spinner"></div>
      </div>
    );
  }
}

module.exports = LoaderSpinnerSmall;