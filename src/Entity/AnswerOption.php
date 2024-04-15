<?php

namespace App\Entity;

use App\Repository\AnswerOptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnswerOptionRepository::class)]
class AnswerOption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(type: Types::TEXT)]
    private string $text;

    #[ORM\Column]
    private bool $isRight;

    #[ORM\ManyToOne(inversedBy: 'answerOptions')]
    #[ORM\JoinColumn(nullable: false)]
    private Question $question;

    public function getId(): int
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function isRight(): bool
    {
        return $this->isRight;
    }

    public function setRight(bool $isRight): static
    {
        $this->isRight = $isRight;

        return $this;
    }

    public function getQuestion(): Question
    {
        return $this->question;
    }

    public function setQuestion(Question $question): static
    {
        $question->addAnswerOption($this);
        $this->question = $question;

        return $this;
    }
}
