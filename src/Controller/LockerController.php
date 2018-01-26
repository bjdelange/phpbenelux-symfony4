<?php

namespace App\Controller;

use App\Entity\Locker;
use App\Repository\LockerRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/deposit", name="locker_deposit")
     */
    public function pickUpPackage(Request $request/*, LockerManager $lockerManager*/): Response
    {
        // jada jada
    }

    /**
     * @Route("/locker/{number}", ...)
     *
     * of
     *
     * @Entity("locker", expr="repository.findInUseLocker(number)"})
     */
    public function locker(Locker $locker)
    {

    }
}
