<?php

namespace App\Controller\Biblio;

use App\Entity\Documents\DocumentSearch;
use App\Form\DocumentSearchType;
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

        $search = new DocumentSearch();

        $form = $this->createForm(DocumentSearchType::class, $search, [
            'attr' => [
                'class' => 'file-search'
            ]
        ]);
        $form->handleRequest($request);
        
        // if ($form->isSubmitted() && $form->isValid()) { 
            
        // }

        $documents = $pagination->paginate(
            $document->findAllDocuments($search),
            $request->query->getInt('page', 1),
            10
        );


        return $this->render('biblio/home/index.html.twig', [
            'documents' => $documents,
            'LastDocuments' => $document->findLastTree(),
            'form' => $form->createView(),
        ]);
    }
    
}
