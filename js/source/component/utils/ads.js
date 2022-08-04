import React from 'react';

const getAdsForPlacementIndex = (ads, placement, index) => {
  if (ads && ads[placement] && (ads[placement].length > 0)) {
    const adsForPlacement = ads[placement].map((ad) => {
      if ((ad.index === (index + 1)) || (ad.repeat && (((index + 1) % ad.index) === 0))) {
        return (
          <div className="animate-slide-down" key={ad.name} dangerouslySetInnerHTML={{__html: ad.html}}></div>
        );
      }
    });

    if (adsForPlacement.length > 0) {
      return adsForPlacement;
    }
  }

  return false;
};

export {
  getAdsForPlacementIndex
};