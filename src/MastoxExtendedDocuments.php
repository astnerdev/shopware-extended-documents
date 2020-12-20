<?php declare(strict_types=1);

namespace MastoxExtendedDocuments;

use MastoxExtendedDocuments\CompilerPass\ExtendConfigCompilerPass;
use Shopware\Core\Framework\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/* @TODO extend detail snippet for downloads https://docs.shopware.com/en/shopware-platform-dev-en/how-to/adding-snippets */
/* @TODO add entity for downloads */
/* @TODO add downloads to product detail tab */
/* @TODO disable documents on media selection for images on product */


class MastoxExtendedDocuments extends Plugin {

    public function build(ContainerBuilder $container): void {
        parent::build($container);
        $container->addCompilerPass(new ExtendConfigCompilerPass());
    }
}
