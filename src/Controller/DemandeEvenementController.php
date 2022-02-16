<?php

namespace App\Controller;

use App\Entity\DemandeEvenement;
use App\Form\DemandeEvenementType;
use App\Repository\DemandeEvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/demande/evenement")
 */
class DemandeEvenementController extends AbstractController
{
    /**
     * @Route("/", name="demande_evenement_index", methods={"GET"})
     */
    public function index(DemandeEvenementRepository $demandeEvenementRepository): Response
    {
        return $this->render('demande_evenement/index.html.twig', [
            'demande_evenements' => $demandeEvenementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="demande_evenement_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $demandeEvenement = new DemandeEvenement();
        $form = $this->createForm(DemandeEvenementType::class, $demandeEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($demandeEvenement);
            $entityManager->flush();

            return $this->redirectToRoute('demande_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('demande_evenement/new.html.twig', [
            'demande_evenement' => $demandeEvenement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="demande_evenement_show", methods={"GET"})
     */
    public function show(DemandeEvenement $demandeEvenement): Response
    {
        return $this->render('demande_evenement/show.html.twig', [
            'demande_evenement' => $demandeEvenement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="demande_evenement_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, DemandeEvenement $demandeEvenement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DemandeEvenementType::class, $demandeEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('demande_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('demande_evenement/edit.html.twig', [
            'demande_evenement' => $demandeEvenement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="demande_evenement_delete", methods={"POST"})
     */
    public function delete(Request $request, DemandeEvenement $demandeEvenement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demandeEvenement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($demandeEvenement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('demande_evenement_index', [], Response::HTTP_SEE_OTHER);
    }
}
