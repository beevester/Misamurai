<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class NominationController extends Controller
{
    /**
     * @Route("/nomination", name="nomination")
     */
    public function index()
    {

        return $this->render('main/nominate/index.html.twig');
    }
}
