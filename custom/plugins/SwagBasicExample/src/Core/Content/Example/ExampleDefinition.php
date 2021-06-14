<?php declare(strict_types=1);

namespace Swag\BasicExample\Core\Content\Example;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CreatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IntField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\PriceDefinitionField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\UpdatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;

class ExampleDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'fast_order_items';

    public function getEntityName(): string
    {
        return ExampleEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            (new IntField('customer_id', 'customerId'))->addFlags(new Required()),
            (new IntField('product_id', 'productId'))->addFlags(new Required()),
            (new IntField('quantity', 'quantity'))->addFlags(new Required()),
            (new PriceDefinitionField('price', 'price'))->addFlags(new Required()),
            (new CreatedAtField()),
            (new UpdatedAtField()),
        ]);
    }

    /**
     * @return string
     */
    public function getCollectionClass(): string
    {
        return ExampleCollection::class;
    }
}
