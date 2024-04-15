<?php

namespace App\Service;

use App\Entity\Test;

class TestResultProcessor
{
    public const DECISION_FAIL = 'fail';
    public const DECISION_PASS = 'pass';

    /**
     * Array with given format ['answer_option_id' => 'answer_option_id', , ,].
     */
    public function process(Test $test, array $selectedAnswerOptions): array
    {
        $processedResults = [];

        foreach ($test->getQuestions() as $question) {
            $selectedAnswersProcessed = [
                'picked' => [],
                'wrong' => [],
                'correct' => [],
            ];

            foreach ($question->getAnswerOptions() as $answerOption) {
                // checking if we have option selected by user
                if (\array_key_exists($answerOption->getId(), $selectedAnswerOptions)) {
                    $selectedAnswersProcessed['picked'][] = $answerOption->getId();

                    if ($answerOption->isRight()) {
                        $selectedAnswersProcessed['correct'][] = $answerOption->getId();
                    } else {
                        $selectedAnswersProcessed['wrong'][] = $answerOption->getId();
                        // instantly count as fail if picked at least one wrong answer.
                        $selectedAnswersProcessed['decision'] = self::DECISION_FAIL;

                        continue;
                    }
                }

                // checking if there are enough right answers to count as success
                // if not - count as fail.
                if ($question->getRightAnswersRequiredCount() <= \count($selectedAnswersProcessed['correct'])) {
                    $selectedAnswersProcessed['decision'] = self::DECISION_PASS;
                } else {
                    $selectedAnswersProcessed['decision'] = self::DECISION_FAIL;
                }
            }

            $processedResults[$question->getId()] = $selectedAnswersProcessed;
        }

        return $processedResults;
    }
}
