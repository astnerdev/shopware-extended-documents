<?php declare(strict_types=1);


namespace MastoxExtendedDocuments\Extension\Media;

use MastoxExtendedDocuments\Entity\Downloads\ProductDownloadDefinition;
use Shopware\Core\Content\Media\MediaDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\CascadeDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class MediaExtension extends EntityExtension {

    public function extendFields(FieldCollection $collection): void {
        $collection->add(
            (new OneToManyAssociationField('downloads', ProductDownloadDefinition::class, 'media_id'))->addFlags(new CascadeDelete())
        );
    }

    public function getDefinitionClass(): string {
        return MediaDefinition::class;
    }
}
