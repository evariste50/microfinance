<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Form\CompteType;
use App\Entity\Request as EntityRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends AbstractController
{
    /**
     *@Route("/home", name="index_home")
     *
     * @return Response
     */
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        
        if($request->isMethod('POST'))
        {
            $data=$request->request->all();
            
            $requet = new EntityRequest();

            

            $requet->setName($data['name']);
            $requet->setEmail($data['email']);
            $requet->setSubject($data['subject']);
            $requet->setMessage($data['message']);


            $manager->persist($requet);
            $manager->flush();
            $this->addFlash('success','Votre Requette sera resolue dans les heures qui suivront!!!');

            return $this->redirectToRoute("index_home");
            
        }


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     *@Route("/about", name="about")
     *
     * @return void
     */
    public function About()
    {
        return $this->render("home/propos.html.twig");
    }

    /**
     *@Route("/service", name="service")
     *
     * @return void
     */
    public function service(Request $request, EntityManagerInterface $manager)
    {
        $compte = new Compte();
        $form = $this->createForm(CompteType::class, $compte);
        $form->handleRequest($request);
        

        if( $form->isSubmitted() && $form->isValid()){
            
               
                $compte->setCreatedAt(new \DateTime());
                
               
                $manager->persist($compte);
                $manager->flush();
                $this->addFlash('success','Bravo Votre Compte NEW MONEY a ete cree avec Succes!!!');


            return $this->redirectToRoute('service');
            }



        return $this->render("home/service.html.twig",[
            'formCompte'=>$form->createView()
        ]);
    }

    /**
     *@Route("/contact", name="contact")
     *
     * @return void
     */
    public function contact()
    {
        return $this->render("home/contact.html.twig");
    }

     /**
     *@Route("/mediatheque", name="mediatheque")
     *
     * @return void
     */
    public function mediatheque()
    {
        return $this->render("home/mediatheque.html.twig");
    }

    // /**
    //  *@Route("/profile", name="profile")
    //  *
    //  */
    // public function connexion()
    // {
    //     return $this->render("home/connexion.html.twig");
    // }
}
