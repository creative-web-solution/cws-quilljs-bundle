<?php

declare(strict_types=1);

namespace Cws\Bundle\QuillJsBundle\Service;

readonly class QuillJsConfig implements QuillJsConfigInterface
{
    public function __construct(private array $config = [])
    {
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}
