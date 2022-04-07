<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 *     fields={"email"},
 *     message="Cet email est déjà utilisé."
 * )
 * @ApiResource(
 *     normalizationContext={"groups"={"user:read"}},
 *     denormalizationContext={"groups"={"user:write"}},
 *     collectionOperations={
 *          "get"={
 *             "openapi_context"={
 *                  "security"={{"bearerAuth"={}}}
 *              }
 *         },
 *        "post": {
 *             "method": "POST",
 *             "access_control": "is_granted('ROLE_USER', object)",
 *             "openapi_context": {
 *                 "security"={{"bearerAuth"={}}},
 *                 "requestBody": {
 *                     "content": {
 *                         "application/ld+json": {
 *                             "schema": {
 *                                 "type": "object",
 *                                 "properties": {
 *                                     "email": {"type": "string", "example": "user@example.com"},
 *                                     "customer": {"type": "string", "example": "/api/customers/PhoneCompany"},
 *                                     "firstName": {"type": "string", "example": "Charles"},
 *                                     "lastName": {"type": "string", "example": "Dubois"},
 *                                 },
 *                             },
 *                         },
 *                     },
 *                 },
 *             },
 *         },
 *     },
 *     itemOperations={
 *         "put"={
 *             "method": "PUT",
 *             "access_control": "is_granted('ROLE_USER', object)",
 *             "openapi_context": {
 *                 "security"={{"bearerAuth"={}}},
 *                 "requestBody": {
 *                     "content": {
 *                         "application/ld+json": {
 *                             "schema": {
 *                                 "type": "object",
 *                                 "properties": {
 *                                     "email": {"type": "string", "example": "user@example.com"},
 *                                     "customer": {"type": "string", "example": "/api/customers/PhoneCompany"},
 *                                     "firstName": {"type": "string", "example": "Charles"},
 *                                     "lastName": {"type": "string", "example": "Dubois"},
 *                                 },
 *                             },
 *                         },
 *                     },
 *                 },
 *             },
 *         },
 *         "delete"={
 *             "openapi_context"={
 *                  "security"={{"bearerAuth"={}}}
 *             }
 *         },
 *         "get"={
 *             "access_control": "is_granted('ROLE_USER', object)",
 *             "openapi_context"={
 *                  "security"={{"bearerAuth"={}}}
 *             }
 *         }
 *     },
 *     shortName="Utilisateur",
 *     paginationItemsPerPage = 5
 * )
 * 
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"customer:read", "user:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "Cet email est invalide."
     * )
     * 
     * @Groups({"customer:read", "user:read", "user:write"})
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="users", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false, onDelete="cascade")
     * @Assert\IsFalse(
     *     message = "You've entered an invalid state. Example : /api/customers/CompanyName"
     * )
     * @Groups({"customer:read", "user:read", "user:write"})
     */
    private $customer;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      minMessage = "Your first name must be at least {{ limit }} characters long"
     * )
     * 
     * @Groups({"customer:read", "user:read", "user:write"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      minMessage = "Your last name must be at least {{ limit }} characters long"
     * )
     * @Groups({"customer:read", "user:read", "user:write"})
     */
    private $lastName;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }
}
