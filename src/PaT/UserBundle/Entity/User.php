<?php
// src/PaT/UserBundle/Entity/User.php

namespace PaT\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your country.", groups={"Registration", "Profile"})
     */
  private $country;

  /**
     * @ORM\Column(type="date", nullable=true)
     *
     * 
     */
  private $birthdate;

  /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * 
     */
  private $status;

  /**
     * @ORM\Column(type="text", nullable=true)
     *
     * 
     */
  private $visitedcountries;

  /**
     * @var string
     *
     * @ORM\Column(name="github_id", type="string", nullable=true)
     */
  private $githubID;

  /**
     * @var string
     *
     * @ORM\Column(name="facebook_id", type="string", nullable=true)
     */
  private $facebookID;

  /**
     * @var string
     *
     * @ORM\Column(name="google_id", type="string", nullable=true)
     */
  private $googleID;

  public function setCountry($country)
  {
    $this->country = $country;
    return $this;
  }

  public function getCountry()
  {
    return $this->country;
  }

  public function setBirthdate($birthdate)
  {
    $this->birthdate = $birthdate;
    return $this;
  }

  public function getBirthdate()
  {
    return $this->birthdate;
  }

  public function setStatus($status)
  {
    $this->status = $status;
    return $this;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setVisitedcountries($visitedcountries)
  {
    $this->visitedcountries = $visitedcountries;
    return $this;
  }

  public function getVisitedcountries()
  {
    return $this->visitedcountries;
  }

  public function setGithubID($githubID)
  {
    $this->githubID = $githubID;
    return $this;
  }

  public function getGithubID()
  {
    return $this->githubID;
  }

  public function setFacebookID($facebookID)
  {
    $this->facebookID = $facebookID;
    return $this;
  }

  public function getFacebookID()
  {
    return $this->facebookID;
  }

  public function setGoogleID($googleID)
  {
    $this->googleID = $googleID;
    return $this;
  }

  public function getGoogleID()
  {
    return $this->googleID;
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

  public function __construct()
  {
      parent::__construct();
      // your own logic
  }

}