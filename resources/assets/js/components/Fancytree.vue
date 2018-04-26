<template>
    <div></div>
</template>

<script>
export default {
    props: {
        route: String,
        name: String
    },
    data: function() {
        return {
            refreshEvent: this.name + '-refresh',
            clickedFolderEvent: this.name + '-clicked-folder',
            clickedItemEvent: this.name + '-clicked-item'
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
    },
    mounted: function() {
        let clickedFolderEvent = this.clickedFolderEvent;
        let clickedItemEvent = this.clickedItemEvent;

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
                if (node.folder === true) {
                    Event.$emit(clickedFolderEvent, {
                        id: node.data.id,
                        name: node.data.name
                    });
                }
                else {
                    Event.$emit(clickedItemEvent, {
                        id: node.data.id,
                        name: node.data.name
                    });
                }
            },
        });
    }
}
</script>

