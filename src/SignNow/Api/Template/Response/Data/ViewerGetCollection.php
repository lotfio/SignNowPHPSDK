<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class ViewerGetCollection extends TypedCollection
{
    public function add(ViewerGet $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof ViewerGet) {
            throw new InvalidArgumentException('Only ViewerGet are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return ViewerGet::class;
    }
}
