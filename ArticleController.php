<?php

namespace App\Controller;

//use class name Article from database #to use database
use App\Entity\Article;
use Doctrine\Persistence\ManagerRegistry;
//fin #to use database

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="app_article")
     */
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
    
    /**
     * @Route("/create-article", name="create_article")
     */
    public function createArticle(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $article = new Article();
        $article->setTitre('Keyboard');
        $article->setResume('1999');
        $article->setContenu('Ergonomic and stylish!');
        $article->setDate('2022-01-02');

        // tell Doctrine you want to (eventually) save the Article (no queries yet)
        $entityManager->persist($article);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$article->getId());
    }
}