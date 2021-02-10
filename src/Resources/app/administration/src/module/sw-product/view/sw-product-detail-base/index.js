import template from './sw-product-detail-base.html.twig';

const Criteria = Shopware.Data.Criteria;
Shopware.Component.override('sw-product-detail-base', {
    template,

    data() {
        return {
            attachmentCollection: [],
        }
    },

    watch: {
        product() {
            if (this.product.id) {
                this.getProductAttachments(this.product.id);
            }
        }
    },


    computed: {
        attachmentRepository() {
            return this.repositoryFactory.create('product_downloads');
        },
        attachmentEntity() {
            return this.repositoryFactory.create('product_downloads');
        }
    },


    methods: {
        getProductAttachments(productId) {
            const criteria = new Criteria();
            criteria.addFilter(Criteria.equals('productId', productId));
            criteria.setPage(this.page);
            criteria.setLimit(this.limit);
            criteria.setTotalCountMode(1);

            this.attachmentRepository.search(criteria, Shopware.Context.api).then((attachmentCollection) => {
                this.attachmentCollection = attachmentCollection.map((data) => {
                    return data;
                });
            });
        },

        createdComponent() {
            this.$super('createdComponent');
        },

        successfulUploadAttachment(data) {
            const item = this.attachmentRepository.create(this.context);
            item.mediaId = data.id;
            item.productId = this.product.id;
            item.createAt = new Date();

            this.attachmentRepository.save(item, Shopware.Context.api).then(() => {
                this.attachmentCollection.push(data);
            });
        },

        onRemoveItem(mediaItem, index) {
            this.attachmentRepository.delete(this.attachmentCollection[index].id, Shopware.Context.api).then(() => {
                this.getProductAttachments(this.product.id);
            });
        },

        onItemDrop() {
            console.log('drop')
        },

        onOpenAttachmentMediaSidebar() {
            //@TODO media-drop event ?
            this.$root.$emit('sidebar-toggle-open');
        }
    }
});
