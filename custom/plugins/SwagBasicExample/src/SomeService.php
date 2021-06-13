<?php


namespace Swag\BasicExample;



use Shopware\Core\System\SystemConfig\SystemConfigService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SomeService implements EventSubscriberInterface
{

    /**
     * @var SystemConfigService
     */
    public SystemConfigService $configService;

    /**
     * SomeService constructor.
     * @param SystemConfigService $configService
     */
    public function __construct(SystemConfigService $configService)
    {
        $this->configService = $configService;
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
