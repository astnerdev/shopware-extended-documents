import template from './sw-product-detail-base.html.twig';
// @todo assign attachments to media selection
Shopware.Component.override('sw-product-detail-base', {
    template,

    data() {
        return {
            uploadTag: 'attachments',
            mediaItems: [],
            uploadAttachmentTag: 'attachments',
            defaultAttachmentMediaFolder: 'attachments',
            enitiy: this.element,
        }
    },

    methods: {
        onImageUpload() {
            // @TODO
        },

        onItemRemove() {
            // @TODO
        },

        onOpenMediaModal() {
            // @TODO
        },

        onMediaUploadButtonOpenSidebar() {
            this.$root.$emit('sidebar-toggle-open');
        },


    }
});
