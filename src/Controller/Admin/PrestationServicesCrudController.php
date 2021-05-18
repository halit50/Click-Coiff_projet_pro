<?php

namespace App\Controller\Admin;

use App\Entity\PrestationServices;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PrestationServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PrestationServices::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
        TextField::new('nom'),
        MoneyField::new('prix')->setCurrency('EUR'),
        IntegerField::new('duree', 'Durée en minutes')
        ];
    }
    
}
