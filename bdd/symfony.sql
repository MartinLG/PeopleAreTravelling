-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 16 Janvier 2014 à 10:53
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `symfony`
--
CREATE DATABASE IF NOT EXISTS `symfony` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `symfony`;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `country`, `facebook_id`, `facebook_access_token`, `google_id`, `google_access_token`) VALUES
(3, 'Martinovic', 'martinovic', 'test3@y-nov.com', 'test3@y-nov.com', 1, 'cyj6p29w3mok4ogswokwoksw4ssok40', '9YNlxle74Y5yc7WlGq5K+glTnoUgV1HaWmMtPk0OHwWDHPDwc8DfMJgiLW9XHDgMb9P0PuPZKI84A1vRFWfYeg==', '2014-01-15 14:06:52', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'France', NULL, NULL, NULL, NULL),
(4, 'MartinLG', 'martinlg', 'martin.gnexus@gmail.com', 'martin.gnexus@gmail.com', 1, 'bqyogov2k2okkg40cwgoocwg0wgcg04', 'd6EtcT9zZurwYq4CKWBkHczilwiX1pyrWy8GeyHge0ptdBw7qFkMEeECp2idIH3f3ZceSSh0CK8xuB1MMAVVtg==', '2013-12-19 11:32:11', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '', NULL, NULL, NULL, NULL),
(5, 'LEZRSDTYIU', 'lezrsdtyiu', 'martin.leguillou@ingesup.com', 'martin.leguillou@ingesup.com', 1, 'd14l8evtmi8sg8oggwk8ow0kwocogkw', 'hkxAO/7aQTFRnzFveTEvsjV1j1c1eoox1BT0HSKcWfCiVOpdrl97947oAOQSjI4upkg7wBlLoarVshBHb8mqtw==', '2013-12-08 00:08:50', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '', NULL, NULL, NULL, NULL),
(6, 'qsdfghj', 'qsdfghj', 'rtrydfxgyhujui@yuyhij.fr', 'rtrydfxgyhujui@yuyhij.fr', 1, '5kftpo6tef0gs44kgos4cgskg48kok4', 'R+LaTwJzaY5z3Mlr2XRffdJbjNOKfbkmcKC3VDyp4Fx9fzjG7QAL5PxsY9FbjjvMH26UgHogzN8q5BHxTJRZqw==', '2013-12-08 11:27:33', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'France', NULL, NULL, NULL, NULL),
(7, 'testesy', 'testesy', 'ertyui@swdfghj.iu', 'ertyui@swdfghj.iu', 1, 'mtll4zrslq800kogg8o0wg4sg0go8go', 'd/KMYl86uK2hyWkgG3MGhhFtPZH/bB1zuccXflvW2JD2tJEfOrRFIi6Y1xxRXAOmW33dJyNP/WgeU2YfIhZb7g==', '2013-12-08 11:28:51', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Canada', NULL, NULL, NULL, NULL),
(8, 'retyui', 'retyui', 'ezrtyui@ertyu.fr', 'ezrtyui@ertyu.fr', 1, 'o54170dupeogg80wgosk4wwc0c40ggk', 'bNJsxBUD31hkKgkzrHht/3fJiUoRqy9H+m2vxPtXdCUgali8DpjUnGsQlz3AvOJgVJLHj5eIBeMcVR5aFF1WaQ==', '2013-12-08 13:04:09', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Ouganda', NULL, NULL, NULL, NULL),
(9, 'zertyuiop', 'zertyuiop', 'ertyu@rdtfyguhij.fr', 'ertyu@rdtfyguhij.fr', 1, 'wfdwygwci74g0gwosso04scc004w08', 'E6IuLPCnd4h0Z9KA+AtKRPXReFd8ReYjFyXLfNz/wGcibUK3iSan2LfoCkWTrPq/bQbAgwt3qiIgPSWWTDfW4A==', '2013-12-08 13:40:29', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'fghjkl', NULL, NULL, NULL, NULL),
(10, 'Cacaly', 'cacaly', 'azerty@wxcvbn.fr', 'azerty@wxcvbn.fr', 1, 'dklgur9ih7kkg04sk8ks8ggk88ow0ko', 'ADldNIMq4w4luVdDYu24GOUuyUKtBDPlJMmGJCI6yViw9DqZvZXoANxq77pars7JLPGass06QcuPWKLoJVNbUw==', '2013-12-19 12:33:17', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'France', NULL, NULL, NULL, NULL),
(11, 'aqwzsx', 'aqwzsx', 'ftyghujikl@fghju.fr', 'ftyghujikl@fghju.fr', 1, 'nvj5u6o8rr40owokkowg0k8o8gogc0o', 'czSmRVSm9rA3n6YQcMjKtSfsYQDQyF4MY/Np8rIL4KCAbzeQx88U2wC5tIbctKO5ZHFve78t0gLYaD1PSm5PtQ==', '2014-01-07 15:27:07', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'France', NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
