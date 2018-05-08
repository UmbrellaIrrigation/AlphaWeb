/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 58);
/******/ })
/************************************************************************/
/******/ ({

/***/ 10:
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ 11:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["a"] = ({
    mounted: function mounted() {
        console.log('Component mounted.');
    }
});

/***/ }),

/***/ 32:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_true_presets_env_modules_false_targets_browsers_2_uglify_true_node_modules_vue_loader_lib_selector_type_script_index_0_Example_vue__ = __webpack_require__(11);
/* empty harmony namespace reexport */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_650f2efa_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_Example_vue__ = __webpack_require__(33);
var disposed = false
var normalizeComponent = __webpack_require__(10)
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_true_presets_env_modules_false_targets_browsers_2_uglify_true_node_modules_vue_loader_lib_selector_type_script_index_0_Example_vue__["a" /* default */],
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_650f2efa_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_Example_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/Example.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-650f2efa", Component.options)
  } else {
    hotAPI.reload("data-v-650f2efa", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ 33:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm._m(0)
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "container" }, [
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-8 col-md-offset-2" }, [
          _c("div", { staticClass: "panel panel-default" }, [
            _c("div", { staticClass: "panel-heading" }, [
              _vm._v("Example Component")
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "panel-body" }, [
              _vm._v(
                "\n                    I'm an example component!\n                "
              )
            ])
          ])
        ])
      ])
    ])
  }
]
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-650f2efa", esExports)
  }
}

/***/ }),

/***/ 36:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
//
//
//
//

/* harmony default export */ __webpack_exports__["a"] = ({
    props: {
        route: String,
        name: String
    },
    data: function data() {
        return {
            refreshEvent: this.name + '-refresh',
            clickedFolderEvent: this.name + '-clicked-folder',
            clickedItemEvent: this.name + '-clicked-item'
        };
    },
    methods: {
        updateTree: function updateTree() {
            $(this.$el).fancytree('option', 'source', {
                url: this.route
            });
        }
    },
    created: function created() {
        var _this = this;

        Event.$on(this.refreshEvent, function () {
            _this.updateTree();
        });
    },
    mounted: function mounted() {
        var clickedFolderEvent = this.clickedFolderEvent;
        var clickedItemEvent = this.clickedItemEvent;

        $(this.$el).fancytree({
            checkbox: false,
            debugLevel: 2,
            minExpandLevel: 1,

            source: {
                url: this.route
            },

            init: function init(event, data, flag) {
                //console.log(this.treeData);
            },
            postinit: function postinit(isReloading, isError) {
                this.reactivate();
            },
            focus: function focus(event, data) {

                // Auto-activate focused node after 2 seconds
                data.node.scheduleAction("activate", 2000);
            },
            activate: function activate(event, data) {
                var node = data.node;
                if (node.folder === true) {
                    Event.$emit(clickedFolderEvent, {
                        id: node.data.id,
                        name: node.data.name
                    });
                } else {
                    Event.$emit(clickedItemEvent, {
                        id: node.data.id,
                        name: node.data.name
                    });
                }
            }
        });
    }
});

/***/ }),

/***/ 37:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["a"] = ({
    props: {
        timeout: {
            type: Number,
            default: 3000
        },
        transition: {
            type: String,
            default: 'slide-fade'
        },
        types: {
            type: Object,
            default: function _default() {
                return {
                    base: 'alert',
                    success: 'alert-success',
                    error: 'alert-danger',
                    warning: 'alert-warning',
                    info: 'alert-info'
                };
            }
        },
        displayIcons: {
            type: Boolean,
            default: false
        },
        icons: {
            type: Object,
            default: function _default() {
                return {
                    base: 'fa',
                    error: 'fa-exclamation-circle',
                    success: 'fa-check-circle',
                    info: 'fa-info-circle',
                    warning: 'fa-exclamation-circle'
                };
            }
        }
    },
    data: function data() {
        return {
            notifications: []
        };
    },
    /**
     * On creation Flash a message if a message exists otherwise listen for
     * flash event from global event bus
     */
    created: function created() {
        var _this = this;

        window.events.$on('flash', function (message, type) {
            return _this.flash(message, type);
        });
    },

    methods: {
        /**
         * Flash our alert to the screen for the user to see
         * and begin the process to hide it
         *
         * @param message
         * @param type
         */
        flash: function flash(message, type) {
            this.notifications.push({
                message: message,
                type: type,
                typeObject: this.classes(this.types, type),
                iconObject: this.classes(this.icons, type)
            });
            setTimeout(this.hide, this.timeout);
        },

        /**
         * Sets and returns the values needed
         *
         * @param type
         */
        classes: function classes(propObject, type) {
            var classes = {};
            if (propObject.hasOwnProperty('base')) {
                classes[propObject.base] = true;
            }
            if (propObject.hasOwnProperty(type)) {
                classes[propObject[type]] = true;
            }
            return classes;
        },

        /**
         * Hide Our Alert
         *
         * @param item
         */
        hide: function hide() {
            var item = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : this.notifications[0];

            var key = this.notifications.indexOf(item);
            this.notifications.splice(key, 1);
        }
    }
});

