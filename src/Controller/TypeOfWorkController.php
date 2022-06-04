<?php

namespace App\Controller;

use App\Entity\TypeOfWork;
use App\Form\TypeOfWorkType;
use App\Repository\TypeOfWorkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/of/work")
 */
class TypeOfWorkController extends AbstractController
{
    /**
     * @Route("/", name="app_type_of_work_index", methods={"GET"})
     */
    public function index(TypeOfWorkRepository $typeOfWorkRepository): Response
    {
        return $this->render('type_of_work/index.html.twig', [
            'type_of_works' => $typeOfWorkRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_type_of_work_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TypeOfWorkRepository $typeOfWorkRepository): Response
    {
        $typeOfWork = new TypeOfWork();
        $form = $this->createForm(TypeOfWorkType::class, $typeOfWork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeOfWorkRepository->add($typeOfWork, true);

            return $this->redirectToRoute('app_type_of_work_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_of_work/new.html.twig', [
            'type_of_work' => $typeOfWork,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_type_of_work_show", methods={"GET"})
     */
    public function show(TypeOfWork $typeOfWork): Response
    {
        return $this->render('type_of_work/show.html.twig', [
            'type_of_work' => $typeOfWork,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_type_of_work_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, TypeOfWork $typeOfWork, TypeOfWorkRepository $typeOfWorkRepository): Response
    {
        $form = $this->createForm(TypeOfWorkType::class, $typeOfWork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeOfWorkRepository->add($typeOfWork, true);

            return $this->redirectToRoute('app_type_of_work_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_of_work/edit.html.twig', [
            'type_of_work' => $typeOfWork,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_type_of_work_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeOfWork $typeOfWork, TypeOfWorkRepository $typeOfWorkRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeOfWork->getId(), $request->request->get('_token'))) {
            $typeOfWorkRepository->remove($typeOfWork, true);
        }

        return $this->redirectToRoute('app_type_of_work_index', [], Response::HTTP_SEE_OTHER);
    }
}
