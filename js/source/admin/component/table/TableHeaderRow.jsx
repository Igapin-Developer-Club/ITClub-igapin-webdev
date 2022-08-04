const React = require('react');

class TableHeaderRow extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div className="vk-table-header-row">
      {
        this.props.data.map((data, i) => {
          return (
            <div key={i} className="vk-table-header-cell">
              <p className="vk-table-header-cell-text">{data.text}</p>
            </div>
          );
        })
      }
      <div className="vk-table-header-cell">
        <p className="vk-table-header-cell-text"></p>
      </div>
      </div>
    );
  }
}

module.exports = TableHeaderRow;