/***/ }),

/***/ 53:
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function(useSourceMap) {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		return this.map(function (item) {
			var content = cssWithMappingToString(item, useSourceMap);
			if(item[2]) {
				return "@media " + item[2] + "{" + content + "}";
			} else {
				return content;
			}
		}).join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};

function cssWithMappingToString(item, useSourceMap) {
	var content = item[1] || '';
	var cssMapping = item[3];
	if (!cssMapping) {
		return content;
	}

	if (useSourceMap && typeof btoa === 'function') {
		var sourceMapping = toComment(cssMapping);
		var sourceURLs = cssMapping.sources.map(function (source) {
			return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
		});

		return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
	}

	return [content].join('\n');
}

// Adapted from convert-source-map (MIT)
function toComment(sourceMap) {
	// eslint-disable-next-line no-undef
	var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
	var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

	return '/*# ' + data + ' */';
}


/***/ }),

/***/ 58:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(59);


/***/ }),

/***/ 59:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__components_Example__ = __webpack_require__(32);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__components_Fancytree__ = __webpack_require__(60);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__components_Flash__ = __webpack_require__(62);
/**
 * Form and Vue Element
 */





var app = new Vue({
    el: '#app',

    components: {
        Example: __WEBPACK_IMPORTED_MODULE_0__components_Example__["default"],
        Fancytree: __WEBPACK_IMPORTED_MODULE_1__components_Fancytree__["a" /* default */],
        Flash: __WEBPACK_IMPORTED_MODULE_2__components_Flash__["a" /* default */]
    },

    data: {
        userForm: new Form({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            permission: ''
        }),
        userGroupForm: new Form({
            name: '',
            parent_id: 'null'
        }),
        parentName: '',
        viewMode: 0,
        currentUser: Object,
        currentUserGroup: Object,
        currentParentGroup: Object
    },

    methods: {
        createUser: function createUser() {
            this.userForm.post('/users/user/store').then(function (response) {
                flash('New User Added!', 'success');
                $('#createModal').modal('hide');
                Event.$emit('main-tree-refresh');
            });
        },
        createUserGroup: function createUserGroup() {
            var _this = this;

            this.userGroupForm.post('/users/group/store').then(function (response) {
                flash('New User Group Added!', 'success');
                $('#createGroupModal').modal('hide');
                Event.$emit('main-tree-refresh');
                Event.$emit('new-group-tree-refresh');
                _this.userGroupForm.parent_id = 'null';
            });
        },
        deleteUser: function deleteUser() {
            var _this2 = this;

            if (this.currentUser) {
                axios.delete('/users/user/delete/' + this.currentUser.id).then(function (response) {
                    flash('User Successfully Deleted.', 'success');
                    $('#deleteModal').modal('hide');
                    Event.$emit('main-tree-refresh');
                    _this2.viewMode = 0;
                }).catch(function (error) {
                    flash('Error: Failed to delete user.', 'error');
                    console.log(error);
                });
            } else {
                flash('Error: Please select a user first.', 'error');
            }
        },
        deleteUserGroup: function deleteUserGroup(keepChildren) {
            var _this3 = this;

            var route = '';
            if (keepChildren === true) {
                route = '/users/group/delete/';
            } else {
                route = '/users/group/deleteWithChildren/';
            }
            if (this.currentUserGroup) {
                axios.delete(route + this.currentUserGroup.id).then(function (response) {
                    flash('User Group Successfully Deleted', 'success');
                    $('#deleteGroupModal').modal('hide');
                    Event.$emit('main-tree-refresh');
                    Event.$emit('new-group-tree-refresh');
                    _this3.viewMode = 0;
                }).catch(function (error) {
                    flash('Error: Failed to delete user group.', 'error');
                    console.log(error);
                });
            } else {
                flash('Error: Please select a user group first.', 'error');
            }
        }
    },

    mounted: function mounted() {
        $("#treeSort").click(function () {
            var node = $("#tree").fancytree("getRootNode");
            node.sortChildren(null, true);
        });

        $("#treeExpand").click(function () {
            $("#tree").fancytree("getTree").visit(function (node) {
                node.setExpanded();
            });
        });

        $("#treeCollapse").click(function () {
            $("#tree").fancytree("getTree").visit(function (node) {
                node.setExpanded(false);
            });
        });
    },

    created: function created() {
        var _this4 = this;

        Event.$on('main-tree-clicked-folder', function (data) {
            axios.get('/users/group/show/' + data.id).then(function (response) {
                _this4.currentUserGroup = response.data;
                if (_this4.currentUserGroup.parent_id) {
                    axios.get('/users/group/show/' + _this4.currentUserGroup.parent_id).then(function (response) {
                        _this4.currentParentGroup = response.data;
                    }).catch(function (error) {
                        _this4.currentParentGroup = null;
                        console.log(error);
                    });
                } else {
                    _this4.currentParentGroup = null;
                }
                _this4.viewMode = 2;
            }).catch(function (error) {
                _this4.currentUserGroup = null;
                flash('Error: Failed to load user group.', 'error');
                console.log(error);
            });
        });
        Event.$on('main-tree-clicked-item', function (data) {
            axios.get('/users/user/show/' + data.id).then(function (response) {
                _this4.currentUser = response.data;
                _this4.viewMode = 1;
            }).catch(function (error) {
                _this4.currentUser = null;
                flash('Error: Failed to load user.', 'error');
                console.log(error);
            });
        });
        Event.$on('new-group-tree-clicked-folder', function (data) {
            _this4.userGroupForm.parent_id = data.id;
            _this4.parentName = data.name;
        });
    }
});

