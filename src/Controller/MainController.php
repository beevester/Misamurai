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
        return $this->render('main/homepage.html.twig');
    }

    /**
     * @Route("/test")
     */
    public function test()
    {
        return $this->render('base.html.twig');
    }


}
