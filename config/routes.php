<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('home', new Route('/', ['controller' => 'WorldOfWonders\Controller\ProductController', 'method' => 'list']));
$routes->add('basket', new Route('/basket', ['controller' => 'WorldOfWonders\Controller\BasketController', 'method' => 'basket']));
$routes->add('delete', new Route('/basket/{productId}', ['controller' => 'WorldOfWonders\Controller\BasketController', 'method' => 'deleteItem']));
$routes->add('checkout', new Route('/checkout', ['controller' => 'WorldOfWonders\Controller\CheckoutController', 'method' => 'checkout']));
$routes->add('thanks', new Route('/thanks', ['controller' => 'WorldOfWonders\Controller\CheckoutController', 'method' => 'thanks']));

return $routes;
