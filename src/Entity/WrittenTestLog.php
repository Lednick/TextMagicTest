<?php

namespace App\Entity;

use App\Repository\WrittenTestLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WrittenTestLogRepository::class)]
class WrittenTestLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    #[ORM\ManyToOne(inversedBy: 'writtenTestLogs')]
    #[ORM\JoinColumn(nullable: false)]
    private Test $test;

    #[ORM\Column]
    private array $data = [];

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getTest(): Test
    {
        return $this->test;
    }

    public function setTest(Test $test): static
    {
        $this->test = $test;

        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }
}
