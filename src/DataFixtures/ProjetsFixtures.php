<?php


namespace App\DataFixtures;


use App\Entity\Projet;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjetsFixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {
        $slug = new Slugify();
        $projet = new Projet();

        $projet->setName("T'N'T Troc and Troc");
        $projet->setPitch("“Des échanges sans argent pour des liens plus humains”");
        $projet->setDescription1("Offrir une plateforme de troc entre particuliers, sans enjeu monétaire, dans un esprit de bienveillance.");
        $projet->setDescription2("Site fictif développer dans le cadre de la formation Wild Code School en équipe de 4 personnes sur 4 semaines. Utilisation des méthodes Agiles et SCRUM");
        $projet->
        $projet->addLanguage($this->getReference("PHP"));
        $projet->addLanguage($this->getReference("JavaScript"));
        $projet->addLanguage($this->getReference("CSS"));
        $projet->addLanguage($this->getReference("HTML"));
        $projet->addLanguage($this->getReference("github"));
        $projet->setUpdatedAt(new \DateTime('now'));
        $projet->setSlug($slug->generate($projet->getName()));
        $manager->persist($projet);


        $projet = new Projet();

        $projet->setName("Rocket School");
        $projet->setPitch("Outil destiné aux candidats de l'école Rocket School qui propose desformations en Business Development et Webmarketing. Cet outil leut permet de s'informer sur les différents métiers accessibles après une formation.");
        $projet->setDescription1("MOOC avec une vidéo d'information sur les formations proposées par la Rocker School ainsi qu'un quizz en lien avec la vidéo.");
        $projet->setDescription2("Développement d'une interface 'candidat' pour un acces simple à la vidéo, au quizz, à une FAQ, à son profil candidat ainsi qu'a un guide destiné à la suite de son parcours candidat.
Développement également de l'interface 'admin', avec un CRUD complet pour modifier et mettre à jour la totalité du contenu proposé.");
        $projet->addLanguage($this->getReference("linux"));
        $projet->addLanguage($this->getReference("PHP"));
        $projet->addLanguage($this->getReference("Symfony"));
        $projet->addLanguage($this->getReference("JavaScript"));
        $projet->addLanguage($this->getReference("CSS"));
        $projet->addLanguage($this->getReference("HTML"));
        $projet->addLanguage($this->getReference("github"));
        $projet->setUpdatedAt(new \DateTime('now'));
        $projet->setSlug($slug->generate($projet->getName()));

        $manager->persist($projet);
        $manager->flush();
    }
}
