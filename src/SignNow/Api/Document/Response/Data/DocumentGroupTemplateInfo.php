<?php

declare(strict_types=1);

namespace SignNow\Api\Document\Response\Data;

readonly class DocumentGroupTemplateInfo
{
    public function __construct(
        private string $documentGroupTemplateId,
        private string $documentGroupTemplateName,
        private int $shared,
    ) {
    }

    public function getDocumentGroupTemplateId(): string
    {
        return $this->documentGroupTemplateId;
    }

    public function getDocumentGroupTemplateName(): string
    {
        return $this->documentGroupTemplateName;
    }

    public function getShared(): int
    {
        return $this->shared;
    }

    public function toArray(): array
    {
        return [
           'document_group_template_id' => $this->getDocumentGroupTemplateId(),
           'document_group_template_name' => $this->getDocumentGroupTemplateName(),
           'shared' => $this->getShared(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['document_group_template_id'],
            $data['document_group_template_name'],
            $data['shared'],
        );
    }
}
