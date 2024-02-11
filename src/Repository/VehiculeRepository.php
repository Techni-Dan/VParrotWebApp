<?php

namespace App\Repository;

use App\Entity\Vehicule;
use App\Entity\Categorie;
use App\Data\SearchData;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;

/**
 * @extends ServiceEntityRepository<Vehicule>
 *
 * @method Vehicule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehicule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehicule[]    findAll()
 * @method Vehicule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiculeRepository extends ServiceEntityRepository
{
    /**
     * @var PaginatorInterface
     */

     private $paginator;

     public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
     {
         parent::__construct($registry, Vehicule::class);
         $this->paginator = $paginator;
     }
 
     public function save(Vehicule $entity, bool $flush = false): void
     {
         $this->getEntityManager()->persist($entity);
 
         if ($flush) {
             $this->getEntityManager()->flush();
         }
     }
 
     public function remove(Vehicule $entity, bool $flush = false): void
     {
         $this->getEntityManager()->remove($entity);
 
         if ($flush) {
             $this->getEntityManager()->flush();
         }
     }
 
     /**
      * Récupère le prix minimum et maximum correspondant à une recherche
      * @return integer[]
      */
     public function findPrixMinMax(SearchData $search): array
     {
         $results = $this->getSearchQuery($search, true)
             ->select('MIN(p.prix) as prixmin', 'MAX(p.prix) as prixmax')
             ->getQuery()
             ->getScalarResult();
         return [(int)$results[0]['prixmin'], (int)$results[0]['prixmax']];
     }
 
     /**
      * Récupère le kilometrage minimum et maximum correspondant à une recherche
      * @return integer[]
      */
     public function findKmMinMax(SearchData $search): array
     {
         $results = $this->getSearchQuery($search, true)
             ->select('MIN(p.kilometrage) as kmmin', 'MAX(p.kilometrage) as kmmax')
             ->getQuery()
             ->getScalarResult();
         return [(int)$results[0]['kmmin'], (int)$results[0]['kmmax']];
     }
 
     /**
      * Récupère le annee minimum et maximum correspondant à une recherche
      * @return integer[]
      */
     public function findAnneeMinMax(SearchData $search): array
     {
         $results = $this->getSearchQuery($search, true)
             ->select('MIN(p.annee) as anneemin', 'MAX(p.annee) as anneemax')
             ->getQuery()
             ->getScalarResult();
         return [(int)$results[0]['anneemin'], (int)$results[0]['anneemax']];
     }
 
     private function getSearchQuery(SearchData $search, $ignorePrix = false, $ignoreKm = false, $ignoreAnnee = false): QueryBuilder
     {
         $query = $this
            ->createQueryBuilder('p')
            ->select('c', 'p', 't', 'a', 'm', 'd')
            ->join('p.marque', 'm')
            ->join('p.modele', 'd')
            ->join('p.categorie', 'c')
            ->join('p.type', 't')
            ->join('p.carburant', 'a')
            ->orderBy('p.id', 'DESC');

        if(!empty($search->marque)) {
            $query = $query
                ->andWhere('m.id IN (:marque)')
                ->setParameter('marque', $search->marque);
        }

        if(!empty($search->modele)) {
          $query = $query
              ->andWhere('d.id IN (:modele)')
              ->setParameter('modele', $search->modele);
      }

        if(!empty($search->categorie)) {
            $query = $query
                ->andWhere('c.id IN (:categorie)')
                ->setParameter('categorie', $search->categorie);
        }

        if(!empty($search->type)) {
            $query = $query
                ->andWhere('t.id IN (:type)')
                ->setParameter('type', $search->type);
        }

        if(!empty($search->carburant)) {
            $query = $query
                ->andWhere('a.id IN (:carburant)')
                ->setParameter('carburant', $search->carburant);
        }
 
         if (!empty($search->prixmin) && $ignorePrix === false) {
             $query = $query
                 ->andWhere('p.prix >= :prixmin')
                 ->setParameter('prixmin', $search->prixmin);
         }
 
         if (!empty($search->prixmax) && $ignorePrix === false) {
             $query = $query
                 ->andWhere('p.prix <= :prixmax')
                 ->setParameter('prixmax', $search->prixmax);
         }
 
         if (!empty($search->kmmin && $ignoreKm === false)) {
             $query = $query
                 ->andWhere('p.kilometrage >= :kmmin')
                 ->setParameter('kmmin', $search->kmmin);
         }
 
         if (!empty($search->kmmax) && $ignoreKm === false) {
             $query = $query
                 ->andWhere('p.kilometrage <= :kmmax')
                 ->setParameter('kmmax', $search->kmmax);
         }
 
         if (!empty($search->anneemin) && $ignoreAnnee === false) {
             $query = $query
                 ->andWhere('p.annee >= :anneemin')
                 ->setParameter('anneemin', $search->anneemin);
         }
 
         if (!empty($search->anneemax) && $ignoreAnnee === false) {
             $query = $query
                 ->andWhere('p.annee <= :anneemax')
                 ->setParameter('anneemax', $search->anneemax);
         }
 
         return $query;
     }
 
     /**
      * Récupère les produits en lien avec une recherce
      * @return PaginationInterface
      */
 
     public function findSearch(SearchData $search): PaginationInterface
     {   
         
 
         $query = $this->getSearchQuery($search)->getQuery();
         //$query = $this->orderBy('p.id', 'DESC');
         return $this->paginator->paginate(
             $query,
             $search->page,
             12
         );
 
     }
    /*
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicule::class);
    }
    */
//    /**
//     * @return Vehicule[] Returns an array of Vehicule objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Vehicule
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
