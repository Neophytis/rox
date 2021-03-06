<?php

namespace App\Provider;

use App\Entity\Member;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof Member) {
            throw new UnsupportedUserException(
                sprintf(
                    'Instances of "%s" are not supported.',
                    \get_class($user)
                )
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function loadUserByUsername($username)
    {
        try {
            return $this->entityManager->getRepository(Member::class)->loadUserByUsername($username);
        } catch (NonUniqueResultException $e) {
            throw new UsernameNotFoundException(
                sprintf('Username "%s" isn\'t unique.', $username),
                0,
                $e
            );
        } catch (ORMException $e) {
        }
    }

    public function supportsClass($class)
    {
        return Member::class === $class;
    }
}
