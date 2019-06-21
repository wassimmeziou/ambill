<?php

namespace App\Controller;

use App\Entity\LigneReglement;
use App\Form\LigneReglementType;
use App\Repository\LigneReglementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ligne/reglement")
 */
class LigneReglementController extends AbstractController
{
    /**
     * @Route("/", name="ligne_reglement_index", methods={"GET"})
     */
    public function index(LigneReglementRepository $ligneReglementRepository): Response
    {
        return $this->render('ligne_reglement/index.html.twig', [
            'ligne_reglements' => $ligneReglementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ligne_reglement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ligneReglement = new LigneReglement();
        $form = $this->createForm(LigneReglementType::class, $ligneReglement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ligneReglement);
            $entityManager->flush();

            return $this->redirectToRoute('ligne_reglement_index');
        }

        return $this->render('ligne_reglement/new.html.twig', [
            'ligne_reglement' => $ligneReglement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_reglement_show", methods={"GET"})
     */
    public function show(LigneReglement $ligneReglement): Response
    {
        return $this->render('ligne_reglement/show.html.twig', [
            'ligne_reglement' => $ligneReglement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ligne_reglement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LigneReglement $ligneReglement): Response
    {
        $form = $this->createForm(LigneReglementType::class, $ligneReglement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ligne_reglement_index', [
                'id' => $ligneReglement->getId(),
            ]);
        }

        return $this->render('ligne_reglement/edit.html.twig', [
            'ligne_reglement' => $ligneReglement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_reglement_delete", methods={"DELETE"})
     */
    public function delete(Request $request, LigneReglement $ligneReglement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneReglement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ligneReglement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ligne_reglement_index');
    }
}
