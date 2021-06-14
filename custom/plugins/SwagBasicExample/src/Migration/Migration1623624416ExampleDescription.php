<?php declare(strict_types=1);

namespace Swag\BasicExample\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1623624416ExampleDescription extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1623624416;
    }

    public function update(Connection $connection): void
    {
        $query = <<<SQL
CREATE TABLE IF NOT EXISTS `fast_order_items` (
`id` INT AUTO_INCREMENT NOT NULL,
`customer_id` INT NOT NULL,
`product_id` INT NOT NULL,
`quantity` INT NOT NULL,
`price` DOUBLE PRECISION NOT NULL,
`created_at` DATETIME(3) NOT NULL,
`updated_at` DATETIME(3),
PRIMARY KEY (id)
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        $query = <<<SQL
DROP TABLE `fast_order_items`
SQL;
        $connection->executeStatement($query);
    }
}
