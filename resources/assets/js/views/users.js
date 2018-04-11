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
        route: '/api/users/treeData'
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
    },

    mounted: function() {
        
    },

    created: function() {

    }
});
