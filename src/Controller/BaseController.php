<?php

namespace WorldOfWonders\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BaseController
{
    protected Environment $twig;

    protected EntityManager $entityManager;

    protected Request $request;

    public function __construct(EntityManager $entityManager, Request $request)
    {
        $loader = new FilesystemLoader([__DIR__ . '/../../templates']);
        $this->twig = new Environment($loader);

        $this->entityManager = $entityManager;
        $this->request = $request;
    }

    protected function render(string $name, array $context = []): Response
    {
        return new Response($this->twig->render($name, $context));
    }
}
