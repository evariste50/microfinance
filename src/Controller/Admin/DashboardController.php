<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Compte;
use App\Entity\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder =$this->get(CrudUrlGenerator::class)->build();
        return $this->redirect($routeBuilder->setController(RequestCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Microfinance');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Request', 'fas fa-comment', Request::class);
        yield MenuItem::linkToCrud('Compte', 'fas fa-list', Compte::class);
        yield MenuItem::linkToCrud('Admin', 'fas fa-user', Admin::class);
    }
}
