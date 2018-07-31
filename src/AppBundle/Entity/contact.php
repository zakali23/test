<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\contactRepository")
 */
class contact
{
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
     * @ORM\Column(name="vous_etes", type="string", length=255)
     */
    private $vousEtes;

    /**
     * @var string
     *
     * @ORM\Column(name="vous_souhaitez", type="string", length=255)
     */
    private $vousSouhaitez;

    /**
     * @var string|null
     *
     * @ORM\Column(name="civiliteContact", type="string", length=20, nullable=true)
     */
    private $civiliteContact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomContact", type="string", length=255, nullable=true)
     */
    private $nomContact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenomContact", type="string", length=255, nullable=true)
     */
    private $prenomContact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emailContact", type="string", length=255, nullable=true)
     */
    private $emailContact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phoneContact", type="string", length=255, nullable=true)
     */
    private $phoneContact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresseContact", type="string", length=255, nullable=true)
     */
    private $adresseContact;

    /**
     * @var string
     *
     * @ORM\Column(name="nomSyndic", type="string", length=255)
     */
    private $nomSyndic;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseSyndic", type="string", length=255)
     */
    private $adresseSyndic;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneSyndic", type="string", length=30)
     */
    private $phoneSyndic;

    /**
     * @var string
     *
     * @ORM\Column(name="emailSyndic", type="string", length=255)
     */
    private $emailSyndic;

    /**
     * @var string
     *
     * @ORM\Column(name="nomResidence", type="string", length=255)
     */
    private $nomResidence;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseResidence", type="string", length=255)
     */
    private $adresseResidence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAG", type="date")
     */
    private $dateAG;

    /**
     * @var string
     *
     * @ORM\Column(name="nblogement", type="string", length=255)
     */
    private $nblogement;

    /**
     * @var string
     *
     * @ORM\Column(name="immeuble", type="string", length=255)
     */
    private $immeuble;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;


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
     * Set vousEtes.
     *
     * @param string $vousEtes
     *
     * @return contact
     */
    public function setVousEtes($vousEtes)
    {
        $this->vousEtes = $vousEtes;

        return $this;
    }

    /**
     * Get vousEtes.
     *
     * @return string
     */
    public function getVousEtes()
    {
        return $this->vousEtes;
    }

    /**
     * Set vousSouhaitez.
     *
     * @param string $vousSouhaitez
     *
     * @return contact
     */
    public function setVousSouhaitez($vousSouhaitez)
    {
        $this->vousSouhaitez = $vousSouhaitez;

        return $this;
    }

    /**
     * Get vousSouhaitez.
     *
     * @return string
     */
    public function getVousSouhaitez()
    {
        return $this->vousSouhaitez;
    }

    /**
     * Set civiliteContact.
     *
     * @param string|null $civiliteContact
     *
     * @return contact
     */
    public function setCiviliteContact($civiliteContact = null)
    {
        $this->civiliteContact = $civiliteContact;

        return $this;
    }

    /**
     * Get civiliteContact.
     *
     * @return string|null
     */
    public function getCiviliteContact()
    {
        return $this->civiliteContact;
    }

    /**
     * Set nomContact.
     *
     * @param string|null $nomContact
     *
     * @return contact
     */
    public function setNomContact($nomContact = null)
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    /**
     * Get nomContact.
     *
     * @return string|null
     */
    public function getNomContact()
    {
        return $this->nomContact;
    }

    /**
     * Set prenomContact.
     *
     * @param string|null $prenomContact
     *
     * @return contact
     */
    public function setPrenomContact($prenomContact = null)
    {
        $this->prenomContact = $prenomContact;

        return $this;
    }

    /**
     * Get prenomContact.
     *
     * @return string|null
     */
    public function getPrenomContact()
    {
        return $this->prenomContact;
    }

    /**
     * Set emailContact.
     *
     * @param string|null $emailContact
     *
     * @return contact
     */
    public function setEmailContact($emailContact = null)
    {
        $this->emailContact = $emailContact;

        return $this;
    }

    /**
     * Get emailContact.
     *
     * @return string|null
     */
    public function getEmailContact()
    {
        return $this->emailContact;
    }

