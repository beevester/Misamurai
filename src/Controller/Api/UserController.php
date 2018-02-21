<?php

namespace App\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;


class UserController extends Controller
{
    /**
     * @Route("/users_details", name="usersDetails")
     */
    public function usersDatails()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('App\Entity\User')->findAll();

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

}
