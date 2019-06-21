<?php

namespace App\Controller;

use App\Entity\LigneDemandeStock;
use App\Form\LigneDemandeStockType;
use App\Repository\LigneDemandeStockRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ligne/demande/stock")
 */
class LigneDemandeStockController extends AbstractController
{
    /**
     * @Route("/", name="ligne_demande_stock_index", methods={"GET"})
     */
    public function index(LigneDemandeStockRepository $ligneDemandeStockRepository): Response
    {
        return $this->render('ligne_demande_stock/index.html.twig', [
            'ligne_demande_stocks' => $ligneDemandeStockRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ligne_demande_stock_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ligneDemandeStock = new LigneDemandeStock();
        $form = $this->createForm(LigneDemandeStockType::class, $ligneDemandeStock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ligneDemandeStock);
            $entityManager->flush();

            return $this->redirectToRoute('ligne_demande_stock_index');
        }

        return $this->render('ligne_demande_stock/new.html.twig', [
            'ligne_demande_stock' => $ligneDemandeStock,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_demande_stock_show", methods={"GET"})
     */
    public function show(LigneDemandeStock $ligneDemandeStock): Response
    {
        return $this->render('ligne_demande_stock/show.html.twig', [
            'ligne_demande_stock' => $ligneDemandeStock,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ligne_demande_stock_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LigneDemandeStock $ligneDemandeStock): Response
    {
        $form = $this->createForm(LigneDemandeStockType::class, $ligneDemandeStock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ligne_demande_stock_index', [
                'id' => $ligneDemandeStock->getId(),
            ]);
        }

        return $this->render('ligne_demande_stock/edit.html.twig', [
            'ligne_demande_stock' => $ligneDemandeStock,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_demande_stock_delete", methods={"DELETE"})
     */
    public function delete(Request $request, LigneDemandeStock $ligneDemandeStock): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneDemandeStock->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ligneDemandeStock);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ligne_demande_stock_index');
    }
}
