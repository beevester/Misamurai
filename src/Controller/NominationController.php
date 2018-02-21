<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Api\UserController;
use App\Entity\User;

class NominationController extends Controller
{
    /**
     * @Route("/nominations", name="nominations")
     */
    public function index()
    {
        
        return $this->render('@Maker/demoPage.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }

    /**
     * @Route("/nominate", name="nominate")
     */
    public function create()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('App\Entity\User')->findAll();

        $userApi = [];

        foreach ($users as $user) {
            $userApi[] = $this->serializeUsersDetails($user);
            }

        return $this->render('main/nominate/create.html.twig',[ 'userApi' => json_encode($userApi) ]);
    }

    public function serializeUsersDetails(User $users)
    {
        return [
            'username' => $users->getUsername(),
            'email' => $users->getEmail(),
            'avatar' => $users->getAvatar()
        ];
    }

    public function store(){
        
    }
}
