<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HelloWorldController
{
    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route("/hello", name="hello", methods="GET")
     */
    public function hello(): Response
    {
        return new Response($this->twig->render('hello.html.twig', [
            'message' => 'Hello world.. enzo..',
        ]));
    }
}
