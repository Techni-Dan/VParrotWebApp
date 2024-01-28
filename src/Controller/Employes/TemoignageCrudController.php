<?php

namespace App\Controller\Employes;

use App\Entity\Temoignage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use Symfony\Bundle\SecurityBundle\Security;
use Doctrine\ORM\EntityManagerInterface;


class TemoignageCrudController extends AbstractCrudController
{
    private $security;
    private $employe;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public static function getEntityFqcn(): string
    {
        return Temoignage::class;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        // Set employe field to the current logged-in user
        $employe = $this->security->getUser();
        
        if ($entityInstance instanceof Temoignage) {
            $entityInstance->addEmploye($employe);
        }
        
        parent::persistEntity($entityManager, $entityInstance);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('Nom');
        yield TextAreaField::new('Commentaire');
        yield IntegerField::new('Note');
        yield BooleanField::new('Approuve');
        yield DateTimeField::new('updatedAt')->hideOnIndex()->setDisabled(true);
        //dd($this->security->getUser());
        
        if ($this->isGranted('ROLE_EMPLOYE')) {
          // If the current user has the ROLE_EMPLOYE role, set the employe field
          $employe = $this->security->getUser();
          //dd($employe);
          yield AssociationField::new('employe')->setValue($employe);
        } else {
          // If the current user does not have the ROLE_EMPLOYE role, allow selecting employe manually
          yield AssociationField::new('employe');
        }
        
    }
    
}
