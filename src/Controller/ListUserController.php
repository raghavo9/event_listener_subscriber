<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class ListUserController extends AbstractController
{
    /**
     * @Route("/listuser", name="list_user")
     */
    public function index(UserRepository $userrepository): Response
    {
        $user = $userrepository->findAll();
        return $this->render('list_user/listuser.html.twig', [
            'controller_name' => 'ListUserController',
            'user'=>$user
        ]);
    }
    
}
