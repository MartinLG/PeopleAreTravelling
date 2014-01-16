<?php
// src/PaT/UserBundle/DataFixtures/ORM/Users.php

namespace PaT\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PaT\UserBundle\Entity\User;

class Users implements FixtureInterface
{
  public function load(ObjectManager $manager)
  {
    // Les noms d'utilisateurs à créer
    $noms = array('Martinovic', 'Narkolapin', 'Lurthz', 'Krbon');
    $emails = array('martin.leguillou@y-nov.com', 'adrien.marty@y-nov.com', 'julien.sigot@y-nov.com', 'aurelien.colombier@y-nov.com');

    foreach ($noms as $i => $nom) {
      // On crée l'utilisateur
      $users[$i] = new User;

      // Le nom d'utilisateur et le mot de passe sont identiques
      $users[$i]->setUsername($nom);
      $users[$i]->setPassword($nom);

      // Le sel et les rôles sont vides pour l'instant
      $users[$i]->setSalt('');
      $users[$i]->setRoles(array());

      // Voici pour les emails
      $users[$i]->setEmail($emails[$i]);

      // Le pays
      $users[$i]->setCountry('France');

      // le sexe
      $users[$i]->setSexe(1);

      // On le persiste
      $manager->persist($users[$i]);
    }

    // On déclenche l'enregistrement
    $manager->flush();
  }
}