/***/ }),

/***/ 60:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_true_presets_env_modules_false_targets_browsers_2_uglify_true_node_modules_vue_loader_lib_selector_type_script_index_0_Fancytree_vue__ = __webpack_require__(36);
/* unused harmony namespace reexport */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_15397a40_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_Fancytree_vue__ = __webpack_require__(61);
var disposed = false
var normalizeComponent = __webpack_require__(10)
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_true_presets_env_modules_false_targets_browsers_2_uglify_true_node_modules_vue_loader_lib_selector_type_script_index_0_Fancytree_vue__["a" /* default */],
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_15397a40_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_Fancytree_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/Fancytree.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-15397a40", Component.options)
  } else {
    hotAPI.reload("data-v-15397a40", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["a"] = (Component.exports);


/***/ }),

/***/ 61:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div")
}
var staticRenderFns = []
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-15397a40", esExports)
  }
}

/***/ }),

/***/ 62:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_true_presets_env_modules_false_targets_browsers_2_uglify_true_node_modules_vue_loader_lib_selector_type_script_index_0_Flash_vue__ = __webpack_require__(37);
/* unused harmony namespace reexport */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_03030049_hasScoped_true_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_Flash_vue__ = __webpack_require__(67);
var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(63)
}
var normalizeComponent = __webpack_require__(10)
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-03030049"
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_true_presets_env_modules_false_targets_browsers_2_uglify_true_node_modules_vue_loader_lib_selector_type_script_index_0_Flash_vue__["a" /* default */],
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_03030049_hasScoped_true_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_Flash_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/Flash.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-03030049", Component.options)
  } else {
    hotAPI.reload("data-v-03030049", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["a"] = (Component.exports);


/***/ }),

