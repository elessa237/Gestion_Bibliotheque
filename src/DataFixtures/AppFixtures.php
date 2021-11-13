<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @author Maxime Elessa <elessamaxime@icloud.com>
 * @package App\DataFixtures
 */
class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {

        foreach ($this->getUserData() as  [$name, $email, $number, $sex, $location, $password, $role]) {
            
            $user = new User();

            $user->setUsername($name)
                ->setEmail($email)
                ->setNumber($number)
                ->setSex($sex)
                ->setLocation($location)
                ->setPassword($this->passwordHasher->hashPassword($user, $password))
                ->setRoles($role);

            $manager->persist($user);
        }


        $manager->flush();
    }

    private function getUserData(): array
    {
        return [
            ['Maxime_admin', 'maxime@admin.com', '659019493', 'M', 'Abang', '1234', ['ROLE_ADMIN']],
            ['Maxime_user', 'maxime@user.com', '659019493', 'M', 'Awae', '1234', ['ROLE_USER']]
        ];
    }
}
