<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_index", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="article_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //dump($article);
          //  die();
            $entityManager = $this->getDoctrine()->getManager();

            // $tvaResp = $article->getTva()->getValeur();
            // $prAchat = $article->getPrixAchat();
            // $marge = $article->getMarge();

            // $prVnt = $prAchat + ($prAchat * $marge * 0.01);
            // $article->setPrixVente($prVnt);

            // $prTTC = $prVnt + ($prVnt * $tvaResp * 0.01);
            // $article->setPrixTTC($prTTC);

         //   dump($article);

         //   if (isset($prVnt)) {
                $entityManager->persist($article);
                $entityManager->flush();

                return $this->redirectToRoute('article_index');
          //  }
        }

        return $this->render('article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_show", methods={"GET"})
     */
    public function show(Article $article): Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Article $article): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // $tvaResp = $article->getTva()->getValeur();
            // $prHT = $article->getPrixHT();
            // $prTTC = $prHT + ($prHT * $tvaResp * 0.01);
            // $article->setPrixTTC($prTTC);

            // $marge = $article->getMarge();
            // $prVnt = $prTTC + ($prTTC * $marge * 0.01);
            // $article->setPrixVente($prVnt);


            $em->flush();

            return $this->redirectToRoute('article_index', [
                'id' => $article->getId(),
            ]);
        }

        return $this->render('article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Article $article): Response
    {
        if ($this->isCsrfTokenValid('delete' . $article->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_index');
    }
}
