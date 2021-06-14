<?php declare(strict_types=1);


namespace Swag\BasicExample\Service;


use Shopware\Core\Checkout\Cart\SalesChannel\CartService;
use Shopware\Core\Defaults;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\System\SalesChannel\Context\SalesChannelContextPersister;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Swag\BasicExample\Core\Content\Example\ExampleDefinition;
use Swag\BasicExample\Core\Content\Example\ExampleEntity;
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
    public EntityRepositoryInterface $swagExampleRepository;


    /**
     * SomeService constructor.
     * @param SystemConfigService $configService
     * @param EntityRepositoryInterface $productRepository
     * @param EntityRepositoryInterface $swagExampleRepository
     * @param CartService $cartService
     * @param SalesChannelContextPersister $contextPersister
     */
    public function __construct(
        SystemConfigService $configService,
        EntityRepositoryInterface $productRepository,
        EntityRepositoryInterface $swagExampleRepository,
        CartService $cartService,
        SalesChannelContextPersister $contextPersister
    )
    {
        $this->configService = $configService;
        $this->cartService = $cartService;
        $this->contextPersister = $contextPersister;
        $this->productRepository = $productRepository;
        $this->swagExampleRepository = $swagExampleRepository;
    }

    public function readData(Context $context): ExampleEntity
    {
        /** @var ExampleEntity $fastOrder */
        return $this->swagExampleRepository->search(new Criteria(), $context)->first();
    }

    public function writeData(Context $context): void
    {
        /** TODO Example */
        $this->swagExampleRepository->create([
            [
                'customerId' => 1,
                'productId' => 1,
                'quantity' => 10,
                'price' => 100,
            ]
        ], $context);
    }

    public static function getSubscribedEvents()
    {
        // TODO: Implement getSubscribedEvents() method.
    }
}
