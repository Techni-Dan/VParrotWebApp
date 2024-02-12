<?php

namespace App\Controller\Employes;

use App\Entity\Vehicule;
use App\Form\Type\VehiculeImageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bundle\SecurityBundle\Security;
use Doctrine\ORM\EntityManagerInterface;

class VehiculeCrudController extends AbstractCrudController
{
    private $security;
  
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public static function getEntityFqcn(): string
    {
        return Vehicule::class;
    }
    
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
      // Set employe field to the current logged-in user
      $employe = $this->security->getUser();
      $entityInstance->addEmploye($employe);
      
      parent::persistEntity($entityManager, $entityInstance);
    }

    public function configureFields(string $pageName): iterable
    {   //dd($this->security);
        yield AssociationField::new('marque');
        yield AssociationField::new('modele');
        yield TextField::new('titre');
        yield AssociationField::new('categorie');
        yield AssociationField::new('type');
        yield AssociationField::new('carburant');
        yield IntegerField::new('prix');
        yield IntegerField::new('annee');
        yield IntegerField::new('kilometrage');
        yield DateTimeField::new('Date_Ajout')->hideOnIndex()->setDisabled(true);
        yield CollectionField::new('images')
            ->setEntryType(VehiculeImageType::class)
            //->onlyOnForms()
            ->setFormTypeOption('allow_add', true)
            ->setFormTypeOption('allow_delete', true);
        yield TextareaField::new('description');
        yield TextareaField::new('options');
        
    }
}
