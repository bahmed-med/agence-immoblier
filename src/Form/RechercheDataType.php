<?php

namespace App\Form;

use app\Entity\RechercheData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RechercheDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
         
            ->add('surfaceMin', ChoiceType::class , [
                'attr' => [
                    'placeholder' => 'La surface minimale',
                ],
                'choices' => $this->getSurface(),
                'required' => false
  
                
                
            ])
            ->add('surfaceMax', ChoiceType::class , [
                'attr' => [
                    'placeholder' => 'La surface maximale',
                ],
                'choices' => $this->getSurface(),
                'required' => false
                
            ])
            ->add('priceMin', ChoiceType::class , [
                'attr' => [
                    'placeholder' => 'Le prix minimale',
                ],
                'choices' => $this->getPrice(),
                'required' => false//array("un" => 1, "deux" => 2,"trois" => 3 ,"quatre" => 4)
            ])
            ->add('priceMax', ChoiceType::class , [
                'attr' => [
                    'placeholder' => 'Le prix maximale',
                ],
                'choices' => $this->getPrice(),
                'required' => false
                
            ])  
                
            ->add('roomMin', ChoiceType::class , [
                'attr' => [
                    'placeholder' => 'Pièces minimale',
                ],
                'choices' =>  $this->getRoom(),
                'required' => false
                
            ])
            ->add('roomMax', ChoiceType::class , [
                'attr' => [
                    'placeholder' => 'Pièces maximale',
                ],
                'choices' => $this->getRoom(),
                'required' => false
                
            ])    
 
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RechercheData::class,
            'method' => 'GET',
            'csrf_protection' => false,
            'csrf_field_name' => '',
            
        ]);
    }
    
    
    private function getPrice() {
        $price = [];
        for ($i = 25000; $i <= 1000000; $i = $i + 25000) {
            $price['Choisisez une valeur'] = '';
            $price[$i] = $i;
        }
        return $price;
    }
    
    private function getSurface() {
        $surface = [];
        for ($i = 25; $i <= 500; $i = $i + 5) {
            $surface['Choisisez une valeur'] = '';
            $surface[$i] = $i;
        }
        return $surface;
    }
    
    private function getRoom() {
        $room = [];
        for ($i = 1; $i <= 8; $i = $i + 1) {
            $room['Choisisez une valeur'] = '';
            $room[$i] = $i;
        }
        return $room;
    }
    
    
    public function getBlockPrefix() {
        return '';
    }

}
