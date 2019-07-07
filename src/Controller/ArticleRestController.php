<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use App\Form\ArticleType;

/**
 * 
 * @Route("/api", name="api_")
 */
class ArticleRestController extends FOSRestController
{
  /**
   * Lists all articles.
   * @Rest\Get("/articles")
   *
   * @return Response
   */
  public function getArticleAction(ArticleRepository $articleRepository)
  {
  //  $repository = $this->getDoctrine()->getManager();
   // $repository = $this->getDoctrine()->getRepository(Article::class);
    $articles = $articleRepository->findall();
    return $this->handleView($this->view($articles));
  }

  /**
   * Create article.
   * @Rest\Post("/article")
   *
   * @return Response
   */
  public function postArticleAction(Request $request)
  {
    $article = new Article();
    $form = $this->createForm(ArticleType::class, $article);
    $data = json_decode($request->getContent(), true);
    $form->submit($data);
    if ($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($article);
      $em->flush();
      return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
    }
    return $this->handleView($this->view($form->getErrors()));
  }
}