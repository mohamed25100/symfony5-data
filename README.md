# symfony5-data
symfony5 data create using database guide

## ArticleController.php
- part ( 1 <!-- @Route("/article", name="app_article") --> ) by default
- part ( 2 <!-- @Route("/create-article", name="create_article") -->) by creating database
## objectif
- create new article by:
- setTitre
- setResume
- setContenu
- setDate

## Utilisation developpeur :
- use App\Entity\Article;
- use Doctrine\Persistence\ManagerRegistry;
- public function createArticle(ManagerRegistry $doctrine): Response
- $entityManager = $doctrine->getManager();
- $article = new Article();
- $article->setTitre('Keyboard');
- $entityManager->persist($article);
- $entityManager->flush();
- return new Response('Saved new product with id '.$article->getId());
## CMD
| s | s | s | s | 
|---|---|---|---|
| s | s | s | s | 
---------
---------
- php bin/console dbal:run-sql 'SELECT * FROM article'

## [&copy;Mohamed BOUCHERBA](https://mohamed-boucherba.fr/)