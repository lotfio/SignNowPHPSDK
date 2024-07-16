<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class RoutingDetail
{
    public function __construct(
        private string $id,
        private string $created,
        private string $updated,
        private ?Data $data = null,
        private ?string $inviteLinkInstructions = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getData(): ?Data
    {
        return $this->data;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getUpdated(): string
    {
        return $this->updated;
    }

    public function getInviteLinkInstructions(): ?string
    {
        return $this->inviteLinkInstructions;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'data' => $this->getData(),
           'created' => $this->getCreated(),
           'updated' => $this->getUpdated(),
           'invite_link_instructions' => $this->getInviteLinkInstructions(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['created'],
            $data['updated'],
            isset($data['data']) ? Data::fromArray($data['data']) : null,
            $data['invite_link_instructions'] ?? null,
        );
    }
}
