<?php

namespace App\Controller;

use App\Entity\Test;
use App\Repository\TestRepository;
use App\Service\TestResultProcessor;
use App\Service\TestResultsLogger;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/test')]
class TestController extends AbstractController
{
    #[Route('/', name: 'app_test_index', methods: ['GET'])]
    public function index(TestRepository $testRepository): Response
    {
        return $this->render('test/index.html.twig', [
            'tests' => $testRepository->findAll(),
        ]);
    }

    #[Route('/{id}/write', name: 'app_test_write_render', methods: ['GET'])]
    public function renderWrite(Test $test): Response
    {
        return $this->render('test/write_new.html.twig', [
            'test' => $test,
        ]);
    }

    #[Route('/{id}/write', name: 'app_test_write_process', methods: ['POST'])]
    public function processWritten(
        Request $request,
        Test $test,
        EntityManagerInterface $entityManager,
        TestResultProcessor $resultProcessor,
        TestResultsLogger $testResultsLogger
    ): Response {
        $selectedAnswerOptions = $request->getPayload()->all();

        $testResults = $resultProcessor->process($test, $selectedAnswerOptions);
        $testResultsLogger->log($test, $testResults);

        $entityManager->flush();

        return $this->render('test/process_written.html.twig', [
            'test' => $test,
            'results' => $testResults,
        ]);
    }
}
