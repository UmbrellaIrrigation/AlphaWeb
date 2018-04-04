/**
 * Form and Vue Element
 */

import Example from '../components/Example';

const app = new Vue({
    el: '#app',

    components: {
        Example
    },

    data: {
        userForm: new Form({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            permission: ''
        })
    },

    methods: {
        createUser() {
            this.userForm.post('/users/user/store')
                .then(response => {
                    alert('New User Added!');
                    $('#createModal').modal('hide');
                } 
            );
        }
    }
});

/**
 * Fancytree Stuff
 */
$(function() {
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
});