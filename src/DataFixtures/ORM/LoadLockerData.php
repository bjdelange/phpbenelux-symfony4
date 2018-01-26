<?php

namespace App\DataFixtures\ORM;

use App\Entity\Locker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadLockerData extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $locker1 = new Locker('L01');

        $locker2 = new Locker('L02');
        $locker2->depositPackage('1234');

        $locker3 = new Locker('L03');
        $locker3->depositPackage('ABCD');

        $locker4 = new Locker('L04');

        $manager->persist($locker1);
        $manager->persist($locker2);
        $manager->persist($locker3);
        $manager->persist($locker4);
        $manager->flush();
    }
}
