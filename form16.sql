-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2018 at 04:12 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `form16`
--
CREATE DATABASE IF NOT EXISTS `form16` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `form16`;

-- --------------------------------------------------------

--
-- Table structure for table `empdetails`
--

CREATE TABLE IF NOT EXISTS `empdetails` (
  `SrNo` int(11) NOT NULL AUTO_INCREMENT,
  `EmpID` int(5) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `PAN` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `DOJ` date NOT NULL,
  `email` varchar(32) NOT NULL,
  `Password` varchar(225) NOT NULL,
  PRIMARY KEY (`SrNo`),
  UNIQUE KEY `PAN` (`PAN`),
  UNIQUE KEY `E-mail` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `empdetails`
--

INSERT INTO `empdetails` (`SrNo`, `EmpID`, `Name`, `PAN`, `Address`, `DOB`, `DOJ`, `email`, `Password`) VALUES
(38, 15032, 'sherlock', 'pbnsb1111a', '221-B, Baker Street, London', '1972-11-26', '2002-07-01', 'sherlock@london.uk', '$2y$10$MdBs50nEgo4ZBfhLdDCkpuPK6mH0cg0v7NENhd0whyB1M9VMV1HUq'),
(39, 15033, 'Chaitanya Sahu', 'pbnsq1111a', '221-B, Baker Street, London', '1995-11-26', '2016-04-01', 'a@a.com', '$2y$10$pKkAhuojEE3y6fzIQ2pX7e4Xb2guLu1Kt8tHwdVoFlIEnHGNhX/Em');

-- --------------------------------------------------------

--
-- Table structure for table `employeeid`
--

CREATE TABLE IF NOT EXISTS `employeeid` (
  `SrNo` int(11) NOT NULL AUTO_INCREMENT,
  `EmpID` int(5) NOT NULL,
  PRIMARY KEY (`SrNo`),
  UNIQUE KEY `EmpID` (`EmpID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `employeeid`
--

INSERT INTO `employeeid` (`SrNo`, `EmpID`) VALUES
(2, 10000),
(5, 12345),
(6, 13345),
(1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE IF NOT EXISTS `solutions` (
  `challengeNo` int(11) NOT NULL,
  `solutionRaw` varchar(1025) NOT NULL,
  `solutionPretty` varchar(1025) NOT NULL,
  PRIMARY KEY (`challengeNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solutions`
--

INSERT INTO `solutions` (`challengeNo`, `solutionRaw`, `solutionPretty`) VALUES
(0, 'AGIL', 'AGIL'),
(1, 'WHENTIMECOMES,ANDYOUMAYNEEDWHENTHEYCOMEHUNTING,OUTOFGREEDDON''TGOALONE,FORTHEYARECREEDJUSTOPENBOOKANDCAREFULLYREAD', 'WHEN TIME COMES, AND YOU MAY NEED\r\nWHEN THEY COME HUNTING, OUT OF GREED\r\nDON''T GO ALONE, FOR THEY ARE CREED\r\nJUST OPEN BOOK AND CAREFULLY READ'),
(2, 'DONTMAKEMISTAKEYOUCANTAFFORD,BEWITTYANDSAVEFROMHANGINGSWORD,ORTHEYWILLSIGNASUCHACCORD,YOUWONTGETHELPFROMEVENTHELORD.', 'DONT MAKE MISTAKE YOU CANT AFFORD,\r\nBE WITTY AND SAVE FROM HANGING SWORD,\r\nOR THEY WILL SIGN A SUCH ACCORD,\r\nYOU WONT GET HELP FROM EVEN THE LORD.'),
(3, 'YOURLASTCHANCE.THELAUREL''SDINER,ONEPMTOMMORROW', 'YOUR LAST CHANCE. THE LAUREL''S DINER, ONE PM TOMMORROW'),
(4, 'LOOKFORCOATIS', 'Look For COATIS'),
(5, 'WEARECOMING', 'We are Coming'),
(6, 'DAEANVCAATECASNESTOETR-EM,EDIETIEUHSCNUSUO-ITIECO,L,ESYHSOH,TTELBEAAONRDGLGMO,OTPDMATELDRIPRNINTRYHERLEEW.GRFWYURYAIFYUBHOYTSSDSITPOAD-AN.EELEBIHADIEOU.SNOAENI,PEDGRPWTRL', 'DaeanvcaateC asnestoe t r-em,ed ietieuh scnu su O-itieco,l,esyhSoh ,ttelb e\r\nAao\r\nn rdglG m o  ,otpdmA teldri p r ni ntryherleew.grFW yu ry a ifyu bh oyTSsds itpoad-an.e eleb i hadi eou.snoaenI ,ped grp wtrl'),
(7, 'COATISISADANGEROUSORGANIZATION.ADDRESSIS241,9THAVENUE,DELLMOOREROAD', 'Coatis is a dangerous organization. Address is 241, 9th Avenue, Dellmoore Road'),
(8, 'COATISIPADDRESS:189.23.290.13PRIVATEKEY:EXPONENT:960579666006549817560236322319983030053924297595951478922705MODULUS:1058059960185402366316160067497052659354567879221060758600659', 'COATIS\r\nIP Address: 189.23.290.13\r\nPrivate Key:\r\nExponent: 960579666006549817560236322319983030053924297595951478922705\r\nModulus: 1058059960185402366316160067497052659354567879221060758600659'),
(9, 'THEFILESOFMRS.SIMONEAREENCRYPTEDINAHIGHLYSTRONGMANNER.WECANNEITHERDECRYPTNORCRACKTHATENCRYPTION.ONLYONEWHOOWNSTHEPRIVATEKEYCANDECRYPTTHOSEFILES.DETAILS:NOTONLYTHEFILESAREENCRYPTEDUSINGAESORADVANCEDENCRYPTIONSTANDARD,BUTTHE256-BITAESKEYNEEDEDTODECRYPTTHOSEFILESISALSOENCRYPTED;ANDTHATTOOWITHTHESTRONGASYMMETRICKEYALGORITHM,NAMELYTHERSA.KNOWINGTHEAESKEY,ANYONECANDECRYPTTHEFILES.BUTTHEAESKEYISENCRYPTEDUSINGRSAPUBLICKEY;ANDTODECRYPTTHAT,ONENEEDSTOKNOWTHECORRESPONDINGRSAPRIVATEKEYASSOCIATEDWITHTHATPUBLICKEY.WITHOUTKNOWINGTHERSAPRIVATEKEY,WECANNOTDECRYPTTHOSEFILES.ANDABOUT''BREAKING''OR''CRACKING''THATKEY,ITISBOTHTECHNICALLYASWELLASMATHEMATICALLYUNFEASIBLEANDIMPOSSIBLEFORATLEASTNEXT7YEARS.SUCHANINCIDENTDOESNOTSEEMACCIDENTAL,BUTAPARTOFASERIOUSINTENTIONALHACK', 'The files of Mrs. Simone are encrypted in a highly strong manner. We can neither decrypt nor crack that encryption. Only one who owns the private key can decrypt those files.\r\n\r\nDETAILS: Not only the files are encrypted using AES or Advanced Encryption Standard, but the 256-bit AES key needed to decrypt those files is also encrypted; and that too with the strong asymmetric key algorithm, namely the RSA. \r\nKnowing the AES key, anyone can decrypt the files. But the AES key is encrypted using RSA public key; and to decrypt that, one needs to know the corresponding RSA private key associated with that public key.\r\nWithout knowing the RSA private key, we cannot decrypt those files. And about ''breaking'' or ''cracking'' that key, it is both technically as well as mathematically unfeasible and impossible for at least next 7 years.\r\nSuch an incident does not seem accidental, but a part of a serious intentional hack'),
(10, 'FROM:COATISDATE:APRIL20,2009TO:FEROSYSTEMSSUB.:COOPERATIONANDSUPPORTFORAVERYPROFITABLEBUSINESS.WEARECOATIS-ANINVISIBLEORGANIZATIONWHICHSPECIALIZEINSPREADINGANDCONTROLLINGTHERANSOMWARECALLEDCRYPTORANSOMWHICHHACKSTHEUSERSBYENCRYPTINGTHEIRFILES,ANDTHENASKSFORLARGEAMOUNTSOFMONEYFORDECRYPTION.THEENCRYPTIONTECHNIQUEUSEDISVERYFOOLPROOFANDTHEUSERHAVENOOTHEROPTIONTHANTOEITHERPAYUSTHERANSOMORLOSETHEFILES.WEHAVEASUCCESSFULTRACKRECORDOFMORETHANHUNDREDVICTIMSEACHDAY.ANDFOREACHUSER,WEHAVEEARNED500TO1000USD.THEPAYMENTISDEMANDEDUSINGTORANDBITCOINS,WHICHMEANSTHATCOMPLETEANONYMITYISENSURED.IFYOUDECIDETOCOOPERATEANDSUPPORTUS-YOURHARDWAREINFRASTRUCTUREANDOURRANSOMWARE-THEN,TOGETHEROURBUSINESSCANGROWTOGREATRICHESTHEIGHTS.DECIDEYOURSELF.-COATISIFYOUCHOOSETOJOINUS,CONTACTTOOURCHIEFCRYPTOGRAPHERAT:WRIGHT.THOMAS@COATIS.SITCOA', 'From: COATIS\r\nDate: April 20, 2009\r\nTo: Fero Systems\r\nSub.: Cooperation and Support for a very profitable business.\r\n\r\nWe are COATIS - an invisible organization which specialize in spreading and controlling the ransomware called CryptoRansom which hacks the users by encrypting their files, and then asks for large amounts of money for decryption. The encryption technique used is very foolproof and the user have no other option than to either pay us the ransom or lose the files.\r\nWe have a successful track record of more than hundred victims each day. And for each user, we have earned 500 to 1000 USD. The payment is demanded using TOR and Bitcoins, which means that complete anonymity is ensured.\r\nIf you decide to cooperate and support us - your hardware infrastructure and our ransomware - then, together our business can grow to great richest heights.\r\nDecide yourself. \r\n\r\n-COATIS\r\n\r\nIf you choose to join us, contact to our chief cryptographer at: wright.thomas@coatis.sitcoa'),
(11, 'WARTHOG_SMITH', 'Warthog_Smith'),
(12, 'ONYOURNOTICE,IWENTTOREINVESTIGATEANDCAPTUREMR.WRIGHTATHISHOUSE,BUTWHATIFOUNDHAVEASTONISHEDMETOTHEHIGHESTDEGREE.THEREWASNOONETHERE-NOTAPERSON.NOTATHING.THEWHOLEPREMISEWASSOVACANT,ASIFNOONEHASLIVEDTHEREFORYEARS.IBROKEINTOTHEHOUSE,BUTCOULDN''TFINDANYCLUE.EVERYTHINGFROMTHEROOMSTOTHEBASEMENTWASENTIRELYEMPTY.WHENIASKEDTHELOCALPEOPLE,THEYTOLDTHATNOONEHASLIVEDPERMANENTLYTHEREFORYEARS;ANDTHATTHEHOUSEWASJUSTATOURISTSPOTWHICHWASGIVENTOCLIENTSONRENTFROMTIMETOTIME.WHENASKEDABOUTMRS.WRIGHT,THEYSAIDSHESEEMEDONEOFTHETEMPORARYCLIENTS,ANDTHATTHEYSAWHERPACKINGANDLEAVINGONTHENIGHTOF7TH.WHENICONTACTEDTHEHOUSE''SREGISTRARS,THEYTOLDTHATTHEHOUSEHASN''TBEENPUTONRENTTOANYONEFORLASTTWOMONTHS!FURTHERINVESTIGATIONSINTHELOCALSHOPSALSOPROVEDFUTILE,ASNOONEHADANYKNOWLEDGEOFWRIGHTS.THISISANUNBELIEVABLEPUZZLINGMYSTERYANDIHAVENOCLUEABOUTTHETRUTH', 'On your notice, I went to reinvestigate and capture Mr. Wright at his house, but what I found have astonished me to the highest degree.\r\nTHERE WAS NO ONE THERE - not a person. not a thing. The whole premise was so vacant, as if no one has lived there for years. I broke into the house, but couldn''t find any clue. Everything from the rooms to the basement was entirely empty.\r\nWhen I asked the local people, they told that no one has lived permanently there for years; and  that the house was just a tourist spot which was given to clients on rent from time to time. When asked about Mrs. Wright, they said she seemed one of the temporary clients, and that they saw her packing and leaving on the night of 7th. \r\nWhen I contacted the house''s registrars, they told that the house hasn''t been put on rent to anyone for last two months! Further investigations in the local shops also proved futile, as no one had any knowledge of Wrights.\r\nThis is an unbelievable puzzling mystery and I have no clue about the truth'),
(13, 'KNOWNSTORYISNEVERTHEWHOLESTORY', 'Known Story is Never the Whole Story.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `progress` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verified` int(11) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `password`, `email`, `progress`, `timestamp`, `verified`) VALUES
(7, 'manan', '$2y$10$kg/F0yyaIeSDvrmCkQ2BCuhHuMpEZ4QARYxpj0XaYftNoJtnWElv.', 'manan.dsvv@gmail.com', 14, '2016-03-03 17:37:46', NULL),
(18, 'qwerty', '$2y$10$8NND7auV1R1MaPpxy2ITwuxeEJTBOx/SDOGHRaol/wgLDPT9ou0y2', 'abc@a.com', 0, '2016-04-21 15:09:42', NULL),
(19, 'guest', '$2y$10$H0jbw62V/M59o6HVGxNNh.1ukKKxa/9L2eOvCp8uwc8nsAfKryuWu', 'guest1@a.a', 8, '2016-04-22 08:53:37', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
