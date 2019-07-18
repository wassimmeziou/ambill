<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;use FOS\RestBundle\Controller\Annotations\QueryParam;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use App\Entity\Compteur;
use App\Repository\CompteurRepository;
use App\Form\CompteurType;

/**
 * 
 * @Route("/api/", name="api_")
 */
class CompteurRestController extends FOSRestController
{


    /**
     * @Rest\Get("compteur/{nomPiece}")
     * @return Compteur
     */
    public function show(string $nomPiece, CompteurRepository $compteurRepository)
    {
      //  $co =  $compteurRepository->find($request->get('prefix'));
        $found = $compteurRepository->findByNomPiece($nomPiece);
       // $compteur = $compteurRepository->findBy(array('prefix' => $co), array('prefix' => 'ASC'), 1, 0)[0];
        if ($found) {
            return $found[0];
        }
        return  $this->handleView($this->view(['message' => 'Compteur not found'], Response::HTTP_NOT_FOUND));
    }

    
    /**
     * @Rest\Put("compteur/{nomPiece}/edit")
     * @param Request $request
     * @return Compteur
     */
    public function edit(Request $request,CompteurRepository $compteurRepository,$nomPiece)
    {
        $found = $compteurRepository
        ->findOneByNomPiece($nomPiece);
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(CompteurType::class, $found);
        $form->submit($data);
        $em = $this->getDoctrine()->getManager();
        $em->persist($found);
        $em->flush();
  
        // dump($data);
        if (empty($found)) {
            return  $this->handleView($this->view(['message' => 'Compteur not found'], Response::HTTP_NOT_FOUND));
        }
        return $this->handleView($this->view($data, Response::HTTP_CREATED));
    }


    //   /**
    //    * Create compteur.
    //    * @Rest\Post("compteur")
    //    *
    //    * @return Response
    //    */
    //   public function post(Request $request)
    //   {
    //     $compteur = new Compteur();
    //     $form = $this->createForm(CompteurType::class, $compteur);
    //     $data = json_decode($request->getContent(), true);
    //     $form->submit($data);
    //     if ($form->isSubmitted() && $form->isValid()) {
    //       $em = $this->getDoctrine()->getManager();
    //       $em->persist($compteur);
    //       $em->flush();
    //       return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
    //     }
    //     return $this->handleView($this->view($form->getErrors()));
    //   }




    // /**
    //  * @Rest\Delete("facture/{id}", name="delete", requirements={"id":"\d+"})
    //  *
    //  * @param Facture $facture
    //  * @return array
    //  */
    // public function delete(Request $request,FactureRepository $factureRepository)
    // {
    // $facture = $factureRepository->find($request->get('id'));
    // $em = $this->getDoctrine()->getManager();

    // if ($facture) {
    //     $em->remove($facture);
    //     $em->flush();
    // }
    // }

}
