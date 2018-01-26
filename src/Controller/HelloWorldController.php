<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class HelloWorldController extends Controller
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private $router;

    /**
     * @var string
     */
    private $test;

    public function __construct(Environment $twig, UrlGeneratorInterface $router, string $test)
    {
        $this->twig = $twig;
        $this->router = $router;
        $this->test = $test;
    }

    /**
     * @Route("/hello", name="hello", methods="GET")
     */
    public function hello(): Response
    {
        return new Response($this->twig->render('hello.html.twig', [
            'message' => 'Hello world.. enzo..',
            'route' => $this->router->generate('hello'),
            'test' => $this->test,
        ]));
    }
}
