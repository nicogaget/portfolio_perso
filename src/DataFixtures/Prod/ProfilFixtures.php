<?php


namespace App\DataFixtures\Prod;


use App\Entity\Profil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfilFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $profil = new Profil();

        $profil->setFirstName('Nicolas');
        $profil->setLastName('GAGET');
        $profil->setAdress('Chemin de Lafarge 69550 AMPLEPUIS');
        $profil->setEmail('n.gaget69@gmail.com');
        $profil->setDescription1('Développeur web');
        $profil->setDescription2('WILD CODE SCHOOL 2020');
        $profil->setFacebook('facebook.com/nico.gaget');
        $profil->setLinkedin('www.linkedin.com/in/nicolas-gaget');
        $profil->setGithub('https://github.com/nicogaget');
        $profil->setPhone('06-34-54-19-73');
        $profil->setUpdatedAt( new \DateTime('now'));
        $this->addReference('profil', $profil);

        $manager->persist($profil);

        $manager->flush();
    }
}
