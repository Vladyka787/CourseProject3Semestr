<?php

namespace App\Controller;

use App\Entity\Custom;
use App\Form\CustomType;
use App\Repository\ClientRepository;
use App\Repository\CustomRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/custom")
 */
class CustomController extends AbstractController
{
    /**
     * @Route("/", name="app_custom_index", methods={"GET"})
     */
    public function index(CustomRepository $customRepository): Response
    {
        return $this->render('custom/index.html.twig', [
            'customs' => $customRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_custom_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CustomRepository $customRepository, ClientRepository $clientRepository): Response
    {
        $custom = new Custom();
        $client_id=$request->query->get('client_id');
        $client = $clientRepository->findBy(['id' => $client_id]);
        $client=$client[0];
        $custom->setClient($client);
        $form = $this->createForm(CustomType::class, $custom, ['client_id' => $client_id]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $customRepository->add($custom, true);
            return $this->redirectToRoute('app_custom_show', ['id' => $custom->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('custom/new.html.twig', [
            'custom' => $custom,
            'form' => $form,
            'client' =>$client,
        ]);
    }

    /**
     * @Route("/{id}", name="app_custom_show", methods={"GET"})
     */
    public function show(Custom $custom): Response
    {
        $client=$custom->getClient();
        $services= $custom->getService()->getValues();
        return $this->render('custom/show.html.twig', [
            'custom' => $custom,
            'client' => $client,
            'services' => $services,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_custom_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Custom $custom, CustomRepository $customRepository): Response
    {
        $form = $this->createForm(CustomType::class, $custom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $customRepository->add($custom, true);

            return $this->redirectToRoute('app_custom_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('custom/edit.html.twig', [
            'custom' => $custom,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_custom_delete", methods={"POST"})
     */
    public function delete(Request $request, Custom $custom, CustomRepository $customRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$custom->getId(), $request->request->get('_token'))) {
            $customRepository->remove($custom, true);
        }

        return $this->redirectToRoute('app_custom_index', [], Response::HTTP_SEE_OTHER);
    }
}
