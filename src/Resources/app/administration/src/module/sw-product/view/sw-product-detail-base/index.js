import template from './sw-product-detail-base.html.twig';

const Criteria = Shopware.Data.Criteria;
Shopware.Component.override('sw-product-detail-base', {
    template,

    data() {
        return {
            attachmentCollection: [],
            mediaModalOpen: false,
            defaultFolderName: 'Product Attachments',
            defaultMediaFolderId: '',
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
            return this.repositoryFactory.create('mtx_product_attachments');
        },
        defaultMediaFolderRepository() {
            return this.repositoryFactory.create('media_folder');
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
            this.defaultAttachmentFolder();
        },

        defaultAttachmentFolder() {
            const criteria = new Criteria();
            criteria.addFilter(Criteria.equals('name', 'Product Attachments'));
            this.defaultMediaFolderRepository.search(criteria, Shopware.Context.api).then((attachmentCollection) => {
                this.attachmentCollection = attachmentCollection.map((data) => {
                    this.defaultMediaFolderId = data.id;
                });
            });
        },

        successfulUploadAttachment(data) {
            const item = this.attachmentRepository.create(this.context);
            item.mediaId = data.id;
            item.productId = this.product.id;
            item.createAt = new Date();
            item.counter = 0;

            this.attachmentRepository.save(item, Shopware.Context.api).then(() => {
                this.attachmentCollection.push(item);
            });
        },

        onRemoveItem(mediaItem, index) {
            this.attachmentRepository.delete(this.attachmentCollection[index].id, Shopware.Context.api).then(() => {
                this.getProductAttachments(this.product.id);
            });
        },


        onMediaSelectionChange(mediaItems) {
            mediaItems.forEach((item) => {
                const newMedia = this.attachmentRepository.create(this.context);
                newMedia.mediaId = item.id;
                newMedia.productId = this.product.id;
                newMedia.createAt = new Date();
                newMedia.counter = 0;
                this.attachmentRepository.save(newMedia, Shopware.Context.api).then(() => {
                    this.attachmentCollection.push(newMedia);
                });
            });
        },

        onOpenMediaModal() {
            this.mediaModalOpen = true;
        },

        onCloseMediaModal() {
            this.mediaModalOpen = false;
        },
    }
});
