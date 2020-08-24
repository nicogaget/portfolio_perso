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
        $projet->addLanguage($this->getReference("PHP"));
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
