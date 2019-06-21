<?php

namespace App\Controller;

use App\Entity\DemandeStock;
use App\Form\DemandeStockType;
use App\Repository\DemandeStockRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/demande/stock")
 */
class DemandeStockController extends AbstractController
{
    /**
     * @Route("/", name="demande_stock_index", methods={"GET"})
     */
    public function index(DemandeStockRepository $demandeStockRepository): Response
    {
        return $this->render('demande_stock/index.html.twig', [
            'demande_stocks' => $demandeStockRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="demande_stock_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $demandeStock = new DemandeStock();
        $form = $this->createForm(DemandeStockType::class, $demandeStock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($demandeStock);
            $entityManager->flush();

            return $this->redirectToRoute('demande_stock_index');
        }

        return $this->render('demande_stock/new.html.twig', [
            'demande_stock' => $demandeStock,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="demande_stock_show", methods={"GET"})
     */
    public function show(DemandeStock $demandeStock): Response
    {
        return $this->render('demande_stock/show.html.twig', [
            'demande_stock' => $demandeStock,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="demande_stock_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DemandeStock $demandeStock): Response
    {
        $form = $this->createForm(DemandeStockType::class, $demandeStock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demande_stock_index', [
                'id' => $demandeStock->getId(),
            ]);
        }

        return $this->render('demande_stock/edit.html.twig', [
            'demande_stock' => $demandeStock,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="demande_stock_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DemandeStock $demandeStock): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demandeStock->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($demandeStock);
            $entityManager->flush();
        }

        return $this->redirectToRoute('demande_stock_index');
    }
}
