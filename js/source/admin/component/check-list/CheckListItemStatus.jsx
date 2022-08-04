const React = require('react');

const IconSVG = require('../icon/IconSVG');

class CheckListItemStatusSuccess extends React.Component {
  constructor(props) {
    super(props);

    this.icon = {
      success: 'check-small',
      error: 'cross'
    };
  }

  render() {
    return (
      <div className={`check-list-item-status check-list-item-status-${this.props.type}`}>
        <IconSVG  icon={this.icon[this.props.type]}
                  modifiers="check-list-item-status-icon"
        />
      </div>
    );
  }
}

module.exports = CheckListItemStatusSuccess;