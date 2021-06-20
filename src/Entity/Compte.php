<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CompteRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Vich\UploaderBundle\Mapping\Annotation\Uploadable;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

/**
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 * @Vich\Uploadable
 */
class Compte
{

    const AGENCES = [
        0 => 'ODZA',
        1 => 'EMIA',
        2 => 'MINBOMAN',
    ];

    const TYCOMPTE= [
        0 => 'NPM',
        1 => 'NAM',
        2 => 'HEALTH NM',
    ];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Agence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type_compte;

    

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_telephone;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_cni;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @var File
     *@Vich\UploadableField(mapping="products" , fileNameProperty="image")
     *
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $update_at;

    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Solde;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function __construct()
    {
        $this->update_at = new \DateTime();
    }

    /**
     *@return mixed
     *
     */
	public function  getImageFile() {
                                                               		return $this->imageFile;
                                                               	}

    
     /**
     * @param File $imageFile
     * @return $this
     */
	public function  setImageFile( File $imageFile=null)
                                                          {
                                                      
                                                              $this->imageFile = $imageFile;
                                                              if ($imageFile) {
                                                                  // if 'updatedAt' is not defined in your entity, use another property
                                                                  $this->update_at = new \DateTime('now');
                                                              }
                                                              return $this;
                                                               		
                                                          }

 
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgence(): ?string
    {
        return $this->Agence;
    }

    public function setAgence(string $Agence): self
    {
        $this->Agence = $Agence;

        return $this;
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

    public function getTypeCompte(): ?string
    {
        return $this->Type_compte;
    }

    public function setTypeCompte(string $Type_compte): self
    {
        $this->Type_compte = $Type_compte;

        return $this;
    }

    public function getNumeroTelephone(): ?int
    {
        return $this->numero_telephone;
    }

    public function setNumeroTelephone(int $numero_telephone): self
    {
        $this->numero_telephone = $numero_telephone;

        return $this;
    }

    public function getNumeroCni(): ?int
    {
        return $this->numero_cni;
    }

    public function setNumeroCni(int $numero_cni): self
    {
        $this->numero_cni = $numero_cni;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->update_at;
    }

    public function setUpdateAt(\DateTimeInterface $update_at): self
    {
        $this->update_at = $update_at;

        return $this;
    }

   

    public function getSolde(): ?int
    {
        return $this->Solde;
    }

    public function setSolde(?int $Solde): self
    {
        $this->Solde = $Solde;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
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
    
}
