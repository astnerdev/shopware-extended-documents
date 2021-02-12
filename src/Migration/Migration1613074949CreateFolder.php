<?php declare(strict_types=1);

namespace MastoxProductAttachments\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Defaults;
use Shopware\Core\Framework\DataAbstractionLayer\Doctrine\MultiInsertQueryQueue;
use Shopware\Core\Framework\Migration\MigrationStep;
use Shopware\Core\Framework\Uuid\Uuid;

class Migration1613074949CreateFolder extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1613074949;
    }

    public function update(Connection $connection): void
    {
        $queue = new MultiInsertQueryQueue($connection);
        $defaultFolder = Uuid::randomBytes();
        $queue->addInsert('media_default_folder', ['id' => $defaultFolder, 'association_fields' => '["attachments"]', 'entity' => 'product_attachments', 'created_at' => (new \DateTime())->format(Defaults::STORAGE_DATE_TIME_FORMAT)]);
        $queue->addInsert('media_folder', ['id' => Uuid::randomBytes(), 'default_folder_id' => $defaultFolder,'name'=> 'Product Attachments','created_at' => (new \DateTime())->format(Defaults::STORAGE_DATE_TIME_FORMAT)]);
        $queue->execute();
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
