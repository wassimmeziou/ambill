<?php

namespace App\Controller;

use App\Entity\LigneFacture;
use App\Form\LigneFactureType;
use App\Repository\LigneFactureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ligne/facture")
 */
class LigneFactureController extends AbstractController
{
    /**
     * @Route("/", name="ligne_facture_index", methods={"GET"})
     */
    public function index(LigneFactureRepository $ligneFactureRepository): Response
    {
        return $this->render('ligne_facture/index.html.twig', [
            'ligne_factures' => $ligneFactureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ligne_facture_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ligneFacture = new LigneFacture();
        $form = $this->createForm(LigneFactureType::class, $ligneFacture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ligneFacture);
            $entityManager->flush();

            return $this->redirectToRoute('ligne_facture_index');
        }

        return $this->render('ligne_facture/new.html.twig', [
            'ligne_facture' => $ligneFacture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_facture_show", methods={"GET"})
     */
    public function show(LigneFacture $ligneFacture): Response
    {
        return $this->render('ligne_facture/show.html.twig', [
            'ligne_facture' => $ligneFacture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ligne_facture_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LigneFacture $ligneFacture): Response
    {
        $form = $this->createForm(LigneFactureType::class, $ligneFacture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ligne_facture_index', [
                'id' => $ligneFacture->getId(),
            ]);
        }

        return $this->render('ligne_facture/edit.html.twig', [
            'ligne_facture' => $ligneFacture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_facture_delete", methods={"DELETE"})
     */
    public function delete(Request $request, LigneFacture $ligneFacture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneFacture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ligneFacture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ligne_facture_index');
    }
}
