<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserFixtures : Fixture pour charger un utilisateur par défaut
 *
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture
{
    const PLAIN_PWD = '@MyPaSsWoRd@';

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * UserFixtures constructor.
     *
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('najih.abdou@gmail.com');

        $user->setPassword(
            $this->passwordEncoder->encodePassword($user, self::PLAIN_PWD)
        );

        $manager->persist($user);
        $manager->flush();
    }
}
