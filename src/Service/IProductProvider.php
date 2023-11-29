<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Product;

interface IProductProvider
{
    public function getProduct(string $id): ?Product;
}