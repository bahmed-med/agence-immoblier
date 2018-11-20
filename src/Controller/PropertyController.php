<?php


namespace App\Controller;

use App\Entity\Property;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Repository\PropertyRepository;


class PropertyController extends AbstractController{
    
    
    public $propertyRepository;
    
    public function __construct(PropertyRepository $propertyRepository) {
        $this->propertyRepository = $propertyRepository;
    }

        /**
     * @Route("/biens", name="achat",)
     * 
     * return Response
     */
    public function index():Response{
        
        $property = $this->propertyRepository->find(1);
        
        dump($property);
        
              
        return  $this->render('property/index.html.twig', array('current_menu' => 'properties'));
        
    }
}
