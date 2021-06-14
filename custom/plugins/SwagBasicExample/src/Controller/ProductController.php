<?php declare(strict_types=1);

namespace Swag\BasicExample\Controller;

use Shopware\Core\Checkout\Cart\Exception\CustomerNotLoggedInException;
use Shopware\Core\Content\Cms\SalesChannel\SalesChannelCmsPageLoaderInterface;
use Shopware\Core\Framework\Api\Response\JsonApiResponse;
use Shopware\Core\Framework\Context;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Storefront\Controller\StorefrontController;
use Shopware\Storefront\Page\GenericPageLoader;
use Swag\BasicExample\Core\Content\Example\ExampleEntity;
use Swag\BasicExample\Service\SomeService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Shopware\Storefront\Framework\Cache\Annotation\HttpCache;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;

/**
 * @RouteScope(scopes={"storefront"})
 */
class ProductController  extends StorefrontController
{

    /**
     * @var SystemConfigService
     */
    private $systemConfigService;

    /**
     * @var SomeService
     */
    private $someService;

    public function __construct(
        SystemConfigService $systemConfigService,
        SomeService $someService
    )
    {
        $this->systemConfigService = $systemConfigService;
        $this->someService = $someService;
    }

    /**
     * @Route("/fast-order", name="frontend.fastorder.add", methods={"POST"},  defaults={"csrf_protected"=false, "XmlHttpRequest"=true})
     * @HttpCache()
     */
    public function addItem(Request $request, Context $context): Response
    {
        $this->someService->writeData($context);
        return new Response("ok", Response::HTTP_OK);
    }

    /**
     * @Route("/fast-order/{id}", name="frontend.fastorder.get", methods={"GET"},  defaults={"csrf_protected"=false, "XmlHttpRequest"=true}, requirements={"userId"="\d+"})
     * @HttpCache()
     */
    public function getItem(Request $request, Context $context): Response
    {
        $result = $this->someService->readData($context);
        return new JsonApiResponse($result, Response::HTTP_OK);
    }
}
