<?php declare(strict_types=1);

namespace Swag\BasicExample\Controller;

use Shopware\Core\Checkout\Cart\Exception\CustomerNotLoggedInException;
use Shopware\Core\Content\Cms\SalesChannel\SalesChannelCmsPageLoaderInterface;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Storefront\Controller\StorefrontController;
use Shopware\Storefront\Page\GenericPageLoader;
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
     * @var GenericPageLoader
     */
    private $genericPageLoader;

    /**
     * @var SalesChannelCmsPageLoaderInterface
     */
    private $cmsPageLoader;

    /**
     * @var SystemConfigService
     */
    private $systemConfigService;

    public function __construct(
        SystemConfigService $systemConfigService,
        GenericPageLoader $genericPageLoader,
        SalesChannelCmsPageLoaderInterface $cmsPageLoader)
    {
        $this->systemConfigService = $systemConfigService;
        $this->genericPageLoader = $genericPageLoader;
        $this->cmsPageLoader = $cmsPageLoader;
    }

    /**
     * @Route("/fast-order", name="frontend.fastorder", methods={"POST"},  defaults={"csrf_protected"=false, "XmlHttpRequest"=true})
     * @HttpCache()
     */
    public function addItem(Request $request, SalesChannelContext $context): Response
    {
        /** TODO */
        return new Response("ok", Response::HTTP_OK);
    }
}
