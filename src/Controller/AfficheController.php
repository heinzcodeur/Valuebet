<?php

namespace App\Controller;

use App\Entity\Affiche;
use App\Form\AfficheType;
use App\Repository\AfficheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/affiche")
 */
class AfficheController extends AbstractController
{
    /**
     * @Route("/", name="affiche_index", methods={"GET"})
     */
    public function index(AfficheRepository $afficheRepository): Response
    {
        return $this->render('affiche/index.html.twig', [
            'affiches' => $afficheRepository->findAll(),

        ]);
    }

    /**
     * @Route("/new", name="affiche_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $affiche = new Affiche();
        $form = $this->createForm(AfficheType::class, $affiche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($affiche);
            $entityManager->flush();

            return $this->redirectToRoute('affiche_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('affiche/new.html.twig', [
            'affiche' => $affiche,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="affiche_show", methods={"GET"})
     */
    public function show(Affiche $affiche): Response
    {
        return $this->render('affiche/show.html.twig', [
            'affiche' => $affiche,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="affiche_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Affiche $affiche): Response
    {
        $form = $this->createForm(AfficheType::class, $affiche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('affiche_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('affiche/edit.html.twig', [
            'affiche' => $affiche,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="affiche_delete", methods={"POST"})
     */
    public function delete(Request $request, Affiche $affiche): Response
    {
        if ($this->isCsrfTokenValid('delete'.$affiche->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($affiche);
            $entityManager->flush();
        }

        return $this->redirectToRoute('affiche_index', [], Response::HTTP_SEE_OTHER);
    }
}
