<?php

namespace PaT\VoyageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BddVoyage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PaT\VoyageBundle\Entity\BddVoyageRepository")
 */
class BddVoyage
{
    /**
     * @ORM\ManyToOne(targetEntity="PaT\VoyageBundle\Entity\bddarticle")
     * @ORM\OneToOne(targetEntity="PaT\VoyageBundle\Entity\BddImage", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     *
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=500)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var integer
     *
     * @ORM\Column(name="Duree", type="integer")
     */
    private $duree;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_user", type="integer")
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="Likecount", type="integer")
     */
    private $likeCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="Budget", type="integer")
     */
    private $budget;

    /**
     * @var date
     *
     * @ORM\Column(name="datedebut", type="date")
     */
    private $date_debut;

    /**
     * @var date
     *
     * @ORM\Column(name="datefin", type="date")
     */
    private $date_fin;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrarticle", type="integer")
     */
    private $nbr_article;


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
     * Set Titre
     *
     * @param string $titre
     * @return BddVoyage
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return BddVoyage
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
     * Set lieu
     *
     * @param string $lieu
     * @return BddVoyage
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     * @return BddVoyage
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     * @return BddVoyage
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
     * Set likeCount
     *
     * @param integer $likeCount
     * @return BddVoyage
     */
    public function setLikeCount($likeCount)
    {
        $this->likeCount = $likeCount;

        return $this;
    }

    /**
     * Get likeCount
     *
     * @return integer 
     */
    public function getLikeCount()
    {
        return $this->likeCount;
    }

    /**
     * Set budget
     *
     * @param integer $budget
     * @return BddVoyage
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return integer 
     */
    public function getBudget()
    {
        return $this->budget;
    }


    /**
     * Set date_debut
     *
     * @param \DateTime $dateDebut
     * @return BddVoyage
     */
    public function setDateDebut($dateDebut)
    {
        $this->date_debut = $dateDebut;

        return $this;
    }

    /**
     * Get date_debut
     *
     * @return \DateTime 
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * Set date_fin
     *
     * @param \DateTime $dateFin
     * @return BddVoyage
     */
    public function setDateFin($dateFin)
    {
        $this->date_fin = $dateFin;

        return $this;
    }

    /**
     * Get date_fin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * Set nbr_article
     *
     * @param \DateTime $nbrArticle
     * @return BddVoyage
     */
    public function setNbrArticle($nbrArticle)
    {
        $this->nbr_article = $nbrArticle;

        return $this;
    }

    /**
     * Get nbr_article
     *
     * @return \DateTime 
     */
    public function getNbrArticle()
    {
        return $this->nbr_article;
    }




}
