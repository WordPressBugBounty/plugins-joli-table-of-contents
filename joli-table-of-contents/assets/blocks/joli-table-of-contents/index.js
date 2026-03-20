/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/blocks/joli-table-of-contents/JoliCheckboxes.jsx"
/*!**************************************************************!*\
  !*** ./src/blocks/joli-table-of-contents/JoliCheckboxes.jsx ***!
  \**************************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__);




const JoliCheckboxes = ({
  label,
  value,
  options,
  onChange
}) => {
  // console.log(typeof value, value);
  const propValue = typeof value === 'string' ? value : "";
  // console.log(propValue);
  const [activeOptions, setActiveOptions] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)(propValue.split(','));
  // const [activeOptions, setActiveOptions] = useState( value );

  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useEffect)(() => {
    const newValue = activeOptions.join(',');
    onChange(newValue);
  }, [activeOptions]);
  const setChecked = (checked, value) => {
    let active = [...activeOptions];
    if (checked == true && active.indexOf(value) === -1) {
      active.push(value);
    } else {
      const index = active.indexOf(value);
      if (index > -1) {
        // only splice array when item is found
        active.splice(index, 1); // 2nd parameter means remove one item only
      }
    }
    active = active.sort().filter(value => value !== "");

    // console.log( active );
    setActiveOptions(active);
  };
  const checkBoxList = (() => {
    return options.map(element => {
      const isChecked = activeOptions.some(active => active == element.value);
      return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.CheckboxControl, {
        label: element.label,
        "data-value": element.value
        // help="Is the user a author or not?"
        ,
        checked: isChecked,
        onChange: checked => setChecked(checked, element.value)
      }, element.value);
    });
  })();
  const reset = () => {
    onChange(-1);
    setActiveOptions([]);
  };
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.BaseControl, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
      className: "wpj-jtoc--label-container",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("label", {
        children: label
      })
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
      className: "wpj-jtoc--joli-checkboxes-control",
      children: checkBoxList
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
      isSmall: true,
      variant: value !== 0 && value !== 1 ? 'link' : 'tertiary'
      // variant="link"
      ,
      onClick: () => reset(),
      children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Inherit from settings', 'joli-table-of-contents')
    })]
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (JoliCheckboxes);

/***/ },

/***/ "./src/blocks/joli-table-of-contents/JoliColorPicker.js"
/*!**************************************************************!*\
  !*** ./src/blocks/joli-table-of-contents/JoliColorPicker.js ***!
  \**************************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__);



const JoliColorPicker = ({
  label,
  value,
  onChange
}) => {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.BaseControl, {
    className: "wpj-jtoc--color-picker-control",
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
      className: "wpj-jtoc--label-container",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("label", {
        children: label
      })
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.ColorPalette
    // colors={colors}
    , {
      className: "wpj-jtoc--color-picker",
      value: value,
      onChange: val => onChange(val),
      clearable: typeof value !== 'undefined',
      enableAlpha: true
    }), typeof value !== 'undefined' && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
      style: {
        overflow: 'auto'
      },
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
        style: {
          "float": "right"
        },
        isSmall: true,
        variant: 'link'
        // variant="link"
        ,
        onClick: () => onChange(),
        children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Clear', 'joli-table-of-contents')
      })
    })]
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (JoliColorPicker);

/***/ },

/***/ "./src/blocks/joli-table-of-contents/JoliDimensionsControl.jsx"
/*!*********************************************************************!*\
  !*** ./src/blocks/joli-table-of-contents/JoliDimensionsControl.jsx ***!
  \*********************************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__);




const JoliDimensionsControl = ({
  label,
  value,
  units,
  dimensions,
  onChange
}) => {
  const unitsList = [{
    label: 'px',
    value: 'px'
  }, {
    label: 'em',
    value: 'em'
  }, {
    label: '%',
    value: 'percent'
  }];
  // const [combinedValue, setCombinedValue] = useState( value );

  const valueDim = value && value !== -1 ? value.dim : [];
  const valueUnit = value && value !== -1 ? value.unit : 'px';

  // const [numVal, setNumVal] = useState( valueDim );
  const [dimVal, setDimVal] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)(valueDim);
  const [unitVal, setUnitVal] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)(valueUnit);
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useEffect)(() => {
    const finalValue = {
      dim: dimVal,
      unit: unitVal
    };
    // console.log( finalValue );

    onChange(finalValue);
    // if ( typeof value !== 'undefined' && value !== null && value.indexOf( '|' ) !== -1 && value.indexOf( 'undefined' ) === -1 ) {
    //     const valuePair = value.split( '|' );

    //     if ( valuePair.length === 2 ) {
    //         const numericValue = ( valuePair[0] );
    //         const unitValue = valuePair[1];

    //         if ( !isNaN( numericValue ) ) {
    //             setNumVal( numericValue );
    //         }

    //         if ( unitsList.findIndex( element => element.value === unitValue ) !== -1 ) {
    //             setUnitVal( unitValue );
    //         }
    //     }
    // } else {
    //     setNumVal( [] );
    //     setUnitVal( 'px' );
    // }
  }, [dimVal, unitVal]);

  // setCombinedValue();

  // useEffect(() => {

  //     const finalValue = numVal + '|' + unitVal;
  //     console.log('final', finalValue);
  //     onChange(finalValue);

  // }, [numVal, unitVal]);

  const onChangeNumericValue = (e, dimension) => {
    // console.log( e, dimension );
    let currentVal = {
      ...dimVal
    };
    const val = e.target.value;
    if (val !== '') {
      currentVal[dimension] = parseFloat(val);
    }
    setDimVal(currentVal);
    // setCombinedValue(finalValue);
    // onChange(finalValue);

    // const finalValue = currentVal + '|' + unitVal;
    // onChange( finalValue );
  };
  const onChangeUnitValue = val => {
    setUnitVal(val);
    // setCombinedValue(finalValue);
    // onChange(finalValue);

    // const finalValue = {
    //     dim: dimVal,
    //     unit: val,
    // };

    // onChange( finalValue );
  };
  const onKeyPress = e => {
    const allowedKeys = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.', 'Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Enter'];
    if (allowedKeys.findIndex(element => element === e.key) === -1) {
      e.preventDefault();
      return false;
    }
  };
  const reset = () => {
    setDimVal([]);
    // onChange( null );
  };
  const dimensionList = (() => {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("ul", {
      children: dimensions.map(dimension => {
        // const isChecked = activeOptions.some( active => active == element.value );

        const value = valueDim.hasOwnProperty(dimension.value) ? valueDim[dimension.value] : "";
        // console.log( value );
        return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("li", {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("input", {
            type: "number",
            value: value,
            onChange: e => onChangeNumericValue(e, dimension.value)
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("span", {
            className: "unit-type",
            children: dimension.label
          })]
        });
      })
    });
  })();
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.BaseControl, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
      className: "wpj-jtoc--label-container",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("label", {
        children: label
      })
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
      className: "joli-dimensions-control-container",
      children: [dimensionList, /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SelectControl, {
        value: unitVal,
        options: unitsList,
        onChange: val => onChangeUnitValue(val)
      })]
    }), dimVal !== [] && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
      style: {
        overflow: 'auto'
      },
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
        isSmall: true,
        variant: 'secondary'
        // variant="link"
        ,
        style: {
          float: 'right'
        },
        onClick: () => reset(),
        children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Clear', 'joli-table-of-contents')
      })
    })]
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (JoliDimensionsControl);

/***/ },

/***/ "./src/blocks/joli-table-of-contents/JoliEditableListItem.jsx"
/*!********************************************************************!*\
  !*** ./src/blocks/joli-table-of-contents/JoliEditableListItem.jsx ***!
  \********************************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__);



const JoliEditableListItem = ({
  value,
  element,
  showInput,
  handleDoubleClick,
  handleChange,
  handleBlur
}) => {
  const handleKeyUp = e => {
    // console.log(e);
    if (e.code === 'Enter') {
      handleBlur(e);
    }
  };
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
    className: "list-item-content",
    children: showInput ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("span", {
      className: "list-item-override-input",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.TextControl, {
        value: value,
        onChange: value => handleChange(value),
        onBlur: e => handleBlur(e),
        onKeyUp: e => handleKeyUp(e),
        autoFocus: true
      })
    }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("span", {
      className: "list-item-title",
      onDoubleClick: () => handleDoubleClick(),
      children: value
    })
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (JoliEditableListItem);

/***/ },

/***/ "./src/blocks/joli-table-of-contents/JoliFaqToggleIcon.js"
/*!****************************************************************!*\
  !*** ./src/blocks/joli-table-of-contents/JoliFaqToggleIcon.js ***!
  \****************************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__);


const JoliFaqToggleIcon = ({
  iconClass
}) => {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_0__.Icon, {
    icon: () => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
      className: "jtoc-wrap",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
        className: "jtoc--group --jtoc-theme-x " + iconClass,
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
          className: "jtoc--toggle-wrap",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
            className: "jtoc--toggle"
          })
        })
      })
    })
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (JoliFaqToggleIcon);

/***/ },

/***/ "./src/blocks/joli-table-of-contents/JoliOptionToggle.js"
/*!***************************************************************!*\
  !*** ./src/blocks/joli-table-of-contents/JoliOptionToggle.js ***!
  \***************************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__);



const JoliOptionToggle = ({
  label,
  value,
  onChange
}) => {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.BaseControl, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("div", {
      className: "wpj-jtoc--label-container",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("label", {
        children: label
      })
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.ButtonGroup, {
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
        isSmall: true,
        variant: value == 1 ? 'primary' : 'secondary',
        onClick: () => onChange(1),
        children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Yes', 'joli-table-of-contents')
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
        isSmall: true,
        variant: value == 0 ? 'primary' : 'secondary',
        onClick: () => onChange(0),
        children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('No', 'joli-table-of-contents')
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
      isSmall: true,
      variant: value !== 0 && value !== 1 ? 'link' : 'tertiary'
      // variant="link"
      ,
      onClick: () => onChange(-1),
      children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Inherit from settings', 'joli-table-of-contents')
    })]
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (JoliOptionToggle);

/***/ },

/***/ "./src/blocks/joli-table-of-contents/JoliToggleIconRadio.js"
/*!******************************************************************!*\
  !*** ./src/blocks/joli-table-of-contents/JoliToggleIconRadio.js ***!
  \******************************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _JoliFaqToggleIcon__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./JoliFaqToggleIcon */ "./src/blocks/joli-table-of-contents/JoliFaqToggleIcon.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__);




