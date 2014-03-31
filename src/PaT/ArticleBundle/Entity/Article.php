<?php

namespace PaT\ArticleBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use PaT\ArticleBundle\Entity\Article;
use PaT\ArticleBundle\Form\ArticleType;


/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PaT\ArticleBundle\Entity\ArticleRepository")
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=2000)
     */
    private $poste;

    /**
     * @ORM\ManyToOne(targetEntity="PaT\VoyageBundle\Entity\Travel")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id", onDelete="CASCADE")
     */
    private $travel;

    public function __construct()
    {
        $this->date = new \DateTime("now");
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
     * Set date
     *
     * @param \DateTime $date
     * @return Article
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
     * Set title
     *
     * @param string $title
     * @return Article
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
     * Set poste
     *
     * @param string $poste
     * @return Article
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return string 
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * Set travel
     *
     * @param \PaT\VoyageBundle\Entity\Travel $travel
     * @return travel_id
     */
    public function setTravel(\PaT\VoyageBundle\Entity\Travel $travel)
    {
        $this->travel = $travel;

        return $this;
    }

    /**
     * Get travel
     *
     * @return \PaT\VoyageBundle\Entity\Travel
     */
    public function getTravel()
    {
        return $this->travel;
    }
}
