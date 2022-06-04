<?php

namespace App\Controller;

use App\Entity\Bay;
use App\Form\BayType;
use App\Repository\BayRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bay")
 */
class BayController extends AbstractController
{
    /**
     * @Route("/", name="app_bay_index", methods={"GET"})
     */
    public function index(BayRepository $bayRepository): Response
    {
        return $this->render('bay/index.html.twig', [
            'bays' => $bayRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_bay_new", methods={"GET", "POST"})
     */
    public function new(Request $request, BayRepository $bayRepository): Response
    {
        $bay = new Bay();
        $form = $this->createForm(BayType::class, $bay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bayRepository->add($bay, true);

            return $this->redirectToRoute('app_bay_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bay/new.html.twig', [
            'bay' => $bay,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_bay_show", methods={"GET"})
     */
    public function show(Bay $bay): Response
    {
        return $this->render('bay/show.html.twig', [
            'bay' => $bay,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_bay_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Bay $bay, BayRepository $bayRepository): Response
    {
        $form = $this->createForm(BayType::class, $bay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bayRepository->add($bay, true);

            return $this->redirectToRoute('app_bay_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bay/edit.html.twig', [
            'bay' => $bay,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_bay_delete", methods={"POST"})
     */
    public function delete(Request $request, Bay $bay, BayRepository $bayRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bay->getId(), $request->request->get('_token'))) {
            $bayRepository->remove($bay, true);
        }

        return $this->redirectToRoute('app_bay_index', [], Response::HTTP_SEE_OTHER);
    }
}
