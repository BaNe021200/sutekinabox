<?php


namespace App\Controller;


use App\Entity\Provider;
use App\Provider\ProviderType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProviderController extends AbstractController
{
    /**
     * @Route("/newProvider",name="new_provider_form")
     * @param Request $request
     * @return Response
     */
    public function newProvider(Request $request)
    {
       $provider = new Provider();

       $form = $this->createForm(ProviderType::class,$provider)->handleRequest($request);

       if($form->isSubmitted() && $form->isValid())
       {
          $em = $this->getDoctrine()->getManager();
          $em->persist($provider);
          $em->flush();

          $this->addFlash('success','le fournisseur est bien enregistrer');

          return $this->redirectToRoute('new_provider_form');

       }
       /*else
       {
           $this->addFlash('error',"une erreur a surgit du fond de la nuit ! Le fournisseur ne peut-être enregistré ! Dommage ! try again !");
       }*/

       return $this->render('provider/provider_form.html.twig',[
           'form' => $form->createView()
       ]);








    }





    /**
     * @Route("/provider", name="providerIndex")
     *
     */
    public function provider()
    {


         return $this->render('provider/provider.html.twig');
    }


}