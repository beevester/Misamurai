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
  public function admin(Request $request, AuthenticationUtils $authenticationUtils)
  {
     // get the login error if there is one
     $error = $authenticationUtils->getLastAuthenticationError();

     // last username entered by the user
     $lastUsername = $authenticationUtils->getLastUsername();
 
     return $this->render('manage/security/login.html.twig', array(
         'last_username' => $lastUsername,
         'error'         => $error,
     ));
    
  }


}
