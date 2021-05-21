<?php

namespace App\Controller\Admin;

use App\Entity\Enseigne;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class EnseigneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Enseigne::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            IntegerField::new('kbis','SIREN'),
            TextField::new('reseausocial', 'Réseaux Sociaux'),
            TextField::new('typeCoiffeur', 'Type Coiffeur'),
            TextField::new('adresses.rue', 'Rue'),
            IntegerField::new('adresses.codePostal','Code Postal'),
            TextField::new('adresses.ville', 'Ville'),
            TextField::new('adresses.pays', 'Pays'),
        ];
    }
    

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        // ...
        ->remove(Crud::PAGE_INDEX, Action::NEW)
        //->remove(Crud::PAGE_INDEX, Action::EDIT)
        ->remove(Crud::PAGE_INDEX, Action::DELETE)
    ;
    }

    
}
