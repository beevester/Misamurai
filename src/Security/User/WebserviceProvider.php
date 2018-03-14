<?php

namespace App\Security\User;

use App\Security\User\WebserviceUser;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class WebserviceProvider implements UserProviderInterface
{
  public function loadUserByUsername($username)
  {
      // make a call to your webservice here
      $userData = new WebserviceUser;
      // pretend it returns an array on success, false if there is no user
      dump($userData);die;
      if ($userData) {
          $password = '...';

          // ...

          return new WebserviceUser($username, $password, $salt, $roles);
      }

      throw new UsernameNotFoundException(
          sprintf('Username "%s" does not exist.', $username)
      );
  }

  public function refreshUser(UserInterface $user)
  {
      if (!$user instanceof WebserviceUser) {
          throw new UnsupportedUserException(
              sprintf('Instances of "%s" are not supported.', get_class($user))
          );
      }

      return $this->loadUserByUsername($user->getUsername());
  }

  public function supportsClass($class)
  {
      return WebserviceUser::class === $class;
  }
}
