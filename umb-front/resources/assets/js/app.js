
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});


$(function () {
    $("#createUserModal").modal();

    /**
     * Fancytree Stuff
     */
    var tree = $("#tree").fancytree({
        checkbox: false,
        debugLevel: 2,
        minExpandLevel: 1,
        postinit: function (isReloading, isError) {
            this.reactivate();
        },
        focus: function (event, data) {
            // Auto-activate focused node after 2 seconds
            data.node.scheduleAction("activate", 2000);
        },
        activate: function (event, data) {
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

    $( "#treeSort" ).click(function() {
        var node = tree.fancytree("getRootNode");
        node.sortChildren(null, true);
    });

    $( "#treeExpand" ).click(function() {
        tree.fancytree("getTree").visit(function(node){
            node.setExpanded();
        });
    });

    $( "#treeCollapse" ).click(function() {
        tree.fancytree("getTree").visit(function(node){
            node.setExpanded(false);
        });
    });

    /**
     * Edit User
     */
    function onExit($input, save) {
        $input.keypress(function(e) {
            if(e.which == 13) {
                $(this).blur();
            }
        });
        $input.one('blur', save).focus();
    }

    $('body').on('click', '[data-edit-user-name]', function() {
        var $el = $(this);
                    
        var $input = $('<input type="text" class="form-control" id="name" name="name" required />').val( $el.text() );
        $el.replaceWith( $input );
        
        var save = function() {
            var $h3 = $('<h3 data-edit-user-name />').text( $input.val() );
            $input.replaceWith( $h3 );
        };
        
        onExit($input, save);
    });

    $('body').on('click', '[data-edit-user-desc]', function() {
        var $el = $(this);
                    
        var $input = $('<input type="text" class="form-control" id="description" name="description" required/>').val( $el.text() );
        $el.replaceWith( $input );
        
        var save = function() {
            var $p = $('<p data-edit-user-desc />').text( $input.val() );
            $input.replaceWith( $p );
        };
        
        onExit($input, save);
    });

    $('body').on('click', '[data-edit-user-auth]', function() {
        var $el = $(this);
                    
        var $input = $('<input type="number" class="form-control" id="permission" name="permission" required/>').val( $el.text() );
        $el.replaceWith( $input );
        
        var save = function() {
            var $p = $('<p data-edit-user-auth />').text( $input.val() );
            $input.replaceWith( $p );
        };
        
        onExit($input, save);
    });

});
