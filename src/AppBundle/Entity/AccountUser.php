<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccountUser
 * 
 * @ORM\Table(name="tb_pf_account_user")
 * @ORM\Entity
 */
class AccountUser {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     */
    protected $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_account", type="integer", nullable=false)
     * @ORM\Id
     */
    protected $idAccount;

    /**
     * @var datetime 
     * 
     * @ORM\Column(name="dt_access", type="datetime", nullable=true)
     */
    protected $dtAccess;

    /**
     * @var datetime 
     * 
     * @ORM\Column(name="dt_update", type="datetime", nullable=true)
     */
    protected $dtUpdate;

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return AccountUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idAccount
     *
     * @param integer $idAccount
     *
     * @return AccountUser
     */
    public function setIdAccount($idAccount)
    {
        $this->idAccount = $idAccount;

        return $this;
    }

    /**
     * Get idAccount
     *
     * @return integer
     */
    public function getIdAccount()
    {
        return $this->idAccount;
    }

    /**
     * Set dtAccess
     *
     * @param \DateTime $dtAccess
     *
     * @return AccountUser
     */
    public function setDtAccess($dtAccess)
    {
        $this->dtAccess = $dtAccess;

        return $this;
    }

    /**
     * Get dtAccess
     *
     * @return \DateTime
     */
    public function getDtAccess()
    {
        return $this->dtAccess;
    }

    /**
     * Set dtUpdate
     *
     * @param \DateTime $dtUpdate
     *
     * @return AccountUser
     */
    public function setDtUpdate($dtUpdate)
    {
        $this->dtUpdate = $dtUpdate;

        return $this;
    }

    /**
     * Get dtUpdate
     *
     * @return \DateTime
     */
    public function getDtUpdate()
    {
        return $this->dtUpdate;
    }
}
