<?php

namespace App\Controller\Admin;

use App\Entity\Compte;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class CompteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Compte::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $imageFile= TextareaField::new('imageFile')->setFormType(VichImageType::class);
        $image= ImageField::new('image')->setBasePath('/Assets/images/compte')
                                         ->setUploadDir('/Assets/images/compte');
        $fields =  [
            ChoiceField::new('Agence')->setChoices($this->getChoices()),
            TextField::new('Nom'),
            TextField::new('prenom'),
            ChoiceField::new('Type_compte')->setChoices($this->getChoicesCompte()),
            IntegerField::new('numero_telephone'),
            IntegerField::new('numero_cni'),
            DateField::new('created_at'),



        ];

        if ($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL){

            $fields[] = $image;
           
        } else{
            $fields[]= $imageFile;
        }
        return $fields;
    }

    public function getChoices()
    {
        $choices = Compte::AGENCES;
        $output = [];
        foreach($choices as $k=>$v){
            $output[$v] = $k;
        }
        return $output;
    }

    public function getChoicesCompte()
    {
        $choices = Compte::TYCOMPTE;
        $outputs = [];
        foreach($choices as $k=>$v){
            $outputs[$v] = $k;
        }
        return $outputs;
    }

    
    
}
