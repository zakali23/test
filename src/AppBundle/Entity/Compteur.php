<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Compteur
 *@Vich\Uploadable
 * @ORM\Table(name="compteur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompteurRepository")
 */
class Compteur
{

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Erreur", inversedBy="versionCompteurs")
     * @ORM\JoinColumn(nullable=true)
     */
    private $versionCompteur;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Piece", inversedBy="compteurs")
     * @ORM\JoinColumn(nullable=true)
     */
    private $compteur;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeCompteur", inversedBy="categorieCompteurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorieCompteur;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FournisseurCompteur", inversedBy="marques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marque;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Mesure", mappedBy="releve")
     */
    private $releves;


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="serialNumber", type="integer", unique=true)
     */
    private $serialNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, unique=false, nullable=false)
     */
    private $reference;

    /**
     *
     * @Vich\UploadableField(mapping="compteur_image" ,fileNameProperty="photo",)
     *
     * @var File
     */
    protected $imageFile;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    protected $photo;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default":false})
     */
    protected $isInstalled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInstallation", type="datetime", nullable=true)
     */
    private $dateInstallation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAchat", type="datetime")
     */
    private $dateAchat;


    /**
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->reference;
    }


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set serialNumber.
     *
     * @param int $serialNumber
     *
     * @return Compteur
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;

        return $this;
    }

    /**
     * Get serialNumber.
     *
     * @return int
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * Set photo.
     *
     * @param string|null $photo
     *
     * @return Compteur
     */
    public function setPhoto($photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo.
     *
     * @return string|null
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set dateInstallation.
     *
     * @param \DateTime $dateInstallation
     *
     * @return Compteur
     */
    public function setDateInstallation($dateInstallation)
    {
        $this->dateInstallation = $dateInstallation;

        return $this;
    }

    /**
     * Get dateInstallation.
     *
     * @return \DateTime
     */
    public function getDateInstallation()
    {
        return $this->dateInstallation;
    }

    /**
     * Set dateAchat.
     *
     * @param \DateTime $dateAchat
     *
     * @return Compteur
     */
    public function setDateAchat($dateAchat)
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    /**
     * Get dateAchat.
     *
     * @return \DateTime
     */
    public function getDateAchat()
    {
        return $this->dateAchat;
    }


    /**
     * Set categorieCompteur.
     *
     * @param \AppBundle\Entity\TypeCompteur $categorieCompteur
     *
     * @return Compteur
     */
    public function setCategorieCompteur(\AppBundle\Entity\TypeCompteur $categorieCompteur)
    {
        $this->categorieCompteur = $categorieCompteur;

        return $this;
    }

    /**
     * Get categorieCompteur.
     *
     * @return \AppBundle\Entity\TypeCompteur
     */
    public function getCategorieCompteur()
    {
        return $this->categorieCompteur;
    }

    /**
     * Set marque.
     *
     * @param \AppBundle\Entity\FournisseurCompteur $marque
     *
     * @return Compteur
     */
    public function setMarque(\AppBundle\Entity\FournisseurCompteur $marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque.
     *
     * @return \AppBundle\Entity\FournisseurCompteur
     */
    public function getMarque()
    {
        return $this->marque;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->releves = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add relefe.
     *
     * @param \AppBundle\Entity\Mesure $relefe
     *
     * @return Compteur
     */
    public function addRelefe(\AppBundle\Entity\Mesure $relefe)
    {
        $this->releves[] = $relefe;

        return $this;
    }

    /**
     * Remove relefe.
     *
     * @param \AppBundle\Entity\Mesure $relefe
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRelefe(\AppBundle\Entity\Mesure $relefe)
    {
        return $this->releves->removeElement($relefe);
    }

    /**
     * Get releves.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReleves()
    {
        return $this->releves;
    }

    /**
     * Set radiateur.
     *
     * @param \AppBundle\Entity\Radiateur|null $radiateur
     *
     * @return Compteur
     */
    public function setRadiateur(\AppBundle\Entity\Radiateur $radiateur = null)
    {
        $this->radiateur = $radiateur;

        return $this;
    }

    /**
     * Get radiateur.
     *
     * @return \AppBundle\Entity\Radiateur|null
     */
    public function getRadiateur()
    {
        return $this->radiateur;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;
    }

    /**
     * Set versionCompteur.
     *
     * @param \AppBundle\Entity\Erreur $versionCompteur
     *
     * @return Compteur
     */
    public function setVersionCompteur(\AppBundle\Entity\Erreur $versionCompteur)
    {
        $this->versionCompteur = $versionCompteur;

        return $this;
    }

    /**
     * Get versionCompteur.
     *
     * @return \AppBundle\Entity\Erreur
     */
    public function getVersionCompteur()
    {
        return $this->versionCompteur;
    }

    /**
     * Set reference.
     *
     * @param string $reference
     *
     * @return Compteur
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set isInstalled.
     *
     * @param bool $isInstalled
     *
     * @return Compteur
     */
    public function setIsInstalled($isInstalled)
    {
        $this->isInstalled = $isInstalled;

        return $this;
    }

    /**
     * Get isInstalled.
     *
     * @return bool
     */
    public function getIsInstalled()
    {
        return $this->isInstalled;
    }


    /**
     * Set compteur.
     *
     * @param string $compteur
     *
     * @return Compteur
     */
    public function setCompteur( $compteur = null)
    {
        $this->compteur = $compteur;

        return $this;
    }

    /**F
     * Get compteur.
     *
     * @return \AppBundle\Entity\Piece|null
     */
    public function getCompteur()
    {
        return $this->compteur;
    }
}
