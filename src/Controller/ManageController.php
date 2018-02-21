<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ManageController extends Controller
{
    /**
     * @Route("/manage", name="manage")
     */
    public function index()
    {
        
        return $this->render('manage/index.html.twig');
    }
}
