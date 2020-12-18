<?php declare(strict_types=1);

namespace MastoxExtendedDocuments;

use MastoxExtendedDocuments\CompilerPass\ExtendConfigCompilerPass;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Shopware\Core\Framework\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class MastoxExtendedDocuments extends Plugin {

    public function build(ContainerBuilder $container): void {
        parent::build($container);
        $container->addCompilerPass(new ExtendConfigCompilerPass());
    }
}
