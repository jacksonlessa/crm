<?php
/**
 * 
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBundle\Entity\Cliente
 *
 * @ORM\Entity
 * @ORM\Table(name="clientes")
 */
class Cliente
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;
    /**
     * @ORM\Column(type="string", length=20)
     */
    private $telefone;
    
    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(type="datetime", name="created_at")
     */
    private $createdAt;
    
    /**
     * @var datetime $updatedAt
     *
     * @ORM\Column(type="datetime", name="updated_at")
     */
    private $updatedAt;
    
    /**
     * @ORM\OneToMany(targetEntity="Orcamento", mappedBy="cliente", fetch="EAGER")
     */
    private $orcamentos;
    
    /**
     * @ORM\OneToMany(targetEntity="Projeto", mappedBy="cliente", fetch="EAGER")
     */
    private $projetos;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orcamentos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projetos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add orcamento
     *
     * @param \AppBundle\Entity\Orcamento $orcamento
     *
     * @return Cliente
     */
    public function addOrcamento(\AppBundle\Entity\Orcamento $orcamento)
    {
        $this->orcamentos[] = $orcamento;

        return $this;
    }

    /**
     * Remove orcamento
     *
     * @param \AppBundle\Entity\Orcamento $orcamento
     */
    public function removeOrcamento(\AppBundle\Entity\Orcamento $orcamento)
    {
        $this->orcamentos->removeElement($orcamento);
    }

    /**
     * Get orcamentos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrcamentos()
    {
        return $this->orcamentos;
    }

    /**
     * Add projeto
     *
     * @param \AppBundle\Entity\Projeto $projeto
     *
     * @return Cliente
     */
    public function addProjeto(\AppBundle\Entity\Projeto $projeto)
    {
        $this->projetos[] = $projeto;

        return $this;
    }

    /**
     * Remove projeto
     *
     * @param \AppBundle\Entity\Projeto $projeto
     */
    public function removeProjeto(\AppBundle\Entity\Projeto $projeto)
    {
        $this->projetos->removeElement($projeto);
    }

    /**
     * Get projetos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjetos()
    {
        return $this->projetos;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Cliente
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Cliente
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Cliente
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Cliente
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Cliente
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }
    
    public function __toString()
    {
        return $this->getName();    
    }
}
