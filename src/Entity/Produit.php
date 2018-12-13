<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Box;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productName;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    private $product_disponibility;

    /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    private $product_conformity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToMany(targetEntity="Box",inversedBy="product")
     */
    private $boxes;

    /**
     * Produit constructor.
     * @param $product_conformity
     */
    public function __construct($product_conformity=false)
    {
        $this->product_conformity = $product_conformity;
        $this->boxes = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }

    

    public function getProductDisponibility(): ?bool
    {
        return $this->product_disponibility;
    }

    public function setProductDisponibility(bool $product_disponibility): self
    {
        $this->product_disponibility = $product_disponibility;

        return $this;
    }

    public function getProductConformity(): ?bool
    {
        return $this->product_conformity;
    }

    public function setProductConformity(bool $product_conformity): self
    {
        $this->product_conformity = $product_conformity;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getBoxes()
    {
        return $this->boxes;
    }

    public function setBoxes($boxes): void
    {
        $this->boxes = $boxes;


    }

    public function addBox($box): void
    {
        $this->boxes[] = $box;
    }
















}
