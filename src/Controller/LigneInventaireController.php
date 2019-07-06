<?php

namespace App\Controller;

use App\Entity\LigneInventaire;
use App\Form\LigneInventaireType;
use App\Repository\LigneInventaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ligne/inventaire")
 */
class LigneInventaireController extends AbstractController
{
    /**
     * @Route("/", name="ligne_inventaire_index", methods={"GET"})
     */
    public function index(LigneInventaireRepository $ligneInventaireRepository): Response
    {
        return $this->render('ligne_inventaire/index.html.twig', [
            'ligne_inventaires' => $ligneInventaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ligne_inventaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ligneInventaire = new LigneInventaire();

        $qte = $ligneInventaire->qteInv;
        $article = $ligneInventaire->article;
        dump("qunt",$qte,"articlee",$article);

        $form = $this->createForm(LigneInventaireType::class, $ligneInventaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ligneInventaire);
            $entityManager->flush();

        

            return $this->redirectToRoute('ligne_inventaire_index');
        }

        return $this->render('ligne_inventaire/new.html.twig', [
            'ligne_inventaire' => $ligneInventaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_inventaire_show", methods={"GET"})
     */
    public function show(LigneInventaire $ligneInventaire): Response
    {
        return $this->render('ligne_inventaire/show.html.twig', [
            'ligne_inventaire' => $ligneInventaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ligne_inventaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LigneInventaire $ligneInventaire): Response
    {
        $form = $this->createForm(LigneInventaireType::class, $ligneInventaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ligne_inventaire_index', [
                'id' => $ligneInventaire->getId(),
            ]);
        }

        return $this->render('ligne_inventaire/edit.html.twig', [
            'ligne_inventaire' => $ligneInventaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_inventaire_delete", methods={"DELETE"})
     */
    public function delete(Request $request, LigneInventaire $ligneInventaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneInventaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ligneInventaire);
            $entityManager->flush();
        }
        // return $this->render('ligne_inventaire/index.html.twig', [
        //     'ligne_inventaires' => $inventaire->getLigneInventaires(),
        // ]);
        return $this->redirectToRoute('inventaire_show', [
            'id' => $ligneInventaire->getInventaire()->getId(),
        ]);
    }
}
