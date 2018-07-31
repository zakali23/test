<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * infoContact
 *
 * @ORM\Table(name="infoContact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\infoContactRepository")
 */
class infoContact
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
     * @var string|null
     *
     * @ORM\Column(name="nomInfo", type="string", length=255, nullable=true)
     */
    private $nomInfo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenomInfo", type="string", length=255, nullable=true)
     */
    private $prenomInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="emailInfo", type="string", length=255)
     */
    private $emailInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="telephoneInfo", type="string", length=255)
     */
    private $telephoneInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseInfo", type="string", length=255)
     */
    private $adresseInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="messageInfo", type="text")
     */
    private $messageInfo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="notification",type="boolean", nullable=true, options={"default":false})
     */
    private $notification;



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
     * Set nomInfo.
     *
     * @param string|null $nomInfo
     *
     * @return infoContact
     */
    public function setNomInfo($nomInfo = null)
    {
        $this->nomInfo = $nomInfo;

        return $this;
    }

    /**
     * Get nomInfo.
     *
     * @return string|null
     */
    public function getNomInfo()
    {
        return $this->nomInfo;
    }

    /**
     * Set prenomInfo.
     *
     * @param string|null $prenomInfo
     *
     * @return infoContact
     */
    public function setPrenomInfo($prenomInfo = null)
    {
        $this->prenomInfo = $prenomInfo;

        return $this;
    }

    /**
     * Get prenomInfo.
     *
     * @return string|null
     */
    public function getPrenomInfo()
    {
        return $this->prenomInfo;
    }

    /**
     * Set emailInfo.
     *
     * @param string $emailInfo
     *
     * @return infoContact
     */
    public function setEmailInfo($emailInfo)
    {
        $this->emailInfo = $emailInfo;

        return $this;
    }

    /**
     * Get emailInfo.
     *
     * @return string
     */
    public function getEmailInfo()
    {
        return $this->emailInfo;
    }

    /**
     * Set telephoneInfo.
     *
     * @param string $telephoneInfo
     *
     * @return infoContact
     */
    public function setTelephoneInfo($telephoneInfo)
    {
        $this->telephoneInfo = $telephoneInfo;

        return $this;
    }

    /**
     * Get telephoneInfo.
     *
     * @return string
     */
    public function getTelephoneInfo()
    {
        return $this->telephoneInfo;
    }

    /**
     * Set adresseInfo.
     *
     * @param string $adresseInfo
     *
     * @return infoContact
     */
    public function setAdresseInfo($adresseInfo)
    {
        $this->adresseInfo = $adresseInfo;

        return $this;
    }

    /**
     * Get adresseInfo.
     *
     * @return string
     */
    public function getAdresseInfo()
    {
        return $this->adresseInfo;
    }

    /**
     * Set messageInfo.
     *
     * @param string $messageInfo
     *
     * @return infoContact
     */
    public function setMessageInfo($messageInfo)
    {
        $this->messageInfo = $messageInfo;

        return $this;
    }

    /**
     * Get messageInfo.
     *
     * @return string
     */
    public function getMessageInfo()
    {
        return $this->messageInfo;
    }

    /**
     * Set notification.
     *
     * @param string $notification
     *
     * @return infoContact
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * Get notification.
     *
     * @return string
     */
    public function getNotification()
    {
        return $this->notification;
    }
}
