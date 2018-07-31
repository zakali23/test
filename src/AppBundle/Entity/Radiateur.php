<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Radiateur
 *
 * @ORM\Table(name="radiateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RadiateurRepository")
 */
class Radiateur
{
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Compteur", cascade={"persist"})
     */
    private $calorimetre;
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
     * @ORM\Column(name="type", type="string")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="profondeur", type="string")
     */
    private $profondeur;


    /**
     * @var string
     *
     * @ORM\Column(name="modele", type="string")
     */
    private $modele;

    /**
     * @var int
     *
     * @ORM\Column(name="hauteur", type="integer")
     */
    private $hauteur;


    /**
     * @var int
     *
     * @ORM\Column(name="longueur", type="integer")
     */
    private $longueur;

    /**
     * @var int
     *
     * @ORM\Column(name="regimeDimension", type="integer")
     */
    private $regimeDimension;/**
     * @var int
     *
     * @ORM\Column(name="puissance_delta_t50", type="integer")
     */
    private $puissanceDeltaT50;



    /**
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->modele;
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
     * Set hauteur.
     *
     * @param int $hauteur
     *
     * @return Radiateur
     */
    public function setHauteur($hauteur)
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    /**
     * Get hauteur.
     *
     * @return int
     */
    public function getHauteur()
    {
        return $this->hauteur;
    }

    /**
     * Set longueur.
     *
     * @param int $longueur
     *
     * @return Radiateur
     */
    public function setLongueur($longueur)
    {
        $this->longueur = $longueur;

        return $this;
    }

    /**
     * Get longueur.
     *
     * @return int
     */
    public function getLongueur()
    {
        return $this->longueur;
    }


    /**
     * Set puissanceDeltaT50.
     *
     * @param int $puissanceDeltaT50
     *
     * @return Radiateur
     */
    public function setPuissanceDeltaT50($puissanceDeltaT50)
    {
        $this->puissanceDeltaT50 = $puissanceDeltaT50;

        return $this;
    }

    /**
     * Get puissanceDeltaT50.
     *
     * @return int
     */
    public function getPuissanceDeltaT50()
    {
        return $this->puissanceDeltaT50;
    }

    /**
     * Get modele.
     *
     * @return string
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * Set type.
     *
     * @param string $modele
     * @return void
     */
    public function setModele(string $modele)
    {
        $this->modele = $modele;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setNom(string $type)
    {
        $this->type = $type;
    }

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return Radiateur
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set profondeur.
     *
     * @param string $profondeur
     *
     * @return Radiateur
     */
    public function setProfondeur($profondeur)
    {
        $this->profondeur = $profondeur;

        return $this;
    }

    /**
     * Get profondeur.
     *
     * @return string
     */
    public function getProfondeur()
    {
        return $this->profondeur;
    }

    /**
     * Set regimeDimension.
     *
     * @param int $regimeDimension
     *
     * @return Radiateur
     */
    public function setRegimeDimension($regimeDimension)
    {
        $this->regimeDimension = $regimeDimension;

        return $this;
    }

    /**
     * Get regimeDimension.
     *
     * @return int
     */
    public function getRegimeDimension()
    {
        return $this->regimeDimension;
    }


    /**
     * Set calorimetre.
     *
     * @param \AppBundle\Entity\Compteur|null $calorimetre
     *
     * @return Radiateur
     */
    public function setCalorimetre(\AppBundle\Entity\Compteur $calorimetre = null)
    {
        $this->calorimetre = $calorimetre;

        return $this;
    }

    /**
     * Get calorimetre.
     *
     * @return \AppBundle\Entity\Compteur|null
     */
    public function getCalorimetre()
    {
        return $this->calorimetre;
    }
}
