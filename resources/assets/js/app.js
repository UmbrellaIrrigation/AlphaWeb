import Form from './utils/form';

/**
 * Vue
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',

    components: {
        Example
    },

    data: {
        form: new Form({
            name: '',
            description: ''
        })
    },

    methods: {
        onSubmit() {
            this.form.post('/projects')
                .then(response => alert('Wahoo!'));
        }
    }
});

$(function () {

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


    
    function onExit($input, save) {
        $input.keypress(function(e) {
            if(e.which == 13) {
                $(this).blur();
            }
        });
        $input.on('blur', save).focus();
    }

    $('body').on('click', '[data-editable]', function() {
        var $elem = $(this);
        var dtag = $elem.prop('tagName');
        var dtype = $elem.attr('data-type');
        var dname = $elem.attr('data-name');

        var $input = $('<input/>', {class: 'form-control', type: dtype, name: dname, required: 'true'}).val( $elem.text() );
        $elem.replaceWith( $input );
        
        var save = function() {
            if ( $input.val().length > 0 ) {
                var $text = $('<' + dtag + ' data-editable />').attr('data-type', dtype).attr('data-name', dname).text( $input.val() );
                $input.replaceWith( $text );
            }
        };
        
        if ( $input.val().length ) {
            onExit($input, save);
        } 
    });
});