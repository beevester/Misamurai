<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\{Roles, Permission};

class RolesController extends Controller
{
    /**
     * @Route("/manage/roles", name="manage.role")
     */
    public function index()
    {
        // replace this line with your own code!
        return $this->render('@Maker/demoPage.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }

    /**
     * @Route("/manage/roles/create", name="roles.create")
     */
    public function create()
    {
      $permissions = $this->getDoctrine()
                 ->getManager()
                 ->getRepository(Permission::class)
                 ->findAll();
        return $this->render('manage/roles/create.html.twig', ['permissions' => $permissions]);
    }
}
