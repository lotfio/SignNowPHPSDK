<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data\Team;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class TeamCollection extends TypedCollection
{
    public function add(Team $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof Team) {
            throw new InvalidArgumentException('Only Team are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return Team::class;
    }
}
