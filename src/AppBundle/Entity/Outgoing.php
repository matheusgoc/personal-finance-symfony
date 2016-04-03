<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Outgoing
 *
 * @ORM\Table(name="tb_pf_outgoing", indexes={@ORM\Index(name="ix_pf_outgoing_category", columns={"id_category"}), @ORM\Index(name="ix_pf_outgoing_account", columns={"id_account"})})
 * @ORM\Entity
 */
class Outgoing
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_outgoing", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOutgoing;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float", precision=4, scale=2, nullable=false)
     */
    private $value;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_account", type="integer", nullable=false)
     */
    private $idAccount;

    /**
     * @var \TbPfCategory
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category", referencedColumnName="id_category")
     * })
     */
    private $idCategory;


    /**
     * Alias for getIdOutgoing
     * 
     * @see self::getIdOutgoing
     * @return integer
     */
    public function getId()
    {
        return $this->getIdOutgoing();
    }

    /**
     * Get idOutgoing
     *
     * @return integer
     */
    public function getIdOutgoing()
    {
        return $this->idOutgoing;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Outgoing
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set value
     *
     * @param float $value
     *
     * @return Outgoing
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Outgoing
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Outgoing
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set idAccount
     *
     * @param integer $idAccount
     *
     * @return Outgoing
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
     * Set idCategory
     *
     * @param \AppBundle\Entity\TbPfCategory $idCategory
     *
     * @return Outgoing
     */
    public function setIdCategory(\AppBundle\Entity\TbPfCategory $idCategory = null)
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    /**
     * Get idCategory
     *
     * @return \AppBundle\Entity\TbPfCategory
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }
}
