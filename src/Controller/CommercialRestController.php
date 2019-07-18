<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Repository\CommercialRepository;

/**
 * 
 * @Route("/api/", name="api_")
 */
class CommercialRestController extends FOSRestController
{



    /**
     * @Rest\Get("commercial/{cin}/{nom}")

     * @return Commercial
     */
    public function show($cin, $nom, CommercialRepository $commercialRepository)
    {
        $found = $commercialRepository->findOneBy(array('cin' => $cin, 'nom' => $nom));

        return $this->handleView($this->view($found));
    }
}