    /**
     * Set phoneContact.
     *
     * @param string|null $phoneContact
     *
     * @return contact
     */
    public function setPhoneContact($phoneContact = null)
    {
        $this->phoneContact = $phoneContact;

        return $this;
    }

    /**
     * Get phoneContact.
     *
     * @return string|null
     */
    public function getPhoneContact()
    {
        return $this->phoneContact;
    }

    /**
     * Set adresseContact.
     *
     * @param string|null $adresseContact
     *
     * @return contact
     */
    public function setAdresseContact($adresseContact = null)
    {
        $this->adresseContact = $adresseContact;

        return $this;
    }

    /**
     * Get adresseContact.
     *
     * @return string|null
     */
    public function getAdresseContact()
    {
        return $this->adresseContact;
    }

    /**
     * Set nomSyndic.
     *
     * @param string $nomSyndic
     *
     * @return contact
     */
    public function setNomSyndic($nomSyndic)
    {
        $this->nomSyndic = $nomSyndic;

        return $this;
    }

    /**
     * Get nomSyndic.
     *
     * @return string
     */
    public function getNomSyndic()
    {
        return $this->nomSyndic;
    }

    /**
     * Set adresseSyndic.
     *
     * @param string $adresseSyndic
     *
     * @return contact
     */
    public function setAdresseSyndic($adresseSyndic)
    {
        $this->adresseSyndic = $adresseSyndic;

        return $this;
    }

    /**
     * Get adresseSyndic.
     *
     * @return string
     */
    public function getAdresseSyndic()
    {
        return $this->adresseSyndic;
    }

    /**
     * Set phoneSyndic.
     *
     * @param string $phoneSyndic
     *
     * @return contact
     */
    public function setPhoneSyndic($phoneSyndic)
    {
        $this->phoneSyndic = $phoneSyndic;

        return $this;
    }

    /**
     * Get phoneSyndic.
     *
     * @return string
     */
    public function getPhoneSyndic()
    {
        return $this->phoneSyndic;
    }

    /**
     * Set emailSyndic.
     *
     * @param string $emailSyndic
     *
     * @return contact
     */
    public function setEmailSyndic($emailSyndic)
    {
        $this->emailSyndic = $emailSyndic;

        return $this;
    }

    /**
     * Get emailSyndic.
     *
     * @return string
     */
    public function getEmailSyndic()
    {
        return $this->emailSyndic;
    }

    /**
     * Set nomResidence.
     *
     * @param string $nomResidence
     *
     * @return contact
     */
    public function setNomResidence($nomResidence)
    {
        $this->nomResidence = $nomResidence;

        return $this;
    }

    /**
     * Get nomResidence.
     *
     * @return string
     */
    public function getNomResidence()
    {
        return $this->nomResidence;
    }

    /**
     * Set adresseResidence.
     *
     * @param string $adresseResidence
     *
     * @return contact
     */
    public function setAdresseResidence($adresseResidence)
    {
        $this->adresseResidence = $adresseResidence;

        return $this;
    }

    /**
     * Get adresseResidence.
     *
     * @return string
     */
    public function getAdresseResidence()
    {
        return $this->adresseResidence;
    }

    /**
     * Set dateAG.
     *
     * @param \DateTime $dateAG
     *
     * @return contact
     */
    public function setDateAG($dateAG)
    {
        $this->dateAG = $dateAG;

        return $this;
    }

    /**
     * Get dateAG.
     *
     * @return \DateTime
     */
    public function getDateAG()
    {
        return $this->dateAG;
    }

    /**
     * Set nblogement.
     *
     * @param string $nblogement
     *
     * @return contact
     */
    public function setNblogement($nblogement)
    {
        $this->nblogement = $nblogement;

        return $this;
    }

    /**
     * Get nblogement.
     *
     * @return string
     */
    public function getNblogement()
    {
        return $this->nblogement;
    }

    /**
     * Set immeuble.
     *
     * @param string $immeuble
     *
     * @return contact
     */
    public function setImmeuble($immeuble)
    {
        $this->immeuble = $immeuble;

        return $this;
    }

    /**
     * Get immeuble.
     *
     * @return string
     */
    public function getImmeuble()
    {
        return $this->immeuble;
    }

    /**
     * Set message.
     *
     * @param string $message
     *
     * @return contact
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
