<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\DocumentInvite;

use SignNow\Api\DocumentInvite\Request\SendInvitePost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class SendInviteTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostSendInvite();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostSendInvite(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('send_field_invite', 'post');
        $faker = $this->faker();

        $request = new SendInvitePost(
            $faker->documentId(),
            $faker->documentInviteSendInviteTo(),
            $faker->from(),
            $faker->subject(),
            $faker->message(),
            $faker->documentInviteSendInviteEmailGroups(),
            $faker->documentInviteSendInviteCc(),
            $faker->documentInviteSendInviteCcStep(),
            $faker->documentInviteSendInviteViewers(),
            $faker->ccSubject(),
            $faker->ccMessage()
        );
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getStatus()));
        assert($expectation->getStatus() === $response->getStatus());
    }
}
