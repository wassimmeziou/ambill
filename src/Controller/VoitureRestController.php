<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\Voiture;
use App\Repository\VoitureRepository;

/**
 * 
 * @Route("/api/", name="api_")
 */
class VoitureRestController extends FOSRestController
{
  /**
   * Lists all Voiture.
   * @Rest\Get("voitures")
   *
   * @return Response
   */
  public function getArticleAction(VoitureRepository $voitureRepository)
  {
    $voitures = $voitureRepository->findall();
    return $this->handleView($this->view($voitures));
  }


  /**
	 * @Rest\Get("voiture/{id}")
	 * @param Voiture $voiture
	 * @return Voiture
	 */
	public function show(Voiture $voiture)
	{
		return $voiture;
  }
  

}