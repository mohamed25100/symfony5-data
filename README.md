# symfony5-data
symfony5 data create using database guide

## ArticleController.php
- part ( 1 <!-- @Route("/article", name="app_article") --> ) by default
- part ( 2 <!-- @Route("/create-article", name="create_article") -->) creating database
- part ( 3 <!-- @Route("/article/{id}", name="article_show") --> ) show article/{id}
## objectif
- create new article by:
- setTitre
- setResume
- setContenu
- setDate

## Utilisation developpeur :
### create article:

- use App\Entity\Article;
- use Doctrine\Persistence\ManagerRegistry;
- public function createArticle(ManagerRegistry $doctrine): Response
- $entityManager = $doctrine->getManager();
- $article = new Article();
- $article->setTitre('Keyboard');
- $entityManager->persist($article);
- $entityManager->flush();
- return new Response('Saved new product with id '.$article->getId());
### show article/{id}
- public function show(ManagerRegistry $doctrine, int $id): Response
- $article = $doctrine->getRepository(Article::class)->find($id);
- return $this->render('article/show.html.twig', ['article' => $article]);
## CMD
|  objectif     | CMD |
|-----|-----|
|to see all articles in database|php bin/console dbal:run-sql 'SELECT * FROM article'|

## [&copy;Mohamed BOUCHERBA](https://mohamed-boucherba.fr/)