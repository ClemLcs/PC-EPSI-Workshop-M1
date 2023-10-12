<?php

namespace App\Controller;

use App\Entity\Quiz;
use App\Entity\Reponse;

class QuizzController extends AbstractController
{
    /**
     * @Route("/quiz/{quizId}", name="quiz_show", methods={"GET"})
     */
    public function showQuiz($quizId): JsonResponse
    {
        $quiz = $this->getDoctrine()->getRepository(Quiz::class)->find($quizId);

        if (!$quiz) {
            throw $this->createNotFoundException('Quiz not found');
        }

        $questions_response = [];
        foreach ($quiz->getQuestions() as $question) {

            $responses = [];
            foreach ($question->getResponses() as $response) {
                $responses[] = [
                    'id' => $response.getId(),
                    'response' => $response.getName()
                ];
            }

            $questions_response[] = [
                'text' => $question->getName(),
                'responses' => $responses
            ];
        }

        $data = [
            'id' => $quiz->getId(),
            'question_response' => [
                'id' => $quiz->getId(),
                'question' => $questions_response
            ]
        ];

        return new JsonResponse($data);
    }

    /**
     * @Route("/quiz/{quizId}/responses", name="correct_response", methods={"POST"})
     */
    public function correctResponses(Request $request, $quizId): JsonResponse
    {
        $body = json_decode($request->getContent(), true);

        if (!$body) {
            throw $this->createNotFoundException('Wrong body');
        }

        $quiz = $this->getDoctrine()->getRepository(Quiz::class)->find($quizId);

        if (!$quiz) {
            throw $this->createNotFoundException('Quiz not found');
        }

        $score = 0;

        foreach ($body as $items) {
            $response = $this->getDoctrine()->getRepository(Reponse::class)->find($items->response);

            $score += $response->poid;
        }

        $data = [
            'score' => $score
        ];

        return new JsonResponse($data);
    }
}