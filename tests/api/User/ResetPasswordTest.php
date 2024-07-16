<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\User;

use SignNow\Api\User\Request\ResetPasswordPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class ResetPasswordTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostResetPassword();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostResetPassword(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('reset_password', 'post');
        $faker = $this->faker();

        $request = new ResetPasswordPost(
            $faker->email()
        );
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getStatus()));
        assert($expectation->getStatus() === $response->getStatus());
    }
}
