<?php

namespace App\Controller\Admin;

use App\Entity\Request;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RequestCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Request::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('name'),
            TextField::new('email'),
            TextField::new('subject'),
            TextEditorField::new('message'),
        ];
    }
    
}