/***/ 63:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(64);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(65)("2ca0e7aa", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-03030049\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Flash.vue", function() {
     var newContent = require("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-03030049\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Flash.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 64:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(53)(false);
// imports


// module
exports.push([module.i, "\n.alert-wrap[data-v-03030049] {\n    position: fixed;\n    right: 25px;\n    bottom: 25px;\n    z-index:9999;\n}\n/**\n * Fade transition styles\n */\n.fade-enter-active[data-v-03030049], .fade-leave-active[data-v-03030049] {\n    transition: opacity .5s\n}\n.fade-enter[data-v-03030049], .fade-leave-to[data-v-03030049] /* .fade-leave-active in <2.1.8 */ {\n    opacity: 0\n}\n/**\n * Bounce transition styles\n */\n.bounce-enter-active[data-v-03030049] {\n    animation: bounce-in-data-v-03030049 .5s;\n}\n.bounce-leave-active[data-v-03030049] {\n    animation: bounce-in-data-v-03030049 .5s reverse;\n}\n@keyframes bounce-in-data-v-03030049 {\n0% {\n        transform: scale(0);\n}\n50% {\n        transform: scale(1.5);\n}\n100% {\n        transform: scale(1);\n}\n}\n/**\n * Slide transition styles\n */\n.slide-fade-enter-active[data-v-03030049] {\n    transition: all .3s ease;\n}\n.slide-fade-leave-active[data-v-03030049] {\n    transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);\n}\n.slide-fade-enter[data-v-03030049], .slide-fade-leave-to[data-v-03030049]\n    /* .slide-fade-leave-active for <2.1.8 */ {\n    transform: translateX(10px);\n    opacity: 0;\n}\n", ""]);

// exports


/***/ }),

