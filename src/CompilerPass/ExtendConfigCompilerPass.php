<?php
namespace MastoxExtendedDocuments\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ExtendConfigCompilerPass implements CompilerPassInterface {

    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container) {
        $extensions = $container->getParameter('shopware.filesystem.allowed_extensions');
        array_push($extensions, 'ods', 'xlsx', 'xls', 'docx', 'pptx', 'doc', 'odf');
        $container->setParameter('shopware.filesystem.allowed_extensions', $extensions);
    }
}
