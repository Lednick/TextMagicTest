<?php

namespace App\Service;

use App\Entity\Test;
use App\Entity\WrittenTestLog;
use Doctrine\ORM\EntityManagerInterface;

class TestResultsLogger
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function log(Test $test, array $processedResults): WrittenTestLog
    {
        $testLog = new WrittenTestLog();
        $testLog->setTest($test);
        $testLog->setData($processedResults);

        $this->entityManager->persist($testLog);

        return $testLog;
    }
}
