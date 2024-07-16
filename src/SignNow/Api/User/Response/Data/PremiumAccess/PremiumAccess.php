<?php

declare(strict_types=1);

namespace SignNow\Api\User\Response\Data\PremiumAccess;

readonly class PremiumAccess
{
    public function __construct(
        private Subscription $subscription,
        private Api $api,
        private bool $error = false,
        private ?User $user = null,
        private bool $active = false,
        private string $plan = '',
        private bool $business = false,
        private bool $trial = false,
        private bool $creditCard = false,
    ) {
    }

    public function isError(): bool
    {
        return $this->error;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getSubscription(): Subscription
    {
        return $this->subscription;
    }

    public function getPlan(): string
    {
        return $this->plan;
    }

    public function isBusiness(): bool
    {
        return $this->business;
    }

    public function isTrial(): bool
    {
        return $this->trial;
    }

    public function isCreditCard(): bool
    {
        return $this->creditCard;
    }

    public function getApi(): Api
    {
        return $this->api;
    }

    public function toArray(): array
    {
        return [
           'error' => $this->isError(),
           'user' => $this->getUser(),
           'active' => $this->isActive(),
           'subscription' => $this->getSubscription(),
           'plan' => $this->getPlan(),
           'business' => $this->isBusiness(),
           'trial' => $this->isTrial(),
           'credit_card' => $this->isCreditCard(),
           'api' => $this->getApi(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            Subscription::fromArray($data['subscription']),
            Api::fromArray($data['api']),
            $data['error'] ?? false,
            isset($data['user']) ? User::fromArray($data['user']) : null,
            $data['active'] ?? false,
            $data['plan'] ?? '',
            $data['business'] ?? false,
            $data['trial'] ?? false,
            $data['credit_card'] ?? false,
        );
    }
}
