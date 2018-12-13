<?php
/**
 * Created by PhpStorm.
 * User: connector
 * Date: 11/12/2018
 * Time: 14:23
 */

namespace App\Controller\Suketina;


use App\Entity\Produit;
use App\Produits\ProduitsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AchatContoller extends AbstractController
{

    /**
     * @Route("achat_index",name="achatIndex")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function AchatIndex()
    {




        return $this->render('Achat/achatIndex.html.twig');
    }

    /**
     * @Route("/update-achat/{id}",name="update-achat")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function AchatUpdate()
    {

        //dd($produit);





        //mise a jour em->persit()

        return $this->redirectToRoute('achatIndex');
    }
}