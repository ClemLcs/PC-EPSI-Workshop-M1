<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('base/home.html.twig');
    }

    #[Route('/mentions-legales', name: 'legalNotice')]
    public function legalNotice(): Response
    {
        return $this->render('base/legal.html.twig');
    }

}
