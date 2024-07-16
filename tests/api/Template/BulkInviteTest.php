<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\Template;

use SignNow\Api\Template\Request\BulkInvitePost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class BulkInviteTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostBulkInvite();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostBulkInvite(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('bulk_invite', 'post');
        $faker = $this->faker();

        $request = new BulkInvitePost(
            $faker->file(),
            $faker->folderId(),
            $faker->clientTimestamp(false),
            $faker->documentName(),
            $faker->subject(),
            $faker->emailMessage()
        );
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getStatus()));
        assert($expectation->getStatus() === $response->getStatus());
    }
}
