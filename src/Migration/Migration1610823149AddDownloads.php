<?php declare(strict_types=1);

namespace MastoxExtendedDocuments\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1610823149AddDownloads extends MigrationStep {
    public function getCreationTimestamp(): int {
        return 1610823149;
    }

    public function update(Connection $connection): void {
        $sql = "    create table if not exists product_downloads
                    (
                        id binary(16) not null,
                        product_id binary(16) not null,
                        media_id binary(16) not null,
                        created_at datetime not null ,
                        updated_at datetime null,
                        counter int default 0,

                        PRIMARY KEY (id,product_id,media_id),
                        constraint `uniq.product_downloads.product_id`
                            unique (id),

                        constraint `fk.product_downloads.product_id`
                            foreign key (product_id) references  `product` (id) ON DELETE CASCADE,

                     constraint `fk.product_downloads.media_id`
                            foreign key (media_id) references `media` (id) ON DELETE CASCADE
                    )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

                    ";

        $connection->executeUpdate($sql);

    }

    public function updateDestructive(Connection $connection): void {
        // implement update destructive
    }
}
