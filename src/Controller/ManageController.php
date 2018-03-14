<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use App\Controller\Api\UserController;
use App\Entity\Permission;
use App\Form\PermissionsType;

class ManageController extends Controller
{
    /**
     * @Route("/manage", name="manage.dashboard")
     */
    public function index()
    {
      if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER')) {

          return $this->render('main/homepage.html.twig');

        }
        return $this->render('manage/dashboard.html.twig');
    }

    /**
     * @Route("/manage/users", name="manage.users")
     */
    public function showUser()
    {

        return $this->render('manage/user/index.html.twig');

    }

      /**
     * @Route("/manage/users/{name}", name="userdetails")
     */
    public function show($name)
    {

      $em = $this->getDoctrine()
                   ->getManager();
      $user = $em->getRepository(User::class)
                   ->findByUsername($name);


  return $this->render('manage/user/show.html.twig');
    }

    /**
     * @Route("/manage/permission/create", name="create.permission")
     */
    public function createPermission(){

      return $this->render('manage/permission/create.html.twig');
    }

}
