<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeCompteur
 *
 * @ORM\Table(name="type_compteur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeCompteurRepository")
 */
class TypeCompteur
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Compteur", mappedBy="categorieCompteur")
     */
    private $categorieCompteurs;

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
     * @return TypeCompteur
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
     * Constructor
     */
    public function __construct()
    {
        $this->categorieCompteurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add categorieCompteur.
     *
     * @param \AppBundle\Entity\Compteur $categorieCompteur
     *
     * @return TypeCompteur
     */
    public function addCategorieCompteur(\AppBundle\Entity\Compteur $categorieCompteur)
    {
        $this->categorieCompteurs[] = $categorieCompteur;

        return $this;
    }

    /**
     * Remove categorieCompteur.
     *
     * @param \AppBundle\Entity\Compteur $categorieCompteur
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCategorieCompteur(\AppBundle\Entity\Compteur $categorieCompteur)
    {
        return $this->categorieCompteurs->removeElement($categorieCompteur);
    }

    /**
     * Get categorieCompteurs.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorieCompteurs()
    {
        return $this->categorieCompteurs;
    }
}
