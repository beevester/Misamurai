<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    /**
     * @Route("/", name="main.homepage")
     */
    public function index()
    {
        // This is to randomise the API
        $newsApi = [0,1,2,3,4,5];
        $nominationsApi = [0,1,2,3,4,5];
        $achievementsApi = [0,1,2,3,4,5];

        for ($i=0; $i < 9; $i++) {
             $api[] = ['type' => 'newsApi'];
             $api[] = ['type' => 'pictureApi'];
             $api[] = ['type' => 'nominationsApi'];
             $api[] = ['type' => 'achievementsApi'];
        };

        shuffle($api);

        // Homepage index rendering
        return $this->render('main/index.html.twig', [ 'apiCall' => $api]);
    }
}
