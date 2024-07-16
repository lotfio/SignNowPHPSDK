<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentGroupInvite\Request\Data;

readonly class InviteEmail
{
    public function __construct(
        private string $email = '',
        private int $reminder = 0,
        private int $expirationDays = 0,
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getReminder(): int
    {
        return $this->reminder;
    }

    public function getExpirationDays(): int
    {
        return $this->expirationDays;
    }

    public function toArray(): array
    {
        return [
           'email' => $this->getEmail(),
           'reminder' => $this->getReminder(),
           'expiration_days' => $this->getExpirationDays(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'] ?? '',
            $data['reminder'] ?? 0,
            $data['expiration_days'] ?? 0,
        );
    }
}
