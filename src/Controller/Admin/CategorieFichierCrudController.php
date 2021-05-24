<?php

namespace App\Controller\Admin;

use App\Entity\CategorieFichier;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategorieFichierCrudController extends AbstractCrudController
{
    private $entityManager;

    public static function getEntityFqcn(): string
    {
        return CategorieFichier::class;
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
   
    // public function configureActions(Actions $actions): Actions
    // {
    //     return $actions
    //     ->remove(Crud::PAGE_INDEX, Action::NEW)
    //     ->remove(Crud::PAGE_INDEX, Action::EDIT)
    //     ->remove(Crud::PAGE_INDEX, Action::DELETE)
    // ;
    // }
}
