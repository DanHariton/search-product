<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Product;
use Elastica\Query\Term;
use FOS\ElasticaBundle\Repository;

class ProductElasticRepository extends Repository implements IElasticSearchDriver
{
    /** @return Product[] */
    public function findById(string $id): array
    {
        $query = new Term(['id' => $id]);

        return $this->find($query);
    }
}