<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\CachedProductProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/product")]
class ProductController extends AbstractController
{
    public function __construct(
        private readonly CachedProductProvider $productProvider
    )
    {
    }

    #[Route("/{id}", requirements: ['id' => '\d+'], methods: ['GET'])]
    public function detail(string $id): Response
    {
        $product = $this->productProvider->getProduct($id);

        if (!$product) {
            throw new NotFoundHttpException('Product is not found!');
        }

        return $this->json($product);
    }
}