/***/ 65:
/***/ (function(module, exports, __webpack_require__) {

/*
  MIT License http://www.opensource.org/licenses/mit-license.php
  Author Tobias Koppers @sokra
  Modified by Evan You @yyx990803
*/

var hasDocument = typeof document !== 'undefined'

if (typeof DEBUG !== 'undefined' && DEBUG) {
  if (!hasDocument) {
    throw new Error(
    'vue-style-loader cannot be used in a non-browser environment. ' +
    "Use { target: 'node' } in your Webpack config to indicate a server-rendering environment."
  ) }
}

var listToStyles = __webpack_require__(66)

/*
type StyleObject = {
  id: number;
  parts: Array<StyleObjectPart>
}

type StyleObjectPart = {
  css: string;
  media: string;
  sourceMap: ?string
}
*/

var stylesInDom = {/*
  [id: number]: {
    id: number,
    refs: number,
    parts: Array<(obj?: StyleObjectPart) => void>
  }
*/}

var head = hasDocument && (document.head || document.getElementsByTagName('head')[0])
var singletonElement = null
var singletonCounter = 0
var isProduction = false
var noop = function () {}
var options = null
var ssrIdKey = 'data-vue-ssr-id'

// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
// tags it will allow on a page
var isOldIE = typeof navigator !== 'undefined' && /msie [6-9]\b/.test(navigator.userAgent.toLowerCase())

module.exports = function (parentId, list, _isProduction, _options) {
  isProduction = _isProduction

  options = _options || {}

  var styles = listToStyles(parentId, list)
  addStylesToDom(styles)

  return function update (newList) {
    var mayRemove = []
    for (var i = 0; i < styles.length; i++) {
      var item = styles[i]
      var domStyle = stylesInDom[item.id]
      domStyle.refs--
      mayRemove.push(domStyle)
    }
    if (newList) {
      styles = listToStyles(parentId, newList)
      addStylesToDom(styles)
    } else {
      styles = []
    }
    for (var i = 0; i < mayRemove.length; i++) {
      var domStyle = mayRemove[i]
      if (domStyle.refs === 0) {
        for (var j = 0; j < domStyle.parts.length; j++) {
          domStyle.parts[j]()
        }
        delete stylesInDom[domStyle.id]
      }
    }
  }
}

function addStylesToDom (styles /* Array<StyleObject> */) {
  for (var i = 0; i < styles.length; i++) {
    var item = styles[i]
    var domStyle = stylesInDom[item.id]
    if (domStyle) {
      domStyle.refs++
      for (var j = 0; j < domStyle.parts.length; j++) {
        domStyle.parts[j](item.parts[j])
      }
      for (; j < item.parts.length; j++) {
        domStyle.parts.push(addStyle(item.parts[j]))
      }
      if (domStyle.parts.length > item.parts.length) {
        domStyle.parts.length = item.parts.length
      }
    } else {
      var parts = []
      for (var j = 0; j < item.parts.length; j++) {
        parts.push(addStyle(item.parts[j]))
      }
      stylesInDom[item.id] = { id: item.id, refs: 1, parts: parts }
    }
  }
}

function createStyleElement () {
  var styleElement = document.createElement('style')
  styleElement.type = 'text/css'
  head.appendChild(styleElement)
  return styleElement
}

function addStyle (obj /* StyleObjectPart */) {
  var update, remove
  var styleElement = document.querySelector('style[' + ssrIdKey + '~="' + obj.id + '"]')

  if (styleElement) {
    if (isProduction) {
      // has SSR styles and in production mode.
      // simply do nothing.
      return noop
    } else {
      // has SSR styles but in dev mode.
      // for some reason Chrome can't handle source map in server-rendered
      // style tags - source maps in <style> only works if the style tag is
      // created and inserted dynamically. So we remove the server rendered
      // styles and inject new ones.
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  if (isOldIE) {
    // use singleton mode for IE9.
    var styleIndex = singletonCounter++
    styleElement = singletonElement || (singletonElement = createStyleElement())
    update = applyToSingletonTag.bind(null, styleElement, styleIndex, false)
    remove = applyToSingletonTag.bind(null, styleElement, styleIndex, true)
  } else {
    // use multi-style-tag mode in all other cases
    styleElement = createStyleElement()
    update = applyToTag.bind(null, styleElement)
    remove = function () {
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  update(obj)

  return function updateStyle (newObj /* StyleObjectPart */) {
    if (newObj) {
      if (newObj.css === obj.css &&
          newObj.media === obj.media &&
          newObj.sourceMap === obj.sourceMap) {
        return
      }
      update(obj = newObj)
    } else {
      remove()
    }
  }
}

var replaceText = (function () {
  var textStore = []

  return function (index, replacement) {
    textStore[index] = replacement
    return textStore.filter(Boolean).join('\n')
  }
})()

function applyToSingletonTag (styleElement, index, remove, obj) {
  var css = remove ? '' : obj.css

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = replaceText(index, css)
  } else {
    var cssNode = document.createTextNode(css)
    var childNodes = styleElement.childNodes
    if (childNodes[index]) styleElement.removeChild(childNodes[index])
    if (childNodes.length) {
      styleElement.insertBefore(cssNode, childNodes[index])
    } else {
      styleElement.appendChild(cssNode)
    }
  }
}

function applyToTag (styleElement, obj) {
  var css = obj.css
  var media = obj.media
  var sourceMap = obj.sourceMap

  if (media) {
    styleElement.setAttribute('media', media)
  }
  if (options.ssrId) {
    styleElement.setAttribute(ssrIdKey, obj.id)
  }

  if (sourceMap) {
    // https://developer.chrome.com/devtools/docs/javascript-debugging
    // this makes source maps inside style tags work properly in Chrome
    css += '\n/*# sourceURL=' + sourceMap.sources[0] + ' */'
    // http://stackoverflow.com/a/26603875
    css += '\n/*# sourceMappingURL=data:application/json;base64,' + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + ' */'
  }

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = css
  } else {
    while (styleElement.firstChild) {
      styleElement.removeChild(styleElement.firstChild)
    }
    styleElement.appendChild(document.createTextNode(css))
  }
}


/***/ }),

/***/ 66:
/***/ (function(module, exports) {

/**
 * Translates the list format produced by css-loader into something
 * easier to manipulate.
 */
module.exports = function listToStyles (parentId, list) {
  var styles = []
  var newStyles = {}
  for (var i = 0; i < list.length; i++) {
    var item = list[i]
    var id = item[0]
    var css = item[1]
    var media = item[2]
    var sourceMap = item[3]
    var part = {
      id: parentId + ':' + i,
      css: css,
      media: media,
      sourceMap: sourceMap
    }
    if (!newStyles[id]) {
      styles.push(newStyles[id] = { id: id, parts: [part] })
    } else {
      newStyles[id].parts.push(part)
    }
  }
  return styles
}


/***/ }),

/***/ 67:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.notifications.length > 0
    ? _c(
        "div",
        { staticClass: "alert-wrap" },
        [
          _c(
            "transition-group",
            { attrs: { name: _vm.transition, tag: "div" } },
            _vm._l(_vm.notifications, function(item, index) {
              return _c(
                "div",
                {
                  key: index,
                  class: item.typeObject,
                  attrs: { role: "alert" }
                },
                [
                  _vm.displayIcons
                    ? _c("span", { class: item.iconObject })
                    : _vm._e(),
                  _vm._v(" "),
                  _c("span", { domProps: { innerHTML: _vm._s(item.message) } })
                ]
              )
            })
          )
        ],
        1
      )
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-03030049", esExports)
  }
}

/***/ })

/******/ });