<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;

class MainController extends Controller
{
    /**
     * @Route("/", name="main.homepage")
     */
    public function index()
    {
        // This is to randomise the feed API for the homepage
        $em = $this->getDoctrine()->getManager();
        $nominationsApi = $em->getRepository('App\Entity\User')->findAll();

        
        
        
        // Homepage index rendering
        return $this->render('main/index.html.twig', [ 'apiCall' => $api, 'user' => $nominationsApi]);
    }

    /**
     * @Route("/base")
     */
    public function test()
    {
        return $this->render('base.html.twig');
    }
}
