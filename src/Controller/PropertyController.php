<?php


namespace App\Controller;

use App\Entity\Property;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\RechercheData;
use App\Form\RechercheDataType;

use App\Repository\PropertyRepository;
use App\Entity\Option;


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
    public function index(PaginatorInterface $paginator, Request $request):Response{
        
        
        $rechercheData = new RechercheData();
        
        $form = $this->createForm(RechercheDataType::class, $rechercheData);
        
        $form->handleRequest($request);
            
        $query = $this->propertyRepository->findAllVisible($rechercheData);
        
        $properties = $paginator->paginate(
        $query, /* query NOT result */
        $request->query->getInt('page', 1)/*page number*/,
        10/*limit per page*/
    );
            
        return  $this->render('property/index.html.twig', 
                array('current_menu' => 'properties',
                     'properties' => $properties,
                     'form' => $form->createView()));
        
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
