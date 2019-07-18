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
 * @Route("/api/", name="api_")
 */
class ArticleRestController extends FOSRestController
{
  /**
   * Lists all articles.
   * @Rest\Get("articles")
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
	 * @Rest\Get("article/{barCode}")

	 * @return Article
	 */
	public function show($barCode,ArticleRepository $articleRepository)
	{
    $found = $articleRepository->findByBarCode($barCode);

    return $this->handleView($this->view($found));
  }
  

  /**
   * Create article.
   * @Rest\Post("article")
   *
   * @return Response
   */
  public function postArticleAction(Request $request)
  {
    $article = new Article();
    $form = $this->createForm(ArticleType::class, $article);
    $data = json_decode($request->getContent(), true);
    $form->submit($data);
    if ($form->isSubmitted() ) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($article);
      $em->flush();
      return $this->handleView($this->view(['status' => 'ok','tst'=>$article], Response::HTTP_CREATED));
    }
    return $this->handleView($this->view($form->getErrors()), Response::HTTP_EXPECTATION_FAILED);
  }

  // /**
	//  * @Rest\Put("article/{id}/edit")
	//  * @param Request $request
	//  * @param Article $article
	//  * @return Article
	//  */
	// public function edit(Request $request, Article $article)
	// {
  //   $data = json_decode($request->getContent(), true);
  //  // dump($data);
  //   if (empty($data)) {
  //     return  $this->handleView($this->view(['message' => 'Article not found'], Response::HTTP_NOT_FOUND));
  // }

  //   $form = $this->createForm(ArticleType::class, $article);
  //   $form->submit($data);
  //   $em = $this->getDoctrine()->getManager();
  //   $em->persist($article);
  //   $em->flush();
  //  // $data = $this->serializeProgrammer($article);
  //  return $this->handleView($this->view($data, Response::HTTP_CREATED));
  // }
  

	/**
	 * @Rest\Delete("article/{id}")
	 *
	 * @param Article $article
	 * @return array
	 */
	public function delete(Request $request,ArticleRepository $articleRepository)
	{
    $article = $articleRepository->find($request->get('id'));
    $em = $this->getDoctrine()->getManager();

    if ($article) {
        $em->remove($article);
        $em->flush();
    }
	}


  //     /**
  //  * Lists all articles.
  //  * @Rest\Get("/tva/{id}")
  //  *
  //  * @return Response
  //  */
  // public function getTvaAction(TvaRepository $tvaRepository,Request $request)
  // {
  //   $data = json_decode($request->getContent(), true);

  // //  $repository = $this->getDoctrine()->getManager();
  //  // $repository = $this->getDoctrine()->getRepository(Article::class);
  //   $articles = $tvaRepository->findOneBy(['id'=>$data['id']]);
  //   return $this->handleView($this->view($articles), Response::HTTP_FOUND);
  // }

}