<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Product;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class CachedProductProvider implements IProductProvider
{
    public function __construct(private readonly CacheInterface $productCache, private readonly ProductProvider $productProvider)
    {
    }

    public function getProduct(string $id): ?Product
    {
        return $this->productCache->get('product.' . $id, function (ItemInterface $item) use ($id) {
            return $this->productProvider->getProduct($id);
        });
    }
}