const React = require('react');

const CheckListItemStatus = require('./CheckListItemStatus'),
      LoaderSpinnerSmall = require('../loader/LoaderSpinnerSmall');

class CheckListItem extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    let checkListItemStatusType = 'error';

    if (this.props.data.installed && this.props.data.updated && this.props.data.active) {
      checkListItemStatusType = 'success';
    }

    return (
      <li className="check-list-item">
        {/* CHECK LIST ITEM TEXT */}
        <p className="check-list-item-text">{this.props.data.name}</p>
        {/* CHECK LIST ITEM TEXT */}

      {
        this.props.processing &&
          <LoaderSpinnerSmall />
      }
      {
        !this.props.processing &&
          <CheckListItemStatus type={checkListItemStatusType} />
      }
      </li>
    );
  }
}

module.exports = CheckListItem;