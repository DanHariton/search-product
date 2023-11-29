<?php

declare(strict_types=1);

namespace App\Repository;

interface IElasticSearchDriver
{
    public function findById(string $id): array;
}