const iconToggle1 = () => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_JoliFaqToggleIcon__WEBPACK_IMPORTED_MODULE_2__["default"], {
  iconClass: "--jtoc-toggle-1"
});
const iconToggle2 = () => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_JoliFaqToggleIcon__WEBPACK_IMPORTED_MODULE_2__["default"], {
  iconClass: "--jtoc-toggle-2"
});
const iconToggle3 = () => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_JoliFaqToggleIcon__WEBPACK_IMPORTED_MODULE_2__["default"], {
  iconClass: "--jtoc-toggle-3"
});
const iconToggle4 = () => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_JoliFaqToggleIcon__WEBPACK_IMPORTED_MODULE_2__["default"], {
  iconClass: "--jtoc-toggle-4"
});
const JoliToggleIconRadio = ({
  label,
  value,
  onChange
}) => {
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.BaseControl, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
      className: "wpj-jtoc--label-container",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("label", {
        children: label
      })
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.ButtonGroup, {
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
        icon: iconToggle1,
        variant: value == 'toggle-1' ? 'primary' : 'secondary',
        onClick: () => onChange('toggle-1')
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
        icon: iconToggle2,
        variant: value == 'toggle-2' ? 'primary' : 'secondary',
        onClick: () => onChange('toggle-2')
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
        icon: iconToggle3,
        variant: value == 'toggle-3' ? 'primary' : 'secondary',
        onClick: () => onChange('toggle-3')
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
        icon: iconToggle4,
        variant: value == 'toggle-4' ? 'primary' : 'secondary',
        onClick: () => onChange('toggle-4')
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button
    // isSmall
    , {
      variant: value !== -1 ? 'tertiary' : 'link'
      // variant="link"
      ,
      onClick: () => onChange(-1),
      children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Inherit from settings', 'joli-table-of-contents')
    })]
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (JoliToggleIconRadio);

/***/ },

/***/ "./src/blocks/joli-table-of-contents/JoliUnitControl.js"
/*!**************************************************************!*\
  !*** ./src/blocks/joli-table-of-contents/JoliUnitControl.js ***!
  \**************************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__);




const JoliUnitControl = ({
  label,
  value,
  onChange
}) => {
  const units = [{
    label: 'px',
    value: 'px'
  }, {
    label: 'em',
    value: 'em'
  }, {
    label: '%',
    value: 'percent'
  }];
  // const [combinedValue, setCombinedValue] = useState( value );

  const [numVal, setNumVal] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)(null);
  const [unitVal, setUnitVal] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)('px');
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useEffect)(() => {
    if (typeof value !== 'undefined' && value !== null && value.indexOf('|') !== -1 && value.indexOf('undefined') === -1) {
      const valuePair = value.split('|');
      if (valuePair.length === 2) {
        const numericValue = valuePair[0];
        const unitValue = valuePair[1];
        if (!isNaN(numericValue)) {
          setNumVal(numericValue);
        }
        if (units.findIndex(element => element.value === unitValue) !== -1) {
          setUnitVal(unitValue);
        }
      }
    } else {
      setNumVal(null);
      setUnitVal('px');
    }
  }, [numVal, unitVal]);

  // setCombinedValue();

  // useEffect(() => {

  //     const finalValue = numVal + '|' + unitVal;
  //     console.log('final', finalValue);
  //     onChange(finalValue);

  // }, [numVal, unitVal]);

  const onChangeNumericValue = val => {
    let currentVal = null;
    if (val !== '') {
      currentVal = val;
    }
    setNumVal(currentVal);
    // setCombinedValue(finalValue);
    // onChange(finalValue);

    const finalValue = currentVal + '|' + unitVal;
    onChange(finalValue);
  };
  const onChangeUnitValue = val => {
    setUnitVal(val);
    // setCombinedValue(finalValue);
    // onChange(finalValue);

    const finalValue = numVal + '|' + val;
    onChange(finalValue);
  };
  const onKeyPress = e => {
    const allowedKeys = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.', 'Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Enter'];
    if (allowedKeys.findIndex(element => element === e.key) === -1) {
      e.preventDefault();
      return false;
    }
  };
  const reset = () => {
    setNumVal('');
    onChange(null);
  };
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.BaseControl, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
      className: "wpj-jtoc--label-container",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("label", {
        children: label
      })
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
      className: "joli-unit-control-container",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.TextControl
      // label={label}
      , {
        value: numVal,
        placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('10px / 1.5em / 45%...', 'joli-table-of-contents'),
        onChange: val => onChangeNumericValue(val),
        type: "text",
        onKeyDown: onKeyPress
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.SelectControl, {
        value: unitVal,
        options: units,
        onChange: val => onChangeUnitValue(val)
      })]
    }), numVal !== null && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
      isSmall: true,
      variant: 'secondary'
      // variant="link"
      ,
      style: {
        float: 'right'
      },
      onClick: () => reset(),
      children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Clear', 'joli-table-of-contents')
    })]
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (JoliUnitControl);

/***/ },

/***/ "./src/blocks/joli-table-of-contents/edit.js"
/*!***************************************************!*\
  !*** ./src/blocks/joli-table-of-contents/edit.js ***!
  \***************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/api-fetch */ "@wordpress/api-fetch");
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./editor.scss */ "./src/blocks/joli-table-of-contents/editor.scss");
/* harmony import */ var _JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./JoliColorPicker */ "./src/blocks/joli-table-of-contents/JoliColorPicker.js");
/* harmony import */ var _JoliToggleIconRadio__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./JoliToggleIconRadio */ "./src/blocks/joli-table-of-contents/JoliToggleIconRadio.js");
/* harmony import */ var _JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./JoliUnitControl */ "./src/blocks/joli-table-of-contents/JoliUnitControl.js");
/* harmony import */ var _JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./JoliOptionToggle */ "./src/blocks/joli-table-of-contents/JoliOptionToggle.js");
/* harmony import */ var _JoliEditableListItem__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./JoliEditableListItem */ "./src/blocks/joli-table-of-contents/JoliEditableListItem.jsx");
/* harmony import */ var _JoliCheckboxes__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./JoliCheckboxes */ "./src/blocks/joli-table-of-contents/JoliCheckboxes.jsx");
/* harmony import */ var _JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./JoliDimensionsControl */ "./src/blocks/joli-table-of-contents/JoliDimensionsControl.jsx");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__);
/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */


/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */






/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */









//Licensing
// var can = false;
// var joliWrapClass = "jtoc-control-wrapper";
// if ( typeof jtoc_data !== 'undefined' && jtoc_data.hasOwnProperty( 'can' ) && jtoc_data.can !== false ) {
// 	can = true;
// 	joliWrapClass += " --jtoc-can";
// }

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */

