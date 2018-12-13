<?php
/**
 * Created by PhpStorm.
 * User: connector
 * Date: 10/12/2018
 * Time: 23:05
 */

namespace App\Controller\Suketina;


use App\Entity\User;
use App\User\UserLoginType;
use App\User\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user/inscription",methods={"GET","POST"},name="userSignIn")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return RedirectResponse|Response
     * @throws \Exception
     */
    public function newUser(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
      $user = new User();

      $form = $this->createForm(UserType::class,$user)
          ->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
      {


          $user->setPassword($passwordEncoder
          ->encodePassword($user, $user->getPassword()));
          $em = $this->getDoctrine()->getManager();
          $em->persist($user);
          $em->flush();

          $this->addFlash('notice','L\'utilisatueur est bien enregistré');
          return $this->redirectToRoute('adminLogin');

      }

      return $this->render('user/inscription.html.twig',[

          'form'=> $form->createView()
      ]);

    }
}