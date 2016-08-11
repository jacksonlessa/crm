<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBundle\Entity\Tarefa
 *
 * @ORM\Entity
 * @ORM\Table(name="tarefas")
 */
class Tarefa
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
    private $title;
    /**
     * @ORM\Column(type="text")
     */
    private $description;
    /**
     * @ORM\Column(type="float")
     */
    private $estimated;
    /**
     * @ORM\Column(type="float", length=100)
     */
    private $realized;
    
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
     * @ORM\ManyToOne(targetEntity="Projeto", inversedBy="tarefas")
     * @ORM\JoinColumn(name="projeto_id", referencedColumnName="id")
     */
    private $projeto;
    

    /**
     * Set projeto
     *
     * @param \AppBundle\Entity\Projeto $projeto
     *
     * @return Tarefa
     */
    public function setProjeto(\AppBundle\Entity\Projeto $projeto = null)
    {
        $this->projeto = $projeto;

        return $this;
    }

    /**
     * Get projeto
     *
     * @return \AppBundle\Entity\Projeto
     */
    public function getProjeto()
    {
        return $this->projeto;
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
     * Set description
     *
     * @param string $description
     *
     * @return Tarefa
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Tarefa
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
     * @return Tarefa
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
     * Set title
     *
     * @param string $title
     *
     * @return Tarefa
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set estimated
     *
     * @param float $estimated
     *
     * @return Tarefa
     */
    public function setEstimated($estimated)
    {
        $this->estimated = $estimated;

        return $this;
    }

    /**
     * Get estimated
     *
     * @return float
     */
    public function getEstimated()
    {
        return $this->estimated;
    }

    /**
     * Set realized
     *
     * @param float $realized
     *
     * @return Tarefa
     */
    public function setRealized($realized)
    {
        $this->realized = $realized;

        return $this;
    }

    /**
     * Get realized
     *
     * @return float
     */
    public function getRealized()
    {
        return $this->realized;
    }
}
