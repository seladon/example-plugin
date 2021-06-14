<?php declare(strict_types=1);


namespace Swag\BasicExample\Service;


use Shopware\Core\Checkout\Cart\SalesChannel\CartService;
use Shopware\Core\Defaults;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\System\SalesChannel\Context\SalesChannelContextPersister;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Shopware\Core\Framework\Context;

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
     * @var EntityRepositoryInterface
     */
    public EntityRepositoryInterface $productRepository;

    /**
     * @var EntityRepositoryInterface
     */
    public EntityRepositoryInterface $fastOrderRepository;

    /**
     * SomeService constructor.
     * @param SystemConfigService $configService
     * @param EntityRepositoryInterface $productRepository
     * @param EntityRepositoryInterface $fastOrderRepository
     * @param CartService $cartService
     * @param SalesChannelContextPersister $contextPersister
     */
    public function __construct(
        SystemConfigService $configService,
        EntityRepositoryInterface $productRepository,
        EntityRepositoryInterface $fastOrderRepository,
        CartService $cartService,
        SalesChannelContextPersister $contextPersister
    )
    {
        $this->configService = $configService;
        $this->cartService = $cartService;
        $this->contextPersister = $contextPersister;
        $this->productRepository = $productRepository;
        $this->fastOrderRepository = $fastOrderRepository;
        $this->doSomething();
    }

    public function readData(Context $context): void
    {
        $product = $this->productRepository->search(new Criteria(), $context)->first();
        $fastOrder= $this->fastOrderRepository->search(new Criteria(), $context)->first();
    }

    public function writeData(Context $context): void
    {
        $this->productRepository->create([
            [
                'name' => 'Example product',
                'productNumber' => 'SW123',
                'stock' => 10,
                'price' => [['currencyId' => Defaults::CURRENCY, 'gross' => 50, 'net' => 25, 'linked' => false]],
            ]
        ], $context);
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
