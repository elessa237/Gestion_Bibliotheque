<?php

namespace App\Controller\Biblio;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="biblio_home")
     */
    public function index(): Response
    {
        return $this->render('biblio/home/index.html.twig');
    }
}
