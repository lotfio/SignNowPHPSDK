<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

use InvalidArgumentException;
use SignNow\Core\Collection\TypedCollection;

class EmailSentstatusCollection extends TypedCollection
{
    public function add(EmailSentstatus $element): void
    {
        $this->append($element);
    }

    public function validateType(mixed $value): void
    {
        if (!$value instanceof EmailSentstatus) {
            throw new InvalidArgumentException('Only EmailSentstatus are allowed in this collection.');
        }
    }

    public function getItemType(): string
    {
        return EmailSentstatus::class;
    }
}
