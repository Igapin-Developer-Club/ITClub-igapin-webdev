const React = require('react');

const LoaderSpinner = require('../loader/LoaderSpinner'),
      LoaderSpinnerSmall = require('../loader/LoaderSpinnerSmall');

import CheckBox from '../../../component/form/Checkbox';

const TableItemStatus = require('../table/TableItemStatus');

const DemoImporter = require('../utils/demo')();

class DemoImportList extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      demoImportData: [],
      loading: false,
      processingImport: false,
      processingReset: false
    };

    this.processImports = this.processImports.bind(this);
    this.resetImports = this.resetImports.bind(this);
  }

  toggleSelected(i) {
    // do not allow selection interaction if already processing
    if (this.state.processingImport || this.state.processingReset) {
      return;
    }

    this.setState((state, props) => {
      const demoImportData = state.demoImportData.slice();

      demoImportData[i].selected = !demoImportData[i].selected;

      return {
        demoImportData: demoImportData
      };
    });
  }

  noOptionsAreSelected() {
    const importData = this.state.demoImportData;

    for (const importItem of importData) {
      if (importItem.selected) {
        return false;
      }
    }

    return true;
  }

  processImport(importData, i, callback) {
    // console.log('DEMO IMPORT LIST - PROCESS IMPORT: ', i);

    const importItem = importData[i];

    // item is not selected, do not process
    if (!importItem.selected) {
      // reached last item, finish
      if (i === (importData.length - 1)) {
        callback();
      } else {
        this.processImport(importData, i + 1, callback);
      }
    } else {
      importItem.processing = true;

      this.setState({
        demoImportData: importData
      });

      importItem.process()
      .done((response) => {
        // console.log('DEMO IMPORT LIST - IMPORT ITEM PROCESS RESPONSE: ', response);

        if (response) {
          importItem.result = 'success';
        } else {
          importItem.result = 'error';
        }
      })
      .fail((error) => {
        // console.log('DEMO IMPORT LIST - IMPORT ITEM PROCESS ERROR: ', error);

        importItem.result = 'error';
      })
      .always(() => {
        importItem.processing = false;

        this.setState({
          demoImportData: importData
        });

        // reached last item, finish
        if (i === (importData.length - 1)) {
          callback();
        } else {
          this.processImport(importData, i + 1, callback);
        }
      });
    }
  }

  processImports() {
    // return if already processing
    if (this.state.processingImport || this.state.processingReset || this.noOptionsAreSelected()) {
      return;
    }

    this.setState({
      processingImport: true
    });

    const importData = this.state.demoImportData.slice();

    this.processImport(importData, 0, () => {
      // window.location = window.location;

      this.setState({
        processingImport: false
      });
    });
  }

  resetImport(importData, i, callback) {
    // console.log('DEMO IMPORT LIST - RESET IMPORT: ', i);

    const importItem = importData[i];

    // item is not selected, do not process
    if (!importItem.selected) {
      // reached last item, finish
      if (i === (importData.length - 1)) {
        callback();
      } else {
        this.resetImport(importData, i + 1, callback);
      }
    } else {
      importItem.processing = true;

      this.setState({
        demoImportData: importData
      });

      importItem.reset()
      .done((response) => {
        // console.log('DEMO IMPORT LIST - IMPORT ITEM RESET RESPONSE: ', response);

        if (response) {
          importItem.result = 'success';
        } else {
          importItem.result = 'error';
        }
      })
      .fail((error) => {
        // console.log('DEMO IMPORT LIST - IMPORT ITEM RESET ERROR: ', error);

        importItem.result = 'error';
      })
      .always(() => {
        importItem.processing = false;

        this.setState({
          demoImportData: importData
        });

        // reached last item, finish
        if (i === (importData.length - 1)) {
          callback();
        } else {
          this.resetImport(importData, i + 1, callback);
        }
      });
    }
  }

  resetImports() {
    // return if already processing
    if (this.state.processingImport || this.state.processingReset || this.noOptionsAreSelected()) {
      return;
    }

    this.setState({
      processingReset: true
    });

    const importData = this.state.demoImportData.slice();

    this.resetImport(importData, 0, () => {
      // window.location = window.location;

      this.setState({
        processingReset: false
      });
    });
  }

  componentDidMount() {
    this.setState({
      demoImportData: [
        {
          name: 'Menus',
          description: 'Creates the header menu, header features menu, side menu and footer menu, their menu items and icons and assigns them to the appropiate menu locations.',
          selected: true,
          processing: false,
          result: false,
          process: DemoImporter.createMenus,
          reset: DemoImporter.deleteMenus
        },
        {
          name: 'Base Pages',
          description: 'Creates blog page.',
          selected: true,
          processing: false,
          result: false,
          process: DemoImporter.createBasePages,
          reset: DemoImporter.deleteBasePages
        },
        {
          name: 'Elementor Pages',
          description: 'Creates landing page. You will still need to import the page template by editing this page with Elementor, check the <a href="https://odindesignthemes.com/vikingerthemedocs/landing-page/" target="_blank">documentation</a> "Elementor" section for a tutorial on how to import the landing page template with Elementor.',
          selected: true,
          processing: false,
          result: false,
          process: DemoImporter.createElementorPages,
          reset: DemoImporter.deleteElementorPages
        },
        {
          name: 'GamiPress Pages',
          description: 'Creates badges, quests, ranks and credits pages. You will still need to import the badges, quests, ranks and credits data by using the GamiPress Import Tools, check the <a href="https://odindesignthemes.com/vikingerthemedocs/demo-content/" target="_blank">documentation</a> "GamiPress" -> "Demo Content" section for a tutorial on how to import this data.',
          selected: true,
          processing: false,
          result: false,
          process: DemoImporter.createGamiPressPages,
          reset: DemoImporter.deleteGamiPressPages
        },
        {
          name: 'BuddyPress xProfile Groups',
          description: 'Creates buddypress xprofile field groups and their respective fields (like the About and Social Networks fields).',
          selected: true,
          processing: false,
          result: false,
          process: DemoImporter.createBuddyPressProfileFieldGroups,
          reset: DemoImporter.deleteBuddyPressProfileFieldGroups
        }
      ]
    });
  }

  render() {
    return (
      <React.Fragment>
      {
        this.state.loading &&
          <LoaderSpinner />
      }
      {
        !this.state.loading &&
          <React.Fragment>
            <div className="vk-table">
              <div className="vk-table-header-row">
                <div className="vk-table-header-cell">
                </div>

                <div className="vk-table-header-cell">
                  <p className="vk-table-header-cell-text left-aligned">Name</p>
                </div>

                <div className="vk-table-header-cell">
                  <p className="vk-table-header-cell-text left-aligned">Description</p>
                </div>

                <div className="vk-table-header-cell">
                </div>
              </div>

            {
              this.state.demoImportData.map((importData, i) => {
                return (
                  <div key={i} className="vk-table-row">
                    <div className="vk-table-cell">
                      <CheckBox active={importData.selected} toggleActive={() => {this.toggleSelected(i);}} />
                    </div>

                    <div className="vk-table-cell vk-table-cell-span-3">
                      <p className="vk-table-cell-text bold left-aligned">{importData.name}</p>
                    </div>

                    <div className="vk-table-cell">
                      <p className="vk-table-cell-text left-aligned" dangerouslySetInnerHTML={{__html: importData.description}}></p>
                    </div>

                    <div className="vk-table-cell">
                    {
                      importData.processing &&
                        <LoaderSpinnerSmall />
                    }
                    {
                      !importData.processing && importData.result &&
                        <TableItemStatus type={importData.result} />
                    }
                    </div>
                  </div>
                );
              })
            }
            </div>

            <div className="button-actions">
              <div className="button short tertiary" onClick={this.resetImports}>
              {
                this.state.processingReset &&
                  <React.Fragment>
                    {vikinger_translation.processingReset}
                    <LoaderSpinnerSmall />
                  </React.Fragment>
              }
              {
                !this.state.processingReset &&
                  'Reset'
              }
              </div>

              <div className="button short primary" onClick={this.processImports}>
              {
                this.state.processingImport &&
                  <React.Fragment>
                    {vikinger_translation.processingImport}
                    <LoaderSpinnerSmall />
                  </React.Fragment>
              }
              {
                !this.state.processingImport &&
                  'Import'
              }
              </div>
            </div>
          </React.Fragment>
      }
      </React.Fragment>
    );
  }
}

module.exports = DemoImportList;