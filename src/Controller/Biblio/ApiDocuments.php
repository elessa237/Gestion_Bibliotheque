<?php
namespace App\Controller\Biblio;

use App\Repository\DocumentRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiDocuments extends AbstractController
{
    /**
     * @param $request
     * @param $pagination
     * @param $document
     * @return Response
     * @Route("/api/documents", name="Get_Doc", methods={"GET"})
     */
    public function Home(Request $request, PaginatorInterface $pagination, DocumentRepository $document) : Response
    {

        $search = $request->get('search', '');

        $documents = $pagination->paginate(
            $document->findAllDocuments($search),
            $request->query->getInt('page', 1),
            10
        );


        return $this->json([
            'documents' => $documents,
            'isConnect' => $this->getUser()? $isConnect=true : $isConnect = false,
        ], 200, [], [
            'groups' => 'Doc:read',
        ]);
    }
}