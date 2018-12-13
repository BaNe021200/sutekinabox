<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"},errorPath="email",message="Ce compte existe déjà")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="saisissez votre nom")
     *
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="saisissez votre prénom")
     *
     */
    private $prenom;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $derniere_connexion;

    /**
     * @ORM\Column(type="array")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Saisissez votre email")
     * @Assert\Email(message="Vérifiez le format de votre email")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=64)
     * @Assert\NotBlank(message="N'oubliez pas votre mot de passe")
     * @Assert\Regex(pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]+$/",message="Votre mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre.")
     * @Assert\Length(
     *     min="8",
     *     minMessage="Votre mot de passe est trop court. {{ limit }} caractères min.",
     *     max="64",
     *     maxMessage="Votre mot de passe est trop long. {{ limit }} caractères max."
     * )
     */
    private $password;



    public function __construct(string $role = "ROLE_MARKETING")
    {
        $this->addRole($role);

    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDerniereConnexion(): ?\DateTimeInterface
    {
        return $this->derniere_connexion;
    }

    public function setDerniereConnexion(string $timestamp ='now'): self
    {
        $this->derniere_connexion = new \DateTime($timestamp);

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
    public function addRole(string $role):bool
    {
        if(!in_array($role, $this->roles)) {
            $this->roles[] = $role;
            return true;
        }
        return false;
    }

    public function hasRole($role): bool
    {
        return in_array($role, $this->roles);
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
       return $this->email;
    }

    /**
     * @return mixed
     */
    public function eraseCredentials()
    {

    }


}
