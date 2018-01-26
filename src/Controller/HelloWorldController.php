<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HelloWorldController extends Controller
{
    /**
     * @Route("/hello", name="hello", methods="GET")
     */
    public function hello(Environment $twig): Response
    {
        return new Response($twig->render('hello.html.twig', [
            'message' => 'Hello world.. enzo..',
        ]));
    }
}
