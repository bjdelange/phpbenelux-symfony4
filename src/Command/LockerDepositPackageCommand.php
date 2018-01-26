<?php

namespace App\Command;

use App\Entity\Locker;
use App\Repository\LockerRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class LockerDepositPackageCommand extends Command
{
    protected static $defaultName = 'locker:deposit-package';

    /**
     * @var LockerRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $entityManager;

    /**
     * LockerDepositPackageCommand constructor.
     */
    public function __construct(LockerRepository $repository, ObjectManager $entityManager)
    {
        parent::__construct(self::$defaultName);

        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this
            ->setDescription('Put package in locker')
            ->addArgument('locker', InputArgument::REQUIRED, 'Locker number')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        /** @var Locker $locker */
        $locker = $this->repository->findOneBy(['number' => $input->getArgument('locker')]);
        $locker->depositPackage($this->generateAccessCode());

        $this->entityManager->flush();

        $io->success(sprintf('Hij zit er in ! Locker %s', $locker->getNumber()));
    }

    private function generateAccessCode(): string
    {
        return substr(sha1(uniqid()), 0, 7);
    }
}
