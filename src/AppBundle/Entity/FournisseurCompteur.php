<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FournisseurCompteur
 *
 * @ORM\Table(name="fournisseur_compteur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FournisseurCompteurRepository")
 */
class FournisseurCompteur
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Compteur", mappedBy="marque")
     */
    private $marques;

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
     * @return FournisseurCompteur
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
     * Set adresse.
     *
     * @param string $adresse
     *
     * @return FournisseurCompteur
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
     * @return FournisseurCompteur
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
     * @return FournisseurCompteur
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
     * Constructor
     */
    public function __construct()
    {
        $this->marques = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add marque.
     *
     * @param \AppBundle\Entity\Compteur $marque
     *
     * @return FournisseurCompteur
     */
    public function addMarque(\AppBundle\Entity\Compteur $marque)
    {
        $this->marques[] = $marque;

        return $this;
    }

    /**
     * Remove marque.
     *
     * @param \AppBundle\Entity\Compteur $marque
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMarque(\AppBundle\Entity\Compteur $marque)
    {
        return $this->marques->removeElement($marque);
    }

    /**
     * Get marques.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMarques()
    {
        return $this->marques;
    }
}
