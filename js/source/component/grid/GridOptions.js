import React from 'react';

import GridOption from './GridOption';

function GridOptions(props) {
  const renderedGridOptions = props.gridTypes.map((gridType) => {
    return (
      <GridOption key={gridType}
                  type={gridType}
                  active={props.activeGrid === gridType}
                  onClick={() => {props.onGridOptionClick(gridType);}}
      />
    );
  });

  return (
    <div className="view-actions">
    { renderedGridOptions }
    </div>
  );
}

export { GridOptions as default };