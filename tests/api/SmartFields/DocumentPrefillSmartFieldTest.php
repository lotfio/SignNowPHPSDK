<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\SmartFields;

use SignNow\Api\SmartFields\Request\DocumentPrefillSmartFieldPost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class DocumentPrefillSmartFieldTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostDocumentPrefillSmartField();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostDocumentPrefillSmartField(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('prefill_smart_fields', 'post');
        $faker = $this->faker();

        $request = new DocumentPrefillSmartFieldPost(
            $faker->smartFieldsDocumentPrefillSmartFieldData(),
            $faker->clientTimestamp()
        );
        $request->withDocumentId($faker->documentId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getStatus()));
        assert($expectation->getStatus() === $response->getStatus());
    }
}
