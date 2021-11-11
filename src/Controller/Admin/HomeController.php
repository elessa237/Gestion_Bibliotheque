<?php
namespace App\Controller\Admin;

use App\Repository\DocumentRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @IsGranted("ROLE_ADMIN")
 * @Route("/biblio/admin")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_admin")
     */
    public function FunctionName(UserRepository $user,DocumentRepository $documents): Response
    {
        return $this->render('biblio/admin/home/index.html.twig', [
            'documents' => $documents->findAll(),
            'users' => $user->findAll(),
            'lastDocuments' => $documents->findLastFour(),
            'lastUsers'=> $user->findLastSubscribeUser(),
        ]);
    }
}