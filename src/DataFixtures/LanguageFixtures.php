<?php


namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Service\Slugify;

class LanguageFixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {
        $slug = new Slugify();

        $language = new Language();
        $language->setName("Linux");
        $language->setIcon("fab fa-linux");
        $language->setSlug($slug->generate($language->getName()));
        $this->addReference('linux', $language);
        $manager->persist($language);

        $language = new Language();
        $language->setName("Ubuntu");
        $language->setIcon("fab fa-ubuntu");
        $language->setSlug($slug->generate($language->getName()));
        $this->addReference('ubuntu', $language);
        $manager->persist($language);

        $language = new Language();
        $language->setName("PHP");
        $language->setIcon("fab fa-php");
        $language->setSlug($slug->generate($language->getName()));
        $this->addReference('PHP', $language);
        $manager->persist($language);

        $language = new Language();
        $language->setName("JavaScript");
        $language->setIcon("fab fa-js");
        $language->setSlug($slug->generate($language->getName()));
        $this->addReference('JavaScript', $language);
        $manager->persist($language);

        $language = new Language();
        $language->setName("Symfony");
        $language->setIcon("fab fa-symfony");
        $language->setSlug($slug->generate($language->getName()));
        $this->addReference('Symfony', $language);
        $manager->persist($language);

        $language = new Language();
        $language->setName("CSS");
        $language->setIcon("fab fa-css3");
        $language->setSlug($slug->generate($language->getName()));
        $this->addReference('CSS', $language);
        $manager->persist($language);

        $language = new Language();
        $language->setName("HTML");
        $language->setIcon("fab fa-html5");
        $language->setSlug($slug->generate($language->getName()));
        $this->addReference('HTML', $language);
        $manager->persist($language);

        $language = new Language();
        $language->setName("Sass");
        $language->setIcon("fab fa-sass");
        $language->setSlug($slug->generate($language->getName()));
        $this->addReference('SASS', $language);
        $manager->persist($language);

        $language = new Language();
        $language->setName("Github");
        $language->setIcon("fab fa-github");
        $language->setSlug($slug->generate($language->getName()));
        $this->addReference('github', $language);
        $manager->persist($language);


        $manager->flush();
    }
}
