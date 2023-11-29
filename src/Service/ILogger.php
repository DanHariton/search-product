<?php

declare(strict_types=1);

namespace App\Service;

interface ILogger
{
    public function log(string $id): void;

    public function getLogs(): array;
}