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
        array_push($extensions,'docx','xlsx','xls');
        $container->setParameter('shopware.filesystem.allowed_extensions', $extensions);
    }
}
