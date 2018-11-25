<?php

namespace App\Repository;

use App\Entity\Property;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Property::class);
    }
    
    public function findLatest(){
        return $this->createQueryBuilder('p')
                ->where('p.sold = false')
                ->setMaxResults(4)
                ->getQuery()
                ->getResult();
        
    }
    
    /**
     * Pour faire la pagination
     * @return Quety
     */
    
    public function findAllVisible($rechercheData){
        
       // var_dump($rechercheData); exit;
        
        $query= $this->createQueryBuilder('p')
             ->where('p.sold = false');
             
        if($rechercheData->getPriceMin()){
            $query = $query->andWhere('p.price > :minPrice')
                    ->setParameter('minPrice', $rechercheData->getPriceMin());
            
        }
        
        if($rechercheData->getPriceMax()){
            $query = $query->andWhere('p.price < :maxPrice')
                    ->setParameter('maxPrice', $rechercheData->getPriceMax());
            
        }
        
        if($rechercheData->getSurfaceMin()){
            $query = $query->andWhere('p.surface > :minSurface')
                    ->setParameter('minSurface', $rechercheData->getSurfaceMin());
            
        }
        
        if($rechercheData->getSurfaceMax()){
            $query = $query->andWhere('p.price < :maxSurface')
                    ->setParameter('maxSurface', $rechercheData->getSurfaceMax());
            
        }
        
        if($rechercheData->getRoomMin()){
            $query = $query->andWhere('p.rooms > :minRooms')
                    ->setParameter('minRooms', $rechercheData->getRoomMin());
            
        }
        
        if($rechercheData->getRoomMax()){
            $query = $query->andWhere('p.rooms < :maxRooms')
                    ->setParameter('maxRooms', $rechercheData->getRoomMax());
            
        }
        
        //echo $query->getQuery()->getSQL(); exit; 
        
        return $query->getQuery();

                
        
    }

    // /**
    //  * @return Property[] Returns an array of Property objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Property
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
