-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 02 jan. 2023 à 20:31
-- Version du serveur :  5.7.40
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_locboat`
--

-- --------------------------------------------------------

--
-- Structure de la table `boat`
--

DROP TABLE IF EXISTS `boat`;
CREATE TABLE IF NOT EXISTS `boat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Width` float NOT NULL,
  `Height` float NOT NULL,
  `Depth` float NOT NULL,
  `Weight` float NOT NULL,
  `Price` float NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `idTypeBoat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_boat_typeboat` (`idTypeBoat`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `boat`
--

INSERT INTO `boat` (`id`, `Name`, `Image`, `Width`, `Height`, `Depth`, `Weight`, `Price`, `Description`, `idTypeBoat`) VALUES
(1, 'Beneteau Gran Turismo 50', 'Beneteau_Gran_Turismo_50.jpg', 30, 3, 40, 1.3, 1300, 'the Gran Turismo 50 is different. With its sleek profile, full-space main deck and on-board technology, it appeals to lovers of beautiful objects in search of sensations. ', 2),
(2, 'Bermudien', 'Bermudien.jpg', 25, 2.8, 15, 0.8, 1100, 'The Bermudan is a type of sailboat rigging developed in Bermuda in the seventeenth century and whose notorious characteristic consists of a triangular mainsail as the only stern sail, culminating in the halyard point at the top of the luff.', 1),
(3, 'Boutre', 'Boutre.jpg', 14, 2.6, 23, 1.3, 1500, 'The Boutre is a type of traditional Arab sailing boat made of wood, with one or more masts and triangular or trapezoidal sails, originating from the Red Sea. It is a generic term that also includes other types of vessels close to it and in the Indian Ocean, it also refers to a small sailing or motor coaster, more or less direct descendant of these traditional boats.', 1),
(4, 'Brick', 'Brick.jpg', 28, 3.8, 16, 2, 2000, 'A Brick is a sailboat with only two masts: a main mast (aft) and the smaller foremast1 , rigged entirely with square sails, with a brigantine at the stern.\r\n\r\nFast and maneuverable, the brig was one of the most common square-rigged ships - along with three-masted ships - and was very common from the end of the seventeenth century, throughout the eighteenth century and into the first half of the nineteenth century.', 1),
(5, 'Brick-goelette', 'Brick-goelette.jpg', 33, 2.5, 22, 1.7, 1850, 'A Brik-goelette is a two-masted sailboat with a foremast (fore) rigged entirely with square sails and a mainmast (aft) rigged entirely with staysails.\r\n\r\nThe Brik-goelette has a very large gaff sail on the main mast: brigantine with or without jib. It has very large sail surfaces: the foremast has a square lighthouse (up to 5 sails), several jibs, and many staysails run between the masts.', 1),
(6, 'Brigantin', 'Brigantin.jpg', 45, 5.1, 41, 2.3, 2100, 'A Brigantin in its modern European definition refers to a two-masted tall ship with square sails, close to the brig, without a square mainsail on the mainmast and whose largest sail is the Brigantin.\r\n\r\nThe mainmast yards have less span than the foremast yards, the brigantine is limited to two jibs and the parrots are always flying.', 1),
(7, 'Capri Beach', 'Capri_Beach.jpg', 4.5, 1.2, 3, 0.5, 150, 'Thanks to this incredible vehicle you can whizz through the waves of the sea and live unforgettable moments. Run full speed and feel EXTREME! ', 3),
(8, 'Capri Formula', 'Capri_Formula.jpg', 3.5, 2.1, 3.2, 0.6, 200, 'To be driven without moderation (thanks to its steering wheel) the FORMULA will undoubtedly be an important asset in your rental fleet.\r\n\r\nMade of polyester, it includes a protective PVC planking as well as transport wheels as standard.', 3),
(9, 'Jeanneau', 'Jeanneau.jpg', 20, 2.1, 10.3, 1.7, 1000, 'With taut and sporty lines, the two Cap Camarat 7.5 CC Series3 and Cap Camarat 7.5 WA Series3 display an undeniable dynamism, a perfect alchemy between sport, luxury and comfort.\r\n\r\nThe Merry Fisher 795 Sport Series2 was born for adventurous yachtsmen in search of new landscapes and intense experiences.', 2),
(10, 'Kawa STX 160 LX', 'Kawa_STX_160_LX.jpg', 5.5, 2.3, 10, 2.3, 800, 'We have the quality of our bestsellers, which means that we will be able to redesign the entire\r\nrange for 2020, without any change in performance. The design has been renewed with the aim of improving comfort and upgradeability comfort and upgradeability while maintaining the engine power and handling of the previous model.', 3),
(11, 'Kawasaki STX 160', 'Kawasaki_STX_160.jpg', 10, 1.1, 12, 0.8, 300, 'The new fairing effectively guarantees space and increases the fuel tank capacity from 62L to 78L, giving it the largest capacity in its class. Combined with the engine\'s fuel-efficient features, it\'s now possible to ride longer than ever before.  ', 3),
(12, 'Parker 690 DC', 'Parker_690_DC.jpg', 22, 3, 15, 1.6, 1200, 'This elegant and sporty day cruiser is ideally suited for day or weekend getaways with friends and family. The spacious cockpit allows up to 7 people to comfortably sit on this unit thanks to its U-shaped sofa. Moreover, the table, once lowered, becomes a sunbathing area, while the tilting bench seat allows you to fully enjoy the bathing beaches. The elegant dashboard is highlighted by its color and the materials used, three illuminated steps allow access to the front deck. A stove and a sink are also available on the port side. A cabin at the front can be closed to allow two people to sleep on board, a marine toilet can also be added as an option.', 2),
(13, 'Sealine C430', 'Sealine_C430.jpg', 22, 3.2, 19, 2.3, 900, ' The expressive hull portholes give the yacht its Sealine visual signature and contribute to the revolutionary total glass area of 26 m2. The opening of the electric sliding roof brings even more natural light into the interior. With its three lounge areas, the Sealine C430 provides the perfect atmosphere at all times. When the lounge is open, the interior and exterior are connected to create a true loft on the sea. The standard layout includes the master cabin amidships and a VIP cabin forward. On request, it is even possible to arrange three complete double cabins.', 2),
(14, 'Ultra LX 160', 'Ultra_LX_160.jpg', 8, 1.3, 10, 0.4, 500, 'For riders who want the luxury and convenience of a naturally aspirated 1,498cc engine, the three-passenger Jet Ski® Ultra® LX watercraft is the choice of discerning enthusiasts. The maneuverable deep-V hull contributes to superior maneuverability and offers an industry-leading 60 gallons of watertight storage capacity and the largest fuel tank in its class. Pack what you need and head out for a day of fun on the water.', 3),
(15, 'Windy 27 Solano', 'Windy_27_Solano.jpg', 15, 2.6, 20, 2.3, 1200, 'Conceived primarily as a dayboat, she has a practical two-berth cabin and head compartment tucked under the foredeck. Her deep, safe cockpit is both social and versatile, with a moveable aft sunbed, and can be easily protected with her new generation canopy system or bimini sun-shade. As such, she will appeal to buyers in all markets - from the short but sweet summers of Scandinavia to the cool lakes of Switzerland and the hotspots of the Mediterranean.', 2);

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idBoat` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `DateDebutLoc` date NOT NULL,
  `DateFinLoc` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_location_boat` (`idBoat`),
  KEY `fk_location_user` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id`, `idBoat`, `idUser`, `DateDebutLoc`, `DateFinLoc`) VALUES
