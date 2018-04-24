/**
 * Form and Vue Element
 */

import Example from '../components/Example';
import Fancytree from '../components/Fancytree';

const app = new Vue({
    el: '#app',

    components: {
        Example,
        Fancytree
    },

    data: {
        userForm: new Form({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            permission: ''
        }),
        viewMode: 0
    },

    methods: {
        createUser() {
            this.userForm.post('/users/user/store')
                .then(response => {
                    alert('New User Added!');
                    $('#createModal').modal('hide');
                    Event.$emit('refresh-user-tree');
                } 
            );
        },
        deleteUser() {
            alert('User Deleted');
            Event.$emit('refresh-user-tree');
        }
    },

    mounted: function() {
        
    },

    created: function() {

    }
});

$(function() {
    $("#treeSort").click(function() {
        var node = $("#tree").fancytree("getRootNode");
        node.sortChildren(null, true);
    });

    $("#treeExpand").click(function() {
        $("#tree").fancytree("getTree").visit(function(node){
            node.setExpanded();
        });
    });

    $("#treeCollapse").click(function() {
        $("#tree").fancytree("getTree").visit(function(node){
            node.setExpanded(false);
        });
    });
});