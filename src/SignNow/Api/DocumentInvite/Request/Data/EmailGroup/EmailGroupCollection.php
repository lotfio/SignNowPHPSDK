<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Request\Data\EmailGroup;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class EmailGroupCollection extends TypedCollection
{
    public function add(EmailGroup $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof EmailGroup) {
            throw new InvalidArgumentException('Only EmailGroup are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return EmailGroup::class;
    }
}
