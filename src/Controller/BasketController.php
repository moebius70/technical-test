<?php

namespace WorldOfWonders\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use WorldOfWonders\Entity\Product;

class BasketController extends BaseController
{
    public function basket(): Response
    {
        // $productId = $this->request->get('productId');
        // $product = $this->entityManager->getRepository(Product::class)->find($productId);
        $product = $this->entityManager->getRepository(Product::class)->findBy(array('id' => [2, 3]));

        for($i=0; $i<count($product); $i++){
            $total+= $product[$i]->getPrice();
        }


        $items = unserialize($this->request->getSession()->get('items'));


        if (!$product) {
            throw new ResourceNotFoundException("Product with id $productId does not exist.");
        }

        return $this->render('basket.html.twig', ['products' => $product, 'Total' => ($total/100)]);
    
    }

    public function deleteItem(): Response
    {
        $productId = $this->request->get('productId');
        // $product = $this->entityManager->getRepository(Product::class)->find($productId);
        $product = $this->entityManager->getRepository(Product::class)->findBy(array('id' => [2, 3]));
    
        for($i=0; $i<count($product); $i++){
            if ($product[$i]->getId() == $productId)
            {unset($product[$i]);}
        }    
        $product = array_values($product);   

        for($i=0; $i<count($product); $i++){
            $total+= $product[$i]->getPrice();
        }

        $items = serialize($product);
        $this->request->getSession()->set('items', $items);
        $this->request->getSession()->set('total', $total);


        if (!$product) {
            throw new ResourceNotFoundException("Product with id $productId does not exist.");
        }

        return $this->render('basket.html.twig', ['products' => $product, 'Total' => ($total/100)]);
    
    }

    public function thanks(): Response
    {
        return $this->render('thanks.html.twig');
    }
}
