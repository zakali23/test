<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * User
 *
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\CoPro", cascade={"persist"}, fetch="EAGER")
     */
    private $copros;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Syndic", cascade={"persist"}, fetch="EAGER")
     */
    private $syndics;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\associationCoPro", cascade={"persist"},fetch="EAGER")
     */
    private $associationCoPros;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Lot", cascade={"persist"}, fetch="EAGER")
     */
    private $lots;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Role", cascade={"persist"})
     * @ORM\JoinTable(name="role_user")
     *
     */
    private $type_loc_props;





    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

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
     *
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string|null
     *
     *
     */
    protected $email;

    /**
     * @var string|null
     *

     * @ORM\Column(name="`email2`", type="string", length=255, nullable=true)
     */
    protected $email2;

    /**
     * @var string
     * @Assert\Regex(pattern="/^((\+)33|0)[1-9](\d{2}){4}$/")
     * @ORM\Column(name="phone")
     */
    private $phone;

    /**
     * @var string|null
     * @Assert\Regex(pattern="/^((\+)33|0)[1-9](\d{2}){4}$/")
     * @ORM\Column(name="phone2", nullable=true)
     */
    private $phone2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_entree", type="datetime", nullable=true)
     */
    private $dateEntree;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_sortie", type="datetime", nullable=true)
     */
    private $dateSortie;



    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->syndics = new \Doctrine\Common\Collections\ArrayCollection();
        $this->associationCoPros = new \Doctrine\Common\Collections\ArrayCollection();
        $this->lots = new \Doctrine\Common\Collections\ArrayCollection();
        $this->copros = new \Doctrine\Common\Collections\ArrayCollection();


    }


    /**
     * Set firstname.
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname.
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set adresse.
     *
     * @param string $adresse
     *
     * @return User
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
     * @return User
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
     * @return User
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
     * Set email2.
     *
     * @param string|null $email2
     *
     * @return User
     */
    public function setEmail2($email2 = null)
    {
        $this->email2 = $email2;

        return $this;
    }

    /**
     * Get email2.
     *
     * @return string|null
     */
    public function getEmail2()
    {
        return $this->email2;
    }

    /**
     * Set phone.
     *
     * @param int $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone.
     *
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set phone2.
     *
     * @param int|null $phone2
     *
     * @return User
     */
    public function setPhone2($phone2 = null)
    {
        $this->phone2 = $phone2;

        return $this;
    }

    /**
     * Get phone2.
     *
     * @return int|null
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * Set dateEntree.
     *
     * @param \DateTime|null $dateEntree
     *
     * @return User
     */
    public function setDateEntree($dateEntree = null)
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    /**
     * Get dateEntree.
     *
     * @return \DateTime|null
     */
    public function getDateEntree()
    {
        return $this->dateEntree;
    }

    /**
     * Set dateSortie.
     *
     * @param \DateTime|null $dateSortie
     *
     * @return User
     */
    public function setDateSortie($dateSortie = null)
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    /**
     * Get dateSortie.
     *
     * @return \DateTime|null
     */
    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    /**
     * Add copro.
     *
     * @param \AppBundle\Entity\CoPro $copro
     *
     * @return User
     */
    public function addCopro(\AppBundle\Entity\CoPro $copro)
    {
        $this->copros[] = $copro;

        return $this;
    }

    /**
     * Remove copro.
     *
     * @param \AppBundle\Entity\CoPro $copro
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCopro(\AppBundle\Entity\CoPro $copro)
    {
        return $this->copros->removeElement($copro);
    }

    /**
     * Get copros.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCopros()
    {
        return $this->copros;
    }

    /**
     * Add syndic.
     *
     * @param \AppBundle\Entity\Syndic $syndic
     *
     * @return User
     */
    public function addSyndic(\AppBundle\Entity\Syndic $syndic)
    {
        $this->syndics[] = $syndic;

        return $this;
    }

    /**
     * Remove syndic.
     *
     * @param \AppBundle\Entity\Syndic $syndic
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSyndic(\AppBundle\Entity\Syndic $syndic)
    {
        return $this->syndics->removeElement($syndic);
    }

    /**
     * Get syndics.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSyndics()
    {
        return $this->syndics;
    }

    /**
     * Add associationCoPro.
     *
     * @param \AppBundle\Entity\associationCoPro $associationCoPro
     *
     * @return User
     */
    public function addAssociationCoPro(\AppBundle\Entity\associationCoPro $associationCoPro)
    {
        $this->associationCoPros[] = $associationCoPro;

        return $this;
    }

    /**
     * Remove associationCoPro.
     *
     * @param \AppBundle\Entity\associationCoPro $associationCoPro
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAssociationCoPro(\AppBundle\Entity\associationCoPro $associationCoPro)
    {
        return $this->associationCoPros->removeElement($associationCoPro);
    }

    /**
     * Get associationCoPros.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssociationCoPros()
    {
        return $this->associationCoPros;
    }

    /**
     * Add lot.
     *
     * @param \AppBundle\Entity\Lot $lot
     *
     * @return User
     */
    public function addLot(\AppBundle\Entity\Lot $lot)
    {
        $this->lots[] = $lot;

        return $this;
    }

    /**
     * Remove lot.
     *
     * @param \AppBundle\Entity\Lot $lot
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeLot(\AppBundle\Entity\Lot $lot)
    {
        return $this->lots->removeElement($lot);
    }

    /**
     * Get lots.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLots()
    {
        return $this->lots;
    }

    /**
     * Add typeLocProp.
     *
     * @param \AppBundle\Entity\Role $typeLocProp
     *
     * @return User
     */
    public function addTypeLocProp(\AppBundle\Entity\Role $typeLocProp)
    {
        $this->type_loc_props[] = $typeLocProp;

        return $this;
    }

    /**
     * Remove typeLocProp.
     *
     * @param \AppBundle\Entity\Role $typeLocProp
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTypeLocProp(\AppBundle\Entity\Role $typeLocProp)
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
