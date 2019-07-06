<?php

namespace App\Controller;

use App\Entity\Commercial;
use App\Form\CommercialType;
use App\Repository\CommercialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Debug\Debug;


/**
 * @Route("/commercial")
 */
class CommercialController extends AbstractController
{
    /**
     * @Route("/", name="commercial_index", methods={"GET"})
     */
    public function index(CommercialRepository $commercialRepository): Response
    {
        dump($commercialRepository);

        return $this->render('commercial/index.html.twig', [
            'commercials' => $commercialRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="commercial_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $commercial = new Commercial();
        $form = $this->createForm(CommercialType::class, $commercial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($commercial);
            $entityManager->flush();

            return $this->redirectToRoute('commercial_index');
        }

        return $this->render('commercial/new.html.twig', [
            'commercial' => $commercial,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commercial_show", methods={"GET"})
     */
    public function show(Commercial $commercial): Response
    {
        return $this->render('commercial/show.html.twig', [
            'commercial' => $commercial,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="commercial_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Commercial $commercial): Response
    {
        $form = $this->createForm(CommercialType::class, $commercial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commercial_index', [
                'id' => $commercial->getId(),
            ]);
        }

        return $this->render('commercial/edit.html.twig', [
            'commercial' => $commercial,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commercial_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Commercial $commercial): Response
    {
        Debug::enable();

        dump($commercial);
        if ($this->isCsrfTokenValid('delete'.$commercial->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commercial);
            $entityManager->flush();
        }

        return $this->redirectToRoute('commercial_index');
    }
}
