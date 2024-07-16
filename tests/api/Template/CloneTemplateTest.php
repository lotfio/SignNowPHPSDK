<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\Template;

use SignNow\Api\Template\Request\CloneTemplatePost;
use SignNow\Exception\SignNowApiException;
use SignNow\Sdk\Tests\Core\BaseTest;

class CloneTemplateTest extends BaseTest
{
    /**
     * @throws SignNowApiException
     */
    public function run(): void
    {
        $this->testPostCloneTemplate();
    }

    /**
     * @throws SignNowApiException
     */
    public function testPostCloneTemplate(): void
    {
        $client = $this->client();
        $expectation = $this->expectation('create_document_with_template', 'post');
        $faker = $this->faker();

        $request = new CloneTemplatePost(
            $faker->documentName(),
            $faker->clientTimestamp(),
            $faker->folderId()
        );
        $request->withTemplateId($faker->templateId());
        $response = $client->send($request);

        assert(is_object($response));
        assert(is_string($response->getId()));
        assert($expectation->getId() === $response->getId());
        assert(is_string($response->getName()));
        assert($expectation->getName() === $response->getName());
    }
}
