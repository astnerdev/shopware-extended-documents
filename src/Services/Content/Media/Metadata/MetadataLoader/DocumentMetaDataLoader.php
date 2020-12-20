<?php declare(strict_types=1);

namespace MastoxExtendedDocuments\Services\Content\Media\Metadata\MetadataLoader;

use Shopware\Core\Content\Media\MediaType\DocumentType;
use Shopware\Core\Content\Media\MediaType\MediaType;
use Shopware\Core\Content\Media\Metadata\MetadataLoader\MetadataLoaderInterface;

class DocumentMetaDataLoader implements MetadataLoaderInterface {

    public function extractMetadata(string $filePath): ?array {
        $metadata = null;

        /* @TODO support more file types */
        $type = mime_content_type($filePath);
        switch ($type) {
            case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($filePath);
                $reader->setReadDataOnly(true);
                $sheet = $reader->load($filePath);
                $properties = $sheet->getProperties();
                $metadata['creator'] = $properties->getCreator();
                $metadata['lastModifiedBy'] = $properties->getLastModifiedBy();
                $metadata['created'] = $properties->getCreated();
                $metadata['modified'] = $properties->getModified();
                break;
        }

        if (\is_array($metadata)) {
            return $metadata;
        }

        return null;
    }

    public function supports(MediaType $mediaType): bool {
        return $mediaType instanceof DocumentType;
    }
}