function Edit({
  attributes,
  setAttributes
}) {
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useBlockProps)();
  const tocIsSticky = attributes.toc_is_sticky || false;
  const hiddenItems = attributes.hidden_headings || [];
  const editedItems = attributes.edited_headings || {};
  const [isFetching, setIsFetching] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_3__.useState)(false);
  const [headings, setHeadings] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_3__.useState)([]);
  const [editingElement, setEditingElement] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_3__.useState)(null);
  const [headingsHash, setHeadingsHash] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_3__.useState)(null);
  // const [canUpdate, setCanUpdate] = useState( true );
  const toggleOption = [{
    label: "Inherit",
    value: -1
  }, {
    label: "Yes",
    value: 1
  }, {
    label: "No",
    value: 0
  }];
  const {
    toc_width_incontent,
    toc_min_width,
    toc_max_width,
    hierarchy_offset,
    min_headings,
    max_headings,
    toc_is_sticky,
    animate_on_fold,
    smooth_scroll,
    headings_full_row_clickable,
    headings_overflow,
    jump_to_offset,
    jump_to_offset_mobile,
    fold_on_load,
    fold_if_headings_count,
    hide_main_toc,
    show_header,
    toc_title,
    toc_title_alignment,
    header_as_toggle,
    show_toggle,
    toggle_position,
    toggle_type,
    toggle_button_icon,
    toggle_button_text_closed,
    toggle_button_text_opened,
    toggle_button_icon_closed,
    toggle_button_icon_opened,
    numeration_type,
    numeration_display,
    numeration_separator,
    numeration_suffix,
    columns_mode,
    columns_min_headings,
    columns_breakpoint,
    headings_depth,
    skip_h_by_text,
    skip_h_by_class,
    skip_h_by_ascending_class,
    hash_format,
    hash_counter_prefix,
    activate_dynamic_unfold,
    activate_auto_insert,
    position_auto,
    auto_insert_post_types,
    inclusion_post_title,
    inclusion_post_id,
    exclusion_post_title,
    exclusion_post_id,
    widget_support_post_types,
    theme,
    preserve_theme_styles,
    toc_margin,
    toc_padding,
    toc_border_radius,
    toc_border,
    toc_border_color,
    toc_background_color,
    toc_shadow,
    toc_shadow_color,
    toc_header_height,
    toc_header_margin,
    toc_header_padding,
    toc_header_background_color,
    toc_title_color,
    toc_title_font_size,
    toc_title_font_weight,
    toc_toggle_color,
    toc_body_margin,
    toc_body_padding,
    toc_body_background_color,
    headings_group_background_color,
    headings_margin,
    headings_padding,
    headings_border_radius,
    headings_font_size,
    headings_height,
    headings_color,
    headings_color_hover,
    headings_color_active,
    headings_line_height,
    headings_background_color,
    headings_background_color_hover,
    headings_background_color_active,
    headings_link_margin,
    headings_link_padding,
    headings_link_font_size,
    headings_link_font_weight,
    headings_link_height,
    headings_link_color,
    headings_link_color_hover,
    headings_link_color_active,
    headings_link_background_color,
    headings_link_background_color_hover,
    headings_link_background_color_active,
    numeration_color,
    numeration_color_hover,
    numeration_color_active,
    columns_separator_style,
    columns_separator_width,
    columns_separator_color,
    css_code,
    activate_floating_table_of_contents,
    floating_widget_height,
    floating_hide_numeration,
    floating_nav_buttons,
    floating_nav_buttons_position,
    floating_nav_buttons_width,
    expands_on,
    collapses_on,
    floating_position,
    floating_show_header,
    floating_offset_y,
    floating_offset_y_mobile,
    floating_offset_x,
    floating_widget_background_color,
    floating_widget_current_heading_padding,
    floating_compatibility_mode,
    floating_widget_color,
    floating_widget_font_size,
    floating_widget_font_weight,
    floating_widget_nav_color,
    floating_toc_shadow,
    floating_toc_shadow_color,
    floating_widget_border_radius,
    activate_slide_out_table_of_contents,
    slide_out_open_on_load,
    slide_out_auto_close,
    slide_out_hide_header,
    slide_out_width,
    slide_out_mode,
    slide_out_position,
    slide_out_toggle_position,
    slide_out_toggle_width,
    slide_out_toggle_offset_y,
    slide_out_toggle_button_icon,
    slide_out_padding,
    slide_out_background_color,
    slide_out_toggle_color,
    slide_out_toggle_background_color,
    activate_progress_bar,
    progress_bar_position,
    progress_bar_offset_y,
    progress_bar_offset_y_mobile,
    progress_bar_thickness,
    progress_bar_color,
    progress_bar_background_color
  } = attributes;
  const hasValue = vars => {
    if (!vars.length) {
      return false;
    }
    for (const element of vars) {
      if (typeof element !== 'undefined' && element !== null && parseInt(element) !== -1) {
        return true;
      }
    }
    return false;
  };
  const hasValueGeneralAppearance = hasValue([toc_width_incontent, toc_min_width, toc_max_width]);
  const hasValueGeneralTableofcontents = hasValue([hierarchy_offset, min_headings, max_headings, toc_is_sticky, animate_on_fold, smooth_scroll, headings_full_row_clickable, headings_overflow, jump_to_offset, jump_to_offset_mobile, fold_on_load, fold_if_headings_count, hide_main_toc]);
  const hasValueGeneralTableofcontentsheader = hasValue([show_header, toc_title, toc_title_alignment, header_as_toggle]);
  const hasValueGeneralTableofcontentstoggle = hasValue([show_toggle, toggle_position, toggle_type]);
  const hasValueGeneralNumeration = hasValue([numeration_type, numeration_display, numeration_separator, numeration_suffix]);
  const hasValueGeneralColumns = hasValue([columns_mode, columns_min_headings, columns_breakpoint]);
  const hasValueHeadingsHeadingsprocessing = hasValue([headings_depth, skip_h_by_class, skip_h_by_ascending_class]);
  const hasValueHeadingsHeadingshash = hasValue([hash_format, hash_counter_prefix]);
  const hasValueHeadingsHeadingsdynamicunfold = hasValue([activate_dynamic_unfold]);
  const hasValueThemeBasetheme = hasValue([theme, preserve_theme_styles]);
  const hasValueStylesTableofcontents = hasValue([toc_margin, toc_padding, toc_border_radius, toc_border, toc_border_color, toc_background_color, toc_shadow]);
  const hasValueStylesTableofcontentsheader = hasValue([toc_header_height, toc_header_margin, toc_header_padding, toc_header_background_color]);
  const hasValueStylesTableofcontentstitle = hasValue([toc_title_color, toc_title_font_size, toc_title_font_weight]);
  const hasValueStylesTogglebutton = hasValue([toc_toggle_color]);
  const hasValueStylesTableofcontentsbody = hasValue([toc_body_margin, toc_body_padding, toc_body_background_color]);
  const hasValueStylesHeadings = hasValue([headings_margin, headings_padding, headings_border_radius, headings_line_height, headings_background_color, headings_background_color_hover, headings_background_color_active]);
  const hasValueStylesHeadingstextlink = hasValue([headings_link_margin, headings_link_padding, headings_link_font_size, headings_link_font_weight, headings_link_color, headings_link_color_hover, headings_link_color_active, headings_link_background_color, headings_link_background_color_hover, headings_link_background_color_active]);
  const hasValueStylesNumeration = hasValue([numeration_color, numeration_color_hover, numeration_color_active]);
  const hasValueStylesColumns = hasValue([columns_separator_style, columns_separator_width]);
  const hasValueFloatingtableofcontentsFloatingtableofcontents = hasValue([activate_floating_table_of_contents]);
  const hasValueFloatingtableofcontentsFloatingwidgetsettings = hasValue([floating_widget_height, floating_hide_numeration, floating_nav_buttons, floating_nav_buttons_position, floating_nav_buttons_width, floating_compatibility_mode]);
  const hasValueFloatingtableofcontentsFloatingtableofcontentssettings = hasValue([floating_show_header, expands_on, collapses_on, floating_position]);
  const hasValueFloatingtableofcontentsFloatingtableofcontentsposition = hasValue([floating_offset_y, floating_offset_y_mobile, floating_offset_x]);
  const hasValueFloatingtableofcontentsFloatingwidgetstyles = hasValue([floating_widget_background_color, floating_widget_current_heading_padding, floating_widget_color, floating_widget_font_size, floating_widget_font_weight, floating_widget_nav_color, floating_toc_shadow, floating_toc_shadow_color, floating_widget_border_radius]);
  const hasValueSlideouttableofcontentsSlideouttableofcontents = hasValue([activate_slide_out_table_of_contents]);
  const hasValueSlideouttableofcontentsSlideouttableofcontentssettings = hasValue([slide_out_auto_close, slide_out_open_on_load, slide_out_hide_header, slide_out_width, slide_out_mode, slide_out_position]);
  const hasValueSlideouttableofcontentsSlideouttogglebutton = hasValue([slide_out_toggle_position, slide_out_toggle_width, slide_out_toggle_offset_y]);
  const hasValueSlideouttableofcontentsSlideouttableofcontentsstyles = hasValue([slide_out_padding, slide_out_background_color]);
  const hasValueSlideouttableofcontentsSlideouttogglebuttonstyles = hasValue([slide_out_toggle_color, slide_out_toggle_background_color]);
  const hasValueProgressbarProgressbar = hasValue([activate_progress_bar]);
  const hasValueProgressbarProgressbarsettings = hasValue([progress_bar_position, progress_bar_offset_y, progress_bar_offset_y_mobile]);
  const hasValueProgressbarProgressbarstyles = hasValue([progress_bar_thickness, progress_bar_color, progress_bar_background_color]);
  const isEditingPost = typeof wp.data.select('core/editor') !== 'undefined';

  //Licensing
  var can = false;
  var joliWrapClass = "jtoc-control-wrapper";
  if (typeof jtoc_data !== 'undefined' && jtoc_data.hasOwnProperty('can') && jtoc_data.can !== false) {
    can = true;
    joliWrapClass += " --jtoc-can";
  }
  const setSelectColor = val => {
    if (val == 1) {
      return '--wpj-green';
    } else if (val == 0) {
      return '--wpj-red';
    }
    return '';
  };
  const handleFocus = e => {
    let editedBlocks = [...wp.data.select('core/block-editor').getBlocks()];
    let contentHeadings = editedBlocks.filter(item => item.name === 'core/heading').map((item, index) => index.toString() + item.attributes.content + item.attributes.level);
    const contentHeadingsHash = contentHeadings;
    if (headingsHash !== contentHeadingsHash) {
      setHeadingsHash(contentHeadingsHash);
      // console.warn( contentHeadingsHash );
    }
  };
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_3__.useEffect)(() => {
    // console.warn( 'REQUEST HEADINGS' );
    requestHeadings();
  }, [headingsHash, headings_depth]); // the [] dependency prevents useEffects from running twice

  const toggleItemVisibility = (id, isHidden) => {
    var currentHidden = [...hiddenItems];
    if (isHidden === true) {
      const index = currentHidden.indexOf(id);
      if (index > -1) {
        // only splice array when item is found
        currentHidden.splice(index, 1); // 2nd parameter means remove one item only
      }
    } else {
      currentHidden.push(id);
    }
    // console.log( currentHidden, id );
    setAttributes({
      hidden_headings: currentHidden
    });
  };
  const removeAttribute = attr => {
    var currentAttributes = {
      ...attributes
    };
    delete currentAttributes[attr];
    // console.log( currentHidden, id );
    setAttributes(currentAttributes);
  };

  /**
   * Fetch a preview via the API
   */
  const requestHeadings = async () => {
    //Current post data
    if (!isEditingPost) {
      return false;
    }
    const currentPostContent = wp.data.select('core/editor').getEditedPostContent();

    //Gather the data to send to the API
    //Template

    //activate spinner
    setIsFetching(true);
    _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_5___default()({
      path: '/jolitoc/v1/headings',
      method: 'POST',
      data: {
        content: JSON.stringify(currentPostContent),
        attributes: attributes
      }
    }).then(res => {
      // console.log( res );
      setIsFetching(false);
      setHeadings(res.headings);
      //Opens the modal
    }).catch(e => {
      // console.log( e );
      alert((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('An error occured, try again.', 'joli-table-of-contents'));
      setIsFetching(false);
    });
  };
  // const editedContent = wp.data.select( "core/editor" ).getEditedPostContent();
  // console.log(editedContent);

  const setAttributesFromSelect = (value, offset) => {
    var args = {};
    if (value == "-1") {
      //forces the type to integer in order to be invalid in the attribute type definition
      args[offset] = -1;
    } else {
      args[offset] = value;
    }
    setAttributes(args);
  };
  const setAttributesFromCheckboxes = (value, offset) => {
    var args = {};
    // console.log( value );
    if (value === "") {
      args[offset] = -1;
    } else {
      args[offset] = value;
    }
    setAttributes(args);
  };
  const setAttributesFromDimensions = (value, offset) => {
    var args = {};
    if (value.dim.length === 0) {
      args[offset] = -1;
    } else {
      args[offset] = value;
    }
    setAttributes(args);
  };
  const handleElementValueChange = (elementID, value) => {
    var currentEdited = {
      ...editedItems
    };

    // if ( !value ) {
    // 	delete currentEdited[elementID]
    // } else {
    currentEdited[elementID] = value;
    // }
    setAttributes({
      edited_headings: currentEdited
    });
  };
  const updateElementValue = (element, e) => {
    const value = e.target.value;
    var currentEdited = {
      ...editedItems
    };
    // console.warn( currentEdited );

    //delete overriden value if null or the same as the original
    if (!value || element.title === value) {
      delete currentEdited[element.id];
    } else {
      currentEdited[element.id] = value;
    }
    // console.warn( currentEdited );
    setAttributes({
      edited_headings: currentEdited
    });
    setEditingElement(null);
  };
  const resetElement = element => {
    var currentEdited = {
      ...editedItems
    };
    delete currentEdited[element.id];
    setAttributes({
      edited_headings: currentEdited
    });
    setEditingElement(null);
  };
  const headingItems = () => {
    return headings.map(element => {
      const isHidden = (() => {
        const foundElement = hiddenItems.find(id => id === element.id);
        return typeof foundElement !== 'undefined';
      })();
      const hiddenClass = isHidden ? ' --jtoc-is-hidden' : '';

      // const startEditing = (element) => {
      // 	setEditingItem(element.id);
      // 	setEditingItemValue(element.title);
      // }
      const hasOverriddenValue = (() => {
        return editedItems.hasOwnProperty(element.id);
      })();
      const elementValue = hasOverriddenValue ? editedItems[element.id] : element.title;
      const overrideClass = hasOverriddenValue ? ' --jtoc-override' : '';

      // console.log(elementValue);

      return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)("div", {
        id: "jtoc-" + element.id,
        className: "jtoc-list-item --jtoc-depth-" + element.depth + hiddenClass + overrideClass,
        dataId: element.id,
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliEditableListItem__WEBPACK_IMPORTED_MODULE_11__["default"], {
          showInput: editingElement !== null && editingElement.id === element.id,
          value: elementValue,
          handleChange: value => handleElementValueChange(element.id, value),
          handleDoubleClick: () => setEditingElement(element),
          handleBlur: e => updateElementValue(element, e)
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)("div", {
          className: "list-item-controls",
          children: [hasOverriddenValue && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
            className: "safi-panel-button",
            variant: "tertiary",
            icon: "undo",
            size: "small",
            title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Reset title", "joli-table-of-contents"),
            onClick: () => resetElement(element)
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
            className: "safi-panel-button",
            variant: "tertiary",
            icon: "edit",
            size: "small",
            onClick: () => setEditingElement(element)
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
            className: "safi-panel-button",
            variant: "tertiary",
            icon: isHidden ? 'hidden' : 'visibility',
            size: "small",
            onClick: () => toggleItemVisibility(element.id, isHidden)
          })]
        })]
      });
    });
  };
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, {
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Panel, {
        header: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("General", "joli-table-of-contents"),
        className: "--wpj-panel",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Appearance", "joli-table-of-contents"),
          initialOpen: false //={hasValueGeneralAppearance}
          ,
          className: hasValueGeneralAppearance ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(toc_width_incontent),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Width (in-content)", "joli-table-of-contents"),
              value: toc_width_incontent,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Auto", "joli-table-of-contents"),
                value: "width-auto"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("100%", "joli-table-of-contents"),
                value: "width-100"
              }],
              onChange: val => setAttributesFromSelect(val, "toc_width_incontent")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Minimum width", "joli-table-of-contents"),
              value: toc_min_width,
              onChange: val => setAttributes({
                toc_min_width: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Maximum width", "joli-table-of-contents"),
              value: toc_max_width,
              onChange: val => setAttributes({
                toc_max_width: val
              })
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Table of contents", "joli-table-of-contents"),
          initialOpen: false //={hasValueGeneralTableofcontents}
          ,
          className: hasValueGeneralTableofcontents ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hierarchy offset", "joli-table-of-contents"),
              value: hierarchy_offset,
              onChange: val => setAttributes({
                hierarchy_offset: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Minimal headings count", "joli-table-of-contents"),
              value: min_headings,
              placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("3", "joli-table-of-contents"),
              onChange: e => e === "" ? setAttributes({
                min_headings: null
              }) : setAttributes({
                min_headings: e
              }),
              type: "text"
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Maximal headings count", "joli-table-of-contents"),
              value: max_headings,
              placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("3", "joli-table-of-contents"),
              onChange: e => e === "" ? setAttributes({
                max_headings: null
              }) : setAttributes({
                max_headings: e
              }),
              type: "text"
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fixed sidebar TOC", "joli-table-of-contents"),
              value: toc_is_sticky,
              onChange: val => setAttributes({
                toc_is_sticky: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Animate on fold", "joli-table-of-contents"),
              value: animate_on_fold,
              onChange: val => setAttributes({
                animate_on_fold: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Smooth scroll", "joli-table-of-contents"),
              value: smooth_scroll,
              onChange: val => setAttributes({
                smooth_scroll: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Heading full row clickable", "joli-table-of-contents"),
              value: headings_full_row_clickable,
              onChange: val => setAttributes({
                headings_full_row_clickable: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(headings_overflow),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Headings overflow", "joli-table-of-contents"),
              value: headings_overflow,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Wrap (overflowing content will show on a new line)", "joli-table-of-contents"),
                value: "wrap"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hidden, with ellipsis ('...')", "joli-table-of-contents"),
                value: "hidden-ellipsis"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hidden", "joli-table-of-contents"),
                value: "hidden"
              }],
              onChange: val => setAttributesFromSelect(val, "headings_overflow")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Jump-to offset (in pixels)", "joli-table-of-contents"),
              value: jump_to_offset,
              onChange: val => setAttributes({
                jump_to_offset: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Jump-to offset (mobile)", "joli-table-of-contents"),
              value: jump_to_offset_mobile,
              onChange: val => setAttributes({
                jump_to_offset_mobile: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(fold_on_load),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fold on load", "joli-table-of-contents"),
              value: fold_on_load,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("No", "joli-table-of-contents"),
                value: "no"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Yes", "joli-table-of-contents"),
                value: "yes"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Yes on mobile, No on desktop", "joli-table-of-contents"),
                value: "responsive"
              }],
              onChange: val => setAttributesFromSelect(val, "fold_on_load")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fold if headings count exceeds", "joli-table-of-contents"),
              value: fold_if_headings_count,
              placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("3", "joli-table-of-contents"),
              onChange: e => e === "" ? setAttributes({
                fold_if_headings_count: null
              }) : setAttributes({
                fold_if_headings_count: e
              }),
              type: "text"
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hide main table of contents", "joli-table-of-contents"),
              value: hide_main_toc,
              onChange: val => setAttributes({
                hide_main_toc: val
              })
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Table of contents header", "joli-table-of-contents"),
          initialOpen: false //={hasValueGeneralTableofcontentsheader}
          ,
          className: hasValueGeneralTableofcontentsheader ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Show header", "joli-table-of-contents"),
              value: show_header,
              onChange: val => setAttributes({
                show_header: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Table of contents title", "joli-table-of-contents"),
              value: toc_title,
              placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Table of contents", "joli-table-of-contents"),
              onChange: e => e === "" ? setAttributes({
                toc_title: null
              }) : setAttributes({
                toc_title: e
              }),
              type: "text"
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(toc_title_alignment),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Title alignement", "joli-table-of-contents"),
              value: toc_title_alignment,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Left", "joli-table-of-contents"),
                value: "left"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Center", "joli-table-of-contents"),
                value: "center"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Right", "joli-table-of-contents"),
                value: "right"
              }],
              onChange: val => setAttributesFromSelect(val, "toc_title_alignment")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Header as toggle", "joli-table-of-contents"),
              value: header_as_toggle,
              onChange: val => setAttributes({
                header_as_toggle: val
              })
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Table of contents toggle", "joli-table-of-contents"),
          initialOpen: false //={hasValueGeneralTableofcontentstoggle}
          ,
          className: hasValueGeneralTableofcontentstoggle ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Show toggle", "joli-table-of-contents"),
              value: show_toggle,
              onChange: val => setAttributes({
                show_toggle: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(toggle_position),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Toggle position", "joli-table-of-contents"),
              value: toggle_position,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Left", "joli-table-of-contents"),
                value: "left"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Right", "joli-table-of-contents"),
                value: "right"
              }],
              onChange: val => setAttributesFromSelect(val, "toggle_position")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(toggle_type),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Toggle type", "joli-table-of-contents"),
              value: toggle_type,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Animated icon", "joli-table-of-contents"),
                value: "icon"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Icon", "joli-table-of-contents"),
                value: "icon-std"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Text", "joli-table-of-contents"),
                value: "text"
              }],
              onChange: val => setAttributesFromSelect(val, "toggle_type")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Numeration", "joli-table-of-contents"),
          initialOpen: false //={hasValueGeneralNumeration}
          ,
          className: hasValueGeneralNumeration ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(numeration_type),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Numeration type", "joli-table-of-contents"),
              value: numeration_type,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("None", "joli-table-of-contents"),
                value: "none"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Numbers (1,2,3...)", "joli-table-of-contents"),
                value: "numbers"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Roman numbers (I,V,X...)", "joli-table-of-contents"),
                value: "roman"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hexadecimal", "joli-table-of-contents"),
                value: "hexadecimal"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Binary (1, 10, 11...)", "joli-table-of-contents"),
                value: "binary"
              }],
              onChange: val => setAttributesFromSelect(val, "numeration_type")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(numeration_display),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Numeration display", "joli-table-of-contents"),
              value: numeration_display,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Single number (current level only)", "joli-table-of-contents"),
                value: "single"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Full (include parent numbers, ex: 1.2.1)", "joli-table-of-contents"),
                value: "full"
              }],
              onChange: val => setAttributesFromSelect(val, "numeration_display")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Numeration separator", "joli-table-of-contents"),
              value: numeration_separator,
              placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)(".", "joli-table-of-contents"),
              onChange: e => e === "" ? setAttributes({
                numeration_separator: null
              }) : setAttributes({
                numeration_separator: e
              }),
              type: "text"
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Numeration suffix", "joli-table-of-contents"),
              value: numeration_suffix,
              placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)(".", "joli-table-of-contents"),
              onChange: e => e === "" ? setAttributes({
                numeration_suffix: null
              }) : setAttributes({
                numeration_suffix: e
              }),
              type: "text"
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Columns", "joli-table-of-contents"),
          initialOpen: false //={hasValueGeneralColumns}
          ,
          className: hasValueGeneralColumns ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Activate multi-columns mode", "joli-table-of-contents"),
              value: columns_mode,
              onChange: val => setAttributes({
                columns_mode: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Minimal headings count", "joli-table-of-contents"),
              value: columns_min_headings,
              placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("", "joli-table-of-contents"),
              onChange: e => e === "" ? setAttributes({
                columns_min_headings: null
              }) : setAttributes({
                columns_min_headings: e
              }),
              type: "text"
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Responsive breakpoint", "joli-table-of-contents"),
              value: columns_breakpoint,
              placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("", "joli-table-of-contents"),
              onChange: e => e === "" ? setAttributes({
                columns_breakpoint: null
              }) : setAttributes({
                columns_breakpoint: e
              }),
              type: "text"
            })
          })]
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Panel, {
        header: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Headings", "joli-table-of-contents"),
        className: "--wpj-panel",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Headings processing", "joli-table-of-contents"),
          initialOpen: false //={hasValueHeadingsHeadingsprocessing}
          ,
          className: hasValueHeadingsHeadingsprocessing ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliCheckboxes__WEBPACK_IMPORTED_MODULE_12__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Headings depth", "joli-table-of-contents"),
              value: headings_depth,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("H2", "joli-table-of-contents"),
                value: "h2"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("H3", "joli-table-of-contents"),
                value: "h3"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("H4", "joli-table-of-contents"),
                value: "h4"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("H5", "joli-table-of-contents"),
                value: "h5"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("H6", "joli-table-of-contents"),
                value: "h6"
              }],
              onChange: val => setAttributesFromCheckboxes(val, "headings_depth")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Skip by class", "joli-table-of-contents"),
              value: skip_h_by_class,
              placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("my-class", "joli-table-of-contents"),
              onChange: e => e === "" ? setAttributes({
                skip_h_by_class: null
              }) : setAttributes({
                skip_h_by_class: e
              }),
              type: "text"
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Skip by ascending class", "joli-table-of-contents"),
              value: skip_h_by_ascending_class,
              placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("my-class", "joli-table-of-contents"),
              onChange: e => e === "" ? setAttributes({
                skip_h_by_ascending_class: null
              }) : setAttributes({
                skip_h_by_ascending_class: e
              }),
              type: "text"
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Headings hash", "joli-table-of-contents"),
          initialOpen: false //={hasValueHeadingsHeadingshash}
          ,
          className: hasValueHeadingsHeadingshash ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(hash_format),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hash format", "joli-table-of-contents"),
              value: hash_format,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Latin unaccented characters only (#my-heading)", "joli-table-of-contents"),
                value: "latin"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Latin & non-latin characters (#我的头衔)", "joli-table-of-contents"),
                value: "all"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Latin & non-latin transliterated characters (#История => #istoriya)", "joli-table-of-contents"),
                value: "all-translit"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Counter (#section_1, #section_2, etc)", "joli-table-of-contents"),
                value: "counter"
              }],
              onChange: val => setAttributesFromSelect(val, "hash_format")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Counter prefix", "joli-table-of-contents"),
              value: hash_counter_prefix,
              placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("section_", "joli-table-of-contents"),
              onChange: e => e === "" ? setAttributes({
                hash_counter_prefix: null
              }) : setAttributes({
                hash_counter_prefix: e
              }),
              type: "text"
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Headings dynamic unfold", "joli-table-of-contents"),
          initialOpen: false //={hasValueHeadingsHeadingsdynamicunfold}
          ,
          className: hasValueHeadingsHeadingsdynamicunfold ? "--wpj-has-value" : "",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Activate dynamic unfold", "joli-table-of-contents"),
              value: activate_dynamic_unfold,
              onChange: val => setAttributes({
                activate_dynamic_unfold: val
              })
            })
          })
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Panel, {
        header: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Theme", "joli-table-of-contents"),
        className: "--wpj-panel",
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Base theme", "joli-table-of-contents"),
          initialOpen: false //={hasValueThemeBasetheme}
          ,
          className: hasValueThemeBasetheme ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(theme),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Theme", "joli-table-of-contents"),
              value: theme,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("[no theme]", "joli-table-of-contents"),
                value: "none"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Basic light", "joli-table-of-contents"),
                value: "basic-light"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Basic dark", "joli-table-of-contents"),
                value: "basic-dark"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Original", "joli-table-of-contents"),
                value: "original"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Original dark", "joli-table-of-contents"),
                value: "original-dark"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Wikipedia", "joli-table-of-contents"),
                value: "wikipedia"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Metro", "joli-table-of-contents"),
                value: "metro"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Modern", "joli-table-of-contents"),
                value: "modern"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Smooth", "joli-table-of-contents"),
                value: "smooth"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Smooth flat gray", "joli-table-of-contents"),
                value: "smooth-flat-gray"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Silky light", "joli-table-of-contents"),
                value: "silky-light"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Clean rounded", "joli-table-of-contents"),
                value: "clean-rounded"
              }],
              onChange: val => setAttributesFromSelect(val, "theme")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Preserve theme styles", "joli-table-of-contents"),
              value: preserve_theme_styles,
              onChange: val => setAttributes({
                preserve_theme_styles: val
              })
            })
          })]
        })
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Panel, {
        header: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Styles", "joli-table-of-contents"),
        className: "--wpj-panel",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Table of contents", "joli-table-of-contents"),
          initialOpen: false //={hasValueStylesTableofcontents}
          ,
          className: hasValueStylesTableofcontents ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Margin", "joli-table-of-contents"),
              value: toc_margin,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("right", "joli-table-of-contents"),
                value: "right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom", "joli-table-of-contents"),
                value: "bottom"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("left", "joli-table-of-contents"),
                value: "left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "toc_margin")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Padding", "joli-table-of-contents"),
              value: toc_padding,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("right", "joli-table-of-contents"),
                value: "right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom", "joli-table-of-contents"),
                value: "bottom"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("left", "joli-table-of-contents"),
                value: "left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "toc_padding")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Border radius", "joli-table-of-contents"),
              value: toc_border_radius,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top-left", "joli-table-of-contents"),
                value: "top-left"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top-right", "joli-table-of-contents"),
                value: "top-right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom-right", "joli-table-of-contents"),
                value: "bottom-right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom-left", "joli-table-of-contents"),
                value: "bottom-left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "toc_border_radius")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Border", "joli-table-of-contents"),
              value: toc_border,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("right", "joli-table-of-contents"),
                value: "right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom", "joli-table-of-contents"),
                value: "bottom"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("left", "joli-table-of-contents"),
                value: "left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "toc_border")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Border color", "joli-table-of-contents"),
              value: toc_border_color,
              onChange: val => setAttributes({
                toc_border_color: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Background color", "joli-table-of-contents"),
              value: toc_background_color,
              onChange: val => setAttributes({
                toc_background_color: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Shadow", "joli-table-of-contents"),
              value: toc_shadow,
              onChange: val => setAttributes({
                toc_shadow: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Table of contents header", "joli-table-of-contents"),
          initialOpen: false //={hasValueStylesTableofcontentsheader}
          ,
          className: hasValueStylesTableofcontentsheader ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Height", "joli-table-of-contents"),
              value: toc_header_height,
              onChange: val => setAttributes({
                toc_header_height: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Margin", "joli-table-of-contents"),
              value: toc_header_margin,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("right", "joli-table-of-contents"),
                value: "right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom", "joli-table-of-contents"),
                value: "bottom"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("left", "joli-table-of-contents"),
                value: "left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "toc_header_margin")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Padding", "joli-table-of-contents"),
              value: toc_header_padding,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("right", "joli-table-of-contents"),
                value: "right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom", "joli-table-of-contents"),
                value: "bottom"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("left", "joli-table-of-contents"),
                value: "left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "toc_header_padding")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Background color", "joli-table-of-contents"),
              value: toc_header_background_color,
              onChange: val => setAttributes({
                toc_header_background_color: val
              })
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Table of contents title", "joli-table-of-contents"),
          initialOpen: false //={hasValueStylesTableofcontentstitle}
          ,
          className: hasValueStylesTableofcontentstitle ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Title color", "joli-table-of-contents"),
              value: toc_title_color,
              onChange: val => setAttributes({
                toc_title_color: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Font size", "joli-table-of-contents"),
              value: toc_title_font_size,
              onChange: val => setAttributes({
                toc_title_font_size: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(toc_title_font_weight),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Font weight", "joli-table-of-contents"),
              value: toc_title_font_weight,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("[Inherit from theme]", "joli-table-of-contents"),
                value: "none"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("100 (lightest)", "joli-table-of-contents"),
                value: "100"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("200", "joli-table-of-contents"),
                value: "200"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("300", "joli-table-of-contents"),
                value: "300"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("400 (normal)", "joli-table-of-contents"),
                value: "400"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("500", "joli-table-of-contents"),
                value: "500"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("600", "joli-table-of-contents"),
                value: "600"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("700 (bold)", "joli-table-of-contents"),
                value: "700"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("800", "joli-table-of-contents"),
                value: "800"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("900 (boldest)", "joli-table-of-contents"),
                value: "900"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lighter (relative to parent)", "joli-table-of-contents"),
                value: "lighter"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bolder (relative to parent)", "joli-table-of-contents"),
                value: "bolder"
              }],
              onChange: val => setAttributesFromSelect(val, "toc_title_font_weight")
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Toggle button", "joli-table-of-contents"),
          initialOpen: false //={hasValueStylesTogglebutton}
          ,
          className: hasValueStylesTogglebutton ? "--wpj-has-value" : "",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Color", "joli-table-of-contents"),
              value: toc_toggle_color,
              onChange: val => setAttributes({
                toc_toggle_color: val
              })
            })
          })
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Table of contents body", "joli-table-of-contents"),
          initialOpen: false //={hasValueStylesTableofcontentsbody}
          ,
          className: hasValueStylesTableofcontentsbody ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Margin", "joli-table-of-contents"),
              value: toc_body_margin,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("right", "joli-table-of-contents"),
                value: "right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom", "joli-table-of-contents"),
                value: "bottom"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("left", "joli-table-of-contents"),
                value: "left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "toc_body_margin")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Padding", "joli-table-of-contents"),
              value: toc_body_padding,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("right", "joli-table-of-contents"),
                value: "right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom", "joli-table-of-contents"),
                value: "bottom"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("left", "joli-table-of-contents"),
                value: "left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "toc_body_padding")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Background color", "joli-table-of-contents"),
              value: toc_body_background_color,
              onChange: val => setAttributes({
                toc_body_background_color: val
              })
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Headings", "joli-table-of-contents"),
          initialOpen: false //={hasValueStylesHeadings}
          ,
          className: hasValueStylesHeadings ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Margin", "joli-table-of-contents"),
              value: headings_margin,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("right", "joli-table-of-contents"),
                value: "right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom", "joli-table-of-contents"),
                value: "bottom"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("left", "joli-table-of-contents"),
                value: "left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "headings_margin")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Padding", "joli-table-of-contents"),
              value: headings_padding,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("right", "joli-table-of-contents"),
                value: "right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom", "joli-table-of-contents"),
                value: "bottom"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("left", "joli-table-of-contents"),
                value: "left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "headings_padding")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Border radius", "joli-table-of-contents"),
              value: headings_border_radius,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top-left", "joli-table-of-contents"),
                value: "top-left"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top-right", "joli-table-of-contents"),
                value: "top-right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom-right", "joli-table-of-contents"),
                value: "bottom-right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom-left", "joli-table-of-contents"),
                value: "bottom-left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "headings_border_radius")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Line height", "joli-table-of-contents"),
              value: headings_line_height,
              onChange: val => setAttributes({
                headings_line_height: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Background color", "joli-table-of-contents"),
              value: headings_background_color,
              onChange: val => setAttributes({
                headings_background_color: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Background color (hover)", "joli-table-of-contents"),
              value: headings_background_color_hover,
              onChange: val => setAttributes({
                headings_background_color_hover: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Background color (active)", "joli-table-of-contents"),
              value: headings_background_color_active,
              onChange: val => setAttributes({
                headings_background_color_active: val
              })
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Headings text link", "joli-table-of-contents"),
          initialOpen: false //={hasValueStylesHeadingstextlink}
          ,
          className: hasValueStylesHeadingstextlink ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Margin", "joli-table-of-contents"),
              value: headings_link_margin,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("right", "joli-table-of-contents"),
                value: "right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom", "joli-table-of-contents"),
                value: "bottom"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("left", "joli-table-of-contents"),
                value: "left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "headings_link_margin")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Padding", "joli-table-of-contents"),
              value: headings_link_padding,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("right", "joli-table-of-contents"),
                value: "right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom", "joli-table-of-contents"),
                value: "bottom"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("left", "joli-table-of-contents"),
                value: "left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "headings_link_padding")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Font size", "joli-table-of-contents"),
              value: headings_link_font_size,
              onChange: val => setAttributes({
                headings_link_font_size: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(headings_link_font_weight),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Font weight", "joli-table-of-contents"),
              value: headings_link_font_weight,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("[Inherit from theme]", "joli-table-of-contents"),
                value: "none"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("100 (lightest)", "joli-table-of-contents"),
                value: "100"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("200", "joli-table-of-contents"),
                value: "200"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("300", "joli-table-of-contents"),
                value: "300"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("400 (normal)", "joli-table-of-contents"),
                value: "400"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("500", "joli-table-of-contents"),
                value: "500"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("600", "joli-table-of-contents"),
                value: "600"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("700 (bold)", "joli-table-of-contents"),
                value: "700"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("800", "joli-table-of-contents"),
                value: "800"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("900 (boldest)", "joli-table-of-contents"),
                value: "900"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lighter (relative to parent)", "joli-table-of-contents"),
                value: "lighter"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bolder (relative to parent)", "joli-table-of-contents"),
                value: "bolder"
              }],
              onChange: val => setAttributesFromSelect(val, "headings_link_font_weight")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Color", "joli-table-of-contents"),
              value: headings_link_color,
              onChange: val => setAttributes({
                headings_link_color: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Color (hover)", "joli-table-of-contents"),
              value: headings_link_color_hover,
              onChange: val => setAttributes({
                headings_link_color_hover: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Color (active)", "joli-table-of-contents"),
              value: headings_link_color_active,
              onChange: val => setAttributes({
                headings_link_color_active: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Background color", "joli-table-of-contents"),
              value: headings_link_background_color,
              onChange: val => setAttributes({
                headings_link_background_color: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Background color (hover)", "joli-table-of-contents"),
              value: headings_link_background_color_hover,
              onChange: val => setAttributes({
                headings_link_background_color_hover: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Background color (active)", "joli-table-of-contents"),
              value: headings_link_background_color_active,
              onChange: val => setAttributes({
                headings_link_background_color_active: val
              })
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Numeration", "joli-table-of-contents"),
          initialOpen: false //={hasValueStylesNumeration}
          ,
          className: hasValueStylesNumeration ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Numeration color", "joli-table-of-contents"),
              value: numeration_color,
              onChange: val => setAttributes({
                numeration_color: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Numeration color (hover)", "joli-table-of-contents"),
              value: numeration_color_hover,
              onChange: val => setAttributes({
                numeration_color_hover: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Numeration color (active)", "joli-table-of-contents"),
              value: numeration_color_active,
              onChange: val => setAttributes({
                numeration_color_active: val
              })
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Columns", "joli-table-of-contents"),
          initialOpen: false //={hasValueStylesColumns}
          ,
          className: hasValueStylesColumns ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(columns_separator_style),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Separator style", "joli-table-of-contents"),
              value: columns_separator_style,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Solid [Default]", "joli-table-of-contents"),
                value: "solid"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Dashed", "joli-table-of-contents"),
                value: "dashed"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Dotted", "joli-table-of-contents"),
                value: "dotted"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Double", "joli-table-of-contents"),
                value: "double"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Ridge", "joli-table-of-contents"),
                value: "ridge"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("None", "joli-table-of-contents"),
                value: "none"
              }],
              onChange: val => setAttributesFromSelect(val, "columns_separator_style")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Separator width", "joli-table-of-contents"),
              value: columns_separator_width,
              onChange: val => setAttributes({
                columns_separator_width: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass
          })]
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Panel, {
        header: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Floating table of contents", "joli-table-of-contents"),
        className: "--wpj-panel",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Floating table of contents", "joli-table-of-contents"),
          initialOpen: false //={hasValueFloatingtableofcontentsFloatingtableofcontents}
          ,
          className: hasValueFloatingtableofcontentsFloatingtableofcontents ? "--wpj-has-value" : "",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Activate floating table of contents", "joli-table-of-contents"),
              value: activate_floating_table_of_contents,
              onChange: val => setAttributes({
                activate_floating_table_of_contents: val
              })
            })
          })
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Floating widget settings", "joli-table-of-contents"),
          initialOpen: false //={hasValueFloatingtableofcontentsFloatingwidgetsettings}
          ,
          className: hasValueFloatingtableofcontentsFloatingwidgetsettings ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Height", "joli-table-of-contents"),
              value: floating_widget_height,
              onChange: val => setAttributes({
                floating_widget_height: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hide numeration", "joli-table-of-contents"),
              value: floating_hide_numeration,
              onChange: val => setAttributes({
                floating_hide_numeration: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(floating_nav_buttons),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Navigation buttons", "joli-table-of-contents"),
              value: floating_nav_buttons,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("None", "joli-table-of-contents"),
                value: "none"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Next", "joli-table-of-contents"),
                value: "next"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Prev/Next", "joli-table-of-contents"),
                value: "prev_next"
              }],
              onChange: val => setAttributesFromSelect(val, "floating_nav_buttons")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(floating_nav_buttons_position),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Navigation buttons position", "joli-table-of-contents"),
              value: floating_nav_buttons_position,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Left", "joli-table-of-contents"),
                value: "left"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Right", "joli-table-of-contents"),
                value: "right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Around", "joli-table-of-contents"),
                value: "around"
              }],
              onChange: val => setAttributesFromSelect(val, "floating_nav_buttons_position")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Navigation buttons width", "joli-table-of-contents"),
              value: floating_nav_buttons_width,
              onChange: val => setAttributes({
                floating_nav_buttons_width: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Compatibility mode", "joli-table-of-contents"),
              value: floating_compatibility_mode,
              onChange: val => setAttributes({
                floating_compatibility_mode: val
              })
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Floating table of contents settings", "joli-table-of-contents"),
          initialOpen: false //={hasValueFloatingtableofcontentsFloatingtableofcontentssettings}
          ,
          className: hasValueFloatingtableofcontentsFloatingtableofcontentssettings ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Show header", "joli-table-of-contents"),
              value: floating_show_header,
              onChange: val => setAttributes({
                floating_show_header: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(expands_on),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Expands on (when folded)", "joli-table-of-contents"),
              value: expands_on,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hover (only for desktop)", "joli-table-of-contents"),
                value: "hover"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Click", "joli-table-of-contents"),
                value: "click"
              }],
              onChange: val => setAttributesFromSelect(val, "expands_on")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(collapses_on),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Collapses on (when unfolded)", "joli-table-of-contents"),
              value: collapses_on,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Leave hover (only for desktop)", "joli-table-of-contents"),
                value: "hover-off"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Click away", "joli-table-of-contents"),
                value: "click-away"
              }],
              onChange: val => setAttributesFromSelect(val, "collapses_on")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(floating_position),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Floating position", "joli-table-of-contents"),
              value: floating_position,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bottom", "joli-table-of-contents"),
                value: "bottom"
              }],
              onChange: val => setAttributesFromSelect(val, "floating_position")
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Floating table of contents position", "joli-table-of-contents"),
          initialOpen: false //={hasValueFloatingtableofcontentsFloatingtableofcontentsposition}
          ,
          className: hasValueFloatingtableofcontentsFloatingtableofcontentsposition ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Floating vertical offset (in pixels)", "joli-table-of-contents"),
              value: floating_offset_y,
              onChange: val => setAttributes({
                floating_offset_y: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Floating vertical offset for mobile (in pixels)", "joli-table-of-contents"),
              value: floating_offset_y_mobile,
              onChange: val => setAttributes({
                floating_offset_y_mobile: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Floating horizontal offset (in pixels)", "joli-table-of-contents"),
              value: floating_offset_x,
              onChange: val => setAttributes({
                floating_offset_x: val
              })
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Floating widget styles", "joli-table-of-contents"),
          initialOpen: false //={hasValueFloatingtableofcontentsFloatingwidgetstyles}
          ,
          className: hasValueFloatingtableofcontentsFloatingwidgetstyles ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Background color", "joli-table-of-contents"),
              value: floating_widget_background_color,
              onChange: val => setAttributes({
                floating_widget_background_color: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Current heading padding", "joli-table-of-contents"),
              value: floating_widget_current_heading_padding,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("right", "joli-table-of-contents"),
                value: "right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom", "joli-table-of-contents"),
                value: "bottom"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("left", "joli-table-of-contents"),
                value: "left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "floating_widget_current_heading_padding")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Current heading color", "joli-table-of-contents"),
              value: floating_widget_color,
              onChange: val => setAttributes({
                floating_widget_color: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Current heading font size", "joli-table-of-contents"),
              value: floating_widget_font_size,
              onChange: val => setAttributes({
                floating_widget_font_size: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(floating_widget_font_weight),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Current heading font weight", "joli-table-of-contents"),
              value: floating_widget_font_weight,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("[Inherit from theme]", "joli-table-of-contents"),
                value: "none"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("100 (lightest)", "joli-table-of-contents"),
                value: "100"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("200", "joli-table-of-contents"),
                value: "200"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("300", "joli-table-of-contents"),
                value: "300"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("400 (normal)", "joli-table-of-contents"),
                value: "400"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("500", "joli-table-of-contents"),
                value: "500"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("600", "joli-table-of-contents"),
                value: "600"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("700 (bold)", "joli-table-of-contents"),
                value: "700"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("800", "joli-table-of-contents"),
                value: "800"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("900 (boldest)", "joli-table-of-contents"),
                value: "900"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lighter (relative to parent)", "joli-table-of-contents"),
                value: "lighter"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bolder (relative to parent)", "joli-table-of-contents"),
                value: "bolder"
              }],
              onChange: val => setAttributesFromSelect(val, "floating_widget_font_weight")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Navigation buttons color", "joli-table-of-contents"),
              value: floating_widget_nav_color,
              onChange: val => setAttributes({
                floating_widget_nav_color: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Shadow", "joli-table-of-contents"),
              value: floating_toc_shadow,
              onChange: val => setAttributes({
                floating_toc_shadow: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Custom shadow color", "joli-table-of-contents"),
              value: floating_toc_shadow_color,
              onChange: val => setAttributes({
                floating_toc_shadow_color: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Border radius", "joli-table-of-contents"),
              value: floating_widget_border_radius,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top-left", "joli-table-of-contents"),
                value: "top-left"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top-right", "joli-table-of-contents"),
                value: "top-right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom-right", "joli-table-of-contents"),
                value: "bottom-right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom-left", "joli-table-of-contents"),
                value: "bottom-left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "floating_widget_border_radius")
            })
          })]
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Panel, {
        header: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Slide-out table of contents", "joli-table-of-contents"),
        className: "--wpj-panel",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Slide-out table of contents", "joli-table-of-contents"),
          initialOpen: false //={hasValueSlideouttableofcontentsSlideouttableofcontents}
          ,
          className: hasValueSlideouttableofcontentsSlideouttableofcontents ? "--wpj-has-value" : "",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Activate slide-out table of contents", "joli-table-of-contents"),
              value: activate_slide_out_table_of_contents,
              onChange: val => setAttributes({
                activate_slide_out_table_of_contents: val
              })
            })
          })
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Slide-out table of contents settings", "joli-table-of-contents"),
          initialOpen: false //={hasValueSlideouttableofcontentsSlideouttableofcontentssettings}
          ,
          className: hasValueSlideouttableofcontentsSlideouttableofcontentssettings ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Auto-close (mobile)", "joli-table-of-contents"),
              value: slide_out_auto_close,
              onChange: val => setAttributes({
                slide_out_auto_close: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Open on load", "joli-table-of-contents"),
              value: slide_out_open_on_load,
              onChange: val => setAttributes({
                slide_out_open_on_load: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hide header", "joli-table-of-contents"),
              value: slide_out_hide_header,
              onChange: val => setAttributes({
                slide_out_hide_header: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Width", "joli-table-of-contents"),
              value: slide_out_width,
              onChange: val => setAttributes({
                slide_out_width: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(slide_out_mode),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mode", "joli-table-of-contents"),
              value: slide_out_mode,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Push content", "joli-table-of-contents"),
                value: "push"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Over content", "joli-table-of-contents"),
                value: "over"
              }],
              onChange: val => setAttributesFromSelect(val, "slide_out_mode")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(slide_out_position),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Position", "joli-table-of-contents"),
              value: slide_out_position,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Left", "joli-table-of-contents"),
                value: "left"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Right", "joli-table-of-contents"),
                value: "right"
              }],
              onChange: val => setAttributesFromSelect(val, "slide_out_position")
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Slide-out toggle button", "joli-table-of-contents"),
          initialOpen: false //={hasValueSlideouttableofcontentsSlideouttogglebutton}
          ,
          className: hasValueSlideouttableofcontentsSlideouttogglebutton ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(slide_out_toggle_position),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Position", "joli-table-of-contents"),
              value: slide_out_toggle_position,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Center", "joli-table-of-contents"),
                value: "center"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bottom", "joli-table-of-contents"),
                value: "bottom"
              }],
              onChange: val => setAttributesFromSelect(val, "slide_out_toggle_position")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Width", "joli-table-of-contents"),
              value: slide_out_toggle_width,
              onChange: val => setAttributes({
                slide_out_toggle_width: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Vertical offset", "joli-table-of-contents"),
              value: slide_out_toggle_offset_y,
              onChange: val => setAttributes({
                slide_out_toggle_offset_y: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Slide-out table of contents styles", "joli-table-of-contents"),
          initialOpen: false //={hasValueSlideouttableofcontentsSlideouttableofcontentsstyles}
          ,
          className: hasValueSlideouttableofcontentsSlideouttableofcontentsstyles ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliDimensionsControl__WEBPACK_IMPORTED_MODULE_13__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Padding", "joli-table-of-contents"),
              value: slide_out_padding,
              dimensions: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("right", "joli-table-of-contents"),
                value: "right"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("bottom", "joli-table-of-contents"),
                value: "bottom"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("left", "joli-table-of-contents"),
                value: "left"
              }],
              units: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("px", "joli-table-of-contents"),
                value: "px"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("em", "joli-table-of-contents"),
                value: "em"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("rem", "joli-table-of-contents"),
                value: "rem"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("%", "joli-table-of-contents"),
                value: "percent"
              }],
              onChange: val => setAttributesFromDimensions(val, "slide_out_padding")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Background color", "joli-table-of-contents"),
              value: slide_out_background_color,
              onChange: val => setAttributes({
                slide_out_background_color: val
              })
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Slide-out toggle button styles", "joli-table-of-contents"),
          initialOpen: false //={hasValueSlideouttableofcontentsSlideouttogglebuttonstyles}
          ,
          className: hasValueSlideouttableofcontentsSlideouttogglebuttonstyles ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Toggle color", "joli-table-of-contents"),
              value: slide_out_toggle_color,
              onChange: val => setAttributes({
                slide_out_toggle_color: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Toggle background color", "joli-table-of-contents"),
              value: slide_out_toggle_background_color,
              onChange: val => setAttributes({
                slide_out_toggle_background_color: val
              })
            })
          })]
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Panel, {
        header: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Progress bar", "joli-table-of-contents"),
        className: "--wpj-panel",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Progress bar", "joli-table-of-contents"),
          initialOpen: false //={hasValueProgressbarProgressbar}
          ,
          className: hasValueProgressbarProgressbar ? "--wpj-has-value" : "",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliOptionToggle__WEBPACK_IMPORTED_MODULE_10__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Activate progress bar", "joli-table-of-contents"),
              value: activate_progress_bar,
              onChange: val => setAttributes({
                activate_progress_bar: val
              })
            })
          })
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Progress bar settings", "joli-table-of-contents"),
          initialOpen: false //={hasValueProgressbarProgressbarsettings}
          ,
          className: hasValueProgressbarProgressbarsettings ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
              className: setSelectColor(progress_bar_position),
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Position", "joli-table-of-contents"),
              value: progress_bar_position,
              options: [{
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inherit", "joli-table-of-contents"),
                value: -1
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Top", "joli-table-of-contents"),
                value: "top"
              }, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bottom", "joli-table-of-contents"),
                value: "bottom"
              }],
              onChange: val => setAttributesFromSelect(val, "progress_bar_position")
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Vertical offset", "joli-table-of-contents"),
              value: progress_bar_offset_y,
              onChange: val => setAttributes({
                progress_bar_offset_y: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Vertical offset (mobile)", "joli-table-of-contents"),
              value: progress_bar_offset_y_mobile,
              onChange: val => setAttributes({
                progress_bar_offset_y_mobile: val
              })
            })
          })]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Progress bar styles", "joli-table-of-contents"),
          initialOpen: false //={hasValueProgressbarProgressbarstyles}
          ,
          className: hasValueProgressbarProgressbarstyles ? "--wpj-has-value" : "",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliUnitControl__WEBPACK_IMPORTED_MODULE_9__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Thickness", "joli-table-of-contents"),
              value: progress_bar_thickness,
              onChange: val => setAttributes({
                progress_bar_thickness: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Progress bar color", "joli-table-of-contents"),
              value: progress_bar_color,
              onChange: val => setAttributes({
                progress_bar_color: val
              })
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
            className: joliWrapClass,
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_JoliColorPicker__WEBPACK_IMPORTED_MODULE_7__["default"], {
              label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Progress bar background color", "joli-table-of-contents"),
              value: progress_bar_background_color,
              onChange: val => setAttributes({
                progress_bar_background_color: val
              })
            })
          })]
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Panel, {
        header: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Other", "joli-table-of-contents"),
        className: "--wpj-panel"
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)("div", {
      ...blockProps,
      onFocus: e => handleFocus(e),
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)("div", {
        className: "jtoc-block-header",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("p", {
          className: "jtoc-block-title",
          children: "Joli Table of Contents"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
          style: {
            'float': 'right',
            'marginTop': '2px'
          },
          className: "safi-panel-button",
          variant: "secondary",
          icon: "image-rotate",
          isSmall: true,
          onClick: requestHeadings,
          isBusy: isFetching,
          children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Refresh', 'joli-table-of-contents')
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
        className: "jtoc-list",
        children: isEditingPost ? headings.length ? headingItems() : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsxs)("div", {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("span", {
            class: "no-headings",
            children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('No heading could match the current settings or content.', 'joli-table-of-contents')
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("br", {}), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("span", {
            class: "no-headings",
            children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('"Headings processing" settings are located in the block settings panel under the "Headings" section.', 'joli-table-of-contents')
          })]
        }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("div", {
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_14__.jsx)("span", {
            class: "no-headings",
            children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Headings not available in this context', 'joli-table-of-contents')
          })
        })
      })]
    })]
  });
}

