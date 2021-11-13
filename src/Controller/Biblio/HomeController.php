<?php

namespace App\Controller\Biblio;

use App\Repository\DocumentRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Maxime Elessa <elessamaxime@icloud.com>
 * @package App\Controller\Biblio
 */
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

        $search = $request->get('search', '');

        $documents = $pagination->paginate(
            $document->findAllDocuments($search),
            $request->query->getInt('page', 1),
            10
        );


        return $this->render('biblio/home/index.html.twig', [
            'documents' => $documents,
            'LastDocuments' => $document->findLastFour(),
        ]);
    }
    
}
