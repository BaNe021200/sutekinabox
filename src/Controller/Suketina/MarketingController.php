<?php
/**
 * Created by PhpStorm.
 * User: connector
 * Date: 11/12/2018
 * Time: 14:30
 */

namespace App\Controller\Suketina;


use App\Entity\Box;
use App\Entity\Produit;
use App\Produits\ProduitsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Tests\B;

class MarketingController extends AbstractController
{
    /**
     * @Route("marketing_index",name="marketingIndex")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function marketingIndex()
    {
        $repository = $this->getDoctrine()->getManager();

        $products = $repository->getRepository(Produit::class)->findAll();
        $boxes = $repository->getRepository(Box::class)->findAll();








        return $this->render('marketing/marketingIndex.html.twig',[
            'products' => $products,
            'box'=> $boxes

        ]);
    }

    /**
     * @Route("/selected-product/{id}",name="selectedProduct")
     * @param Produit $produit
     * @return RedirectResponse
     */
    public function MarketingSelectProduct(Produit $produit)
    {

        $em = $this->getDoctrine()
            ->getManager();

        $box = $em->find(Box::class, 1);

        $box->addProduct($produit);

        $produit->addBox($box);

        $em->persist($box);
        $em->persist($produit);


        $em->flush();

        /*
        $produit->setBoxes($box);
        $em = $this->getDoctrine()->getManager();
        $em->persist($produit);
        $em->flush();
        */



        return $this->redirectToRoute('marketingIndex');
    }
}