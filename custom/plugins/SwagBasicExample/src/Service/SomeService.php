<?php declare(strict_types=1);


namespace Swag\BasicExample\Service;


use Shopware\Core\Checkout\Cart\SalesChannel\CartService;
use Shopware\Core\System\SalesChannel\Context\SalesChannelContextPersister;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SomeService implements EventSubscriberInterface
{

    /**
     * @var CartService
     */
    protected $cartService;

    /**
     * @var SalesChannelContextPersister
     */
    protected $contextPersister;

    /**
     * @var SystemConfigService
     */
    public SystemConfigService $configService;

    /**
     * SomeService constructor.
     * @param SystemConfigService $configService
     * @param CartService $cartService
     * @param SalesChannelContextPersister $contextPersister
     */
    public function __construct(
        SystemConfigService $configService,
        CartService $cartService,
        SalesChannelContextPersister $contextPersister
    )
    {
        $this->configService = $configService;
        $this->cartService = $cartService;
        $this->contextPersister = $contextPersister;
        $this->doSomething();
    }

    public function doSomething()
    {
        $config = $this->configService->get('SwagBasicExample.config.example');
    }

    public static function getSubscribedEvents()
    {
        // TODO: Implement getSubscribedEvents() method.
    }
}
