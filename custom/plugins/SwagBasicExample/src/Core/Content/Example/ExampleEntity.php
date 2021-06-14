<?php declare(strict_types=1);


namespace Swag\BasicExample\Core\Content\Example;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class ExampleEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var int|null
     */
    protected $productId;

    /**
     * @var int|null
     */
    protected $quantity;

    /**
     * @var int|null
     */
    protected $price;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return ExampleEntity
     */
    public function setId(?string $id): ExampleEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProductId(): ?string
    {
        return $this->productId;
    }

    /**
     * @param int|null $productId
     * @return ExampleEntity
     */
    public function setProductId(?int $productId): ExampleEntity
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     * @return ExampleEntity
     */
    public function setQuantity(?int $quantity): ExampleEntity
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @param int|null $price
     * @return ExampleEntity
     */
    public function setPrice(?int $price): ExampleEntity
    {
        $this->price = $price;
        return $this;
    }
}
