<template>
    <div></div>
</template>

<script>
export default {
    props: {
        route: String,
        type: String
    },
    data: function() {
        return {
            refreshEvent: this.type + '-refresh',
            clickedFolderEvent: this.type + '-clicked-folder',
            clickedItemEvent: this.type + '-clicked-item'
        };
    },
    methods: {
        updateTree: function() {
            $(this.$el).fancytree('option', 'source', {
                url: this.route
            });
        }
    },
    created: function() {
        Event.$on(this.refreshEvent, () => {
            this.updateTree();
        });
        Event.$on('ft-activate', (data) => {
            let node = data.data;
            if (node.folder === true) {
                Event.$emit(this.clickedFolderEvent, {
                    id: node.data.id
                });
            }
            else {
                Event.$emit(this.clickedItemEvent, {
                    id: node.data.id
                });
            }
        });
    },
    mounted: function() {
        $(this.$el).fancytree({
            checkbox: false,
            debugLevel: 2,
            minExpandLevel: 1,
            
            source: {
                url: this.route
            },

            init: function(event, data, flag) {
				//console.log(this.treeData);
			},
            postinit: function (isReloading, isError) {
                this.reactivate();
            },
            focus: function (event, data) {
                
                // Auto-activate focused node after 2 seconds
                data.node.scheduleAction("activate", 2000);
            },
            activate: function (event, data) {
                var node = data.node;
                Event.$emit('ft-activate', { data: node });
            },
        });
    }
}
</script>

