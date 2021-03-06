<?php

namespace App\Controller;

use App\Entity\Language;
use App\Form\LanguageType;
use App\Repository\LanguageRepository;
use App\Service\Slugify;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_ADMIN")
 * @Route("/language")
 */
class LanguageController extends AbstractController
{
    /**
     * @Route("/", name="language_index", methods={"GET"})
     * @param LanguageRepository $languageRepository
     * @return Response
     */
    public function index(LanguageRepository $languageRepository): Response
    {
        return $this->render('language/index.html.twig', [
            'languages' => $languageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="language_new", methods={"GET","POST"})
     * @param Request $request
     * @param Slugify $slug
     * @return Response
     */
    public function new(Request $request, Slugify $slug): Response
    {
        $language = new Language();
        $form = $this->createForm(LanguageType::class, $language);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $language->setSlug($slug->generate($language->getName()));
            $entityManager->persist($language);
            $entityManager->flush();

            return $this->redirectToRoute('language_index');
        }

        return $this->render('language/new.html.twig', [
            'language' => $language,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="language_show", methods={"GET"})
     * @param Language $language
     * @param Slugify $slug
     * @return Response
     */
    public function show(Language $language, Slugify $slug): Response
    {
        return $this->render('language/show.html.twig', [
            'language' => $language,
            'sulgify' => $slug
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="language_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Language $language
     * @return Response
     */
    public function edit(Request $request, Language $language): Response
    {
        $form = $this->createForm(LanguageType::class, $language);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('language_index');
        }

        return $this->render('language/edit.html.twig', [
            'language' => $language,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="language_delete", methods={"DELETE"})
     * @param Request $request
     * @param Language $language
     * @return Response
     */
    public function delete(Request $request, Language $language): Response
    {
        if ($this->isCsrfTokenValid('delete'.$language->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($language);
            $entityManager->flush();
        }

        return $this->redirectToRoute('language_index');
    }
}
