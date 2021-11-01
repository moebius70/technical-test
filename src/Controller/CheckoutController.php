<?php

namespace WorldOfWonders\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use WorldOfWonders\Entity\Product;

class CheckoutController extends BaseController
{
    public function checkout(): Response
    {
        $total = $this->request->getSession()->get('total');
        $items = unserialize($this->request->getSession()->get('items'));

        if (!$items) {
            throw new ResourceNotFoundException("Product with id $productId does not exist.");
        }

        return $this->render('checkout.html.twig', ['products' => $items, 'Total' => ($total/100)]);
    }

    public function thanks(): Response
    {
        return $this->render('thanks.html.twig');
    }
}
