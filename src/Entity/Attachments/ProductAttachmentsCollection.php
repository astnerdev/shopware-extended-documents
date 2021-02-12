<?php declare(strict_types=1);
namespace MastoxProductAttachments\Entity\Attachments;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void              add(ProductAttachmentsEntity $entity)
 * @method void              set(string $key, ProductAttachmentsEntity $entity)
 * @method ProductAttachmentsEntity[]    getIterator()
 * @method ProductAttachmentsEntity[]    getElements()
 * @method ProductAttachmentsEntity|null get(string $key)
 * @method ProductAttachmentsEntity|null first()
 * @method ProductAttachmentsEntity|null last()
 */
class ProductAttachmentsCollection extends EntityCollection {
    protected function getExpectedClass(): string {
        return ProductAttachmentsEntity::class;
    }
}
