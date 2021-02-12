<?php declare(strict_types=1);

namespace MastoxProductAttachments;

use MastoxProductAttachments\CompilerPass\ExtendConfigCompilerPass;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Doctrine\DBAL\Connection;


class MastoxProductAttachments extends Plugin {

    public function build(ContainerBuilder $container): void {
        parent::build($container);
        $container->addCompilerPass(new ExtendConfigCompilerPass());
    }

    public function uninstall(UninstallContext $uninstallContext): void {
        parent::uninstall($uninstallContext);

        if ($uninstallContext->keepUserData()) {
            return;
        }

        $connection = $this->container->get(Connection::class);

        $connection->executeUpdate('DROP TABLE IF EXISTS `mtx_product_attachments`');
    }
}
