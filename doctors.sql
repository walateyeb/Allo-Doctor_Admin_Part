-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 25 Mai 2016 à 07:35
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `doctors`
--

-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dr_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `pasent_name` varchar(200) NOT NULL,
  `case_type` enum('old','new') NOT NULL,
  `day` varchar(20) NOT NULL,
  `time` varchar(200) NOT NULL,
  `app_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `description` varchar(300) NOT NULL,
  `confirm` int(11) NOT NULL,
  `visited` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `appointment`
--

INSERT INTO `appointment` (`id`, `dr_id`, `cl_id`, `code`, `pasent_name`, `case_type`, `day`, `time`, `app_date`, `user_id`, `phone`, `description`, `confirm`, `visited`) VALUES
(15, 16, 13, '1d8d8b', '', 'old', 'sam', '9:00 - 9:30 AM', '2016-06-15', 1, '+21655869883', 'je suis un peu malade', 0, 0),
(17, 1, 1, 'mw9xsw', '', 'old', 'wed', '10:30 - 11:00 AM', '2016-06-19', 1, '20740680', '', 1, 0),
(18, 1, 1, 'v6wdg6', '', 'old', 'tue', '11:00 - 11:30 AM', '2016-06-18', 1, '20740680', '', 0, 0),
(19, 1, 1, 'xzwgyh', '', 'old', 'sat', '11:30 - 12:00 PM', '2016-05-29', 2, '+21620740697', '', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `appointment_draft`
--

CREATE TABLE IF NOT EXISTS `appointment_draft` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dr_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `pasent_name` varchar(200) NOT NULL,
  `case_type` enum('old','new') NOT NULL,
  `day` varchar(20) NOT NULL,
  `time` varchar(200) NOT NULL,
  `app_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `description` varchar(300) NOT NULL,
  `confirm` int(11) NOT NULL,
  `visited` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `appointment_draft`
--

