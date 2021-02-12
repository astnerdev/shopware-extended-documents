<?php declare(strict_types=1);

namespace MastoxProductAttachments\Storefront\Page\Product\Subscriber;

use Shopware\Storefront\Page\Product\ProductLoaderCriteriaEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProductPageCriteriaSubscriber implements EventSubscriberInterface {
    public static function getSubscribedEvents() {
        return [
            ProductLoaderCriteriaEvent::class => 'onProductCriteriaLoaded'
        ];
    }

    public function onProductCriteriaLoaded(ProductLoaderCriteriaEvent $event): void {
        $event->getCriteria()->addAssociation('attachments.media');
    }
}
