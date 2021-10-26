<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

$request = Request::createFromGlobals();
$context = new RequestContext();
$context->fromRequest($request);

$session = new Session();
$session->start();
$request->setSession($session);

$routes = include __DIR__ . '/../config/routes.php';
$matcher = new UrlMatcher($routes, $context);

$entityManager = include __DIR__ . '/../config/database.php';

try {
    $match = $matcher->match($request->getPathInfo());
    $request->attributes->add($match);

    $controller = new $match['controller']($entityManager, $request);
    $method = $match['method'];

    $response = $controller->$method();
} catch (ResourceNotFoundException $exception) {
    $response = new Response($exception->getMessage(), 404);
} catch (Exception $exception) {
    $response = new Response('An error occurred: ' . $exception->getMessage(), 500);
}

$response->send();
