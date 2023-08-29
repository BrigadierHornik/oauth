<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Form\RegisterClientType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientsController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }
    #[Route('/clients', name: 'app_clients')]
    public function index(): Response
    {
        return $this->render('clients/index.html.twig', [
            'controller_name' => 'ClientsController',
        ]);
    }

    #[Route('/clients/register')]
    public function registerClient(Request $request): Response
    {

        $randomBytes = random_bytes(16); // Generate 16 cryptographically secure random bytes
        $randomHex = bin2hex($randomBytes); // Convert the bytes to a hexadecimal string

        $secretBytes = random_bytes(32); // Generate 16 cryptographically secure random bytes
        $secret = bin2hex($secretBytes); // Convert the bytes to a hexadecimal string

        $client = new Clients();
        $client->setCreateDate(new DateTime());
        $client->setClientId($randomHex);
        $client->setClientSecret($secret);

        $form = $this->createForm(RegisterClientType::class, $client);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();
            $this->entityManager->persist($client);
            $this->entityManager->flush();
            
        }



        return $this->render('clients/register.html.twig', [
            'form' => $form
        ]);
    }
}
