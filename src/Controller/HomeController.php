<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @return Response
     * @Route ("/", name="index")
     */
    public function index()
    {
        return $this->render('index.html.twig', [
            'pageTitle' => 'Home Portfolio'
        ]);
    }

}
