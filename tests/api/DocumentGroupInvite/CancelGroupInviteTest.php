<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\DocumentGroupInvite;

use SignNow\Api\DocumentGroupInvite\Request\CancelGroupInvitePost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class CancelGroupInviteTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostCancelGroupInvite();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostCancelGroupInvite(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('cancel_document_group_invite', 'post');
        $faker = $this->faker();

        $request = new CancelGroupInvitePost();
        $request->withDocumentGroupId($faker->documentGroupId());

        $request->withInviteId($faker->inviteId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getStatus()));
        assert($expectation->getStatus() === $response->getStatus());
    }
}
