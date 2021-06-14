<?php declare(strict_types=1);

namespace Swag\BasicExample;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexerRegistry;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class SwagBasicExample extends Plugin
{

    /**
     * @param InstallContext $container
     */
    public function install(InstallContext $installContext): void
    {
        $plugin = $installContext->getPlugin();
        $context = $installContext->getContext();
        $version = $installContext->getCurrentPluginVersion();
        /** TODO */
    }

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
        /** TODO */
    }

    /**
     * @param ActivateContext $activateContext
     */
    public function activate(ActivateContext $activateContext): void
    {
        $entityIndexerRegistry = $this->container->get(EntityIndexerRegistry::class);
        /** TODO */
    }

    /**
     * @param UninstallContext $context
     */
    public function uninstall(UninstallContext $context): void
    {
        parent::uninstall($context);

        if ($context->keepUserData()) {
            return;
        }

        $connection = $this->container->get(Connection::class);
        $connection->executeUpdate('DROP TABLE IF EXISTS `fast_order_items`');
    }
}
