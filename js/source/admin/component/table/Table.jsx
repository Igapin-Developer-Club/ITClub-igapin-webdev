const React = require('react');

const TableHeaderRow = require('./TableHeaderRow'),
      TableRow = require('./TableRow');

class Table extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div className="vk-table">
        <TableHeaderRow data={this.props.headerData} />
      {
        this.props.rowData.map((rowData, i) => {
          return (
            <TableRow key={i}
                      data={rowData}
                      pluginsData={this.props.pluginsData[i]}
                      processing={this.props.processingPlugin[i]}
                      selectedPlugin={this.props.selectedPlugin[i]}
                      togglePlugin={() => {this.props.togglePlugin(i);}}
                      selectablePlugin={this.props.selectablePlugin}
            />
          );
        })
      }
      </div>
    );
  }
}

module.exports = Table;