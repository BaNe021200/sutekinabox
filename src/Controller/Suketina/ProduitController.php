<?php
/**
 * Created by PhpStorm.
 * User: connector
 * Date: 11/12/2018
 * Time: 16:32
 */

namespace App\Controller\Suketina;


use App\Entity\Produit;
use App\Entity\Provider;
use App\Entity\User;
use App\Produits\ProduitsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProduitController extends AbstractController
{

    /**
     * @Route("/test-add-provider",name="test")
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    public function produit (Request $request, UserPasswordEncoderInterface $encoder):Response
    {

        $user = new User();
        $produitConformityValidate = new Produit();



        $form = $this->createForm(ProduitsType::class,$produitConformityValidate)
            ->handleRequest($request);

        return $this->render('Achat/achatIndex.html.twig',[

            'form'=> $form->createView()
        ]);

    }

}