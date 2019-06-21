<?php

namespace App\Controller;

use App\Entity\Commands;
use App\Form\CommandsType;
use App\Repository\CommandsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/commands")
 */
class CommandsController extends AbstractController
{
    /**
     * @Route("/", name="commands_index", methods={"GET"})
     */
    public function index(CommandsRepository $commandsRepository): Response
    {
        return $this->render('commands/index.html.twig', [
            'commands' => $commandsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="commands_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $command = new Commands();
        $form = $this->createForm(CommandsType::class, $command);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($command);
            $entityManager->flush();

            return $this->redirectToRoute('commands_index');
        }

        return $this->render('commands/new.html.twig', [
            'command' => $command,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commands_show", methods={"GET"})
     */
    public function show(Commands $command): Response
    {
        return $this->render('commands/show.html.twig', [
            'command' => $command,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="commands_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Commands $command): Response
    {
        $form = $this->createForm(CommandsType::class, $command);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commands_index', [
                'id' => $command->getId(),
            ]);
        }

        return $this->render('commands/edit.html.twig', [
            'command' => $command,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commands_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Commands $command): Response
    {
        if ($this->isCsrfTokenValid('delete'.$command->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($command);
            $entityManager->flush();
        }

        return $this->redirectToRoute('commands_index');
    }
}
