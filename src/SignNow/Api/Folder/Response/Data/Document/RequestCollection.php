<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class RequestCollection extends TypedCollection
{
    public function add(Request $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Request) {
            throw new InvalidArgumentException('Only Request are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Request::class;
    }
}
