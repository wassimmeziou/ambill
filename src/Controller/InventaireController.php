<?php

namespace App\Controller;

use App\Entity\Inventaire;
use App\Form\InventaireType;
use App\Form\InventaireVoitureType;
use App\Repository\InventaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stock;
use App\Entity\StockVoitures;

/**
 * @Route("/inventaire")
 */
class InventaireController extends AbstractController
{
    /**
     * @Route("/depot", name="inventaire_index", methods={"GET"})
     */
    public function index(InventaireRepository $inventaireRepository): Response
    {
        return $this->render('inventaire/index.html.twig', [
            'inventaires' => $inventaireRepository->findDopts(),
        ]);
    }
/**
     * @Route("/voiture", name="inventaire_voiture_index", methods={"GET"})
     */
    public function indexV(InventaireRepository $inventaireRepository): Response
    {
        return $this->render('inventaire/index_voiture.html.twig', [
            'inventaires' => $inventaireRepository->findVoitures(),
        ]);
    }
    /**
     * @Route("/depot/new", name="inventaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $inventaire = new Inventaire();
        $form = $this->createForm(InventaireType::class, $inventaire);
        $form->handleRequest($request);

        //    dump($dep);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();


            $lignes = $inventaire->getLigneInventaires();
            $dep = $inventaire->getDepot();
            $nomDepot =  $dep->getNomDepot();

            foreach ($lignes as $x) {
                $stock = new Stock();

                $qte = $x->getQteInv();
                $article =  $x->getArticle();
                
                $nomArtcl = $article->getDesignation();
                $stock->setArticle($article);
                $stock->setNomArticle($nomArtcl);
                $stock->setQuantityStock($qte);
                $stock->setDepot($dep);
                $stock->setNomDepot($nomDepot);

                $x->setNomArticle($nomArtcl);
                $x->setNomArticle($nomArtcl);
                $entityManager->persist($stock);
            }
            //persisting whole invent
            $entityManager->persist($inventaire);
            $entityManager->flush();
            return $this->redirectToRoute('inventaire_index');
        }

        return $this->render('inventaire/new.html.twig', [
            'inventaire' => $inventaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/voiture/new", name="inventaire_voiture_new", methods={"GET","POST"})
     */
    public function newV(Request $request): Response
    {
        $inventaire = new Inventaire();
        $form = $this->createForm(InventaireVoitureType::class, $inventaire);
        $form->handleRequest($request);

        //    dump($dep);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();


            $lignes = $inventaire->getLigneInventaires();
            $voiture = $inventaire->getVoiture();

             foreach ($lignes as $x) {
                //  if ($x->getArticle()->getId() === )   

                 $stockVoiture = new StockVoitures();

                 $qte = $x->getQteInv();
                 $article =  $x->getArticle();
                 $nomArtcl = $article->getDesignation();
                 $stockVoiture->setArticle($article);
                 $stockVoiture->setNomArticle($nomArtcl);
                 $stockVoiture->setQuantiteStockVoiture($qte);
                 $stockVoiture->setVoiture($voiture);

                 $x->setNomArticle($nomArtcl);
                 $entityManager->persist($stockVoiture);
             }
            //persisting whole invent
            $entityManager->persist($inventaire);
            $entityManager->flush();
            return $this->redirectToRoute('inventaire_voiture_index');
        }

        return $this->render('inventaire/new_voiture.html.twig', [
            'inventaire' => $inventaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="inventaire_show", methods={"GET"})
     */
    public function show(Inventaire $inventaire): Response
    {
        return $this->render('ligne_inventaire/index.html.twig', [
            'ligne_inventaires' => $inventaire->getLigneInventaires(),
        ]);
    }

    // public function showV(Inventaire $inventaire): Response
    // {
    //     return $this->render('ligne_inventaire/index.html.twig', [
    //         'ligne_inventaires' => $inventaire->getLigneInventaires(),
    //     ]);
    // }

    /**
     * @Route("/depot/{id}/edit", name="inventaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Inventaire $inventaire): Response
    {
        $form = $this->createForm(InventaireType::class, $inventaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('inventaire_index', [
                'id' => $inventaire->getId(),
            ]);
        }

        return $this->render('inventaire/edit.html.twig', [
            'inventaire' => $inventaire,
            'form' => $form->createView(),
        ]);
    }

     /**
     * @Route("/voiture/{id}/edit", name="inventaire_voiture_edit", methods={"GET","POST"})
     */
    public function editV(Request $request, Inventaire $inventaire): Response
    {
        $form = $this->createForm(InventaireVoitureType::class, $inventaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('inventaire_voiture_index', [
                'id' => $inventaire->getId(),
            ]);
        }

        return $this->render('inventaire/edit_voiture.html.twig', [
            'inventaire' => $inventaire,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/depot/{id}", name="inventaire_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Inventaire $inventaire): Response
    {
        $x = $inventaire->getDepot();
        dump($x);

        if ($this->isCsrfTokenValid('delete' . $inventaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($inventaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('inventaire_index');
    }

     /**
     * @Route("/voiture/{id}", name="inventaire_voiture_delete", methods={"DELETE"})
     */
    public function deletev(Request $request, Inventaire $inventaire): Response
    {

        if ($this->isCsrfTokenValid('delete' . $inventaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($inventaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('inventaire_voiture_index');
    }
}
