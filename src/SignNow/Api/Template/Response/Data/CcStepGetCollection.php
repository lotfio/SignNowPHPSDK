<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response\Data;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class CcStepGetCollection extends TypedCollection
{
    public function add(CcStepGet $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof CcStepGet) {
            throw new InvalidArgumentException('Only CcStepGet are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return CcStepGet::class;
    }
}
