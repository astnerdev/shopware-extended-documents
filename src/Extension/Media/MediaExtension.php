<?php declare(strict_types=1);


namespace MastoxProductAttachments\Extension\Media;

use MastoxProductAttachments\Entity\Attachments\ProductAttachmentsDefinition;
use Shopware\Core\Content\Media\MediaDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\CascadeDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class MediaExtension extends EntityExtension {

    public function extendFields(FieldCollection $collection): void {
        $collection->add(
            (new OneToManyAssociationField('attachments', ProductAttachmentsDefinition::class, 'media_id'))->addFlags(new CascadeDelete())
        );
    }

    public function getDefinitionClass(): string {
        return MediaDefinition::class;
    }
}
