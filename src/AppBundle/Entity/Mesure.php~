<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mesure
 *
 * @ORM\Table(name="mesure")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MesureRepository")
 */
class Mesure
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Compteur", inversedBy="releves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $releve;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


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
     * Set releve.
     *
     * @param \AppBundle\Entity\Compteur $releve
     *
     * @return Mesure
     */
    public function setReleve(\AppBundle\Entity\Compteur $releve)
    {
        $this->releve = $releve;

        return $this;
    }

    /**
     * Get releve.
     *
     * @return \AppBundle\Entity\Compteur
     */
    public function getReleve()
    {
        return $this->releve;
    }
}
