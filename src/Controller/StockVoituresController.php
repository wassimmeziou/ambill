<?php

namespace App\Controller;

use App\Entity\StockVoitures;
use App\Form\StockVoituresType;
use App\Repository\StockVoituresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/stok/voitures")
 */
class StockVoituresController extends AbstractController
{
    /**
     * @Route("/", name="stock_voitures_index", methods={"GET"})
     */
    public function index(StockVoituresRepository $stockVoituresRepository): Response
    {
        return $this->render('stock_voitures/index.html.twig', [
            'stock_voitures' => $stockVoituresRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="stock_voitures_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $stockVoiture = new StockVoitures();
        $form = $this->createForm(StockVoituresType::class, $stockVoiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stockVoiture);
            $entityManager->flush();

            return $this->redirectToRoute('stock_voitures_index');
        }

        return $this->render('stock_voitures/new.html.twig', [
            'stock_voiture' => $stockVoiture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stock_voitures_show", methods={"GET"})
     */
    public function show(StockVoitures $stockVoiture): Response
    {
        return $this->render('stock_voitures/show.html.twig', [
            'stock_voiture' => $stockVoiture,
            's' => $stockVoiture->voiture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="stock_voitures_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StockVoitures $stockVoiture): Response
    {
        $form = $this->createForm(StockVoituresType::class, $stockVoiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stock_voitures_index', [
                'id' => $stockVoiture->getId(),
            ]);
        }

        return $this->render('stock_voitures/edit.html.twig', [
            'stock_voiture' => $stockVoiture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stock_voitures_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StockVoitures $stockVoiture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stockVoiture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($stockVoiture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('stock_voitures_index');
    }
}
