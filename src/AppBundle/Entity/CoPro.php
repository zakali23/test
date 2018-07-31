<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoPro
 *
 * @ORM\Table(name="co_pro")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CoProRepository")
 */
class CoPro
{
    /**
     *

     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Syndic", mappedBy="gestionnaire", fetch="EAGER")

     * @ORM\JoinColumn(nullable=true)
     */
    private $gestionnaires;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\associationCoPro", mappedBy="coproprietes", fetch="EAGER")
     * @ORM\JoinColumn(nullable=true)
     */
    private $assoCopro;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Immeuble", mappedBy="batiment", fetch="EAGER")
     */
    private $batiments;


    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->name;
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

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
     * Constructor
     */
    public function __construct()
    {
        $this->gestionnaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->assoCopro = new \Doctrine\Common\Collections\ArrayCollection();
        $this->batiments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name.
     *
     * @param string $name
     *
     * @return CoPro
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set adresse.
     *
     * @param string $adresse
     *
     * @return CoPro
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
     * @return CoPro
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
     * @return CoPro
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
     * Add gestionnaire.
     *
     * @param \AppBundle\Entity\Syndic $gestionnaire
     *
     * @return CoPro
     */
    public function addGestionnaire(\AppBundle\Entity\Syndic $gestionnaire)
    {
        $this->gestionnaires[] = $gestionnaire;

        return $this;
    }

    /**
     * Remove gestionnaire.
     *
     * @param \AppBundle\Entity\Syndic $gestionnaire
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeGestionnaire(\AppBundle\Entity\Syndic $gestionnaire)
    {
        return $this->gestionnaires->removeElement($gestionnaire);
    }

    /**
     * Get gestionnaires.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGestionnaires()
    {
        return $this->gestionnaires;
    }

    /**
     * Add assoCopro.
     *
     * @param \AppBundle\Entity\CoPro $assoCopro
     *
     * @return CoPro
     */
    public function addAssoCopro(\AppBundle\Entity\CoPro $assoCopro)
    {
        $this->assoCopro[] = $assoCopro;

        return $this;
    }

    /**
     * Remove assoCopro.
     *
     * @param \AppBundle\Entity\CoPro $assoCopro
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAssoCopro(\AppBundle\Entity\CoPro $assoCopro)
    {
        return $this->assoCopro->removeElement($assoCopro);
    }

    /**
     * Get assoCopro.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssoCopro()
    {
        return $this->assoCopro;
    }

    /**
     * Add batiment.
     *
     * @param \AppBundle\Entity\Immeuble $batiment
     *
     * @return CoPro
     */
    public function addBatiment(\AppBundle\Entity\Immeuble $batiment)
    {
        $this->batiments[] = $batiment;

        return $this;
    }

    /**
     * Remove batiment.
     *
     * @param \AppBundle\Entity\Immeuble $batiment
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeBatiment(\AppBundle\Entity\Immeuble $batiment)
    {
        return $this->batiments->removeElement($batiment);
    }

    /**
     * Get batiments.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBatiments()
    {
        return $this->batiments;
    }
}
