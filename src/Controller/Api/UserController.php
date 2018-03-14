<?php

namespace App\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use Doctrine\ORM\Query;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class UserController extends Controller
{
    /**
     * @Route("/api/users")
     * @Method("GET")
     */
    public function getUsersdetails()
    {
      $users = $this->getDoctrine()
                    ->getRepository('App\Entity\User')
                    ->findAll();

      $userApi = [];

      foreach ($users as $user) {
          $userApi[] = $this->serializeUsersDetails($user);
          }

        $response = new Response(json_encode($userApi), 200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }

    public function serializeUsersDetails(User $users)
    {
        return [
            'username' => $users->getUsername(),
            'email' => $users->getEmail(),
            'avatar' => $users->getAvatar()
        ];
    }

    /**
     * @Route("/api/userObject/{user}")
     * @Method("GET")
     */
    public function userObject($user)
    {
      $users = $this->getDoctrine()
                    ->getRepository('App\Entity\User')
                    ->findByUsername($user);

      return new Response($users);
    }

}
