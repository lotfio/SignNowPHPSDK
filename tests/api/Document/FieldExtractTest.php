<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\Document;

use SignNow\Api\Document\Request\FieldExtractPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class FieldExtractTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostFieldExtract();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostFieldExtract(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('upload_document_with_tags_extract', 'post');
        $faker = $this->faker();

        $request = new FieldExtractPost(
            $faker->file(),
            $faker->documentFieldExtractTags(),
            $faker->parseType(),
            $faker->password(),
            $faker->clientTimestamp(false)
        );
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
    }
}
