const React = require('react');

const TableItemStatus = require('./TableItemStatus'),
      LoaderSpinnerSmall = require('../loader/LoaderSpinnerSmall');

import CheckBox from '../../../component/form/Checkbox';

class TableRow extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    let checkListItemStatusType = 'error';

    if (this.props.pluginsData.installed && this.props.pluginsData.updated && this.props.pluginsData.active) {
      checkListItemStatusType = 'success';
    }

    return (
      <div className="vk-table-row">
        <div className="vk-table-cell">
        {
          this.props.selectablePlugin &&
            <CheckBox active={this.props.selectedPlugin} toggleActive={this.props.togglePlugin} />
        }
        {
          !this.props.selectablePlugin && this.props.selectedPlugin &&
            <CheckBox active={this.props.selectedPlugin} />
        }
        </div>

      {
        this.props.data.map((data, i) => {
          return (
            <div key={i} className="vk-table-cell">
              <p className="vk-table-cell-text">{data.text}</p>
            </div>
          );
        })
      }
        <div className="vk-table-cell">
        {
          this.props.selectedPlugin &&
            <React.Fragment>
            {
              this.props.processing &&
                <LoaderSpinnerSmall />
            }
            {
              !this.props.processing &&
                <TableItemStatus type={checkListItemStatusType} />
            }
            </React.Fragment>
        }
        </div>
      </div>
    );
  }
}

module.exports = TableRow;