<?php

namespace App\Controller;

use App\Entity\LigneCommand;
use App\Form\LigneCommandType;
use App\Repository\LigneCommandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ligne/command")
 */
class LigneCommandController extends AbstractController
{
    /**
     * @Route("/", name="ligne_command_index", methods={"GET"})
     */
    public function index(LigneCommandRepository $ligneCommandRepository): Response
    {
        return $this->render('ligne_command/index.html.twig', [
            'ligne_commands' => $ligneCommandRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ligne_command_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ligneCommand = new LigneCommand();
        $form = $this->createForm(LigneCommandType::class, $ligneCommand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ligneCommand);
            $entityManager->flush();

            return $this->redirectToRoute('ligne_command_index');
        }

        return $this->render('ligne_command/new.html.twig', [
            'ligne_command' => $ligneCommand,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_command_show", methods={"GET"})
     */
    public function show(LigneCommand $ligneCommand): Response
    {
        return $this->render('ligne_command/show.html.twig', [
            'ligne_command' => $ligneCommand,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ligne_command_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LigneCommand $ligneCommand): Response
    {
        $form = $this->createForm(LigneCommandType::class, $ligneCommand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ligne_command_index', [
                'id' => $ligneCommand->getId(),
            ]);
        }

        return $this->render('ligne_command/edit.html.twig', [
            'ligne_command' => $ligneCommand,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ligne_command_delete", methods={"DELETE"})
     */
    public function delete(Request $request, LigneCommand $ligneCommand): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ligneCommand->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ligneCommand);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ligne_command_index');
    }
}
