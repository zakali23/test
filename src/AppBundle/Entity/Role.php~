<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoleRepository")
 */
class Role
{





    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this ->nom;
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
     * @ORM\Column(name="nom", type="text")
     */
    private $nom;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->type_loc_props = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param string $nom
     *
     * @return Role
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
     * Add typeLocProp.
     *
     * @param \AppBundle\Entity\User $typeLocProp
     *
     * @return Role
     */
    public function addTypeLocProp(\AppBundle\Entity\User $typeLocProp)
    {
        $this->type_loc_props[] = $typeLocProp;

        return $this;
    }

    /**
     * Remove typeLocProp.
     *
     * @param \AppBundle\Entity\User $typeLocProp
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTypeLocProp(\AppBundle\Entity\User $typeLocProp)
    {
        return $this->type_loc_props->removeElement($typeLocProp);
    }

    /**
     * Get typeLocProps.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTypeLocProps()
    {
        return $this->type_loc_props;
    }
}
