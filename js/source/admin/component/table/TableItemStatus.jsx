const React = require('react');

const IconSVG = require('../icon/IconSVG');

class TableItemStatus extends React.Component {
  constructor(props) {
    super(props);

    this.icon = {
      success: 'check-small',
      error: 'cross'
    };
  }

  render() {
    return (
      <div className={`vk-table-item-status vk-table-item-status-${this.props.type}`}>
        <IconSVG  icon={this.icon[this.props.type]}
                  modifiers="vk-table-item-status-icon"
        />
      </div>
    );
  }
}

module.exports = TableItemStatus;