<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController
{
    /**
     * @Route("/hell2o", name="hello", methods="GET")
     */
    public function hello(): Response
    {
        return new Response('Hello world.. enzo..');
    }
}
