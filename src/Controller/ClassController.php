<?php

namespace App\Controller;

use App\Entity\Classement;
use App\Form\ClassementType;
use App\Repository\ClassementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/class")
 */
class ClassController extends AbstractController
{
    /**
     * @Route("/", name="class_index", methods={"GET"})
     */
    public function index(ClassementRepository $classementRepository): Response
    {
        return $this->render('class/index.html.twig', [
            'classements' => $classementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="class_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $classement = new Classement();
        $form = $this->createForm(ClassementType::class, $classement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($classement);
            $entityManager->flush();

            return $this->redirectToRoute('class_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('class/new.html.twig', [
            'classement' => $classement,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="class_show", methods={"GET"})
     */
    public function show(Classement $classement): Response
    {
        return $this->render('class/show.html.twig', [
            'classement' => $classement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="class_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Classement $classement): Response
    {
        $form = $this->createForm(ClassementType::class, $classement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('class_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('class/edit.html.twig', [
            'classement' => $classement,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="class_delete", methods={"POST"})
     */
    public function delete(Request $request, Classement $classement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$classement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($classement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('class_index', [], Response::HTTP_SEE_OTHER);
    }
}
