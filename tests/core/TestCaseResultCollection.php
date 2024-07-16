<?php

declare(strict_types=1);

namespace SignNow\Sdk\Tests\Core;

class TestCaseResultCollection
{
    private array $data = [];

    public function add(TestCaseResult $result): self
    {
        $this->data[] = $result;

        return $this;
    }

    public function isPassed(): bool
    {
        return array_reduce(
            $this->data,
            static fn ($previous, $result) => $previous && $result->isPassed(),
            true
        );
    }

    public function displayErrorsTitle(): void
    {
        echo PHP_EOL, "\033[31mFAILED\033[0m", PHP_EOL;
    }

    public function displayPassedTitle(): void
    {
        echo PHP_EOL, "\033[32mPASSED\033[0m", PHP_EOL;
    }

    public function displayErrors(): void
    {
        foreach ($this->data as $testCaseResult) {
            /** @var TestCaseResult $testCaseResult */
            if ($testCaseResult->isFailed()) {
                $testCaseResult->displayErrors();
            }
        }
    }
}
