<?php

namespace App\Controller;

use App\Entity\BonSortie;
use App\Form\BonSortieType;
use App\Repository\BonSortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bon/sortie")
 */
class BonSortieController extends AbstractController
{
    /**
     * @Route("/", name="bon_sortie_index", methods={"GET"})
     */
    public function index(BonSortieRepository $bonSortieRepository): Response
    {
        return $this->render('bon_sortie/index.html.twig', [
            'bon_sorties' => $bonSortieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bon_sortie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bonSortie = new BonSortie();
        $form = $this->createForm(BonSortieType::class, $bonSortie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bonSortie);
            $entityManager->flush();

            return $this->redirectToRoute('bon_sortie_index');
        }

        return $this->render('bon_sortie/new.html.twig', [
            'bon_sortie' => $bonSortie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bon_sortie_show", methods={"GET"})
     */
    public function show(BonSortie $bonSortie): Response
    {
        return $this->render('bon_sortie/show.html.twig', [
            'bon_sortie' => $bonSortie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bon_sortie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BonSortie $bonSortie): Response
    {
        $form = $this->createForm(BonSortieType::class, $bonSortie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bon_sortie_index', [
                'id' => $bonSortie->getId(),
            ]);
        }

        return $this->render('bon_sortie/edit.html.twig', [
            'bon_sortie' => $bonSortie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bon_sortie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BonSortie $bonSortie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bonSortie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bonSortie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bon_sortie_index');
    }
}