(1, 14, 3, '2023-01-02', '2023-01-03'),
(2, 15, 3, '2023-01-18', '2023-02-08');

-- --------------------------------------------------------

--
-- Structure de la table `typeboat`
--

DROP TABLE IF EXISTS `typeboat`;
CREATE TABLE IF NOT EXISTS `typeboat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeboat`
--

INSERT INTO `typeboat` (`id`, `label`) VALUES
(1, 'A Voile'),
(2, 'A Moteur'),
(3, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Adress` varchar(50) NOT NULL,
  `Zipcode` varchar(5) NOT NULL,
  `City` varchar(25) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Pass` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `FirstName`, `LastName`, `Adress`, `Zipcode`, `City`, `Phone`, `Mail`, `Pass`) VALUES
(3, 'test', 'test', 'test', '25000', 'test', '0520106547', 'test@gmail.com', '$2y$10$9HErEEoc9INUGucTRDaeYuAziafDrG.6mSmqiLNneVc2.9DCyNfJu'),
(4, 'test2', 'test2', 'test2', '25210', 'test2', '0520106547', 'test2@gmail.com', '$2y$10$iMgiBRLwy6hy4cBZvDx/vOFZWW5zWSP19AV8lVR1YhUppElnUJkmy');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `boat`
--
ALTER TABLE `boat`
  ADD CONSTRAINT `fk_boat_typeboat` FOREIGN KEY (`idTypeBoat`) REFERENCES `typeboat` (`id`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk_location_boat` FOREIGN KEY (`idBoat`) REFERENCES `boat` (`id`),
  ADD CONSTRAINT `fk_location_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
