<?php

namespace App\Controller;

use App\Entity\PieceReglement;
use App\Form\PieceReglementType;
use App\Repository\PieceReglementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/piece/reglement")
 */
class PieceReglementController extends AbstractController
{
    /**
     * @Route("/", name="piece_reglement_index", methods={"GET"})
     */
    public function index(PieceReglementRepository $pieceReglementRepository): Response
    {
        return $this->render('piece_reglement/index.html.twig', [
            'piece_reglements' => $pieceReglementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="piece_reglement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pieceReglement = new PieceReglement();
        $form = $this->createForm(PieceReglementType::class, $pieceReglement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pieceReglement);
            $entityManager->flush();

            return $this->redirectToRoute('piece_reglement_index');
        }

        return $this->render('piece_reglement/new.html.twig', [
            'piece_reglement' => $pieceReglement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="piece_reglement_show", methods={"GET"})
     */
    public function show(PieceReglement $pieceReglement): Response
    {
        return $this->render('piece_reglement/show.html.twig', [
            'piece_reglement' => $pieceReglement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="piece_reglement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PieceReglement $pieceReglement): Response
    {
        $form = $this->createForm(PieceReglementType::class, $pieceReglement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('piece_reglement_index', [
                'id' => $pieceReglement->getId(),
            ]);
        }

        return $this->render('piece_reglement/edit.html.twig', [
            'piece_reglement' => $pieceReglement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="piece_reglement_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PieceReglement $pieceReglement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pieceReglement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pieceReglement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('piece_reglement_index');
    }
}
