<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Repository\FactureRepository;
use App\Form\FactureType;
use App\Entity\Facture;


/**
 * 
 * @Route("/api/", name="api_")
 */
class FactureRestController extends FOSRestController
{
  /**
   * Lists all Factures.
   * @Rest\Get("factures/{cin}")
   *
   * @return Response
   */
  public function getFactureAction($cin, FactureRepository $factureRepository)
  {
     $arr = array();
    $factures = $factureRepository->findall();
    //  findByExampleField($cin);
    //   findOneBy([
    //     'client.raisonSocial' => $id
    // ]);
    foreach ($factures as $x) {
      if ($x->getCommercial()->getCin() == $cin) {
        array_push($arr, $x);
      }
    }
    
    if (isset($arr))
      return $this->handleView($this->view($arr), Response::HTTP_ACCEPTED);
    else
      return $this->handleView($this->view(['status' => 'pas de factures']), Response::HTTP_ACCEPTED);
  }

  /**
   * @Rest\Get("facture/{id}")
   * @param Facture $facture
   * @return Facture
   */
  public function show(Facture $facture)
  {
    return $facture;
  }


  /**
   * Create Facture.
   * @Rest\Post("facture")
   *
   * @return Response
   */
  public function post(Request $request)
  {
    $facture = new Facture();
    $form = $this->createForm(FactureType::class, $facture);
    $data = json_decode($request->getContent(), true);
    $form->submit($data);
    if ($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($facture);
      $em->flush();
      return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
    }
    return $this->handleView($this->view($form->getErrors()));
  }

  /**
   * @Rest\Put("facture/{id}/edit", name="edit", requirements={"id":"\d+"})
   * @param Request $request
   * @param Facture $facture
   * @return Facture
   */
  public function edit(Request $request, Facture $facture)
  {
    $data = json_decode($request->getContent(), true);
    // dump($data);
    if (empty($data)) {
      return  $this->handleView($this->view(['message' => 'Facture not found'], Response::HTTP_NOT_FOUND));
    }

    $form = $this->createForm(FactureType::class, $facture);
    $form->submit($data);
    $em = $this->getDoctrine()->getManager();
    $em->persist($facture);
    $em->flush();
    return $this->handleView($this->view($data, Response::HTTP_CREATED));
  }


  /**
   * @Rest\Delete("facture/{id}", name="delete", requirements={"id":"\d+"})
   *
   * @param Facture $facture
   * @return array
   */
  public function delete(Request $request, FactureRepository $factureRepository)
  {
    $facture = $factureRepository->find($request->get('id'));
    $em = $this->getDoctrine()->getManager();

    if ($facture) {
      $em->remove($facture);
      $em->flush();
    }
  }
}
