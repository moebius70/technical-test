<?php

namespace WorldOfWonders\Controller;

use Symfony\Component\HttpFoundation\Response;
use WorldOfWonders\Entity\Product;

class ProductController extends BaseController
{
    public function list(): Response
    {
        $products = $this->entityManager->getRepository(Product::class)->findAll();

        return $this->render('list.html.twig', ['products' => $products]);
    }
}
