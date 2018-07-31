<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bridget
 *
 * @ORM\Table(name="bridget")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BridgetRepository")
 */
class Bridget
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Immeuble", inversedBy="bornes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $borne;

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
     * @var \DateTime
     *
     * @ORM\Column(name="dateInstallation", type="datetime")
     */
    private $dateInstallation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAchat", type="datetime")
     */
    private $dateAchat;


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
     * @return Bridget
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
     * Set dateInstallation.
     *
     * @param \DateTime $dateInstallation
     *
     * @return Bridget
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
     * @return Bridget
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
     * Set borne.
     *
     * @param \AppBundle\Entity\Immeuble $borne
     *
     * @return Bridget
     */
    public function setBorne(\AppBundle\Entity\Immeuble $borne)
    {
        $this->borne = $borne;

        return $this;
    }

    /**
     * Get borne.
     *
     * @return \AppBundle\Entity\Immeuble
     */
    public function getBorne()
    {
        return $this->borne;
    }
}
