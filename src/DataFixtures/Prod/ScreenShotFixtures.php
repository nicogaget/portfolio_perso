<?php


namespace App\DataFixtures\Prod;


use App\Entity\ScreenShot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ScreenShotFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $ss = new ScreenShot();
        $ss->setName('rs_logo.png');
        $ss->setComment('Logo fournit dans les wirframe par le client.');
        $ss->setProjet($this->getReference('rs'));
        $manager->persist($ss);

        $ss = new ScreenShot();
        $ss->setName('rs_backlog.png');
        $ss->setComment('Backlog fournit par le client en début de projet');
        $ss->setProjet($this->getReference('rs'));
        $manager->persist($ss);

        $ss = new ScreenShot();
        $ss->setName('rs_bdd.png');
        $ss->setComment('Schema de la base de données créée.');
        $ss->setProjet($this->getReference('rs'));
        $manager->persist($ss);

        $ss = new ScreenShot();
        $ss->setName('rs_page_login.png');
        $ss->setComment("Page d'accueil candidat avec utilisation des API facebook, google et linkedIn pour faciliter la connexion");
        $ss->setProjet($this->getReference('rs'));
        $manager->persist($ss);

        $ss = new ScreenShot();
        $ss->setName('rs_accueil_candidat.png');
        $ss->setComment("Page d'accueil candidat après connexion");
        $ss->setProjet($this->getReference('rs'));
        $manager->persist($ss);

        $ss = new ScreenShot();
        $ss->setName('rs_edition_quizz.png');
        $ss->setComment("Page d'édition d'une question du quizz" );
        $ss->setProjet($this->getReference('rs'));
        $manager->persist($ss);

        $ss = new ScreenShot();
        $ss->setName('rs_quizz.png');
        $ss->setComment("Page du quizz candidat");
        $ss->setProjet($this->getReference('rs'));
        $manager->persist($ss);

        $ss = new ScreenShot();
        $ss->setName('rs_page_candidat.png');
        $ss->setComment('Page candidat donnant les informations de suivi du processus de candidature');
        $ss->setProjet($this->getReference('rs'));
        $manager->persist($ss);

        $manager->flush();
    }
}
