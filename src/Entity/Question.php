<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    public const ONE = 1;
    public const TWO = 2;
    public const THREE = 3;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(type: Types::TEXT)]
    private string $text;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    #[ORM\JoinColumn(nullable: false)]
    private Test $test;

    /**
     * @var Collection<int, AnswerOption>
     */
    #[ORM\OneToMany(targetEntity: AnswerOption::class, mappedBy: 'question', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $answerOptions;

    #[ORM\Column]
    private float $rightAnswersRequiredCount;

    public function __construct()
    {
        $this->answerOptions = new ArrayCollection();
        $this->rightAnswersRequiredCount = self::ONE;
    }

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

    public function getTest(): Test
    {
        return $this->test;
    }

    public function setTest(Test $test): static
    {
        $test->addQuestion($this);
        $this->test = $test;

        return $this;
    }

    /**
     * @return Collection<int, AnswerOption>
     */
    public function getAnswerOptions(): Collection
    {
        return $this->answerOptions;
    }

    public function getAnswerOptionsShuffled(): array
    {
        // each time to show answer options in random order
        $answerOptions = $this->answerOptions->toArray();
        shuffle($answerOptions);

        return $answerOptions;
    }

    public function addAnswerOption(AnswerOption $answerOption): static
    {
        if (!$this->answerOptions->contains($answerOption)) {
            $this->answerOptions->add($answerOption);
            $answerOption->setQuestion($this);
        }

        return $this;
    }

    public function removeAnswerOption(AnswerOption $answerOption): static
    {
        if ($this->answerOptions->removeElement($answerOption)) {
            // set the owning side to null (unless already changed)
            if ($answerOption->getQuestion() === $this) {
                $answerOption->setQuestion(null);
            }
        }

        return $this;
    }

    public function getRightAnswersRequiredCount(): float
    {
        return $this->rightAnswersRequiredCount;
    }

    public function setRightAnswersRequiredCount(float $rightAnswersRequiredCount): static
    {
        $this->rightAnswersRequiredCount = $rightAnswersRequiredCount;

        return $this;
    }
}
