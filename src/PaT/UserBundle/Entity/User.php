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

  /*
   * @ORM\Column(type="string", length=255)
   * @Assert\NotBlank(message="Please enter your country.", groups={"Registration", "Profile"})
   */
  private $country;

  /**
   * @ORM\Column(type="date", nullable=true)
   */
  private $birthdate;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $status;

  /**
   * @ORM\Column(type="text", nullable=true)
   */
  private $visitedcountries;

  /**
   * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true) 
   */
  protected $facebook_id;
 
  /**
   * @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true)
   */
  protected $facebook_access_token;

  /*
   * @ORM\Column(name="google_id", type="string", length=255, nullable=true) 
   */
  protected $google_id;

  /*
   * @ORM\Column(name="google_access_token", type="string", length=255, nullable=true) 
   */
  protected $google_access_token;



  /**
   * @ORM\Column(name="profile_picture", type="integer", nullable=true)
   */
  protected $profile_picture;

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

  public function setFacebookAccessToken($facebook_access_token)
  {
    $this->facebook_access_token = $facebook_access_token;
    return $this;
  }

  public function getFacebookAccessToken()
  {
    return $this->facebook_access_token;
  }

  public function setGoogleAccessToken($google_access_token)
  {
    $this->google_access_token = $google_access_token;
    return $this;
  }

  public function getGoogleAccessToken()
  {
    return $this->google_access_token;
  }

  public function setFacebookId($facebook_id)
  {
    $this->facebook_id = $facebook_id;
    return $this;
  }

  public function getFacebookId()
  {
    return $this->facebook_id;
  }

  public function setGoogleId($google_id)
  {
    $this->google_id = $google_id;
    return $this;
  }

  public function getGoogleId()
  {
    return $this->google_id;
  }

  public function getProfilePicture()
  {
    return $this->profile_picture;
  }

  public function setProfilePicture($profile_picture)
  {
    $this->profile_picture = $profile_picture;
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