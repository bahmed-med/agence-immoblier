<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PropertyRepository;
use App\Entity\Property;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\PropertyType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;


class AdminPropertyController extends AbstractController{
    
    public $propertyRepository;
    public $em;


    public function __construct(PropertyRepository $propertyRepository, ObjectManager  $em) {
        $this->propertyRepository = $propertyRepository;
        $this->em = $em;
    }
    
    /**
     * @Route("/admin", name="property_admin_index")
     * 
     */
    
    public function index(){
        
        $properties = $this->propertyRepository->findAll();
   
        return $this->render('/Admin/index.html.twig', compact('properties'));
    }
    
    /**
     *  @Route("/admin/property/new", name="property_admin_new")
     */
    
    public function add(Request $request){
        
        $property = new Property();
        $form = $this->createForm(PropertyType::class, $property);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($property);
            $this->em->flush();
            $this->addFlash('success', 'Votre bien a été bien créé');
            return $this->redirectToRoute('property_admin_index');
        }
        
        return $this->render('/Admin/new.html.twig', 
                [
                    'property'=> $property,
                    'form' => $form->createView()
                ]);
        
    }

    /**
     * @Route("/admin/property/edit/{id}", name="property_admin_edit")
     * @return Property
     * 
     */
    
    public function edit(Property $property, Request $request){
        
        $form = $this->createForm(PropertyType::class, $property);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            $this->addFlash('success', 'Votre bien a été bien edité');
            return $this->redirectToRoute('property_admin_index');
        }
        
        return $this->render('/Admin/edit.html.twig', 
                [
                    'property'=> $property,
                    'form' => $form->createView()
                ]);
        
    }
    
    /**
     *  @Route("/admin/property/delete/{id}", name="property_admin_delete")
     */
    
    public function delete(Property $property){
        
        $this->em->remove($property);
        $this->em->flush();
        $this->addFlash('success', 'Votre bien a été bien supprimé');
        
        return $this->redirectToRoute('property_admin_index');
    }
    
}
