<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Product;
use App\Repository\ProductElasticRepository;
use App\Repository\ProductMySqlRepository;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ProductProvider implements IProductProvider
{
    private bool $useElastic;

    public function __construct(
        private readonly ProductMySqlRepository $mySqlRepository,
        private readonly ProductElasticRepository $elasticRepository,
        private readonly ParameterBagInterface $bag
    )
    {
        $this->useElastic = (bool) $this->bag->get('use_elastic');
    }

    public function getProduct(string $id): ?Product
    {
        if ($this->useElastic) {
            $product = $this->elasticRepository->findById($id);
        } else {
            $product = $this->mySqlRepository->findById($id);
        }

        return !empty($product) ? $product[0] : null;
    }
}