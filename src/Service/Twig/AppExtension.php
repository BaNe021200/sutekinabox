<?php
/**
 * Created by PhpStorm.
 * User: connector
 * Date: 12/12/2018
 * Time: 20:35
 */

namespace App\Service\Twig;


use App\Entity\Box;
use App\Repository\BoxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Twig\Extension\AbstractExtension;

class AppExtension extends AbstractExtension
{
    private $em;
    private $session;

    /**
     * AppExtension constructor.
     * @param EntityManagerInterface $manager
     * @param SessionInterface $session
     */
    public function __construct(EntityManagerInterface $manager, SessionInterface $session)
    {
        $this->em=$manager;
        $this->session=$session;
    }

    /*public function getFunctions()
    {
        return[
            new \Twig_Function('isSelected',function (){
                return $this->em->getRepository(Box::class)
                    ->findByProduct();
            })

        ];
    }*/


}