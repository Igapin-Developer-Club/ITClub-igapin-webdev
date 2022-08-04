const React = require('react');

class IconSVG extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <svg className={`icon-${this.props.icon} ${this.props.modifiers || ''}`}>
        <use href={`#svg-${this.props.icon}`}></use>
      </svg>
    );
  }
}

module.exports = IconSVG;