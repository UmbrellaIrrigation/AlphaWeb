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
        viewMode: 0,
        currentUser: Object
    },

    methods: {
        createUser() {
            this.userForm.post('/users/user/store')
                .then(response => {
                    alert('New User Added!');
                    $('#createModal').modal('hide');
                    Event.$emit('user-tree-refresh');
                } 
            );
        },
        deleteUser() {
            alert('User Deleted');
            Event.$emit('user-tree-refresh');
        }
    },

    mounted: function() {
        
    },

    created: function() {
        Event.$on('user-tree-clicked-folder', (data) => {
        
        });
        Event.$on('user-tree-clicked-item', (data) => {
            axios.get('/users/user/show/' + data.id)
                .then((response) => {
                    this.currentUser = response.data;
                    this.viewMode = 1;
                })
                .catch((error) => {
                    console.log(error);
                });
        });
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