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
/******/ 	return __webpack_require__(__webpack_require__.s = 65);
/******/ })
/************************************************************************/
/******/ ({

/***/ 65:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(66);


/***/ }),

/***/ 66:
/***/ (function(module, exports) {

/**
 * Form and Vue Element
 */

var app = new Vue({
    el: '#app',

    components: {},

    data: {
        form: new Form({
            name: '',
            description: ''
        })
    },

    methods: {
        onSubmit: function onSubmit() {
            this.form.post('/projects').then(function (response) {
                return alert('Wahoo!');
            });
        }
    }
});

/**
 * Fancytree Stuff
 */
$(function () {
    var tree = $("#tree").fancytree({
        checkbox: false,
        debugLevel: 2,
        minExpandLevel: 1,
        postinit: function postinit(isReloading, isError) {
            this.reactivate();
        },
        focus: function focus(event, data) {
            // Auto-activate focused node after 2 seconds
            data.node.scheduleAction("activate", 2000);
        },
        activate: function activate(event, data) {
            var node = data.node;
            // Use <a> href and target attributes to load the content:
            if (node.data.href) {
                // Open target
                window.open(node.data.href, node.data.target);
                // or open target in iframe
                //                $("[name=contentFrame]").attr("src", node.data.href);
            }
        }
    });

    $("#treeSort").click(function () {
        var node = tree.fancytree("getRootNode");
        node.sortChildren(null, true);
    });

    $("#treeExpand").click(function () {
        tree.fancytree("getTree").visit(function (node) {
            node.setExpanded();
        });
    });

    $("#treeCollapse").click(function () {
        tree.fancytree("getTree").visit(function (node) {
            node.setExpanded(false);
        });
    });
});

/***/ })

/******/ });