<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('titre');
        yield TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex();
        yield ImageField::new('imageName')->setBasePath('/images/services')->hideOnForm();
        yield IntegerField::new('imageSize')->hideOnForm();
        yield TextareaField::new('description1');
        yield TextareaField::new('description2');
        yield TextField::new('listeitem1');
        yield TextField::new('listeitem2');
        yield TextField::new('listeitem3');
        yield TextField::new('listeitem4');
        yield TextField::new('listeitem5');
        yield TextareaField::new('description3');
    }
}
