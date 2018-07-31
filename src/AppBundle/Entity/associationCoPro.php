<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * associationCoPro
 *
 * @ORM\Table(name="association_co_pro")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\associationCoProRepository")
 */
class associationCoPro
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CoPro", inversedBy="assoCopro")
     *
     */
    private $coproprietes;

    /**
     * Many associationCoPro have Many Prestataire.
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Prestataire", cascade={"persist"})
     */
    private $Prestataires;


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
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
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
     * @Assert\Regex(pattern="/^[0-9]{5,5}$/")
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
        $this->Prestataires = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param string|null $name
     *
     * @return associationCoPro
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set coproprietes.
     *
     * @param \AppBundle\Entity\CoPro|null $coproprietes
     *
     * @return associationCoPro
     */
    public function setCoproprietes(\AppBundle\Entity\CoPro $coproprietes = null)
    {
        $this->coproprietes = $coproprietes;

        return $this;
    }

    /**
     * Get coproprietes.
     *
     * @return \AppBundle\Entity\CoPro|null
     */
    public function getCoproprietes()
    {
        return $this->coproprietes;
    }

    /**
     * Add prestataire.
     *
     * @param \AppBundle\Entity\Prestataire $prestataire
     *
     * @return associationCoPro
     */
    public function addPrestataire(\AppBundle\Entity\Prestataire $prestataire)
    {
        $this->Prestataires[] = $prestataire;

        return $this;
    }

    /**
     * Remove prestataire.
     *
     * @param \AppBundle\Entity\Prestataire $prestataire
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePrestataire(\AppBundle\Entity\Prestataire $prestataire)
    {
        return $this->Prestataires->removeElement($prestataire);
    }

    /**
     * Get prestataires.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrestataires()
    {
        return $this->Prestataires;
    }

    /**
     * Set adresse.
     *
     * @param string $adresse
     *
     * @return associationCoPro
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
     * @return associationCoPro
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
     * @return associationCoPro
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
}
