<?php


namespace App\DataFixtures\Prod;


use App\Entity\Social;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class socialFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $social = new Social();
        $social->setProfil($this->getReference('profil'));
        $social->setName('Facebook');
        $social->setIcon('fab fa-facebook-square');
        $manager->persist($social);

        $social = new Social();
        $social->setProfil($this->getReference('profil'));
        $social->setName('LinkedIn');
        $social->setIcon('fab fa-linkedin');
        $manager->persist($social);

        $social = new Social();
        $social->setProfil($this->getReference('profil'));
        $social->setName('GitHub');
        $social->setIcon('fab fa-github-square');
        $manager->persist($social);

        $social = new Social();
        $social->setProfil($this->getReference('profil'));
        $social->setName('Twitter');
        $social->setIcon('fab fa-twitter-square');
        $manager->persist($social);

        $social = new Social();
        $social->setProfil($this->getReference('profil'));
        $social->setName('Instagram');
        $social->setIcon('fab fa-instagram-square');
        $manager->persist($social);

        $manager->flush();

    }
}
