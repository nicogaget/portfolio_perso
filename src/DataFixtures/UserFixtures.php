<?php


namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setLastName('GAGET');
        $user->setFirstName('Nicolas');
        $user->setAdress('Chemin de Lafarge 69550 AMPLEPUIS');
        $user->setEmail('n.gaget69@gmail.com');
        $user->setFacebook('https://www.facebook.com/nico.gaget');
        $user->setLinkedin('www.linkedin.com/in/nicolas-gaget');
//        $user->setPhone('06 13 99 34 56');
        $user->setGithub('https://github.com/nicogaget');
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user, 'adminpass'
        ));

        $manager->persist($user);
        $manager->flush();
    }

}
