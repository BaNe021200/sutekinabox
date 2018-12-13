<?php
/**
 * Created by PhpStorm.
 * User: connector
 * Date: 10/12/2018
 * Time: 21:47
 */

namespace App\Controller\Suketina\Security;


use App\Entity\User;
use App\User\UserLoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{


    /**
     * @Route("/admin_connexion",name="adminLogin")
     * @param AuthenticationUtils $authenticationUtils
     * @return RedirectResponse|Response
     */
    public function connexion(AuthenticationUtils $authenticationUtils)
    {
        if ($this->getUser()){
            //return $this->redirectToRoute('admin_index');
            if($this->getUser()->hasRole('ROLE_PROVIDER'))
            {
                return $this->redirectToRoute('providerIndex');
            }
            if($this->getUser()->hasRole('ROLE_ACHATS'))
            {
                return $this->redirectToRoute('achatIndex');
            }
            if($this->getUser()->hasRole('ROLE_MARKETING'))
            {
                return $this->redirectToRoute('marketingIndex');
            }



        }






        $form = $this->createForm(UserLoginType::class,[
            'email' => $authenticationUtils->getLastUsername()
        ]);

        $error = $authenticationUtils->getLastAuthenticationError();




        return $this->render('security/connexion.html.twig',[
           'form' =>$form->createView(),
           'error' => $error
        ]);
    }

    /**
     * @Route("/admin_deconnexion",name="adminLogout")
     */
    public function deconnexion()
    {

    }
}