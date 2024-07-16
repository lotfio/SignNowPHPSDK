<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Request;

use SignNow\Api\Document\Request\Data\DocumentIdCollection;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'mergeDocuments',
    url: '/document/merge',
    method: 'post',
    auth: 'bearer',
    namespace: 'document',
    entity: 'documentMerge',
    type: 'application/json',
)]
final class DocumentMergePost implements RequestInterface
{
    public function __construct(
        private string $name,
        private DocumentIdCollection $documentIds = new DocumentIdCollection(),
        private bool $uploadDocument = false,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDocumentIds(): DocumentIdCollection
    {
        return $this->documentIds;
    }

    public function isUploadDocument(): bool
    {
        return $this->uploadDocument;
    }


    public function uriParams(): array
    {
        return [];
    }

    public function toArray(): array
    {
        return [
           'name' => $this->getName(),
           'document_ids' => $this->getDocumentIds()->toArray(),
           'upload_document' => $this->isUploadDocument(),
        ];
    }
}
