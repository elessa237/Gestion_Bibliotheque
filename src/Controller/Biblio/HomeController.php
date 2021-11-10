<?php

namespace App\Controller\Biblio;

use App\Repository\DocumentRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="biblio_home")
     */
    public function index(
        DocumentRepository $document,
        Request $request,
        PaginatorInterface $pagination
    ): Response {
        $documents = $pagination->paginate(
            $document->findAll(),
            $request->query->getInt('page', 1),
            3
        );
        return $this->render('biblio/home/index.html.twig', [
            'documents' => $documents,
        ]);
    }
}
