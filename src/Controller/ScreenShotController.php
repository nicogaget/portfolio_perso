<?php

namespace App\Controller;

use App\Entity\ScreenShot;
use App\Form\ScreenShotType;
use App\Repository\ScreenShotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/screen/shot")
 */
class ScreenShotController extends AbstractController
{
    /**
     * @Route("/", name="screen_shot_index", methods={"GET"})
     */
    public function index(ScreenShotRepository $screenShotRepository): Response
    {
        return $this->render('screen_shot/index.html.twig', [
            'screen_shots' => $screenShotRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="screen_shot_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $screenShot = new ScreenShot();
        $form = $this->createForm(ScreenShotType::class, $screenShot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($screenShot);
            $entityManager->flush();

            return $this->redirectToRoute('screen_shot_index');
        }

        return $this->render('screen_shot/new.html.twig', [
            'screen_shot' => $screenShot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="screen_shot_show", methods={"GET"})
     */
    public function show(ScreenShot $screenShot): Response
    {
        return $this->render('screen_shot/show.html.twig', [
            'screen_shot' => $screenShot,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="screen_shot_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ScreenShot $screenShot): Response
    {
        $form = $this->createForm(ScreenShotType::class, $screenShot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('screen_shot_index');
        }

        return $this->render('screen_shot/edit.html.twig', [
            'screen_shot' => $screenShot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="screen_shot_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ScreenShot $screenShot): Response
    {
        if ($this->isCsrfTokenValid('delete'.$screenShot->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($screenShot);
            $entityManager->flush();
        }

        return $this->redirectToRoute('screen_shot_index');
    }
}
