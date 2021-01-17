<?php declare(strict_types=1);
namespace MastoxExtendedDocuments\Entity\Downloads;


use Shopware\Core\Content\Media\MediaEntity;
use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class ProductDownloadEntity extends Entity {

    use EntityIdTrait;

    /**
     * @var string
     */
    protected $productId;

    /**
     * @var ProductEntity
     */
    protected $product;

    /**
     * @var string
     */
    protected $mediaId;

    /**
     * @var MediaEntity
     */
    protected $media;

    /**
     * @var int
     */
    protected $counter;

    /**
     * @return string
     */
    public function getProductId(): string {
        return $this->productId;
    }

    /**
     * @param string $productId
     */
    public function setProductId(string $productId): void {
        $this->productId = $productId;
    }

    /**
     * @return ProductEntity
     */
    public function getProduct(): ProductEntity {
        return $this->product;
    }

    /**
     * @param ProductEntity $product
     */
    public function setProduct(ProductEntity $product): void {
        $this->product = $product;
    }

    /**
     * @return string
     */
    public function getMediaId(): string {
        return $this->mediaId;
    }

    /**
     * @param string $mediaId
     */
    public function setMediaId(string $mediaId): void {
        $this->mediaId = $mediaId;
    }

    /**
     * @return MediaEntity
     */
    public function getMedia(): MediaEntity {
        return $this->media;
    }

    /**
     * @param MediaEntity $media
     */
    public function setMedia(MediaEntity $media): void {
        $this->media = $media;
    }

    /**
     * @return int
     */
    public function getCounter(): int {
        return $this->counter;
    }

    /**
     * @param int $counter
     */
    public function setCounter(int $counter): void {
        $this->counter = $counter;
    }


}
