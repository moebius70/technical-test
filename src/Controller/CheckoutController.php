<?php

namespace WorldOfWonders\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use WorldOfWonders\Entity\Product;

class CheckoutController extends BaseController
{
    public function checkout(): Response
    {
        $productId = $this->request->get('productId');
        $product = $this->entityManager->getRepository(Product::class)->find($productId);
        if (!$product) {
            throw new ResourceNotFoundException("Product with id $productId does not exist.");
        }

        return $this->render('checkout.html.twig', ['product' => $product]);
    }

    public function thanks(): Response
    {
        return $this->render('thanks.html.twig');
    }
}
