<?php declare(strict_types=1);


namespace Swag\BasicExample\Events;


use Shopware\Core\Framework\Context;

class ExampleEvent
{

    /**
     * @var Context
     */
    private Context $context;

    /**
     * ExampleEvent constructor.
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    /**
     * @return Context
     */
    public function getContext(): Context
    {
        return $this->context;
    }

    /**
     * @param Context $context
     */
    public function setContext(Context $context): void
    {
        $this->context = $context;
    }
}
