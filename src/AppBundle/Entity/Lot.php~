<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Lot
 *@Vich\Uploadable
 * @ORM\Table(name="lot")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LotRepository")
 */
class Lot
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Immeuble", inversedBy="appartements",fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $appartement;



    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Piece", mappedBy="room", fetch="EAGER")
     */
    private $rooms;

    /**
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->numero;
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
     * @var int
     *
     * @ORM\Column(name="numero", type="string", unique=true)
     */
    private $numero;

    /**
     * @var int
     *
     * @ORM\Column(name="surface", type="integer")
     */
    private $surface;

    /**
     * @var int
     *
     * @ORM\Column(name="etage", type="integer")
     */
    private $etage;

    /**
     * @var int
     *
     * @ORM\Column(name="tantieme", type="integer", nullable=true)
     */
    private $tantieme;

    /**
     *
     * @Vich\UploadableField(mapping="uploads_image" ,fileNameProperty="photo",)
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
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $reference;


        /**
     * Constructor
     */
    public function __construct()
    {
        $this->rooms = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set numero.
     *
     * @param string $numero
     *
     * @return Lot
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero.
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set surface.
     *
     * @param int $surface
     *
     * @return Lot
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
     * Set etage.
     *
     * @param int $etage
     *
     * @return Lot
     */
    public function setEtage($etage)
    {
        $this->etage = $etage;

        return $this;
    }

    /**
     * Get etage.
     *
     * @return int
     */
    public function getEtage()
    {
        return $this->etage;
    }

    /**
     * Set photo.
     *
     * @param string|null $photo
     *
     * @return Lot
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
     * Set appartement.
     *
     * @param \AppBundle\Entity\Immeuble $appartement
     *
     * @return Lot
     */
    public function setAppartement(\AppBundle\Entity\Immeuble $appartement)
    {
        $this->appartement = $appartement;

        return $this;
    }

    /**
     * Get appartement.
     *
     * @return \AppBundle\Entity\Immeuble
     */
    public function getAppartement()
    {
        return $this->appartement;
    }

    /**
     * Add room.
     *
     * @param \AppBundle\Entity\Piece $room
     *
     * @return Lot
     */
    public function addRoom(\AppBundle\Entity\Piece $room)
    {
        $this->rooms[] = $room;

        return $this;
    }

    /**
     * Remove room.
     *
     * @param \AppBundle\Entity\Piece $room
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRoom(\AppBundle\Entity\Piece $room)
    {
        return $this->rooms->removeElement($room);
    }

    /**
     * Get rooms.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRooms()
    {
        return $this->rooms;
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
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * Set tantieme.
     *
     * @param int $tantieme
     *
     * @return Lot
     */
    public function setTantieme($tantieme)
    {
        $this->tantieme = $tantieme;

        return $this;
    }

    /**
     * Get tantieme.
     *
     * @return int
     */
    public function getTantieme()
    {
        return $this->tantieme;
    }


}
