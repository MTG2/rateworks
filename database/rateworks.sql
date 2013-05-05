-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 05. Mai 2013 um 18:52
-- Server Version: 5.5.27
-- PHP-Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `rateworks`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `text` varchar(1000) NOT NULL,
  `upvote` int(11) NOT NULL,
  `downvote` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `entry_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectlink` varchar(300) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `degree` text NOT NULL,
  `rdegree` int(11) NOT NULL,
  `usability` text NOT NULL,
  `rusability` int(11) NOT NULL,
  `highlights` text NOT NULL,
  `links` text NOT NULL,
  `domain` text NOT NULL,
  `created` datetime NOT NULL,
  `rtotal` int(10) NOT NULL,
  `framework_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `frameworks`
--

CREATE TABLE IF NOT EXISTS `frameworks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created` date NOT NULL,
  `link` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Daten für Tabelle `frameworks`
--

INSERT INTO `frameworks` (`id`, `name`, `rating`, `created`, `link`, `pic`) VALUES
(1, 'CakePHP', 0, '2013-04-02', 'http://www.cakephp.de/', 'frameworks/cakephp.png'),
(2, 'Symfony', 0, '2013-04-08', 'http://symfony.com/', 'frameworks/symfony.png'),
(3, 'Grails', 0, '2013-04-02', 'http://grails.org/', 'frameworks/grails.jpg'),
(4, 'Typo3 flow', 0, '2013-04-08', 'http://flow.typo3.org/', 'frameworks/typo3_flow.png'),
(5, 'Node.js', 0, '2013-04-08', 'http://nodejs.org/', 'frameworks/node_js.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `registrationkeys`
--

CREATE TABLE IF NOT EXISTS `registrationkeys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `registrationkeys`
--

INSERT INTO `registrationkeys` (`id`, `key`) VALUES
(1, 'wbg213');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `course` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `pic` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `semester`, `course`, `created`, `pic`) VALUES
(69, 'superadmin', 'king_Arthur2005@gmx.de', 'c1964296638534a0076b514cae6b0b8ab7bbf514', 'admin', '0', 'Keiner', '2013-05-05 18:50:27', 'default.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
