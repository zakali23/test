<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Erreur
 *
 * @ORM\Table(name="erreur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ErreurRepository")
 */
class Erreur
{

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Compteur", mappedBy="versionCompteur")
     */
    private $versionCompteurs;

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
     * @ORM\Column(name="codeErreur", type="string", length=255)
     */
    private $codeErreur;






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
     * Set codeErreur.
     *
     * @param string $codeErreur
     *
     * @return Erreur
     */
    public function setCodeErreur($codeErreur)
    {
        $this->codeErreur = $codeErreur;

        return $this;
    }

    /**
     * Get codeErreur.
     *
     * @return string
     */
    public function getCodeErreur()
    {
        return $this->codeErreur;
    }



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->versionCompteurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add versionCompteur.
     *
     * @param \AppBundle\Entity\Compteur $versionCompteur
     *
     * @return Erreur
     */
    public function addVersionCompteur(\AppBundle\Entity\Compteur $versionCompteur)
    {
        $this->versionCompteurs[] = $versionCompteur;

        return $this;
    }

    /**
     * Remove versionCompteur.
     *
     * @param \AppBundle\Entity\Compteur $versionCompteur
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVersionCompteur(\AppBundle\Entity\Compteur $versionCompteur)
    {
        return $this->versionCompteurs->removeElement($versionCompteur);
    }

    /**
     * Get versionCompteurs.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVersionCompteurs()
    {
        return $this->versionCompteurs;
    }
}
