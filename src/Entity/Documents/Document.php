<?php

namespace App\Entity\Documents;

use App\Entity\User;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DocumentRepository;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=DocumentRepository::class)
 * @Vich\Uploadable
 * @author Maxime Elessa <elessamaxime@icloud.com>
 * @package App\Entity\Documents
 */
class Document
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"Doc:read"})
     */
    private int $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     * @Groups({"Doc:read"})
     */
    private string $name;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="document")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"Doc:read"})
     */
    private User $user;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="documents", fileNameProperty="docName", size="docSize")
     * @Assert\File(
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Please upload a valid PDF"
     * )
     * @var File|null
     */
    private ?File $docFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     * @Groups({"Doc:read"})
     */
    private ?string $docName = null;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int|null
     * @Groups({"Doc:read"})
     */
    private ?int $docSize;


    /**
     * @ORM\Column(type="datetime_immutable")
     *
     * @var DateTimeImmutable
     * @Groups({"Doc:read"})
     */
    private DateTimeImmutable $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private ?DateTimeImmutable $updatedAt;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }


    /**
     * @return  int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|UploadedFile|null $docFile
     */
    public function setDocFile(?File $docFile = null): void
    {
        $this->docFile = $docFile;

        if (null !== $docFile) {
            $this->updatedAt = new DateTimeImmutable('now');
        }
    }

    public function getDocFile(): ?File
    {
        return $this->docFile;
    }

    public function setdocName(?string $docName): void
    {
        $this->docName = $docName;
    }

    public function getDocName(): ?string
    {
        return $this->docName;
    }

    public function setDocSize(?int $docSize): void
    {
        $this->docSize = $docSize;
    }

    public function getDocSize(): ?int
    {
        return $this->docSize;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        /** @var User $user */
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of createdAt
     *
     * @return  DateTimeImmutable
     */
    public function getCreatedAt() : DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @param  DateTimeImmutable  $createdAt
     *
     * @return  self
     */
    public function setCreatedAt(DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of name
     *
     * @return  string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */
    public function setName(string $name) : self
    {
        $this->name = $name;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getConvertedSize() : float
    {
        return round(($this->getdocSize() * 0.000000953674316),2);
    }
}
