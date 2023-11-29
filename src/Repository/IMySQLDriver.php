<?php

declare(strict_types=1);

namespace App\Repository;

interface IMySQLDriver
{
    public function findById(string $id): array;
}