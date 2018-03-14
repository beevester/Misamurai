<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Form\LoginFormType;
use Symfony\Component\HttpFoundation\Request;


class SecurityController extends Controller
{


  /**
   * @Route("/login", name="login")
   */
  public function admin(Request $request)
  {
              
  }


}
