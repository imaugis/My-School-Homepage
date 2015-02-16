-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 16 Février 2015 à 21:25
-- Version du serveur: 5.5.41-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `msh`
--

-- --------------------------------------------------------

--
-- Structure de la table `msh_users`
--

CREATE TABLE IF NOT EXISTS `msh_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_passwd` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_firstname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_lastname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_avatar` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `msh_users`
--

INSERT INTO `msh_users` (`id`, `user_login`, `user_passwd`, `user_firstname`, `user_lastname`, `user_email`, `user_avatar`) VALUES
(1, 'mshmaster', '$2a$08$ptIq4kYR5JN1xA0PeO2WsebI41BD8.WS/trB7DlPCoWEPHJhcWqKK', '', 'iMaugis', 'contact@imaugis.com', 'img/uploads/avatars/avatar.png');

-- --------------------------------------------------------

--
-- Structure de la table `msh_websites`
--

CREATE TABLE IF NOT EXISTS `msh_websites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `website_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `website_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `website_description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `website_img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `website_cat` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `msh_websites`
--

INSERT INTO `msh_websites` (`id`, `website_name`, `website_url`, `website_description`, `website_img`, `website_cat`) VALUES
(11, 'DuckDuckGo', 'https://duckduckgo.com', 'DuckDuckGo est un moteur de recherche qui respecte votre vie privÃ©e.', 'img/uploads/websites/duckduckgo_thumb.png', 6),
(14, '1 jour, 1 actu', 'http://1jour1actu.com/', 'L''actualitÃ© Ã  hauteur d''enfants !', 'img/uploads/websites/1jour1actu.jpg', 7),
(15, 'Cartable.net', 'http://cartables.net/index1024.html', 'Portail de ressources pÃ©dagogiques consacrÃ© Ã  l''enseignement primaire.', 'img/uploads/websites/cartableNet.png', 8),
(16, 'Gomme et Gribouillages', 'http://www.gommeetgribouillages.fr/', 'Ressources pÃ©dagogiques pour les enseignants de l''Ã©cole primaire.', 'img/uploads/websites/gomme_et_gribouillages.png', 8),
(17, 'Jclic', 'http://missiontice.ac-besancon.fr/circonscription-besancon2/Jclic/Jclic.htm', 'ActivitÃ©s en lignes pour les maths et le franÃ§ais. Convient aux cycles 1, 2 et 3.', 'img/uploads/websites/jclic.png', 1),
(18, 'Mon quotidien', 'http://www.monquotidien.fr/', 'Le seul journal pour les enfants de 10-14 ans.', 'img/uploads/websites/mon_quotidien.png', 7),
(19, 'Tableau noir', 'http://www.tableau-noir.net/', 'Aide Ã  l''apprentissage pour les Ã©lÃ¨ves du cycle III, de soutien Ã  leurs parents et de ressources pour les enseignants.', 'img/uploads/websites/tableau_noir.png', 8),
(20, 'Primaths', 'http://www.multimaths.net/primaths/primaths15.html', 'Exerciseur mathÃ©matique pour l''Ã©cole primaire et le collÃ¨ge.\r\nLogiciel dÃ©veloppÃ© dans le cadre du Groupe TICE de l''AcadÃ©mie de Dijon.', 'img/uploads/websites/primaths.png', 1),
(21, 'Professeur Phifix', 'http://www.professeurphifix.net/', '2450 fiches d''exercices et leÃ§ons pour les classes CP, CE1, CE2, CM1 et CM2', 'img/uploads/websites/professeur_phifix.png', 2),
(22, 'Wiki Mini', 'http://fr.wikimini.org/wiki/Accueil', 'L''encyclopÃ©die Ã©crite par les enfants pour les enfants', 'img/uploads/websites/wiki_mini.png', 6),
(23, 'Brain Pop', 'http://www.brainpop.fr/', 'Un site Ã©ducatif animÃ© pour enfants et enseignants.', 'img/uploads/websites/brain_pop.png', 4),
(24, 'Baby Go', 'http://www.babygo.fr/', 'Moteur de recherche pour enfants dont lâ€™intÃ©gralitÃ© des sites indexÃ©s a Ã©tÃ© au prÃ©alable vÃ©rifiÃ©e par une Ã©quipe dâ€™adultes soucieux des risques dâ€™Internet.', 'img/uploads/websites/baby_go.png', 6),
(25, 'Calcul@TICE', 'http://calculatice.ac-lille.fr/calculatice/', 'Un site pour s''entraÃ®ner au calcul mental', 'img/uploads/websites/calculatice.png', 1),
(26, 'Du plaisir Ã  lire', 'http://www.duplaisiralire.com/persos/thomas.htm', 'Des jeux pour entrer dans la lecture', 'img/uploads/websites/du_plaisir_a_lire.gif', 2),
(27, 'English For School', 'http://kids.englishforschools.fr/', 'DÃ©couvrez l''anglais en jouant et en vous amusant grÃ¢ce Ã  de nombreuses ressources multimÃ©dias gratuites sÃ©lectionnÃ©es pour les 8-11 ans.', 'img/uploads/websites/english_for_school.jpg', 5),
(28, 'Joey t''explique les sciences', 'http://education.francetv.fr/video-interactive/joe-t-explique-les-sciences-o27036', 'Apporte des connaissances prÃ©cises aux enfants sur les techniques et les phÃ©nomÃ¨nes scientifiques.', 'img/uploads/websites/joey_t_explique_les_sciences.jpg', 4),
(29, 'Le kangourou des maths', 'http://www.mathkang.org/maths/raba/index.html', 'Des maths animÃ©es pour l''Ã©cole.', 'img/uploads/websites/le_kangourou_des_mathematiques.jpg', 1),
(30, 'Tempo Mecano', 'http://education.francetv.fr/jeu/tempo-mecano-o36296', 'Jeu interactif pour apprendre Ã  identifier les diffÃ©rentes pÃ©riodes de lâ€™histoire.', 'img/uploads/websites/tempo_mecano.jpeg', 3),
(31, 'ThÃ©o et LÃ©a : une journÃ©e Ã  la maison', 'http://www.conso.net/securite_domestique_FR/index_jeu.html', 'Pour Ã©viter tous les dangers de la maison et du jardin. ', 'img/uploads/websites/theo_et_lea.jpg', 5),
(32, 'Une journÃ©e au fil de l''eau', 'http://www.conso.net/clara_noe/', 'Un jeu pour devenir expert en eau.', 'img/uploads/websites/une_journee_au_fil_de_l_eau.jpg', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
