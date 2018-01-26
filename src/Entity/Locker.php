<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LockerRepository")
 */
class Locker
{
    public const FREE = 'free';
    public const IN_USE = 'in_use';
    public const OUT_OF_ORDER = 'out_of_order';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(length=5, unique=true)
     */
    private $number;

    /**
     * @ORM\Column(length=20)
     */
    private $status;

    /**
     * @ORM\Column(nullable=true)
     */
    private $accessCode;

    public function __construct(string $number, string $status = self::FREE)
    {
        $this->number = $number;
        $this->status = $status;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function depositPackage(string $accessCode): void
    {
        if ($this->status !== self::FREE) {
            throw new \LogicException('Bezet');
        }

        $this->status = self::IN_USE;
        $this->accessCode = $accessCode;
    }

    public function pickUpPackage(string $accessCode): void
    {
        if ($this->status !== self::IN_USE) {
            throw new \LogicException('Leeg');
        }

        if ($accessCode !== $this->accessCode) {
            throw new \InvalidArgumentException('code denied');
        }

        $this->accessCode = null;
        $this->status = self::FREE;
    }
}