INSERT INTO `appointment_draft` (`id`, `dr_id`, `cl_id`, `code`, `pasent_name`, `case_type`, `day`, `time`, `app_date`, `user_id`, `phone`, `description`, `confirm`, `visited`) VALUES
(14, 1, 1, '9r5zh0', '', 'old', 'wed', '12:00 - 12:30 PM', '2016-06-12', 1, '+21655869883', '', 1, 0),
(16, 1, 1, 'bb47c6', '', 'old', 'mon', '9:30 - 10:00 AM', '2016-05-17', 1, '20740680', 'j\\''aime', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `appointment_services`
--

CREATE TABLE IF NOT EXISTS `appointment_services` (
  `app_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  UNIQUE KEY `app_id` (`app_id`,`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `appointment_services`
--

INSERT INTO `appointment_services` (`app_id`, `service_id`) VALUES
(9, 1),
(9, 4),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(14, 3),
(16, 1),
(17, 1),
(19, 5);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `icon`) VALUES
(1, 'Dentiste', '1464111928.png'),
(2, 'GynÃ©cologue', '1435985262.png'),
(8, 'OrthopÃ©dique', '1435986911.png'),
(9, 'Gastrologist', '1435986936.png'),
(10, 'ophtalmologie', '1435986954.png'),
(11, 'Pneumologue', '1435986978.png'),
(12, 'Urologue', '1435987000.png'),
(13, 'PhysiothÃ©rapeute', '1463055601.png'),
(14, 'Cardiologue', '1463055645.png'),
(15, 'dermatologiste', '1463055915.png'),
(16, 'Neurologue', '1463056048.png');

-- --------------------------------------------------------

--
-- Structure de la table `clinics`
--

CREATE TABLE IF NOT EXISTS `clinics` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `dr_id` int(11) NOT NULL,
  `cl_name` varchar(200) NOT NULL,
  `cl_location` varchar(300) NOT NULL,
  `cl_address` varchar(300) NOT NULL,
  `cl_phone` varchar(15) NOT NULL,
  `cl_latitude` varchar(50) NOT NULL,
  `cl_longitude` varchar(50) NOT NULL,
  `cl_fees` double NOT NULL,
  `cl_discount` double NOT NULL,
  `cl_facilities` longtext NOT NULL,
  PRIMARY KEY (`cl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `clinics`
--

INSERT INTO `clinics` (`cl_id`, `dr_id`, `cl_name`, `cl_location`, `cl_address`, `cl_phone`, `cl_latitude`, `cl_longitude`, `cl_fees`, `cl_discount`, `cl_facilities`) VALUES
(1, 1, 'Violette', 'Kelibia', 'Rue habib bourguia', '', '22.8049781', '70.8567952', 35, 20, 'Ã‰chographie'),
(2, 2, 'Lutrdsi Indingo', 'Morbi', '928 Broadway\r\nNew York, NY 10010', '', '20.203211511', '78.03223232', 200, 0, 'Sonography, X-Ray'),
(3, 4, 'Aradhan Clinic', 'New York', '242 E 19th St\r\nNew York, NY 10003', '', '', '', 100, 0, 'special ward'),
(4, 5, 'Ayush Multi Hospital', 'Bhavnagar', '160 East 32nd Street\r\nBhavnagar, 364710', '', '', '', 300, 0, 'AC Room'),
(5, 6, 'Smile Dental care', 'Botad', '36 Nr. St depo,\r\nBotad-364710', '', '', '', 100, 0, ''),
(6, 7, 'John dental hospital', 'Anand', '2nd fllor,old paliyad,anand', '', '', '', 500, 0, 'super room'),
(7, 9, 'all is well care', 'myanmar', 'B/H airport,nageswari main road, myanmar', '', '74.000', '25.2223', 250, 0, 'lift for pationt'),
(8, 11, 'Bhutiya Hospital', 'Junagadh', 'lati plot ,\r\njunagadh-20548', '', '72.0020', '85.02002', 300, 0, 'Dispaly room'),
(9, 12, 'Pandya Hospital', 'kathmandu', '108 East 23rd Street\r\nNew York, NY 10010', '', '', '', 700, 0, ''),
(10, 13, 'jivandhara hospital', 'Navi Mumbai', '22 E 21st St.\r\nNew York, NY 10010\r\nWithin 0.5 mile', '', '1000.200', '1963.00', 1000, 0, 'special wadd availablee'),
(11, 14, 'smith eye care', 'kuvait', '10 to 13,real plaza,\r\nkuait', '', '', '', 350, 0, ''),
(12, 15, 'Jay Ambe Hospital', 'junagadh', 'nr.moniya,at-visavadar,junagadh', '', '', '', 120, 0, ''),
(13, 16, 'Waad cabinet', 'CitÃ© Ezzouhour', '', '', '36.846765', '11.100304', 6, 5, ''),
(14, 19, 'Clinique Violette', 'Tunis', 'rue khaznadar 8080', '', '11', '11.100304', 2, 10, ''),
(18, 20, '8984', '8', '', '', '', '', 8484, 0, ''),
(19, 21, 'Clinique Khaireddine Becha', 'Avenue des Martyrs', '14,  Avenue des Martyrs , KÃ©libia , 8090', '', '36.842301', '11.100195', 30, 5, ''),
(22, 18, 'Clinique Khaireddine Becha', 'Avenue des Martyrs', '22 Avenue des Martyrs', '', '36.842301', '11.100304', 35, 10, ''),
(23, 22, 'Clinique Khaireddine Becha', 'Avenue des Martyrs', '22 avenir des martyrs', '', '36.842301', '11.100304', 35, 5, ''),
(25, 23, 'Cabinet Ezdihar', 'rue korba', '22 rue korba', '', '36.846765', '11.100195', 45, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `clinics_photo`
--

CREATE TABLE IF NOT EXISTS `clinics_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `clinics_photo`
--

INSERT INTO `clinics_photo` (`id`, `cl_id`, `title`, `image`) VALUES
(3, 1, 'Out Door', '1436013896.jpg'),
(5, 1, 'attent', '1463000324.jpg'),
(7, 19, 'salle d\\''attente', '1464136001.jpg'),
(9, 20, 'salle d\\''attente', '1464150740.jpg'),
(11, 24, 'salle d\\''attente', '1464152010.jpg'),
(12, 25, 'salle d\\''attente', '1464152614.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `dr_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `dr_name` varchar(200) NOT NULL,
  `dr_gender` varchar(30) NOT NULL,
  `dr_email` varchar(300) NOT NULL,
  `dr_password` varchar(300) NOT NULL,
  `dr_degree` varchar(200) NOT NULL,
  `dr_designation` varchar(200) NOT NULL,
  `dr_experiance` double NOT NULL,
  `dr_fees` double NOT NULL,
  `dr_description` longtext NOT NULL,
  `dr_country` varchar(100) NOT NULL,
  `dr_city` varchar(100) NOT NULL,
  `dr_phone` varchar(15) NOT NULL,
  `dr_speciality` varchar(300) NOT NULL,
  `dr_cover_image` varchar(200) NOT NULL,
  `dr_banner_image` varchar(300) NOT NULL,
  PRIMARY KEY (`dr_id`),
  UNIQUE KEY `dr_email` (`dr_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `doctors`
--

INSERT INTO `doctors` (`dr_id`, `cat_id`, `dr_name`, `dr_gender`, `dr_email`, `dr_password`, `dr_degree`, `dr_designation`, `dr_experiance`, `dr_fees`, `dr_description`, `dr_country`, `dr_city`, `dr_phone`, `dr_speciality`, `dr_cover_image`, `dr_banner_image`) VALUES
(1, 2, 'Dr. Monsef Besbes', '', 'monsef@live.fr', 'ede997b0caf2ec398110d79d9eba38bb', 'MD', '', 5, 35, '<ul class=\\"section-set\\">\\r\\n<li class=\\"\\">Medical School - Johns Hopkins University</li>\\r\\n<li class=\\"\\">Memorial Sloan-Kettering Cancer Center (Residency)</li>\\r\\n<li class=\\"\\">NewYork-Presbyterian Hospital / Columbia University Medical Center, Fellowship in Hematology</li>\\r\\n</ul>\\r\\n<h3>Languages Spoken</h3>\\r\\n<ul class=\\"section-set\\">\\r\\n<li class=\\"language\\"><a class=\\"language\\" title=\\"\\" href=\\"https://www.zocdoc.com/languages/english-1\\">English</a></li>\\r\\n</ul>\\r\\n<div class=\\"js-link-column sg-side-short-list  \\">\\r\\n<h3>Board Certifications</h3>\\r\\n<ul class=\\"section-set\\">\\r\\n<li class=\\"\\">American Board of Internal Medicine</li>\\r\\n<li class=\\"\\">Hematology (Internal Medicine)</li>\\r\\n<li class=\\"\\">Medical Oncology (Internal Medicine)</li>\\r\\n</ul>\\r\\n</div>\\r\\n<div class=\\"js-link-column sg-side-short-list  \\">\\r\\n<h3>Professional Memberships</h3>\\r\\n<ul class=\\"section-set\\">\\r\\n<li class=\\"\\">American Society of Clinical Oncology</li>\\r\\n</ul>\\r\\n</div>\\r\\n<div class=\\"js-link-column sg-side-short-list  \\">\\r\\n<h3>Awards and Publications</h3>\\r\\n<ul class=\\"section-set\\">\\r\\n<li class=\\"\\">New York Magazine - Best Doctors in New York 2000-2005</li>\\r\\n</ul>\\r\\n</div>', 'Tunisie', 'Kelibia', '', 'Oncologue', '1436626954.jpg', '1436682917.jpg'),
(22, 9, 'amira riahi', '', 'amira52@live.com', 'ede997b0caf2ec398110d79d9eba38bb', 'MD', '', 5, 0, '<p>Langue parl&eacute;e:</p>\\r\\n<p>\\\\r\\\\n</p>\\r\\n<p>\\\\\\\\r\\\\\\\\n</p>\\r\\n<p>\\\\r\\\\n</p>\\r\\n<ul>\\\\\\\\r\\\\\\\\n\\\\r\\\\n\\r\\n<li>Arabe</li>\\r\\n\\\\r\\\\n\\\\\\\\r\\\\\\\\n\\\\r\\\\n\\r\\n<li>Fran&ccedil;ais</li>\\r\\n\\\\r\\\\n\\\\\\\\r\\\\\\\\n\\\\r\\\\n\\r\\n<li>Anglais</li>\\r\\n\\\\r\\\\n\\\\\\\\r\\\\\\\\n</ul>', 'Tunisie', 'Nabeul', '', 'interiste', '1464150458.jpeg', '1464150459.jpg'),
(23, 1, 'Trabelci mahdi', '', 'walid@gmail.com', '670c295666d55447e03944f6b8847443', 'MD', '', 7, 0, '<p><strong>Langage parl&eacute;e:</strong></p>\\r\\n<p>\\\\r\\\\n</p>\\r\\n<p>\\\\\\\\r\\\\\\\\n</p>\\r\\n<p>\\\\r\\\\n</p>\\r\\n<ul>\\\\\\\\r\\\\\\\\n\\\\r\\\\n\\r\\n<li>Arabe</li>\\r\\n\\\\r\\\\n\\\\\\\\r\\\\\\\\n\\\\r\\\\n\\r\\n<li>Fran&ccedil;ais</li>\\r\\n\\\\r\\\\n\\\\\\\\r\\\\\\\\n\\\\r\\\\n\\r\\n<li>Anglais</li>\\r\\n\\\\r\\\\n\\\\\\\\r\\\\\\\\n</ul>', 'Tunisie', 'Tunis', '', 'interiste', '1464151897.jpg', '1464151839.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id`, `name`) VALUES
(1, '1431162923.jpg'),
(2, '1431165946.png'),
(3, '1431175568.png'),
(4, '1431175596.png'),
(5, '1431175630.png'),
(6, '1431175652.png'),
(7, '1431175685.png');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`) VALUES
(1, 'DÃ©veloppeur', 'feature', '<h3>Wal&egrave; Teyeb &amp; Ismail Benali</h3>'),
(3, 'Help', 'help', '<p><strong>How to use Application</strong></p>\r\n<p>easy guide to use this application. This introfuction will help you and also instruct you about our service and facilities.</p>\r\n<p><strong>Register your Self&nbsp;</strong></p>\r\n<p>Step 1 : Open Account Tab</p>\r\n<p><img src="http://gujjurocks.com/servpro/userfiles/contents/origional/1431175568.png" alt="" /></p>\r\n<p>Register your self in this tab. This will generate identity in our server your email address is mendetory.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>How to Add Appointment for Service</strong></p>\r\n<p><strong>Step 1&nbsp;: Open AtoZ Tab</strong></p>\r\n<p>This tab will list&nbsp;all Services which we provide.&nbsp;</p>\r\n<p><img src="http://gujjurocks.com/servpro/userfiles/contents/origional/1431175596.png" alt="" /></p>\r\n<p><strong>Step 2&nbsp;: Choose One service</strong></p>\r\n<p><strong>Step 3 : Add Appointment Details&nbsp;</strong></p>\r\n<p>You need to set your Address, Date and Time of service appointment. On this date our service men will visit you.</p>\r\n<p><img src="http://gujjurocks.com/servpro/userfiles/contents/origional/1431175630.png" alt="" />&nbsp;</p>\r\n<p><strong>Step 4 : Add Details of your appliances service</strong></p>\r\n<p>You can enter text and also attach Image of your appliances. Also can add PROMO CODE here this will help you to gives benifit of our offers.</p>\r\n<p><img src="http://gujjurocks.com/servpro/userfiles/contents/origional/1431175652.png" alt="" /></p>\r\n<p><strong>Step 5 : Click on Send and exit.</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>List your order&nbsp;</strong></p>\r\n<p>Click on jobs tab to list your jobs order.</p>\r\n<p><img src="http://gujjurocks.com/servpro/userfiles/contents/origional/1431175685.png" alt="" />&nbsp;</p>');

-- --------------------------------------------------------

--
-- Structure de la table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_code` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `image` varchar(300) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `imei` varchar(15) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `gcm_code` longtext NOT NULL,
  `notification` int(11) NOT NULL,
  `newslater` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `register`
--

INSERT INTO `register` (`id`, `unique_code`, `email`, `name`, `password`, `phone`, `image`, `city`, `zip`, `imei`, `reg_date`, `status`, `gcm_code`, `notification`, `newslater`) VALUES
(1, 'vd1rkp', 'Taher@gmail.com', 'Taher', 'ede997b0caf2ec398110d79d9eba38bb', '20444500', '', 'kelibia', '8090', '', '2016-05-24 19:39:02', 0, 'APA91bEnCFPmk_rIX1yYlRpRwTLKdbkqPvyLTngaVW8YkYxbwtGUV5QcIkfK1_QkZQgcH8bK-ltDNgLyq2RzVldLuwpEUvH14QRsz6CVI7O5TPHMlvg6wHw', 1, 1),
(2, 'ct6qr5', 'samiha@gmail.com', 'samiha', 'ede997b0caf2ec398110d79d9eba38bb', '+21620740697', '', 'kelibia', '8090', '1525882882', '2016-05-25 05:10:23', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `rating` double NOT NULL,
  `review` varchar(500) NOT NULL,
  `on_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `approved` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `dr_id`, `cl_id`, `rating`, `review`, `on_date`, `approved`) VALUES
(3, 1, 1, 1, 3.5, 'bon docteur', '2016-05-24 18:17:48', 0),
(5, 1, 1, 1, 3.5, 'C''est mon meilleur docteur', '2016-05-24 18:18:16', 0),
(6, 2, 1, 1, 4, 'un bon docteur', '2016-05-25 05:09:30', 0),
(7, 2, 1, 1, 5, 'bon docteur', '2016-05-25 05:14:05', 0),
(8, 2, 1, 1, 1.5, 'waaw', '2016-05-25 05:14:40', 0);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `service` varchar(300) NOT NULL,
  `charge` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `services`
--

INSERT INTO `services` (`id`, `clinic_id`, `dr_id`, `service`, `charge`) VALUES
(2, 1, 1, 'Couvrir les dents', 50),
(5, 1, 1, 'Nettoyer de dents', 30),
(6, 19, 21, 'Nettoyer de dents', 30),
(7, 20, 22, 'Nettoyer de dents', 35),
(8, 23, 22, 'Nettoyer de dents', 40),
(9, 23, 22, 'Nettoyer de dents', 40);

-- --------------------------------------------------------

--
-- Structure de la table `service_charges`
--

CREATE TABLE IF NOT EXISTS `service_charges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `service` varchar(300) NOT NULL,
  `charge` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `service_charges`
--

INSERT INTO `service_charges` (`id`, `clinic_id`, `dr_id`, `service`, `charge`) VALUES
(2, 1, 1, 'Couvrir les dents', 800),
(5, 1, 1, 'Nettoyer de dents', 200);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `type` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`,`type`),
  UNIQUE KEY `title_2` (`title`,`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `title`, `type`) VALUES
(21, ' Internist', 'speciality'),
(9, ' Love As', 'speciality'),
(8, ' Special Treet', 'speciality'),
(38, 'Cosmetic Dentist', 'speciality'),
(37, 'Dava', 'speciality'),
(2, 'Denstist', 'speciality'),
(24, 'Dental', 'speciality'),
(27, 'Hard', 'speciality'),
(25, 'Hart Surjan', 'speciality'),
(10, 'Heart', 'speciality'),
(14, 'Hematologist', 'speciality'),
(42, 'interiste', 'speciality'),
(15, 'Internist', 'speciality'),
(41, 'Interniste', 'speciality'),
(11, 'Kidney', 'speciality'),
(40, 'kjkjbkhvv', 'speciality'),
(6, 'MD', 'degree'),
(5, 'MMBS', 'degree'),
(43, 'Nettoyage de dents', 'speciality'),
(1, 'Nurology', 'speciality'),
(13, 'Oncologist', 'speciality'),
(3, 'Orthopadic', 'speciality'),
(22, 'Pulmonologist Primary Care Docto', 'speciality'),
(26, 'Special Treet', 'speciality'),
(23, 'Travel Medicine Specialist Family Physician', 'speciality'),
(4, 'Urology', 'speciality');

-- --------------------------------------------------------

--
-- Structure de la table `timetable`
--

CREATE TABLE IF NOT EXISTS `timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dr_id` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `during` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=953 ;

--
-- Contenu de la table `timetable`
--

INSERT INTO `timetable` (`id`, `dr_id`, `cl_id`, `day`, `during`) VALUES
(401, 1, 1, 'mon', '8:30 - 9:00 AM'),
(402, 1, 1, 'tue', '8:30 - 9:00 AM'),
(403, 1, 1, 'wed', '8:30 - 9:00 AM'),
(404, 1, 1, 'thu', '8:30 - 9:00 AM'),
(405, 1, 1, 'fri', '8:30 - 9:00 AM'),
(406, 1, 1, 'sat', '8:30 - 9:00 AM'),
(407, 1, 1, 'sun', '8:30 - 9:00 AM'),
(408, 1, 1, 'mon', '9:00 - 9:30 AM'),
(409, 1, 1, 'tue', '9:00 - 9:30 AM'),
(410, 1, 1, 'wed', '9:00 - 9:30 AM'),
(411, 1, 1, 'thu', '9:00 - 9:30 AM'),
(412, 1, 1, 'fri', '9:00 - 9:30 AM'),
(413, 1, 1, 'sat', '9:00 - 9:30 AM'),
(414, 1, 1, 'sun', '9:00 - 9:30 AM'),
(415, 1, 1, 'mon', '9:30 - 10:00 AM'),
(416, 1, 1, 'tue', '9:30 - 10:00 AM'),
(417, 1, 1, 'wed', '9:30 - 10:00 AM'),
(418, 1, 1, 'thu', '9:30 - 10:00 AM'),
(419, 1, 1, 'fri', '9:30 - 10:00 AM'),
(420, 1, 1, 'sat', '9:30 - 10:00 AM'),
(421, 1, 1, 'sun', '9:30 - 10:00 AM'),
(422, 1, 1, 'mon', '10:00 - 10:30 AM'),
(423, 1, 1, 'tue', '10:00 - 10:30 AM'),
(424, 1, 1, 'wed', '10:00 - 10:30 AM'),
(425, 1, 1, 'thu', '10:00 - 10:30 AM'),
(426, 1, 1, 'fri', '10:00 - 10:30 AM'),
(427, 1, 1, 'sat', '10:00 - 10:30 AM'),
(428, 1, 1, 'sun', '10:00 - 10:30 AM'),
(429, 1, 1, 'mon', '10:30 - 11:00 AM'),
(430, 1, 1, 'tue', '10:30 - 11:00 AM'),
(431, 1, 1, 'wed', '10:30 - 11:00 AM'),
(432, 1, 1, 'thu', '10:30 - 11:00 AM'),
(433, 1, 1, 'fri', '10:30 - 11:00 AM'),
(434, 1, 1, 'sat', '10:30 - 11:00 AM'),
(435, 1, 1, 'sun', '10:30 - 11:00 AM'),
(436, 1, 1, 'mon', '11:00 - 11:30 AM'),
(437, 1, 1, 'tue', '11:00 - 11:30 AM'),
(438, 1, 1, 'wed', '11:00 - 11:30 AM'),
(439, 1, 1, 'thu', '11:00 - 11:30 AM'),
(440, 1, 1, 'fri', '11:00 - 11:30 AM'),
(441, 1, 1, 'sat', '11:00 - 11:30 AM'),
(442, 1, 1, 'mon', '11:30 - 12:00 PM'),
(443, 1, 1, 'tue', '11:30 - 12:00 PM'),
(444, 1, 1, 'wed', '11:30 - 12:00 PM'),
(445, 1, 1, 'thu', '11:30 - 12:00 PM'),
(446, 1, 1, 'fri', '11:30 - 12:00 PM'),
(447, 1, 1, 'sat', '11:30 - 12:00 PM'),
(448, 1, 1, 'mon', '12:00 - 12:30 PM'),
(449, 1, 1, 'tue', '12:00 - 12:30 PM'),
(450, 1, 1, 'wed', '12:00 - 12:30 PM'),
(451, 1, 1, 'thu', '12:00 - 12:30 PM'),
(452, 1, 1, 'fri', '12:00 - 12:30 PM'),
(453, 1, 1, 'sat', '12:00 - 12:30 PM'),
(454, 1, 1, 'mon', '12:30 - 01:00 PM'),
(455, 1, 1, 'tue', '12:30 - 01:00 PM'),
(456, 1, 1, 'wed', '12:30 - 01:00 PM'),
(457, 1, 1, 'thu', '12:30 - 01:00 PM'),
(458, 1, 1, 'fri', '12:30 - 01:00 PM'),
(459, 1, 1, 'sat', '12:30 - 01:00 PM'),
(460, 1, 1, 'mon', '02:00 - 02:30 PM'),
(461, 1, 1, 'tue', '02:00 - 02:30 PM'),
(462, 1, 1, 'wed', '02:00 - 02:30 PM'),
(463, 1, 1, 'thu', '02:00 - 02:30 PM'),
(464, 1, 1, 'fri', '02:00 - 02:30 PM'),
(465, 1, 1, 'sat', '02:00 - 02:30 PM'),
(466, 1, 1, 'mon', '02:30 - 03:00 PM'),
(467, 1, 1, 'tue', '02:30 - 03:00 PM'),
(468, 1, 1, 'wed', '02:30 - 03:00 PM'),
(469, 1, 1, 'thu', '02:30 - 03:00 PM'),
(470, 1, 1, 'fri', '02:30 - 03:00 PM'),
(471, 1, 1, 'sat', '02:30 - 03:00 PM'),
(472, 1, 1, 'mon', '03:00 - 03:30 PM'),
(473, 1, 1, 'tue', '03:00 - 03:30 PM'),
(474, 1, 1, 'wed', '03:00 - 03:30 PM'),
(475, 1, 1, 'thu', '03:00 - 03:30 PM'),
(476, 1, 1, 'fri', '03:00 - 03:30 PM'),
(477, 1, 1, 'sat', '03:00 - 03:30 PM'),
(478, 1, 1, 'mon', '04:00 - 04:30 PM'),
(479, 1, 1, 'tue', '04:00 - 04:30 PM'),
(480, 1, 1, 'wed', '04:00 - 04:30 PM'),
(481, 1, 1, 'thu', '04:00 - 04:30 PM'),
(482, 1, 1, 'fri', '04:00 - 04:30 PM'),
(483, 1, 1, 'sat', '04:00 - 04:30 PM'),
(484, 1, 1, 'mon', '04:30 - 05:00 PM'),
(485, 1, 1, 'tue', '04:30 - 05:00 PM'),
(486, 1, 1, 'wed', '04:30 - 05:00 PM'),
(487, 1, 1, 'thu', '04:30 - 05:00 PM'),
(488, 1, 1, 'fri', '04:30 - 05:00 PM'),
(489, 1, 1, 'sat', '04:30 - 05:00 PM'),
(490, 1, 1, 'mon', '05:00 - 05:30 PM'),
(491, 1, 1, 'tue', '05:00 - 05:30 PM'),
(492, 1, 1, 'wed', '05:00 - 05:30 PM'),
(493, 1, 1, 'thu', '05:00 - 05:30 PM'),
(494, 1, 1, 'fri', '05:00 - 05:30 PM'),
(495, 1, 1, 'sat', '05:00 - 05:30 PM'),
(496, 1, 1, 'mon', '06:30 - 07:00 PM'),
(497, 1, 1, 'tue', '06:30 - 07:00 PM'),
(498, 1, 1, 'wed', '06:30 - 07:00 PM'),
(499, 1, 1, 'thu', '06:30 - 07:00 PM'),
(500, 1, 1, 'fri', '06:30 - 07:00 PM'),
(501, 1, 1, 'sat', '06:30 - 07:00 PM'),
(502, 1, 1, 'mon', '07:00 - 07:30 PM'),
(503, 1, 1, 'tue', '07:00 - 07:30 PM'),
(504, 1, 1, 'wed', '07:00 - 07:30 PM'),
(505, 1, 1, 'thu', '07:00 - 07:30 PM'),
(506, 1, 1, 'fri', '07:00 - 07:30 PM'),
(507, 1, 1, 'sat', '07:00 - 07:30 PM'),
(508, 1, 1, 'mon', '07:30 - 08:00 PM'),
(509, 1, 1, 'tue', '07:30 - 08:00 PM'),
(510, 1, 1, 'wed', '07:30 - 08:00 PM'),
(511, 1, 1, 'thu', '07:30 - 08:00 PM'),
(512, 1, 1, 'fri', '07:30 - 08:00 PM'),
(513, 1, 1, 'sat', '07:30 - 08:00 PM'),
(514, 1, 1, 'mon', '08:00 - 08:30 PM'),
(515, 1, 1, 'tue', '08:00 - 08:30 PM'),
(516, 1, 1, 'wed', '08:00 - 08:30 PM'),
(517, 1, 1, 'thu', '08:00 - 08:30 PM'),
(518, 1, 1, 'fri', '08:00 - 08:30 PM'),
(519, 1, 1, 'sat', '08:00 - 08:30 PM'),
(520, 1, 1, 'mon', '08:30 - 09:00 PM'),
(521, 1, 1, 'tue', '08:30 - 09:00 PM'),
(522, 1, 1, 'wed', '08:30 - 09:00 PM'),
(523, 1, 1, 'thu', '08:30 - 09:00 PM'),
(524, 1, 1, 'fri', '08:30 - 09:00 PM'),
(525, 1, 1, 'sat', '08:30 - 09:00 PM'),
(595, 16, 13, 'lun', '8:30 - 9:00 AM'),
(596, 16, 13, 'mar', '8:30 - 9:00 AM'),
(597, 16, 13, 'mer', '8:30 - 9:00 AM'),
(598, 16, 13, 'jeu', '8:30 - 9:00 AM'),
(599, 16, 13, 'ven', '8:30 - 9:00 AM'),
(600, 16, 13, 'sam', '8:30 - 9:00 AM'),
(601, 16, 13, 'lun', '9:00 - 9:30 AM'),
(602, 16, 13, 'mar', '9:00 - 9:30 AM'),
(603, 16, 13, 'mer', '9:00 - 9:30 AM'),
(604, 16, 13, 'jeu', '9:00 - 9:30 AM'),
(605, 16, 13, 'sam', '9:00 - 9:30 AM'),
(606, 16, 13, 'lun', '9:30 - 10:00 AM'),
(607, 16, 13, 'mar', '9:30 - 10:00 AM'),
(608, 16, 13, 'mer', '9:30 - 10:00 AM'),
(609, 16, 13, 'jeu', '9:30 - 10:00 AM'),
(610, 16, 13, 'sam', '9:30 - 10:00 AM'),
(611, 16, 13, 'lun', '10:00 - 10:30 AM'),
(612, 16, 13, 'mar', '10:00 - 10:30 AM'),
(613, 16, 13, 'jeu', '10:00 - 10:30 AM'),
(614, 16, 13, 'ven', '10:00 - 10:30 AM'),
(615, 16, 13, 'sam', '10:00 - 10:30 AM'),
(616, 16, 13, 'lun', '10:30 - 11:00 AM'),
(617, 16, 13, 'mar', '10:30 - 11:00 AM'),
(618, 16, 13, 'jeu', '10:30 - 11:00 AM'),
(619, 16, 13, 'sam', '10:30 - 11:00 AM'),
(620, 16, 13, 'lun', '11:00 - 11:30 AM'),
(621, 16, 13, 'mar', '11:00 - 11:30 AM'),
(622, 16, 13, 'jeu', '11:00 - 11:30 AM'),
(623, 16, 13, 'sam', '11:00 - 11:30 AM'),
(624, 16, 13, 'lun', '11:30 - 12:00 PM'),
(625, 16, 13, 'mar', '11:30 - 12:00 PM'),
(626, 16, 13, 'jeu', '11:30 - 12:00 PM'),
(627, 16, 13, 'sam', '11:30 - 12:00 PM'),
(628, 16, 13, 'lun', '12:00 - 12:30 PM'),
(629, 16, 13, 'mar', '12:00 - 12:30 PM'),
(630, 16, 13, 'jeu', '12:00 - 12:30 PM'),
(631, 16, 13, 'sam', '12:00 - 12:30 PM'),
(632, 16, 13, 'lun', '12:30 - 01:00 PM'),
(633, 16, 13, 'mar', '12:30 - 01:00 PM'),
(634, 16, 13, 'lun', '01:00 - 01:30 PM'),
(635, 16, 13, 'mar', '01:00 - 01:30 PM'),
(636, 16, 13, 'lun', '01:30 - 02:00 PM'),
(637, 16, 13, 'mar', '01:30 - 02:00 PM'),
(638, 16, 13, 'lun', '02:00 - 02:30 PM'),
(639, 16, 13, 'mar', '02:00 - 02:30 PM'),
(640, 16, 13, 'lun', '02:30 - 03:00 PM'),
(641, 16, 13, 'mar', '02:30 - 03:00 PM'),
(642, 16, 13, 'mer', '02:30 - 03:00 PM'),
(643, 16, 13, 'jeu', '02:30 - 03:00 PM'),
(644, 16, 13, 'ven', '02:30 - 03:00 PM'),
(645, 16, 13, 'sam', '02:30 - 03:00 PM'),
(646, 16, 13, 'lun', '03:00 - 03:30 PM'),
(647, 16, 13, 'mar', '03:00 - 03:30 PM'),
(648, 16, 13, 'mer', '03:00 - 03:30 PM'),
(649, 16, 13, 'jeu', '03:00 - 03:30 PM'),
(650, 16, 13, 'ven', '03:00 - 03:30 PM'),
(651, 16, 13, 'sam', '03:00 - 03:30 PM'),
(652, 16, 13, 'lun', '04:00 - 04:30 PM'),
(653, 16, 13, 'mar', '04:00 - 04:30 PM'),
(654, 16, 13, 'mer', '04:00 - 04:30 PM'),
(655, 16, 13, 'jeu', '04:00 - 04:30 PM'),
(656, 16, 13, 'ven', '04:00 - 04:30 PM'),
(657, 16, 13, 'sam', '04:00 - 04:30 PM'),
(658, 16, 13, 'lun', '04:30 - 05:00 PM'),
(762, 20, 15, 'lun', '8:30 - 9:00 AM'),
(763, 20, 15, 'mar', '8:30 - 9:00 AM'),
(764, 20, 15, 'mer', '8:30 - 9:00 AM'),
(765, 20, 15, 'jeu', '8:30 - 9:00 AM'),
(766, 20, 15, 'ven', '8:30 - 9:00 AM'),
(767, 20, 15, 'lun', '9:00 - 9:30 AM'),
(768, 20, 15, 'mar', '9:00 - 9:30 AM'),
(769, 20, 15, 'mer', '9:00 - 9:30 AM'),
(770, 20, 15, 'jeu', '9:00 - 9:30 AM'),
(771, 20, 15, 'ven', '9:00 - 9:30 AM'),
(772, 20, 15, 'lun', '9:30 - 10:00 AM'),
(773, 20, 15, 'mar', '9:30 - 10:00 AM'),
(774, 20, 15, 'mer', '9:30 - 10:00 AM'),
(775, 20, 15, 'jeu', '9:30 - 10:00 AM'),
(776, 20, 15, 'ven', '9:30 - 10:00 AM'),
(777, 20, 15, 'lun', '10:00 - 10:30 AM'),
(778, 20, 15, 'mar', '10:00 - 10:30 AM'),
(779, 20, 15, 'mer', '10:00 - 10:30 AM'),
(780, 20, 15, 'jeu', '10:00 - 10:30 AM'),
(781, 20, 15, 'ven', '10:00 - 10:30 AM'),
(782, 20, 15, 'lun', '10:30 - 11:00 AM'),
(783, 20, 15, 'mar', '10:30 - 11:00 AM'),
(784, 20, 15, 'mer', '10:30 - 11:00 AM'),
(785, 20, 15, 'jeu', '10:30 - 11:00 AM'),
(786, 20, 15, 'ven', '10:30 - 11:00 AM'),
(787, 20, 15, 'lun', '11:00 - 11:30 AM'),
(788, 20, 15, 'mar', '11:00 - 11:30 AM'),
(789, 20, 15, 'mer', '11:00 - 11:30 AM'),
(790, 20, 15, 'jeu', '11:00 - 11:30 AM'),
(791, 20, 15, 'ven', '11:00 - 11:30 AM'),
(792, 20, 15, 'lun', '11:30 - 12:00 PM'),
(793, 20, 15, 'mar', '11:30 - 12:00 PM'),
(794, 20, 15, 'mer', '11:30 - 12:00 PM'),
(795, 20, 15, 'jeu', '11:30 - 12:00 PM'),
(796, 20, 15, 'ven', '11:30 - 12:00 PM'),
(797, 20, 15, 'lun', '12:00 - 12:30 PM'),
(798, 20, 15, 'mar', '12:00 - 12:30 PM'),
(799, 20, 15, 'mer', '12:00 - 12:30 PM'),
(800, 20, 15, 'jeu', '12:00 - 12:30 PM'),
(801, 20, 15, 'ven', '12:00 - 12:30 PM'),
(802, 20, 15, 'lun', '12:30 - 01:00 PM'),
(803, 20, 15, 'mar', '12:30 - 01:00 PM'),
(804, 20, 15, 'mer', '12:30 - 01:00 PM'),
(805, 20, 15, 'jeu', '12:30 - 01:00 PM'),
(806, 20, 15, 'ven', '12:30 - 01:00 PM'),
(807, 20, 15, 'lun', '01:00 - 01:30 PM'),
(808, 20, 15, 'mar', '01:00 - 01:30 PM'),
(809, 20, 15, 'mer', '01:00 - 01:30 PM'),
(810, 20, 15, 'jeu', '01:00 - 01:30 PM'),
(811, 20, 15, 'ven', '01:00 - 01:30 PM'),
(812, 20, 15, 'lun', '01:30 - 02:00 PM'),
(813, 20, 15, 'mar', '01:30 - 02:00 PM'),
(814, 20, 15, 'mer', '01:30 - 02:00 PM'),
(815, 20, 15, 'jeu', '01:30 - 02:00 PM'),
(816, 20, 15, 'ven', '01:30 - 02:00 PM'),
(817, 20, 15, 'lun', '02:00 - 02:30 PM'),
(818, 20, 15, 'mar', '02:00 - 02:30 PM'),
(819, 20, 15, 'mer', '02:00 - 02:30 PM'),
(820, 20, 15, 'jeu', '02:00 - 02:30 PM'),
(821, 20, 15, 'ven', '02:00 - 02:30 PM'),
(822, 20, 15, 'lun', '02:30 - 03:00 PM'),
(823, 20, 15, 'mar', '02:30 - 03:00 PM'),
(824, 20, 15, 'mer', '02:30 - 03:00 PM'),
(825, 20, 15, 'jeu', '02:30 - 03:00 PM'),
(826, 20, 15, 'ven', '02:30 - 03:00 PM'),
(827, 20, 15, 'sam', '02:30 - 03:00 PM'),
(828, 20, 15, 'dim', '02:30 - 03:00 PM'),
(829, 20, 15, 'lun', '03:00 - 03:30 PM'),
(830, 20, 15, 'mar', '03:00 - 03:30 PM'),
(831, 20, 15, 'mer', '03:00 - 03:30 PM'),
(832, 20, 15, 'jeu', '03:00 - 03:30 PM'),
(833, 20, 15, 'ven', '03:00 - 03:30 PM'),
(834, 20, 15, 'sam', '03:00 - 03:30 PM'),
(835, 20, 15, 'dim', '03:00 - 03:30 PM'),
(836, 20, 15, 'lun', '04:00 - 04:30 PM'),
(837, 20, 15, 'mar', '04:00 - 04:30 PM'),
(838, 20, 15, 'mer', '04:00 - 04:30 PM'),
(839, 20, 15, 'jeu', '04:00 - 04:30 PM'),
(840, 20, 15, 'ven', '04:00 - 04:30 PM'),
(841, 20, 15, 'sam', '04:00 - 04:30 PM'),
(842, 20, 15, 'dim', '04:00 - 04:30 PM'),
(843, 20, 15, 'lun', '04:30 - 05:00 PM'),
(844, 20, 15, 'mar', '04:30 - 05:00 PM'),
(845, 20, 15, 'mer', '04:30 - 05:00 PM'),
(846, 20, 15, 'jeu', '04:30 - 05:00 PM'),
(847, 20, 15, 'ven', '04:30 - 05:00 PM'),
(848, 20, 15, 'lun', '05:00 - 05:30 PM'),
(849, 20, 15, 'mar', '05:00 - 05:30 PM'),
(850, 20, 15, 'mer', '05:00 - 05:30 PM'),
(851, 20, 15, 'jeu', '05:00 - 05:30 PM'),
(852, 20, 15, 'ven', '05:00 - 05:30 PM'),
(853, 22, 20, 'mon', '8:30 - 9:00 AM'),
(854, 22, 20, 'tue', '8:30 - 9:00 AM'),
(855, 22, 20, 'wed', '8:30 - 9:00 AM'),
(856, 22, 20, 'thu', '8:30 - 9:00 AM'),
(857, 22, 20, 'fri', '8:30 - 9:00 AM'),
(858, 22, 20, 'mon', '9:00 - 9:30 AM'),
(859, 22, 20, 'tue', '9:00 - 9:30 AM'),
(860, 22, 20, 'wed', '9:00 - 9:30 AM'),
(861, 22, 20, 'thu', '9:00 - 9:30 AM'),
(862, 22, 20, 'fri', '9:00 - 9:30 AM'),
(863, 22, 20, 'mon', '9:30 - 10:00 AM'),
(864, 22, 20, 'tue', '9:30 - 10:00 AM'),
(865, 22, 20, 'wed', '9:30 - 10:00 AM'),
(866, 22, 20, 'thu', '9:30 - 10:00 AM'),
(867, 22, 20, 'fri', '9:30 - 10:00 AM'),
(868, 22, 20, 'mon', '10:00 - 10:30 AM'),
(869, 22, 20, 'tue', '10:00 - 10:30 AM'),
(870, 22, 20, 'wed', '10:00 - 10:30 AM'),
(871, 22, 20, 'thu', '10:00 - 10:30 AM'),
(872, 22, 20, 'fri', '10:00 - 10:30 AM'),
(873, 22, 20, 'mon', '10:30 - 11:00 AM'),
(874, 22, 20, 'tue', '10:30 - 11:00 AM'),
(875, 22, 20, 'wed', '10:30 - 11:00 AM'),
(876, 22, 20, 'thu', '10:30 - 11:00 AM'),
(877, 22, 20, 'fri', '10:30 - 11:00 AM'),
(878, 22, 20, 'mon', '11:00 - 11:30 AM'),
(879, 22, 20, 'tue', '11:00 - 11:30 AM'),
(880, 22, 20, 'wed', '11:00 - 11:30 AM'),
(881, 22, 20, 'thu', '11:00 - 11:30 AM'),
(882, 22, 20, 'fri', '11:00 - 11:30 AM'),
(883, 23, 24, 'mon', '8:30 - 9:00 AM'),
(884, 23, 24, 'tue', '8:30 - 9:00 AM'),
(885, 23, 24, 'wed', '8:30 - 9:00 AM'),
(886, 23, 24, 'thu', '8:30 - 9:00 AM'),
(887, 23, 24, 'fri', '8:30 - 9:00 AM'),
(888, 23, 24, 'sat', '8:30 - 9:00 AM'),
(889, 23, 24, 'mon', '9:00 - 9:30 AM'),
(890, 23, 24, 'tue', '9:00 - 9:30 AM'),
(891, 23, 24, 'wed', '9:00 - 9:30 AM'),
(892, 23, 24, 'thu', '9:00 - 9:30 AM'),
(893, 23, 24, 'fri', '9:00 - 9:30 AM'),
(894, 23, 24, 'sat', '9:00 - 9:30 AM'),
(895, 23, 24, 'mon', '9:30 - 10:00 AM'),
(896, 23, 24, 'tue', '9:30 - 10:00 AM'),
(897, 23, 24, 'wed', '9:30 - 10:00 AM'),
(898, 23, 24, 'thu', '9:30 - 10:00 AM'),
(899, 23, 24, 'fri', '9:30 - 10:00 AM'),
(900, 23, 24, 'sat', '9:30 - 10:00 AM'),
(901, 23, 24, 'mon', '10:00 - 10:30 AM'),
(902, 23, 24, 'tue', '10:00 - 10:30 AM'),
(903, 23, 24, 'wed', '10:00 - 10:30 AM'),
(904, 23, 24, 'thu', '10:00 - 10:30 AM'),
(905, 23, 24, 'fri', '10:00 - 10:30 AM'),
(906, 23, 24, 'sat', '10:00 - 10:30 AM'),
(907, 23, 24, 'mon', '10:30 - 11:00 AM'),
(908, 23, 24, 'tue', '10:30 - 11:00 AM'),
(909, 23, 24, 'wed', '10:30 - 11:00 AM'),
(910, 23, 24, 'thu', '10:30 - 11:00 AM'),
(911, 23, 24, 'fri', '10:30 - 11:00 AM'),
(912, 23, 24, 'sat', '10:30 - 11:00 AM'),
(913, 23, 25, 'mon', '8:30 - 9:00 AM'),
(914, 23, 25, 'tue', '8:30 - 9:00 AM'),
(915, 23, 25, 'wed', '8:30 - 9:00 AM'),
(916, 23, 25, 'thu', '8:30 - 9:00 AM'),
(917, 23, 25, 'fri', '8:30 - 9:00 AM'),
(918, 23, 25, 'sat', '8:30 - 9:00 AM'),
(919, 23, 25, 'mon', '9:00 - 9:30 AM'),
(920, 23, 25, 'tue', '9:00 - 9:30 AM'),
(921, 23, 25, 'wed', '9:00 - 9:30 AM'),
(922, 23, 25, 'thu', '9:00 - 9:30 AM'),
(923, 23, 25, 'fri', '9:00 - 9:30 AM'),
(924, 23, 25, 'sat', '9:00 - 9:30 AM'),
(925, 23, 25, 'mon', '9:30 - 10:00 AM'),
(926, 23, 25, 'tue', '9:30 - 10:00 AM'),
(927, 23, 25, 'wed', '9:30 - 10:00 AM'),
(928, 23, 25, 'thu', '9:30 - 10:00 AM'),
(929, 23, 25, 'fri', '9:30 - 10:00 AM'),
(930, 23, 25, 'sat', '9:30 - 10:00 AM'),
(931, 23, 25, 'mon', '10:00 - 10:30 AM'),
(932, 23, 25, 'tue', '10:00 - 10:30 AM'),
(933, 23, 25, 'wed', '10:00 - 10:30 AM'),
(934, 23, 25, 'thu', '10:00 - 10:30 AM'),
(935, 23, 25, 'fri', '10:00 - 10:30 AM'),
(936, 23, 25, 'sat', '10:00 - 10:30 AM'),
(937, 23, 25, 'mon', '10:30 - 11:00 AM'),
(938, 23, 25, 'tue', '10:30 - 11:00 AM'),
(939, 23, 25, 'wed', '10:30 - 11:00 AM'),
(940, 23, 25, 'thu', '10:30 - 11:00 AM'),
(941, 23, 25, 'fri', '10:30 - 11:00 AM'),
(942, 23, 25, 'sat', '10:30 - 11:00 AM'),
(943, 23, 25, 'mon', '11:00 - 11:30 AM'),
(944, 23, 25, 'tue', '11:00 - 11:30 AM'),
(945, 23, 25, 'wed', '11:00 - 11:30 AM'),
(946, 23, 25, 'thu', '11:00 - 11:30 AM'),
(947, 23, 25, 'fri', '11:00 - 11:30 AM'),
(948, 23, 25, 'sat', '11:00 - 11:30 AM'),
(949, 23, 25, 'wed', '11:30 - 12:00 PM'),
(950, 23, 25, 'thu', '11:30 - 12:00 PM'),
(951, 23, 25, 'fri', '11:30 - 12:00 PM'),
(952, 23, 25, 'sat', '11:30 - 12:00 PM');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `type` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `active`, `type`) VALUES
(4, 'wala', 'ede997b0caf2ec398110d79d9eba38bb', 'snoopez206@gmail.com', 1, 'admin'),
(3, 'ismail', 'ede997b0caf2ec398110d79d9eba38bb', 'ismail@gmail.com', 1, 'admin'),
(6, 'Michel', 'ede997b0caf2ec398110d79d9eba38bb', 'michel@live.fr', 1, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_code` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `image` varchar(300) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `imei` varchar(15) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `gcm_code` longtext NOT NULL,
  `notification` int(11) NOT NULL,
  `newslater` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
