const React = require('react'),
      ReactDOM = require('react-dom');

const RequiredPluginList = require('../../component/plugin/RequiredPluginList');

const requiredPluginListElement = document.querySelector('#vk-required-plugin-list');

if (requiredPluginListElement) {
  ReactDOM.render(
    <RequiredPluginList />,
    requiredPluginListElement
  );
}