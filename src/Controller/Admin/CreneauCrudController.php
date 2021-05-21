<?php

namespace App\Controller\Admin;

use App\Entity\Creneau;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class CreneauCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Creneau::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
                ChoiceField::new('periodicite')
                ->setChoices([  '1 heure' => '60',
                                    '30 minutes' => '30']
                                ),
                TimeField::new('heuredebut'),
                TimeField::new('heurefin'),
                AssociationField::new('enseigne')
                ];
        
    }
    
}
