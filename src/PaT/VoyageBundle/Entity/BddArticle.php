<?php

namespace PaT\VoyageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * bddarticle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PaT\VoyageBundle\Entity\bddarticleRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class bddarticle
{
    /**
     *@ORM\prePersist
     */
    public function increase()
    {
        $nbrArticle = $this->getbddvoyage()->getNbrArticle();
        $this->getBddVoyage()->setNbrArticle($nbrArticle+1);
    }

    /**
     *@ORM\preRemove
     */
    public function decrease()
    {
        $nbrArticle = $this->getBddVoyage()->getNbrArticle();
        $this->getBddVoyage()->setNbrArticle($nbrArticle-1);
    }

    /**
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var boolean
     *
     * @ORM\Column(name="publication", type="boolean")
     */
    private $publication;

    /**
     * @var integer
     *
     * @ORM\Column(name="iduser", type="integer")
     */
    private $iduser;

    /**
     * @var integer
     *
     * @ORM\Column(name="idvoyage", type="integer")
     */
    private $idvoyage;

    /**
     * @var integer
     *
     * @ORM\Column(name="likecount", type="integer")
     */
    private $likecount;


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
     * Set titre
     *
     * @param string $titre
     * @return bddarticle
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
     * Set contenu
     *
     * @param string $contenu
     * @return bddarticle
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set publication
     *
     * @param boolean $publication
     * @return bddarticle
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return boolean 
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set iduser
     *
     * @param integer $iduser
     * @return bddarticle
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return integer 
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set idvoyage
     *
     * @param integer $idvoyage
     * @return bddarticle
     */
    public function setIdvoyage($idvoyage)
    {
        $this->idvoyage = $idvoyage;

        return $this;
    }

    /**
     * Get idvoyage
     *
     * @return integer 
     */
    public function getIdvoyage()
    {
        return $this->idvoyage;
    }

    /**
     * Set likecount
     *
     * @param integer $likecount
     * @return bddarticle
     */
    public function setLikecount($likecount)
    {
        $this->likecount = $likecount;

        return $this;
    }

    /**
     * Get likecount
     *
     * @return integer 
     */
    public function getLikecount()
    {
        return $this->likecount;
    }
}