/***/ },

/***/ "./src/blocks/joli-table-of-contents/index.js"
/*!****************************************************!*\
  !*** ./src/blocks/joli-table-of-contents/index.js ***!
  \****************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style.scss */ "./src/blocks/joli-table-of-contents/style.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./edit */ "./src/blocks/joli-table-of-contents/edit.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./block.json */ "./src/blocks/joli-table-of-contents/block.json");
/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * Internal dependencies
 */



/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_3__.name, {
  /**
   * @see ./edit.js
   */
  edit: _edit__WEBPACK_IMPORTED_MODULE_2__["default"]
});

/***/ },

/***/ "./src/blocks/joli-table-of-contents/editor.scss"
/*!*******************************************************!*\
  !*** ./src/blocks/joli-table-of-contents/editor.scss ***!
  \*******************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ },

/***/ "./src/blocks/joli-table-of-contents/style.scss"
/*!******************************************************!*\
  !*** ./src/blocks/joli-table-of-contents/style.scss ***!
  \******************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ },

/***/ "react/jsx-runtime"
/*!**********************************!*\
  !*** external "ReactJSXRuntime" ***!
  \**********************************/
(module) {

module.exports = window["ReactJSXRuntime"];

/***/ },

/***/ "@wordpress/api-fetch"
/*!**********************************!*\
  !*** external ["wp","apiFetch"] ***!
  \**********************************/
