<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'getRoutingDetails',
    url: '/document/{document_id}/template/routing/detail',
    method: 'get',
    auth: 'bearer',
    namespace: 'template',
    entity: 'routingDetails',
    type: 'application/json',
)]
final class RoutingDetailsGet implements RequestInterface
{
    private array $uriParams = [];


    public function withDocumentId(string $documentId): self
    {
        $this->uriParams['document_id'] = $documentId;

        return $this;
    }

    public function uriParams(): array
    {
        return $this->uriParams;
    }

    public function toArray(): array
    {
        return [
        ];
    }
}
