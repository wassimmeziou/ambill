<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use App\Repository\CommandsRepository;

/**
 * 
 * @Route("/api/", name="api_")
 */
class CommandsRestController extends FOSRestController
{
  /**
   * Lists all Commands.
   * @Rest\Get("commands/{cin}")
   *
   * @return Response
   */
  public function getCommandAction($cin, CommandsRepository $commandsRepository)
  {
     $arr = array();
    $Commands = $commandsRepository->findall();
    //  findByExampleField($cin);
    //   findOneBy([
    //     'client.raisonSocial' => $id
    // ]);
    foreach ($Commands as $x) {
      if ($x->getCommercial()->getCin() == $cin) {
        array_push($arr, $x);
      }
    }
    
    if (isset($arr))
      return $this->handleView($this->view($arr), Response::HTTP_ACCEPTED);
    else
      return $this->handleView($this->view(['status' => 'pas de commandes']), Response::HTTP_ACCEPTED);
  }
}