<?php

namespace App\Controller\Admin;

use App\Entity\Creneau;
use App\Entity\Fichier;
use App\Entity\Adresses;
use App\Entity\Commande;
use App\Entity\Enseigne;
use App\Entity\Produits;
use App\Entity\Transporteur;
use Doctrine\ORM\QueryBuilder;
use App\Entity\CategorieFichier;
use App\Entity\CategorieProduits;
use App\Entity\PrestationServices;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Click Coiff');
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linktoDashboard('Tabeleau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Mon enseigne', 'fas fa-building', Enseigne::class);
        yield MenuItem::linkToCrud('Prestation de services', 'fas fa-book', PrestationServices::class);
        yield MenuItem::linkToCrud('Mes créneaux', 'fas fa-calendar-check', Creneau::class);
        //yield MenuItem::linkToCrud('Catégorie de fichiers', 'fas fa-align-justify', CategorieFichier::class);
        yield MenuItem::linkToCrud('Fichiers', 'fas fa-file-image', Fichier::class);
        yield MenuItem::linkToCrud('Catégories Produits', 'fas fa-list', CategorieProduits::class);
        yield MenuItem::linkToCrud('Produits', 'fa fa-tag', Produits::class);
        yield MenuItem::linkToCrud('Transporteurs', 'fa fa-truck', Transporteur::class);
        yield MenuItem::linkToCrud('Commandes', 'fa fa-shopping-cart', Commande::class);
        yield MenuItem::linkToUrl('Aller sur le site', null, '/');
    }

    // public function createIndexQueryBuilder($r): QueryBuilder
    // {
    //     return $r
    //     ->where(getUser()->getId())
    // }

    // public function listAction() {
    //     $this->getUser();
    // }
}
