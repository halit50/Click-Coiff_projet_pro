<?php

namespace App\Controller\Admin;

use App\Entity\CategorieProduits;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategorieProduitsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategorieProduits::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
