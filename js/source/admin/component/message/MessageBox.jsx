const React = require('react');

class MessageBox extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div className={`message-box message-box-${this.props.type}`}>
        <div className="message-box-icon-wrap">
          <svg className={`message-box-icon icon-${this.props.type}`}>
            <use href={`#svg-${this.props.type}`}></use>
          </svg>
        </div>

        <p className="message-box-title">{this.props.title}</p>
        <p className="message-box-text">{this.props.text}</p>
      </div>
    );
  }
}

module.exports = MessageBox;