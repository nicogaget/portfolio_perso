<?php


namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LanguageFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $language = new Language();
        $language->setName("PHP");
        $language->setIcon("fab fa-php");
        $this->addReference('PHP', $language);
        $manager->persist($language);

        $language = new Language();
        $language->setName("JavaScript");
        $language->setIcon("fab fa-js");
        $this->addReference('JavaScript', $language);
        $manager->persist($language);

        $language = new Language();
        $language->setName("Symfony");
        $language->setIcon("fab fa-symfony");
        $this->addReference('Symfony', $language);
        $manager->persist($language);

        $language = new Language();
        $language->setName("CSS");
        $language->setIcon("fab fa-css3");
        $this->addReference('CSS', $language);
        $manager->persist($language);

        $language = new Language();
        $language->setName("HTML");
        $language->setIcon("fab fa-html5");
        $this->addReference('HTML', $language);
        $manager->persist($language);

        $language = new Language();
        $language->setName("Sass");
        $language->setIcon("fab fa-sass");
        $this->addReference('SASS', $language);
        $manager->persist($language);

        $language = new Language();
        $language->setName("Github");
        $language->setIcon("fab fa-html5");
        $this->addReference('github', $language);
        $manager->persist($language);

        $manager->flush();
    }
}
