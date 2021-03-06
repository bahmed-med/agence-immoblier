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
     * @Route("/biens", name="achat")
     * 
     * return Response
     */
    public function index():Response{
        
        $property = $this->propertyRepository->find(1);
            
        return  $this->render('property/index.html.twig', array('current_menu' => 'properties'));
        
    }
    
    /**
     * @Route("/show/{slug}-{id}", name="show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Property  $property Description
     * return Response
     */
    
    public function show(Property $property, string $slug): Response{
        if($property->getSlug() !== $slug){
            return $this->redirectToRoute('show', [
                'id' => $property->getId(),
                'slug' => $property->getSlug()
            ]);
        }
        //$proporty =  $property = $this->propertyRepository->find($id);
        return  $this->render('property/show.html.twig', array('current_menu' => 'properties',
                                                               'property' => $property   ));
    }
}
