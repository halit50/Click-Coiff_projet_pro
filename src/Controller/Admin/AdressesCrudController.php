<?php

namespace App\Controller\Admin;

use App\Entity\Adresses;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AdressesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Adresses::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('rue'),
            IntegerField::new('codePostal'),
            TextField::new('ville'),
            TextField::new('pays'),
            AssociationField::new('enseigne')
            ];
    }
    
}
