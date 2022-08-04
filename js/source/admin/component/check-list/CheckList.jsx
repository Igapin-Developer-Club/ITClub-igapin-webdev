const React = require('react');

const CheckListItem = require('./CheckListItem');

class CheckList extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <ul className="check-list">
      {
        this.props.data.map((checkListItemData, i) => {
          return (
            <CheckListItem key={checkListItemData.name} data={checkListItemData} processing={this.props.processingPlugin[i]} />
          );
        })
      }
      </ul>
    );
  }
}

module.exports = CheckList;