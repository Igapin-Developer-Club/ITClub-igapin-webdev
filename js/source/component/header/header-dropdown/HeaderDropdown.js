import React, { useState, useRef, useEffect } from 'react';

import IconSVG from '../../icon/IconSVG';

function HeaderDropdown(props) {
  const [dropdownIsOpen, setDropdownIsOpen] = useState(false);

  const dropdownContainerRef = useRef(null);

  const toggleDropdown = () => {
    setDropdownIsOpen(previousDropdownIsOpen => {
      return !previousDropdownIsOpen;
    });
  };

  const closeDropdown = (e) => {
    const clickedInsideDropdown = dropdownContainerRef.current.contains(e.target);

    if (!clickedInsideDropdown) {
      setDropdownIsOpen(false);
    }
  };

  useEffect(() => {
    window.addEventListener('click', closeDropdown);

    return () => {
      window.removeEventListener('click', closeDropdown);
    };
  });

  const dropdownBoxStyles = {
    position: 'absolute',
    top: '64px',
    right: '6px',
    transition: 'transform .4s ease-in-out, opacity .4s ease-in-out, visibility .4s ease-in-out',
    opacity: dropdownIsOpen ? 1 : 0,
    visibility: dropdownIsOpen ? 'visible' : 'hidden',
    transform: dropdownIsOpen ? 'translate(0, 0)' : 'translate(0, -40px)',
    pointerEvents: dropdownIsOpen ? 'auto' : 'none'
  };

  return (
    <div className="action-list-item-wrap" tabIndex="0" ref={dropdownContainerRef}>
      {/* DROPDOWN TRIGGER */}
      <div className={`action-list-item ${props.unread ? 'unread' : ''}`} onClick={toggleDropdown}>
        <IconSVG  icon={props.icon}
                  modifiers="action-list-item-icon"
        />
      </div>
      {/* DROPDOWN TRIGGER */}

      {/* DROPDOWN BOX */}
      <div  className="dropdown-box" style={dropdownBoxStyles}>
      { props.children }
      </div>
      {/* DROPDOWN BOX */}
    </div>
  );
}

export { HeaderDropdown as default };