<?php

namespace App\Controller;

use App\Repository\LockerRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LockerController extends Controller
{
    /**
     * @Route("/lockers", name="lockers_list")
     */
    public function index(LockerRepository $repository): Response
    {
        return $this->render('locker/list.html.twig', [
            'lockers' => $repository->findAll(),
        ]);
    }
}
