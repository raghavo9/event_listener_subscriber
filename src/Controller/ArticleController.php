<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use App\Entity\Category;
use App\Form\ArticleType;
use App\Security\LoginFormAthenticator;


class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index(ArticleRepository $articlerepository): Response
    {
        $article = $articlerepository->findAll();
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'article'=>$article
        ]);
    }
    
    



    /**
     * @Route("/add_article_form", name="add_article_form") 
     */

    public function createArticleForm(Request $request)
    {
       $article = new Article();
       $form = $this->createForm(ArticleType::class , $article,['action'=>$this->generateUrl('add_article_form') ]);

       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid())
       {
           $article->setArticleAuthor($this->getUser());
           $entityManager= $this->getDoctrine()->getManager();
           $entityManager->persist($article);
           $entityManager->flush();

           return $this->redirectToRoute("article");

       }

       return $this->render('form/add_article_form.html.twig' , ['article_form'=>$form->createView()]);

       
    }

    /**
     * @Route("/articleById/{id}", name="show_full_article") 
     */

     public function showfullarticle($id,ArticleRepository $articlerepository): Response
     {
         //dump($id);
        $article1 = $articlerepository->findBy(['id'=>$id]);
        //dump($article1);
        return $this->render('article/showfullarticle.html.twig', [
            'controller_name' => 'ArticleController',
            'article'=>$article1
        ]);
     }


}
