<?php

namespace App\Form;

use App\Entity\Compte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class CompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Agence',ChoiceType::class,[
                'choices'=>$this->getChoices(),
                'label'=> "Agences :"
            ])
            ->add('Nom',TextType::class,[
                'label'=> "Nom :"
            ])
            ->add('prenom')
            ->add('Type_compte',ChoiceType::class,[
                'choices'=>$this->getChoicesCompte()])
            ->add('numero_telephone')
            ->add('username')
            ->add('email')
            ->add('password', PasswordType::class)
            ->add('numero_cni')
            ->add('imageFile', FileType::class,[
                'required'=>true
            ])
            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Compte::class,
        ]);
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
