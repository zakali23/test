<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Piece
 *@Vich\Uploadable
 * @ORM\Table(name="piece")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PieceRepository")
 */
class Piece
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Lot", inversedBy="rooms", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $room;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Compteur", mappedBy="compteur")
     */
    private $compteurs;

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->nom ;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="surface", type="integer")
     */
    private $surface;


    /**
     *
     * @Vich\UploadableField(mapping="piece_image" ,fileNameProperty="photo",)
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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return Piece
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set surface.
     *
     * @param int $surface
     *
     * @return Piece
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Get surface.
     *
     * @return int
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * Set photo.
     *
     * @param string|null $photo
     *
     * @return Piece
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
     * Set room.
     *
     * @param \AppBundle\Entity\Lot $room
     *
     * @return Piece
     */
    public function setRoom(\AppBundle\Entity\Lot $room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room.
     *
     * @return \AppBundle\Entity\Lot
     */
    public function getRoom()
    {
        return $this->room;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->compteurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add compteur.
     *
     * @param \AppBundle\Entity\Compteur $compteur
     *
     * @return Piece
     */
    public function addCompteur(\AppBundle\Entity\Compteur $compteur)
    {
        $this->compteurs[] = $compteur;

        return $this;
    }

    /**
     * Remove compteur.
     *
     * @param \AppBundle\Entity\Compteur $compteur
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCompteur(\AppBundle\Entity\Compteur $compteur)
    {
        return $this->compteurs->removeElement($compteur);
    }

    /**
     * Get compteurs.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompteurs()
    {
        return $this->compteurs;
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
}
