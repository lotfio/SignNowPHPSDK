<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroup\Response\Data\Data;

readonly class Recipient
{
    public function __construct(
        private string $name,
        private string $email,
        private int $order,
        private DocumentCollection $documents,
        private ?EmailGroup $emailGroup = null,
        private ?Attribute $attributes = null,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEmailGroup(): ?EmailGroup
    {
        return $this->emailGroup;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function getAttributes(): ?Attribute
    {
        return $this->attributes;
    }

    public function getDocuments(): DocumentCollection
    {
        return $this->documents;
    }

    public function toArray(): array
    {
        return [
           'name' => $this->getName(),
           'email' => $this->getEmail(),
           'email_group' => $this->getEmailGroup(),
           'order' => $this->getOrder(),
           'attributes' => $this->getAttributes(),
           'documents' => $this->getDocuments()->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['email'],
            $data['order'],
            new DocumentCollection($data['documents']),
            isset($data['email_group']) ? EmailGroup::fromArray($data['email_group']) : null,
            isset($data['attributes']) ? Attribute::fromArray($data['attributes']) : null,
        );
    }
}
