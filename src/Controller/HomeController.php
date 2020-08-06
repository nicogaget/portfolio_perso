<?php


namespace App\Controller;


use App\Repository\ProfilRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param ProfilRepository $profilRepo
     * @return Response
     * @Route ("/", name="index")
     */
    public function index(ProfilRepository $profilRepo)
    {
        $profil = $profilRepo->findOneBy([]);

        return $this->render('index.html.twig', [
            'pageTitle' => 'Home Portfolio',
            'profil' => $profil,
        ]);
    }

}
