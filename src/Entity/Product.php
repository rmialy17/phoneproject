<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ApiResource(
 *     paginationItemsPerPage = 5,
 *     normalizationContext={"groups"={"product:read"}},
 *     collectionOperations={
 *         "get"={
 *             "openapi_context"={
 *                  "security"={{"bearerAuth"={}}}
 *             }
 *          }
 *     },
 *     itemOperations={
 *         "get"={
 *             "openapi_context"={
 *                  "security"={{"bearerAuth"={}}}
 *             }
 *         }
 *     },
 *     shortName="Produit",
 *     paginationItemsPerPage = 5,
 * )
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"product:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     * 
     * @Groups({"product:read"})
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     * 
     * @Groups({"product:read"})
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     * 
     * @Groups({"product:read"})
     */
    private $currency;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     * 
    * @Groups({"product:read"})
     */
    private $brand;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;
        $currency ='EUR';

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }
}
