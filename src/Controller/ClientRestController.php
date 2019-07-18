<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Repository\ClientRepository;
use App\Form\ClientType;
use App\Entity\Client;

/**
 * 
 * @Route("/api/", name="api_")
 */
class ClientRestController extends FOSRestController
{
    /**
   * Lists all clients.
   * @Rest\Get("clients")
   *
   * @return Response
   */
  public function getClientAction(ClientRepository $clientRepository)
  {
    $clients = $clientRepository->findall();
    return $this->handleView($this->view($clients));
  }

  /**
	 * @Rest\Get("client/{id}")
	 * @param Client $client
	 * @return Client
	 */
	public function show(Client $client)
	{
		return $client;
  }
  

  /**
   * Create Client.
   * @Rest\Post("client")
   *
   * @return Response
   */
  public function post(Request $request)
  {
    $client = new Client();
    $form = $this->createForm(ClientType::class, $client);
    $data = json_decode($request->getContent(), true);
    $form->submit($data);
    if ($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($client);
      $em->flush();
      return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
    }
    return $this->handleView($this->view($form->getErrors()));
  }

  /**
	 * @Rest\Put("client/{id}/edit", name="edit", requirements={"id":"\d+"})
	 * @param Request $request
	 * @param Client $client
	 * @return Client
	 */
	public function edit(Request $request, Client $client)
	{
    $data = json_decode($request->getContent(), true);
   // dump($data);
    if (empty($data)) {
      return  $this->handleView($this->view(['message' => 'Client not found'], Response::HTTP_NOT_FOUND));
  }

    $form = $this->createForm(ClientType::class, $client);
    $form->submit($data);
    $em = $this->getDoctrine()->getManager();
    $em->persist($client);
    $em->flush();
   return $this->handleView($this->view($data, Response::HTTP_CREATED));
  }
  

	/**
	 * @Rest\Delete("client/{id}", name="delete", requirements={"id":"\d+"})
	 *
	 * @param Client $client
	 * @return array
	 */
	public function delete(Request $request,ClientRepository $clientRepository)
	{
    $client = $clientRepository->find($request->get('id'));
    $em = $this->getDoctrine()->getManager();

    if ($client) {
        $em->remove($client);
        $em->flush();
    }
	}

}