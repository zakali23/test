<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Immeuble
 *@Vich\Uploadable
 * @ORM\Table(name="immeuble")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImmeubleRepository")
 */
class Immeuble
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CoPro", inversedBy="batiments",fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $batiment;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Lot", mappedBy="appartement", fetch="EAGER")
     */
    private $appartements;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Bridget", mappedBy="borne")
     */
    private $bornes;

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->adresse ." ". $this->codePostal ." ". $this->ville;
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
     * @ORM\Column(name="adresse", type="text")
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="codePostal", type="integer")
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;



/**
*
* @Vich\UploadableField(mapping="immeuble_image" ,fileNameProperty="plan",)
*
* @var File
*/
    protected $planFile;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    protected $plan;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=false)
     */
    private $reference;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Syndic", inversedBy="immeuble", fetch="EAGER")
     *
     */
    private $syndic;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->appartements = new \Doctrine\Common\Collections\ArrayCollection();
        $this->bornes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set adresse.
     *
     * @param string $adresse
     *
     * @return Immeuble
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse.
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostal.
     *
     * @param int $codePostal
     *
     * @return Immeuble
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal.
     *
     * @return int
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville.
     *
     * @param string $ville
     *
     * @return Immeuble
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville.
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set plan.
     *
     * @param string|null $plan
     *
     * @return Immeuble
     */
    public function setPlan($plan = null)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan.
     *
     * @return string|null
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Set batiment.
     *
     * @param \AppBundle\Entity\CoPro $batiment
     *
     * @return Immeuble
     */
    public function setBatiment(\AppBundle\Entity\CoPro $batiment)
    {
        $this->batiment = $batiment;

        return $this;
    }

    /**
     * Get batiment.
     *
     * @return \AppBundle\Entity\CoPro
     */
    public function getBatiment()
    {
        return $this->batiment;
    }

    /**
     * Add appartement.
     *
     * @param \AppBundle\Entity\Lot $appartement
     *
     * @return Immeuble
     */
    public function addAppartement(\AppBundle\Entity\Lot $appartement)
    {
        $this->appartements[] = $appartement;

        return $this;
    }

    /**
     * Remove appartement.
     *
     * @param \AppBundle\Entity\Lot $appartement
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAppartement(\AppBundle\Entity\Lot $appartement)
    {
        return $this->appartements->removeElement($appartement);
    }

    /**
     * Get appartements.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAppartements()
    {
        return $this->appartements;
    }

    /**
     * Add borne.
     *
     * @param \AppBundle\Entity\Bridget $borne
     *
     * @return Immeuble
     */
    public function addBorne(\AppBundle\Entity\Bridget $borne)
    {
        $this->bornes[] = $borne;

        return $this;
    }

    /**
     * Remove borne.
     *
     * @param \AppBundle\Entity\Bridget $borne
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeBorne(\AppBundle\Entity\Bridget $borne)
    {
        return $this->bornes->removeElement($borne);
    }

    /**
     * Get bornes.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBornes()
    {
        return $this->bornes;
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
     * @return File
     */
    public function getPlanFile()
    {
        return $this->planFile;
    }

    /**
     * @param File $planFile
     */
    public function setPlanFile($planFile)
    {
        $this->planFile = $planFile;
    }

    /**
     * Set syndic.
     *
     * @param \AppBundle\Entity\Syndic|null $syndic
     *
     * @return Immeuble
     */
    public function setSyndic(\AppBundle\Entity\Syndic $syndic = null)
    {
        $this->syndic = $syndic;

        return $this;
    }

    /**
     * Get syndic.
     *
     * @return \AppBundle\Entity\Syndic|null
     */
    public function getSyndic()
    {
        return $this->syndic;
    }
}
