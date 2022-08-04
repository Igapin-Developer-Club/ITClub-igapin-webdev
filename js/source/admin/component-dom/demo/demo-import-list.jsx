const React = require('react'),
      ReactDOM = require('react-dom');

const DemoImportList = require('../../component/demo/DemoImportList');

const demoImportListElement = document.querySelector('#vk-demo-import-list');

if (demoImportListElement) {
  ReactDOM.render(
    <DemoImportList />,
    demoImportListElement
  );
}