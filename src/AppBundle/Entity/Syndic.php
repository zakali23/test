<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Syndic
 *
 * @ORM\Table(name="syndic")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SyndicRepository")
 */
class Syndic
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CoPro", inversedBy="gestionnaires",fetch="EAGER")
     *
     */
    private $gestionnaire;

    /**
     * Many associationCoPro have Many Prestataire.
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Prestataire", cascade={"persist"})
     */
    private $Prestataires;

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->nom;
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

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
* Many associationCoPro have Many Prestataire.
* @ORM\OneToMany(targetEntity="AppBundle\Entity\Immeuble",mappedBy="syndic", fetch="EAGER")
*/
    private $immeuble;

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
     * Set nom.
     *
     * @param string|null $nom
     *
     * @return Syndic
     */
    public function setNom($nom = null)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string|null
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set adresse.
     *
     * @param string $adresse
     *
     * @return Syndic
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
     * @return Syndic
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
     * @return Syndic
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
     * Set gestionnaire.
     *
     * @param \AppBundle\Entity\CoPro|null $gestionnaire
     *
     * @return Syndic
     */
    public function setGestionnaire(\AppBundle\Entity\CoPro $gestionnaire = null)
    {
        $this->gestionnaire = $gestionnaire;

        return $this;
    }

    /**
     * Get gestionnaire.
     *
     * @return \AppBundle\Entity\CoPro|null
     */
    public function getGestionnaire()
    {
        return $this->gestionnaire;
    }

    /**
     * Add prestataire.
     *
     * @param \AppBundle\Entity\Prestataire $prestataire
     *
     * @return Syndic
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
     * Add immeuble.
     *
     * @param \AppBundle\Entity\Immeuble $immeuble
     *
     * @return Syndic
     */
    public function addImmeuble(\AppBundle\Entity\Immeuble $immeuble)
    {
        $this->immeuble[] = $immeuble;

        return $this;
    }

    /**
     * Remove immeuble.
     *
     * @param \AppBundle\Entity\Immeuble $immeuble
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeImmeuble(\AppBundle\Entity\Immeuble $immeuble)
    {
        return $this->immeuble->removeElement($immeuble);
    }

    /**
     * Get immeuble.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImmeuble()
    {
        return $this->immeuble;
    }
}
