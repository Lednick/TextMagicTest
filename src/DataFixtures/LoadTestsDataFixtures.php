<?php

namespace App\DataFixtures;

use App\Entity\AnswerOption;
use App\Entity\Question;
use App\Entity\Test;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LoadTestsDataFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $test = new Test();
        $test->setName('A simple test');
        $test->setDescription('Questions should be answered with one or more answers. If you selected at least one wrong answer, the question will be counted as a fail.');

        $question1 = new Question();
        $question1->setText('1 + 1 = ');
        $question1->setRightAnswersRequiredCount(Question::ONE);
        $question1->setTest($test);

        $answerOption1 = new AnswerOption();
        $answerOption1->setText('3');
        $answerOption1->setRight(false);
        $answerOption1->setQuestion($question1);

        $answerOption2 = new AnswerOption();
        $answerOption2->setText('2');
        $answerOption2->setRight(true);
        $answerOption2->setQuestion($question1);

        $answerOption3 = new AnswerOption();
        $answerOption3->setText('0');
        $answerOption3->setRight(false);
        $answerOption3->setQuestion($question1);

        $question1_1 = new Question();
        $question1_1->setText('2 + 2 = ');
        $question1_1->setRightAnswersRequiredCount(Question::ONE);
        $question1_1->setTest($test);

        $answerOption1_1 = new AnswerOption();
        $answerOption1_1->setText('4');
        $answerOption1_1->setRight(true);
        $answerOption1_1->setQuestion($question1_1);

        $answerOption2_1 = new AnswerOption();
        $answerOption2_1->setText('3 + 1');
        $answerOption2_1->setRight(true);
        $answerOption2_1->setQuestion($question1_1);

        $answerOption3_1 = new AnswerOption();
        $answerOption3_1->setText('10');
        $answerOption3_1->setRight(false);
        $answerOption3_1->setQuestion($question1_1);

        $question1_2 = new Question();
        $question1_2->setText('3 + 3 =');
        $question1_2->setRightAnswersRequiredCount(Question::ONE);
        $question1_2->setTest($test);

        $answerOption1_2 = new AnswerOption();
        $answerOption1_2->setText('1 + 5');
        $answerOption1_2->setRight(true);
        $answerOption1_2->setQuestion($question1_2);

        $answerOption2_2 = new AnswerOption();
        $answerOption2_2->setText('1');
        $answerOption2_2->setRight(false);
        $answerOption2_2->setQuestion($question1_2);

        $answerOption3_2 = new AnswerOption();
        $answerOption3_2->setText('6');
        $answerOption3_2->setRight(true);
        $answerOption3_2->setQuestion($question1_2);

        $answerOption4_2 = new AnswerOption();
        $answerOption4_2->setText('2 + 4');
        $answerOption4_2->setRight(true);
        $answerOption4_2->setQuestion($question1_2);

        $question1_3 = new Question();
        $question1_3->setText('4 + 4 = ');
        $question1_3->setRightAnswersRequiredCount(Question::ONE);
        $question1_3->setTest($test);

        $answerOption1_3 = new AnswerOption();
        $answerOption1_3->setText('8');
        $answerOption1_3->setRight(true);
        $answerOption1_3->setQuestion($question1_3);

        $answerOption2_3 = new AnswerOption();
        $answerOption2_3->setText('4');
        $answerOption2_3->setRight(false);
        $answerOption2_3->setQuestion($question1_3);

        $answerOption3_3 = new AnswerOption();
        $answerOption3_3->setText('0');
        $answerOption3_3->setRight(false);
        $answerOption3_3->setQuestion($question1_3);

        $answerOption4_3 = new AnswerOption();
        $answerOption4_3->setText('0 + 8');
        $answerOption4_3->setRight(true);
        $answerOption4_3->setQuestion($question1_3);

        $question1_4 = new Question();
        $question1_4->setText('5 + 5 = ');
        $question1_4->setRightAnswersRequiredCount(Question::ONE);
        $question1_4->setTest($test);

        $answerOption1_4 = new AnswerOption();
        $answerOption1_4->setText('6');
        $answerOption1_4->setRight(false);
        $answerOption1_4->setQuestion($question1_4);

        $answerOption2_4 = new AnswerOption();
        $answerOption2_4->setText('18');
        $answerOption2_4->setRight(false);
        $answerOption2_4->setQuestion($question1_4);

        $answerOption3_4 = new AnswerOption();
        $answerOption3_4->setText('10');
        $answerOption3_4->setRight(true);
        $answerOption3_4->setQuestion($question1_4);

        $answerOption4_4 = new AnswerOption();
        $answerOption4_4->setText('9');
        $answerOption4_4->setRight(false);
        $answerOption4_4->setQuestion($question1_4);

        $answerOption5_4 = new AnswerOption();
        $answerOption5_4->setText('0');
        $answerOption5_4->setRight(false);
        $answerOption5_4->setQuestion($question1_4);

        $question1_5 = new Question();
        $question1_5->setText('6 + 6 = ');
        $question1_5->setRightAnswersRequiredCount(Question::ONE);
        $question1_5->setTest($test);

        $answerOption1_5 = new AnswerOption();
        $answerOption1_5->setText('3');
        $answerOption1_5->setRight(false);
        $answerOption1_5->setQuestion($question1_5);

        $answerOption2_5 = new AnswerOption();
        $answerOption2_5->setText('9');
        $answerOption2_5->setRight(false);
        $answerOption2_5->setQuestion($question1_5);

        $answerOption3_5 = new AnswerOption();
        $answerOption3_5->setText('0');
        $answerOption3_5->setRight(false);
        $answerOption3_5->setQuestion($question1_5);

        $answerOption4_5 = new AnswerOption();
        $answerOption4_5->setText('12');
        $answerOption4_5->setRight(true);
        $answerOption4_5->setQuestion($question1_5);

        $answerOption5_5 = new AnswerOption();
        $answerOption5_5->setText('5 + 7');
        $answerOption5_5->setRight(true);
        $answerOption5_5->setQuestion($question1_5);

        $question1_6 = new Question();
        $question1_6->setText('7 + 7 = ');
        $question1_6->setRightAnswersRequiredCount(Question::ONE);
        $question1_6->setTest($test);

        $answerOption1_6 = new AnswerOption();
        $answerOption1_6->setText('5');
        $answerOption1_6->setRight(false);
        $answerOption1_6->setQuestion($question1_6);

        $answerOption2_6 = new AnswerOption();
        $answerOption2_6->setText('14');
        $answerOption2_6->setRight(true);
        $answerOption2_6->setQuestion($question1_6);

        $question1_7 = new Question();
        $question1_7->setText('8 + 8 = ');
        $question1_7->setRightAnswersRequiredCount(Question::ONE);
        $question1_7->setTest($test);

        $answerOption1_7 = new AnswerOption();
        $answerOption1_7->setText('16');
        $answerOption1_7->setRight(true);
        $answerOption1_7->setQuestion($question1_7);

        $answerOption2_7 = new AnswerOption();
        $answerOption2_7->setText('12');
        $answerOption2_7->setRight(false);
        $answerOption2_7->setQuestion($question1_7);

        $answerOption3_7 = new AnswerOption();
        $answerOption3_7->setText('9');
        $answerOption3_7->setRight(false);
        $answerOption3_7->setQuestion($question1_7);

        $answerOption4_7 = new AnswerOption();
        $answerOption4_7->setText('5');
        $answerOption4_7->setRight(false);
        $answerOption4_7->setQuestion($question1_7);

        $question1_8 = new Question();
        $question1_8->setText('9 + 9 =');
        $question1_8->setRightAnswersRequiredCount(Question::ONE);
        $question1_8->setTest($test);

        $answerOption1_8 = new AnswerOption();
        $answerOption1_8->setText('18');
        $answerOption1_8->setRight(true);
        $answerOption1_8->setQuestion($question1_8);

        $answerOption2_8 = new AnswerOption();
        $answerOption2_8->setText('9');
        $answerOption2_8->setRight(false);
        $answerOption2_8->setQuestion($question1_8);

        $answerOption3_8 = new AnswerOption();
        $answerOption3_8->setText('17 + 1');
        $answerOption3_8->setRight(true);
        $answerOption3_8->setQuestion($question1_8);

        $answerOption4_8 = new AnswerOption();
        $answerOption4_8->setText('2 + 16');
        $answerOption4_8->setRight(true);
        $answerOption4_8->setQuestion($question1_8);

        $question1_9 = new Question();
        $question1_9->setText('10 + 10 =');
        $question1_9->setRightAnswersRequiredCount(Question::ONE);
        $question1_9->setTest($test);

        $answerOption1_9 = new AnswerOption();
        $answerOption1_9->setText('0');
        $answerOption1_9->setRight(false);
        $answerOption1_9->setQuestion($question1_9);

        $answerOption2_9 = new AnswerOption();
        $answerOption2_9->setText('2');
        $answerOption2_9->setRight(false);
        $answerOption2_9->setQuestion($question1_9);

        $answerOption3_9 = new AnswerOption();
        $answerOption3_9->setText('8');
        $answerOption3_9->setRight(false);
        $answerOption3_9->setQuestion($question1_9);

        $answerOption4_8 = new AnswerOption();
        $answerOption4_8->setText('20');
        $answerOption4_8->setRight(true);
        $answerOption4_8->setQuestion($question1_9);

        $manager->persist($test);
        $manager->flush();
    }
}
