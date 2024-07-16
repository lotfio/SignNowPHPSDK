<?php

declare(strict_types=1);

namespace SignNow\Api\WebhookV2\Response\Data\Data;

readonly class RequestContent
{
    public function __construct(
        private Meta $meta,
        private Content $content,
    ) {
    }

    public function getMeta(): Meta
    {
        return $this->meta;
    }

    public function getContent(): Content
    {
        return $this->content;
    }

    public function toArray(): array
    {
        return [
           'meta' => $this->getMeta(),
           'content' => $this->getContent(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            Meta::fromArray($data['meta']),
            Content::fromArray($data['content']),
        );
    }
}
