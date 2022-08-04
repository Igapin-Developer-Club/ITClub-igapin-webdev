import React from 'react';

import PictureCollageRow from './PictureCollageRow';

function PictureCollage(props) {
  const collageRows = [];

  if ((props.data.length % 2) === 0) {
    const rowCount = props.data.length / 2;

    for (let i = 0; i < rowCount; i++) {
      collageRows.push({
        data: props.data.slice(i * 2, (i * 2) + 2),
        modifier: 'medium'
      });
    }
  } else {
    if (props.data.length === 3) {
      collageRows.push({
        data: props.data
      });
    } else {
      if (props.data.length === 5) {
        // if more data, add more information to last item
        if (props.metadata) {
          props.data[props.data.length - 1].media.more = props.metadata.more;
          props.data[props.data.length - 1].media.more_link = props.metadata.more_link;
        }

        collageRows.push({
          data: props.data.slice(0, 2),
          modifier: 'medium'
        });

        collageRows.push({
          data: props.data.slice(2)
        });
      }
    }
  }

  return (
    <div className="picture-collage">
      {
        collageRows.map((row, i) => {
          return (
            <PictureCollageRow  key={i}
                                data={row.data}
                                modifiers={row.modifier || ''}
                                user={props.user}
                                reactions={props.reactions}
                                noPopup={props.noPopup}
                                onActivityUpdate={props.onActivityUpdate}
            />
          );
        })
      }
    </div>
  );
}

export { PictureCollage as default };