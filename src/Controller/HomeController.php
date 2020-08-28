<?php


namespace App\Controller;


use App\Entity\Contact;
use App\Entity\Projet;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use App\Repository\ProfilRepository;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param ProfilRepository $profilRepo
     * @param Request $request
     * @param ContactNotification $notification
     * @param Projet $projet
     * @return Response
     * @Route ("/", name="index")
     */
    public function index(ProfilRepository $profilRepo, Request $request, ContactNotification $notification, ProjetRepository $projetRepo)
    {
        $profil = $profilRepo->findOneBy([]);
        $projets = $projetRepo->findAll();
        $contact = new Contact();
        $form = $this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notify($contact);
            $this->addFlash('success', "Votre message a bien été envoyé");

            return $this->redirectToRoute('index');

        }


        return $this->render('index.html.twig', [
            'pageTitle' =>  'Home Portfolio',
            'profil'    =>  $profil,
            'form'      =>  $form->createView(),
            'projets'   => $projets
        ]);
    }

}