(module) {

module.exports = window["wp"]["apiFetch"];

/***/ },

/***/ "@wordpress/block-editor"
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
(module) {

module.exports = window["wp"]["blockEditor"];

/***/ },

/***/ "@wordpress/blocks"
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
(module) {

module.exports = window["wp"]["blocks"];

/***/ },

/***/ "@wordpress/components"
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
(module) {

module.exports = window["wp"]["components"];

/***/ },

/***/ "@wordpress/data"
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
(module) {

module.exports = window["wp"]["data"];

/***/ },

/***/ "@wordpress/element"
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
(module) {

module.exports = window["wp"]["element"];

/***/ },

/***/ "@wordpress/i18n"
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
(module) {

module.exports = window["wp"]["i18n"];

/***/ },

/***/ "./src/blocks/joli-table-of-contents/block.json"
/*!******************************************************!*\
  !*** ./src/blocks/joli-table-of-contents/block.json ***!
  \******************************************************/
(module) {

module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"wpjoli/joli-table-of-contents","version":"0.1.0","title":"Joli Table of Contents","category":"widgets","icon":"list-view","description":"Table of contents","supports":{"html":false},"textdomain":"joli-table-of-contents","editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css","render":"file:./render.php","attributes":{"hidden_headings":{"type":"array","default":[]},"edited_headings":{"type":"object","default":{}},"toc_width_incontent":{"type":"string","enum":["width-auto","width-100"]},"toc_min_width":{"type":"string"},"toc_max_width":{"type":"string"},"hierarchy_offset":{"type":"string"},"min_headings":{"type":"integer"},"max_headings":{"type":"integer"},"toc_is_sticky":{"type":"integer","enum":[0,1]},"animate_on_fold":{"type":"integer","enum":[0,1]},"smooth_scroll":{"type":"integer","enum":[0,1]},"headings_full_row_clickable":{"type":"integer","enum":[0,1]},"headings_overflow":{"type":"string","enum":["wrap","hidden-ellipsis","hidden"]},"jump_to_offset":{"type":"string"},"jump_to_offset_mobile":{"type":"string"},"fold_on_load":{"type":"string","enum":["no","yes","responsive"]},"fold_if_headings_count":{"type":"integer"},"hide_main_toc":{"type":"integer","enum":[0,1]},"show_header":{"type":"integer","enum":[0,1]},"toc_title":{"type":"string"},"toc_title_alignment":{"type":"string","enum":["left","center","right"]},"header_as_toggle":{"type":"integer","enum":[0,1]},"show_toggle":{"type":"integer","enum":[0,1]},"toggle_position":{"type":"string","enum":["left","right"]},"toggle_type":{"type":"string","enum":["icon","icon-std","text"]},"toggle_button_icon":{"type":"string","enum":["toggle-1","toggle-2"]},"toggle_button_text_closed":{"type":"string"},"toggle_button_text_opened":{"type":"string"},"toggle_button_icon_closed":{"type":"string","enum":["gg-math-plus","gg-math-minus","gg-chevron-down","gg-chevron-up","gg-menu","gg-menu-left-alt","gg-edit-highlight","gg-layout-grid-small","gg-layout-list","gg-pentagon-down","gg-pentagon-up","gg-add-r","gg-remove-r","gg-add","gg-remove","gg-close","gg-chevron-double-down","gg-chevron-double-up","gg-chevron-down-o","gg-chevron-up-o"]},"toggle_button_icon_opened":{"type":"string","enum":["gg-math-plus","gg-math-minus","gg-chevron-down","gg-chevron-up","gg-menu","gg-menu-left-alt","gg-edit-highlight","gg-layout-grid-small","gg-layout-list","gg-pentagon-down","gg-pentagon-up","gg-add-r","gg-remove-r","gg-add","gg-remove","gg-close","gg-chevron-double-down","gg-chevron-double-up","gg-chevron-down-o","gg-chevron-up-o"]},"numeration_type":{"type":"string","enum":["none","numbers","roman","hexadecimal","binary"]},"numeration_display":{"type":"string","enum":["single","full"]},"numeration_separator":{"type":"string"},"numeration_suffix":{"type":"string"},"columns_mode":{"type":"integer","enum":[0,1]},"columns_min_headings":{"type":"integer"},"columns_breakpoint":{"type":"integer"},"headings_depth":{"type":"string"},"skip_h_by_text":{"type":"string"},"skip_h_by_class":{"type":"string"},"skip_h_by_ascending_class":{"type":"string"},"hash_format":{"type":"string","enum":["latin","all","all-translit","counter"]},"hash_counter_prefix":{"type":"string"},"activate_dynamic_unfold":{"type":"integer","enum":[0,1]},"theme":{"type":"string"},"preserve_theme_styles":{"type":"integer","enum":[0,1]},"toc_margin":{"type":"object"},"toc_padding":{"type":"object"},"toc_border_radius":{"type":"object"},"toc_border":{"type":"object"},"toc_border_color":{"type":"string"},"toc_background_color":{"type":"string"},"toc_shadow":{"type":"integer","enum":[0,1]},"toc_shadow_color":{"type":"string"},"toc_header_height":{"type":"string"},"toc_header_margin":{"type":"object"},"toc_header_padding":{"type":"object"},"toc_header_background_color":{"type":"string"},"toc_title_color":{"type":"string"},"toc_title_font_size":{"type":"string"},"toc_title_font_weight":{"type":"string","enum":["none","100","200","300","400","500","600","700","800","900","lighter","bolder"]},"toc_toggle_color":{"type":"string"},"toc_body_margin":{"type":"object"},"toc_body_padding":{"type":"object"},"toc_body_background_color":{"type":"string"},"headings_margin":{"type":"object"},"headings_padding":{"type":"object"},"headings_border_radius":{"type":"object"},"headings_line_height":{"type":"string"},"headings_background_color":{"type":"string"},"headings_background_color_hover":{"type":"string"},"headings_background_color_active":{"type":"string"},"headings_link_margin":{"type":"object"},"headings_link_padding":{"type":"object"},"headings_link_font_size":{"type":"string"},"headings_link_font_weight":{"type":"string","enum":["none","100","200","300","400","500","600","700","800","900","lighter","bolder"]},"headings_link_color":{"type":"string"},"headings_link_color_hover":{"type":"string"},"headings_link_color_active":{"type":"string"},"headings_link_background_color":{"type":"string"},"headings_link_background_color_hover":{"type":"string"},"headings_link_background_color_active":{"type":"string"},"numeration_color":{"type":"string"},"numeration_color_hover":{"type":"string"},"numeration_color_active":{"type":"string"},"columns_separator_style":{"type":"string","enum":["solid","dashed","dotted","double","ridge","none"]},"columns_separator_width":{"type":"string"},"columns_separator_color":{"type":"string"},"activate_floating_table_of_contents":{"type":"integer","enum":[0,1]},"floating_widget_height":{"type":"string"},"floating_hide_numeration":{"type":"integer","enum":[0,1]},"floating_nav_buttons":{"type":"string","enum":["none","next","prev_next"]},"floating_nav_buttons_position":{"type":"string","enum":["left","right","around"]},"floating_nav_buttons_width":{"type":"string"},"floating_compatibility_mode":{"type":"integer","enum":[0,1]},"floating_show_header":{"type":"integer","enum":[0,1]},"expands_on":{"type":"string","enum":["hover","click"]},"collapses_on":{"type":"string","enum":["hover-off","click-away"]},"floating_position":{"type":"string","enum":["top","bottom"]},"floating_offset_y":{"type":"string"},"floating_offset_y_mobile":{"type":"string"},"floating_offset_x":{"type":"string"},"floating_widget_background_color":{"type":"string"},"floating_widget_current_heading_padding":{"type":"object"},"floating_widget_color":{"type":"string"},"floating_widget_font_size":{"type":"string"},"floating_widget_font_weight":{"type":"string","enum":["none","100","200","300","400","500","600","700","800","900","lighter","bolder"]},"floating_widget_nav_color":{"type":"string"},"floating_toc_shadow":{"type":"integer","enum":[0,1]},"floating_toc_shadow_color":{"type":"string"},"floating_widget_border_radius":{"type":"object"},"activate_slide_out_table_of_contents":{"type":"integer","enum":[0,1]},"slide_out_auto_close":{"type":"integer","enum":[0,1]},"slide_out_open_on_load":{"type":"integer","enum":[0,1]},"slide_out_hide_header":{"type":"integer","enum":[0,1]},"slide_out_width":{"type":"string"},"slide_out_mode":{"type":"string","enum":["push","over"]},"slide_out_position":{"type":"string","enum":["left","right"]},"slide_out_toggle_position":{"type":"string","enum":["top","center","bottom"]},"slide_out_toggle_width":{"type":"string"},"slide_out_toggle_offset_y":{"type":"string"},"slide_out_toggle_button_icon":{"type":"string","enum":["gg-layout-list","gg-layout-grid-small","gg-menu","gg-menu-left-alt","gg-edit-highlight","gg-math-plus"]},"slide_out_padding":{"type":"object"},"slide_out_background_color":{"type":"string"},"slide_out_toggle_color":{"type":"string"},"slide_out_toggle_background_color":{"type":"string"},"activate_progress_bar":{"type":"integer","enum":[0,1]},"progress_bar_position":{"type":"string","enum":["top","bottom"]},"progress_bar_offset_y":{"type":"string"},"progress_bar_offset_y_mobile":{"type":"string"},"progress_bar_thickness":{"type":"string"},"progress_bar_color":{"type":"string"},"progress_bar_background_color":{"type":"string"}}}');

/***/ }

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		if (!(moduleId in __webpack_modules__)) {
/******/ 			delete __webpack_module_cache__[moduleId];
/******/ 			var e = new Error("Cannot find module '" + moduleId + "'");
/******/ 			e.code = 'MODULE_NOT_FOUND';
/******/ 			throw e;
/******/ 		}
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"blocks/joli-table-of-contents/index": 0,
/******/ 			"blocks/joli-table-of-contents/style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkjoli_table_of_contents"] = globalThis["webpackChunkjoli_table_of_contents"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["blocks/joli-table-of-contents/style-index"], () => (__webpack_require__("./src/blocks/joli-table-of-contents/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map