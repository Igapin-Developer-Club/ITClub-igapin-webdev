const React = require('react');

const Table = require('../table/Table'),
      LoaderSpinner = require('../loader/LoaderSpinner'),
      LoaderSpinnerSmall = require('../loader/LoaderSpinnerSmall');

import FormSelect from '../../../component/form/FormSelect';

const MessageBox = require('../message/MessageBox');

import { deepExtend } from '../../../utils/core';

const Pluginner = require('../utils/plugin')();

class RequirePluginList extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      requiredPlugins: [],
      processingPlugin: [],
      selectedPlugin: [],
      loading: true,
      processing: false,
      selectedPreset: 'custom',
      customPresetOptions: [
        'buddypress',
        'bbpress',
        'gamipress',
        'gamipress-buddypress-integration',
        'gamipress-bbpress-integration',
        'woocommerce',
        'elementor',
        'vikinger-buddypress-extension',
        'vkreact',
        'vkreact-buddypress',
        'vkmedia',
        'vikinger-widgets',
        'vikinger-metaboxes'
      ]
    };

    this.pluginPresets = [
      {
        id: 'custom',
        name: 'Custom'
      },
      {
        id: 'bp',
        name: 'Community'
      },
      {
        id: 'bp_gp',
        name: 'Community + Gamification'
      },
      {
        id: 'bp_bbp',
        name: 'Community + Forum'
      },
      {
        id: 'bp_wc',
        name: 'Community + Shop'
      },
      {
        id: 'bp_gp_bbp',
        name: 'Community + Gamification + Forum'
      },
      {
        id: 'bp_gp_wc',
        name: 'Community + Gamification + Shop'
      },
      {
        id: 'bp_bbp_wc',
        name: 'Community + Forum + Shop'
      },
      {
        id: 'bp_gp_bbp_wc',
        name: 'Community + Gamification + Forum + Shop'
      }
    ];

    this.pluginPresetSelectedPlugins = {
      bp: [
        'buddypress',
        'elementor',
        'vikinger-buddypress-extension',
        'vkreact',
        'vkreact-buddypress',
        'vkmedia',
        'vikinger-widgets',
        'vikinger-metaboxes'
      ],
      bp_gp: [
        'buddypress',
        'gamipress',
        'gamipress-buddypress-integration',
        'elementor',
        'vikinger-buddypress-extension',
        'vkreact',
        'vkreact-buddypress',
        'vkmedia',
        'vikinger-widgets',
        'vikinger-metaboxes'
      ],
      bp_bbp: [
        'buddypress',
        'bbpress',
        'elementor',
        'vikinger-buddypress-extension',
        'vkreact',
        'vkreact-buddypress',
        'vkmedia',
        'vikinger-widgets',
        'vikinger-metaboxes'
      ],
      bp_wc: [
        'buddypress',
        'woocommerce',
        'elementor',
        'vikinger-buddypress-extension',
        'vkreact',
        'vkreact-buddypress',
        'vkmedia',
        'vikinger-widgets',
        'vikinger-metaboxes'
      ],
      bp_gp_bbp: [
        'buddypress',
        'bbpress',
        'gamipress',
        'gamipress-buddypress-integration',
        'gamipress-bbpress-integration',
        'elementor',
        'vikinger-buddypress-extension',
        'vkreact',
        'vkreact-buddypress',
        'vkmedia',
        'vikinger-widgets',
        'vikinger-metaboxes'
      ],
      bp_gp_wc: [
        'buddypress',
        'gamipress',
        'gamipress-buddypress-integration',
        'woocommerce',
        'elementor',
        'vikinger-buddypress-extension',
        'vkreact',
        'vkreact-buddypress',
        'vkmedia',
        'vikinger-widgets',
        'vikinger-metaboxes'
      ],
      bp_bbp_wc: [
        'buddypress',
        'bbpress',
        'woocommerce',
        'elementor',
        'vikinger-buddypress-extension',
        'vkreact',
        'vkreact-buddypress',
        'vkmedia',
        'vikinger-widgets',
        'vikinger-metaboxes'
      ],
      bp_gp_bbp_wc: [
        'buddypress',
        'bbpress',
        'gamipress',
        'gamipress-buddypress-integration',
        'gamipress-bbpress-integration',
        'woocommerce',
        'elementor',
        'vikinger-buddypress-extension',
        'vkreact',
        'vkreact-buddypress',
        'vkmedia',
        'vikinger-widgets',
        'vikinger-metaboxes'
      ]
    };

    this.remediateMissingPlugins = this.remediateMissingPlugins.bind(this);

    this.togglePlugin = this.togglePlugin.bind(this);
    this.onPluginPresetChange = this.onPluginPresetChange.bind(this);
  }

  getRequiredPlugins(callback = () => {}) {
    const requiredPluginsPromise = Pluginner.getRequiredPlugins();

    requiredPluginsPromise
    .done((response) => {
      // console.log('REQUIRED PLUGIN LIST - GET REQUIRED PLUGINS RESPONSE: ', response);

      this.setState({
        requiredPlugins: response,
        processingPlugin: (new Array(response.length)).fill(false),
        selectedPlugin: (new Array(response.length)).fill(false)
      }, callback);
    })
    .fail((error) => {
      // console.log('REQUIRED PLUGIN LIST - GET REQUIRED PLUGINS ERROR: ', error);
    });
  }

  togglePlugin(i) {
    // console.log('REQUIRED PLUGIN LIST - TOGGLE PLUGIN: ', i, this.state.requiredPlugins[i]);

    this.setState((state, props) => {
      const selectedPlugin = state.selectedPlugin.slice();

      selectedPlugin[i] = !selectedPlugin[i];

      return {
        selectedPlugin: selectedPlugin
      };
    }, () => {
      if (this.state.selectedPreset === 'custom') {
        this.saveCustomPresetOptions();
      }
    });
  }

  selectPresetPlugins(presetPlugins) {
    this.setState((state, props) => {
      const selectedPlugin = state.selectedPlugin.slice();

      for (let i = 0; i < state.requiredPlugins.length; i++) {
        const plugin = state.requiredPlugins[i];

        if (presetPlugins.includes(plugin.plugin_name)) {
          selectedPlugin[i] = true;
        } else {
          selectedPlugin[i] = false;
        }
      }
      
      return {
        selectedPlugin: selectedPlugin,
        loading: false
      };
    });
  }

  onPluginPresetChange(id) {
    // console.log('REQUIRED PLUGIN LIST - ON PLUGIN PRESET CHANGE: ', id);

    this.setState({
      selectedPreset: id
    }, this.saveSelectedPreset);

    const presetPlugins = id === 'custom' ? this.state.customPresetOptions : this.pluginPresetSelectedPlugins[id];

    this.selectPresetPlugins(presetPlugins);
  }

  remediatePlugin(plugins, i, callback = () => {}) {
    const plugin = plugins[i];

    // console.log('REQUIRED PLUGIN LIST - REMEDIATE PLUGIN: ', plugin, i);
    
    // if plugin not installed, updated or active
    if (this.state.selectedPlugin[i] && (!plugin.installed || !plugin.updated || !plugin.active)) {
      // show processing plugin loader
      this.setState((state, props) => {
        const processingPlugin = state.processingPlugin.slice();

        processingPlugin[i] = true;

        return {
          processingPlugin: processingPlugin
        };
      });

      // plugin not installed, install and activate it
      if (!plugin.installed) {
        // console.log('REQUIRED PLUGIN LIST - PLUGIN NOT INSTALLED: ', plugin, i);

        const installPluginPromise = Pluginner.installAndActivatePlugin(plugin.plugin_name);

        installPluginPromise
        .done((response) => {
          // console.log('REQUIRED PLUGIN LIST - INSTALL PLUGIN RESPONSE: ', response);

          if (response) {
            this.setState((state, props) => {
              const newRequiredPlugins = [];

              deepExtend(newRequiredPlugins, state.requiredPlugins);

              for (const requiredPlugin of newRequiredPlugins) {
                if (requiredPlugin.slug === plugin.slug) {
                  requiredPlugin.current_version = requiredPlugin.latest_version;
                  requiredPlugin.installed = true;
                  requiredPlugin.updated = true;
                  requiredPlugin.active = true;
                }
              }

              // console.log('REQUIRED PLUGIN LIST - NEW REQUIRED PLUGINS: ', newRequiredPlugins);

              return {
                requiredPlugins: newRequiredPlugins
              };
            });
          }
        })
        .always(() => {
          // done processing
          this.setState((state, props) => {
            const processingPlugin = state.processingPlugin.slice();

            processingPlugin[i] = false;

            // console.log('REQUIRED PLUGIN LIST - INSTALL PLUGIN DONE PROCESSING: ', plugin, i);

            return {
              processingPlugin: processingPlugin
            };
          });

          // process next
          if (i < plugins.length - 1) {
            this.remediatePlugin(plugins, i + 1, callback)
          } else {
          // finish processing
            callback();
          }
        });

      } else if (!plugin.updated) {
      // plugin not updated, update and activate it
        // console.log('REQUIRED PLUGIN LIST - PLUGIN NOT UPDATED: ', plugin, i);

        const updatePluginPromise = Pluginner.updateAndActivatePlugin(plugin.plugin_name);

        updatePluginPromise
        .done((response) => {
          // console.log('REQUIRED PLUGIN LIST - UPDATE PLUGIN RESPONSE: ', response);

          if (response) {
            this.setState((state, props) => {
              const newRequiredPlugins = [];

              deepExtend(newRequiredPlugins, state.requiredPlugins);

              for (const requiredPlugin of newRequiredPlugins) {
                if (requiredPlugin.slug === plugin.slug) {
                  requiredPlugin.current_version = requiredPlugin.latest_version;
                  requiredPlugin.updated = true;
                  requiredPlugin.active = true;
                }
              }

              // console.log('REQUIRED PLUGIN LIST - NEW REQUIRED PLUGINS: ', newRequiredPlugins);

              return {
                requiredPlugins: newRequiredPlugins
              };
            });
          }
        })
        .always(() => {
          // done processing
          this.setState((state, props) => {
            const processingPlugin = state.processingPlugin.slice();

            processingPlugin[i] = false;

            // console.log('REQUIRED PLUGIN LIST - UPDATE PLUGIN DONE PROCESSING: ', plugin, i);

            return {
              processingPlugin: processingPlugin
            };
          });

          // process next
          if (i < plugins.length - 1) {
            this.remediatePlugin(plugins, i + 1, callback)
          } else {
          // finish processing
            callback();
          }
        });
      } else if (!plugin.active) {
      // plugin not active, activate it
        // console.log('REQUIRED PLUGIN LIST - PLUGIN NOT ACTIVE: ', plugin, i);

        const activatePluginPromise = Pluginner.activatePlugin(plugin.slug);

        activatePluginPromise
        .done((response) => {
          // console.log('REQUIRED PLUGIN LIST - ACTIVATE PLUGIN RESPONSE: ', response);

          if (response) {
            this.setState((state, props) => {
              const newRequiredPlugins = [];

              deepExtend(newRequiredPlugins, state.requiredPlugins);

              for (const requiredPlugin of newRequiredPlugins) {
                if (requiredPlugin.slug === plugin.slug) {
                  requiredPlugin.active = true;
                }
              }

              // console.log('REQUIRED PLUGIN LIST - NEW REQUIRED PLUGINS: ', newRequiredPlugins);

              return {
                requiredPlugins: newRequiredPlugins
              };
            });
          }
        })
        .always(() => {
          // done processing
          this.setState((state, props) => {
            const processingPlugin = state.processingPlugin.slice();

            processingPlugin[i] = false;

            // console.log('REQUIRED PLUGIN LIST - ACTIVATE PLUGIN DONE PROCESSING: ', plugin, i);

            return {
              processingPlugin: processingPlugin
            };
          });

          // process next
          if (i < plugins.length - 1) {
            this.remediatePlugin(plugins, i + 1, callback)
          } else {
          // finish processing
            callback();
          }
        });
      }
    } else {
    // plugin installed, updated and active
      // process next
      if (i < plugins.length - 1) {
        this.remediatePlugin(plugins, i + 1, callback);
      } else {
      // finish processing
        callback();
      }
    }
  }

  remediatePlugins(plugins, callback = () => {}) {
    this.remediatePlugin(plugins, 0, callback);
  }

  remediateMissingPlugins() {
    // if already processing, return
    if (this.state.processing) {
      return;
    }

    this.setState({
      processing: true
    });

    const requiredPlugins = this.state.requiredPlugins.slice();

    // process plugins sequentially, one by one
    this.remediatePlugins(requiredPlugins, () => {
      // console.log('REQUIRED PLUGIN LIST - REMEDIATE PLUGINS CALLBACK');

      window.location.reload();
    });
  }

  requiredPluginMissing() {
    return this.state.requiredPlugins.some((requiredPlugin, i) => {
      return this.state.selectedPlugin[i] && (!requiredPlugin.installed || !requiredPlugin.updated || !requiredPlugin.active);
    });
  }

  getSelectedPreset() {
    const getSelectedPresetPromise = Pluginner.getSelectedPreset();

    getSelectedPresetPromise
    .done((response) => {
      // console.log('REQUIRED PLUGIN LIST - GET SELECTED PRESET RESPONSE: ', response);

      this.onPluginPresetChange(response);
    })
    .fail((error) => {
      // console.log('REQUIRED PLUGIN LIST - GET SELECTED PRESET ERROR: ', error);
    });
  }

  saveSelectedPreset() {
    const saveSelectedPreset = Pluginner.saveSelectedPreset(this.state.selectedPreset);

    saveSelectedPreset
    .done((response) => {
      // console.log('REQUIRED PLUGIN LIST - SAVE SELECTED PRESET RESPONSE: ', response);
    })
    .fail((error) => {
      // console.log('REQUIRED PLUGIN LIST - SAVE SELECTED PRESET ERROR: ', error);
    });
  }

  getCustomPresetOptions() {
    const getCustomPresetPlugins = Pluginner.getCustomPresetPlugins();

    getCustomPresetPlugins
    .done((response) => {
      // console.log('REQUIRED PLUGIN LIST - GET CUSTOM PRESET PLUGINS RESPONSE: ', response);

      if (response) {
        this.setState({
          customPresetOptions: response
        });
      }

    })
    .fail((error) => {
      // console.log('REQUIRED PLUGIN LIST - GET CUSTOM PRESET PLUGINS ERROR: ', error);
    });
  }

  saveCustomPresetOptions() {
    const customPresetOptions = [];

    for (let i = 0; i < this.state.selectedPlugin.length; i++) {
      const selectedPlugin = this.state.selectedPlugin[i];

      if (selectedPlugin) {
        customPresetOptions.push(this.state.requiredPlugins[i].plugin_name);
      }
    }

    const customPresetOptionsFlat = customPresetOptions.join(',');

    // console.log('REQUIRED PLUGIN LIST - SAVE CUSTOM PRESET OPTIONS: ', customPresetOptions, customPresetOptionsFlat);

    const saveCustomPresetPlugins = Pluginner.saveCustomPresetPlugins(customPresetOptionsFlat);

    saveCustomPresetPlugins
    .done((response) => {
      // console.log('REQUIRED PLUGIN LIST - SAVE CUSTOM PRESET PLUGINS RESPONSE: ', response);
    })
    .fail((error) => {
      // console.log('REQUIRED PLUGIN LIST - SAVE CUSTOM PRESET PLUGINS ERROR: ', error);
    });
  }

  componentDidMount() {
    this.getCustomPresetOptions();

    this.getRequiredPlugins(this.getSelectedPreset);
  }

  render() {
    const rowData = [];

    for (let i = 0; i < this.state.requiredPlugins.length; i++) {
      const plugin = this.state.requiredPlugins[i];

      rowData.push(
        [
          {
            text: plugin.name
          },
          {
            text: this.state.selectedPlugin[i] && plugin.installed && plugin.active ? plugin.current_version : '-'
          },
          {
            text: this.state.selectedPlugin[i] ? plugin.latest_version : '-'
          }
        ]
      );
    }

    const messageBox = {
      title: 'Everything is OK!',
      text: 'All required plugins are installed, updated and activated!',
      type: 'success'
    };

    if (this.requiredPluginMissing()) {
      messageBox.title = 'Something is wrong!';
      messageBox.text = 'Some plugins need to be installed, updated or activated! Please install, update or activate them manually or by using the button below!';
      messageBox.type = 'error';
    }

    return (
      <React.Fragment>
      {
        this.state.loading &&
          <LoaderSpinner />
      }
      {
        !this.state.loading &&
          <React.Fragment>
            <p className="section-subtitle">Setup Status</p>

            <MessageBox title={messageBox.title}
                        text={messageBox.text}
                        type={messageBox.type}
            />

            <FormSelect name='Choose a preset'
                        value={this.state.selectedPreset}
                        options={this.pluginPresets}
                        onChange={this.onPluginPresetChange}
            />

            <Table  headerData={[{text: ''}, {text: 'Plugin'}, {text: 'Installed Version'}, {text: 'Latest Version'}]}
                    rowData={rowData}
                    pluginsData={this.state.requiredPlugins}
                    processingPlugin={this.state.processingPlugin}
                    selectedPlugin={this.state.selectedPlugin}
                    togglePlugin={this.togglePlugin}
                    selectablePlugin={this.state.selectedPreset === 'custom'}
            />

          {
            this.requiredPluginMissing() &&
              <div className="button short primary" onClick={this.remediateMissingPlugins}>
              {
                this.state.processing &&
                  <React.Fragment>
                    {vikinger_translation.processing}
                    <LoaderSpinnerSmall />
                  </React.Fragment>
              }
              {
                !this.state.processing &&
                  vikinger_translation.required_plugins_install_button_text
              }
              </div>
          }

          {
            !this.requiredPluginMissing() && this.state.processing &&
              <div className="button short primary">
                {vikinger_translation.processing}
                <LoaderSpinnerSmall />
              </div>
          }
          </React.Fragment>
      }
      </React.Fragment>
    );
  }
}

module.exports = RequirePluginList;