<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PropertyController extends AbstractController{
    
    /**
     * @Route("/biens", name="achat",)
     * 
     * return Response
     */
    public function index():Response{
        
        return  $this->render('property/index.html.twig', array('current_menu' => 'properties'));
        
    }
}
