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

  public function setCountry($country)
  {
    $this->country = $country;
    return $this;
  }

  public function getCountry()
  {
    return $this->country;
  }

}