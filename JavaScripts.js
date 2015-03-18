/**/


/**
 * Create a new element with provided attributes.
 *
 * @param  {string}  name   Element name.
 * @param  {object}  attrs  Element attributes.
 *
 * @return  {object}  Element
 */
var fnTag = function (name, attrs) {
    "use strict";

    var el = document.createElement(name.toString());

    (attrs != 0) && Object.keys(attrs).forEach(function (key) {
        el.setAttribute(key, attrs[key]);
    });

    return el;
};


/**/
