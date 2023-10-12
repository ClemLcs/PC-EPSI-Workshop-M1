<?php

namespace App\Controller;

use App\Entity\Anonymous;
use App\Form\AnonymousFormType;
use App\Security\AppAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizController extends AbstractController
{
    #[Route('/quiz', name: 'app_quiz')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new Anonymous();
        $form = $this->createForm(AnonymousFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('quiz/index.html.twig', [
            'anonymousForm' => $form->createView(),
        ]);
    }
}
