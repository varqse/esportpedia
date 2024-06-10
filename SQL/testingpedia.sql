-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 09:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testingpedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `matchschedule`
--

CREATE TABLE `matchschedule` (
  `MatchID` char(5) NOT NULL CHECK (`MatchID` regexp '^MS[0-9]{3}$'),
  `TourID` char(5) NOT NULL,
  `Team1ID` char(5) NOT NULL,
  `Team2ID` char(5) NOT NULL,
  `TicketID` varchar(10) DEFAULT NULL,
  `MatchDate` date NOT NULL,
  `MatchTime` time NOT NULL,
  `MatchLocation` varchar(100) NOT NULL,
  `Team1Score` int(11) DEFAULT NULL,
  `Team2Score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matchschedule`
--

INSERT INTO `matchschedule` (`MatchID`, `TourID`, `Team1ID`, `Team2ID`, `TicketID`, `MatchDate`, `MatchTime`, `MatchLocation`, `Team1Score`, `Team2Score`) VALUES
('MS001', 'TO001', 'TL001', 'TL002', 'TI001', '2024-08-05', '15:00:00', 'Stockholm', 2, 1),
('MS002', 'TO001', 'TL003', 'TL004', 'TI002', '2024-08-06', '18:00:00', 'Stockholm', NULL, NULL),
('MS003', 'TO001', 'TL005', 'TL006', 'TI003', '2024-08-07', '12:00:00', 'Stockholm', NULL, NULL),
('MS004', 'TO001', 'TL007', 'TL008', 'TI005', '2024-08-08', '20:00:00', 'Stockholm', NULL, NULL),
('MS005', 'TO001', 'TL009', 'TL010', 'TI004', '2024-08-09', '16:00:00', 'Stockholm', NULL, NULL),
('MS006', 'TO001', 'TL011', 'TL012', 'TI007', '2024-08-10', '14:00:00', 'Stockholm', NULL, NULL),
('MS007', 'TO001', 'TL013', 'TL014', 'TI009', '2024-08-11', '17:00:00', 'Stockholm', NULL, NULL),
('MS008', 'TO001', 'TL015', 'TL016', 'TI010', '2024-08-12', '19:00:00', 'Stockholm', NULL, NULL),
('MS009', 'TO001', 'TL017', 'TL018', 'TI008', '2024-08-13', '13:00:00', 'Stockholm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playerlist`
--

CREATE TABLE `playerlist` (
  `PlayerID` char(5) NOT NULL DEFAULT 'PL000',
  `PlayerName` varchar(50) NOT NULL,
  `PlayerNationality` varchar(50) NOT NULL,
  `PlayerRole` varchar(50) NOT NULL,
  `PlayerDOB` varchar(30) NOT NULL,
  `TeamID` char(5) DEFAULT NULL,
  `Nickname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playerlist`
--

INSERT INTO `playerlist` (`PlayerID`, `PlayerName`, `PlayerNationality`, `PlayerRole`, `PlayerDOB`, `TeamID`, `Nickname`) VALUES
('PL000', 'fffff', 'ddddd', 'trr', '2024-06-10', NULL, 'vras'),
('PL001', 'Kuro Salehi Takhasomi', 'German', 'Captain', '1992-10-28', 'TL001', 'KuroKy'),
('PL002', 'Amer Al-Barkawi', 'Jordanian', 'Carry', '1996-12-20', 'TL001', 'Miracle-'),
('PL003', 'Ivan Ivanov', 'Bulgarian', 'Offlaner', '1993-01-20', 'TL001', 'MinD_ContRoL'),
('PL004', 'Maroun Merhej', 'Lebanese', 'Support', '1992-07-20', 'TL001', 'GH'),
('PL005', 'Aliwi Omar', 'Jordanian', 'Mid Laner', '1996-06-12', 'TL001', 'w33'),
('PL006', 'Ivan Burkin', 'Russian', 'Offlaner', '1995-09-05', 'TL001', 'Ironmen'),
('PL007', 'Anucha Jirawong', 'Thai', 'Captain', '1996-03-28', 'TL002', 'Jabz'),
('PL008', 'Nuengnara Teeramahanon', 'Thai', 'Carry', '1999-11-03', 'TL002', '23savage'),
('PL009', 'Kam Boon Seng', 'Malaysian', 'Mid Laner', '1997-07-12', 'TL002', 'Moon'),
('PL010', 'Daryl Koh Pei Xiang', 'Singaporean', 'Offlaner', '1990-06-17', 'TL002', 'iceiceice'),
('PL011', 'Johan Sundstein', 'Denmark', 'Captain', '1993-10-08', 'TL004', 'N0tail'),
('PL012', 'Sébastien Debs', 'France', 'Player', '1992-09-11', 'TL004', 'Ceb'),
('PL013', 'Topias Taavitsainen', 'Finland', 'Player', '1993-10-14', 'TL004', 'Topson'),
('PL014', 'Martin Sazdov', 'Macedonia', 'Player', '1996-12-07', 'TL004', 'Saksa'),
('PL015', 'Yeik Zheng', 'Malaysia', 'Player', '1996-11-02', 'TL004', 'MidOne'),
('PL016', 'Igor Filatov', 'Russia', 'Player', '1998-07-20', 'TL004', 'iLTW'),
('PL017', 'Akbar Butaev', 'Russia', 'Captain', '1993-10-05', 'TL005', 'SoNNeikO'),
('PL018', 'Vladyslav Krystanek', 'Ukraine', 'Player', '1998-07-13', 'TL005', 'Crystallize'),
('PL019', 'Bogdan Vasilenko', 'Ukraine', 'Player', '1998-06-18', 'TL005', 'Iceberg'),
('PL020', 'Viktor Nigrini', 'Estonia', 'Player', '1996-05-20', 'TL005', 'GeneRaL'),
('PL021', 'Andrey Bondarenko', 'Russia', 'Player', '1994-06-15', 'TL005', 'ALWAYSWANNAFLY'),
('PL022', 'Alik Vorobey', 'Ukraine', 'Player', '1999-02-28', 'TL005', 'V-Tune'),
('PL023', 'Marcin Jankowski', 'Poland', 'Captain', '1995-07-07', 'TL006', 'Jankos'),
('PL024', 'Luka Perković', 'Croatia', 'Player', '1998-10-28', 'TL006', 'Perkz'),
('PL025', 'Martin Hansen', 'Denmark', 'Player', '1999-11-09', 'TL006', 'Wunder'),
('PL026', 'Rasmus Winther', 'Denmark', 'Player', '2000-04-17', 'TL006', 'Caps'),
('PL027', 'Mihael Mehle', 'Slovenia', 'Player', '1998-05-20', 'TL006', 'Mikyx'),
('PL028', 'Martin Larsson', 'Sweden', 'Player', '1996-09-20', 'TL006', 'Rekkles'),
('PL029', 'Clement Ivanov', 'Estonia', 'Captain', '1990-03-19', 'TL007', 'Puppey'),
('PL030', 'Michal Jankowski', 'Poland', 'Player', '1999-07-01', 'TL007', 'Nisha'),
('PL031', 'Ludwig Wahlberg', 'Sweden', 'Player', '1998-04-01', 'TL007', 'zai'),
('PL032', 'Yazied Jaradat', 'Jordan', 'Player', '1995-08-26', 'TL007', 'YapzOr'),
('PL033', 'Lasse Urpalainen', 'Finland', 'Player', '1995-03-03', 'TL007', 'MATUMBAMAN'),
('PL034', 'William Lee', 'China', 'Player', '1996-01-02', 'TL007', 'Midas Mode'),
('PL035', 'Nikola Kovač', 'Bosnia', 'Captain', '1997-02-16', 'TL008', 'NiKo'),
('PL036', 'Helvijs Saukants', 'Latvia', 'Player', '1998-09-16', 'TL008', 'broky'),
('PL037', 'Russel Van Dulken', 'Canada', 'Player', '1999-11-14', 'TL008', 'Twistzz'),
('PL038', 'Finn Andersen', 'Denmark', 'Player', '1994-12-14', 'TL008', 'karrigan'),
('PL039', 'Markus Kjærbye', 'Denmark', 'Player', '1998-04-27', 'TL008', 'Kjaerbye'),
('PL040', 'Olof Gustafsson', 'Sweden', 'Player', '1991-01-31', 'TL008', 'olofmeister'),
('PL041', 'Nathan Schmitt', 'France', 'Captain', '1994-11-05', 'TL009', 'NBK-'),
('PL042', 'Özgür Eker', 'Turkey', 'Player', '1998-09-02', 'TL009', 'woxic'),
('PL043', 'Patrick Hansen', 'Denmark', 'Player', '1997-04-28', 'TL009', 'es3tag'),
('PL044', 'Alexey Golubev', 'Russia', 'Player', '1999-11-02', 'TL009', 'M1sfit'),
('PL045', 'William Wierzba', 'Poland', 'Player', '1999-08-30', 'TL009', 'mezii'),
('PL046', 'Ismail Ali', 'United Kingdom', 'Player', '1998-05-23', 'TL009', 'Alex'),
('PL047', 'Alexey Golubev', 'Russia', 'Captain', '1990-06-04', 'TL010', 'Solo'),
('PL048', 'Vladimir Minenko', 'Russia', 'Player', '1993-06-25', 'TL010', 'No[o]ne'),
('PL049', 'Roman Kushnarev', 'Russia', 'Player', '1994-10-08', 'TL010', 'Resolut1on'),
('PL050', 'Egor Grigorenko', 'Russia', 'Player', '1998-07-05', 'TL010', 'epileptick1d'),
('PL051', 'Danil Ishutin', 'Ukraine', 'Player', '1989-12-30', 'TL010', 'Dendi'),
('PL052', 'Vladimir Anosov', 'Russia', 'Player', '1999-05-10', 'TL010', 'Kingslayer'),
('PL053', 'James Macaulay', 'United Kingdom', 'Captain', '1990-03-26', 'TL011', 'Reginald'),
('PL054', 'Vincent Wang', 'United States', 'Player', '1993-10-09', 'TL011', 'Biofrost'),
('PL055', 'Soren Bjerg', 'Denmark', 'Player', '1996-02-21', 'TL011', 'Bjergsen'),
('PL056', 'Mohammed Haque', 'United States', 'Player', '1994-06-18', 'TL011', 'Yassuo'),
('PL057', 'Lawrence Sze', 'Canada', 'Player', '1997-08-19', 'TL011', 'Lost'),
('PL058', 'Mingyi Lou', 'China', 'Player', '1999-01-07', 'TL011', 'Spica'),
('PL059', 'Matthew Elento', 'United States', 'Captain', '1991-08-09', 'TL012', 'N0thing'),
('PL060', 'Tarik Celik', 'United States', 'Player', '1996-02-19', 'TL012', 'tarik'),
('PL061', 'Joshua Nissan', 'United States', 'Player', '1994-03-14', 'TL012', 'jdm64'),
('PL062', 'Kenneth Suen', 'United States', 'Player', '1997-06-01', 'TL012', 'koosta'),
('PL063', 'Yassine Taoufik', 'Canada', 'Player', '1995-07-25', 'TL012', 'Subroza'),
('PL064', 'Jonathan Jablonowski', 'United States', 'Player', '1997-07-26', 'TL012', 'Ethan'),
('PL065', 'Taylor Johnson', 'United States', 'Captain', '1992-09-30', 'TL013', 'Drone'),
('PL066', 'Pujan Mehta', 'United States', 'Player', '1995-10-05', 'TL013', 'FNS'),
('PL067', 'Jacob Mourujärvi', 'Sweden', 'Player', '1996-02-14', 'TL013', 'pyth'),
('PL068', 'Anthony Cuevas-Castro', 'United States', 'Player', '1999-08-28', 'TL013', 'mummAy'),
('PL069', 'Sam LaFortune', 'United States', 'Player', '1999-01-03', 'TL013', 'SicK'),
('PL070', 'Bradley Fodor', 'United States', 'Player', '1993-12-20', 'TL013', 'ANDROID'),
('PL071', 'Yaroslav Kuznetsov', 'Russia', 'Captain', '1992-01-24', 'TL014', 'Miposhka'),
('PL072', 'Igor Shevchenko', 'Russia', 'Player', '1995-11-05', 'TL014', 'young G'),
('PL073', 'Andrey Golubev', 'Ukraine', 'Player', '1993-05-15', 'TL014', 'Ghostik'),
('PL074', 'Vadim Panchuk', 'Russia', 'Player', '1994-06-03', 'TL014', 'Palantimos'),
('PL075', 'Vitaliy Mishkarev', 'Russia', 'Player', '1994-12-17', 'TL014', 'Save-'),
('PL076', 'Yaroslav Lozhechkin', 'Ukraine', 'Player', '1994-03-08', 'TL014', 'Mio'),
('PL077', 'Mathieu Herbaut', 'France', 'Captain', '2000-11-09', 'TL015', 'ZywOo'),
('PL078', 'Richard Papillon', 'France', 'Player', '1992-05-27', 'TL015', 'shox'),
('PL079', 'Kévin Rabier', 'France', 'Player', '2002-07-26', 'TL015', 'misutaaa'),
('PL080', 'Jayson Nguyen Van', 'France', 'Player', '2001-01-08', 'TL015', 'Kyojin'),
('PL081', 'Fabien Fiey', 'France', 'Player', '1994-02-26', 'TL015', 'kioShiMa'),
('PL082', 'Dan Madesclaire', 'France', 'Player', '1993-02-22', 'TL015', 'apEX'),
('PL083', 'Johan Sundstein', 'Denmark', 'Captain', '1993-10-08', 'TL016', 'N0tail'),
('PL084', 'Sébastien Debs', 'France', 'Player', '1992-09-11', 'TL016', 'Ceb'),
('PL085', 'Topias Taavitsainen', 'Finland', 'Player', '1993-10-14', 'TL016', 'Topson'),
('PL086', 'Martin Sazdov', 'Macedonia', 'Player', '1996-12-07', 'TL016', 'Saksa'),
('PL087', 'Yeik Zheng', 'Malaysia', 'Player', '1996-11-02', 'TL016', 'MidOne'),
('PL088', 'Igor Filatov', 'Russia', 'Player', '1998-07-20', 'TL016', 'iLTW'),
('PL089', 'Lin Chongqing', 'China', 'Captain', '1995-07-28', 'TL017', 'Xxs'),
('PL090', 'Kee Chua', 'Malaysia', 'Player', '1996-06-07', 'TL017', 'ChYuan'),
('PL091', 'Ye Zhibiao', 'China', 'Player', '1997-03-29', 'TL017', 'BoBoKa'),
('PL092', 'Lu Yao', 'China', 'Player', '1994-05-28', 'TL017', 'Fade'),
('PL093', 'Chen Zhihao', 'China', 'Player', '1998-10-22', 'TL017', 'Monet'),
('PL094', 'Lin Jing', 'China', 'Player', '1995-01-28', 'TL017', 'Dstones'),
('PL095', 'Bai Fan', 'China', 'Captain', '1995-02-08', 'TL018', 'rOtk'),
('PL096', 'Zhou Yifu', 'China', 'Player', '1993-11-28', 'TL018', 'Emo'),
('PL097', 'Thiay Lai', 'Malaysia', 'Player', '1994-09-07', 'TL018', 'JT-'),
('PL098', 'Hu Ziyang', 'China', 'Player', '1994-08-09', 'TL018', 'kaka'),
('PL099', 'Jin Xin', 'China', 'Player', '1996-01-30', 'TL018', 'flyflyfly'),
('PL100', 'Hu Sen', 'China', 'Player', '1996-12-28', 'TL018', 'Oli~'),
('PL102', 'fffff', 'ddddd', 'trr', '2024-06-10', 'TL001', 'vras'),
('PL103', 'test', 'eaeas', 'trr', '2024-06-10', 'TL001', 'rfff'),
('PL104', 'someone', 'somewhere', 'sssss', '2024-06-10', 'TL003', 'ssssss');

-- --------------------------------------------------------

--
-- Table structure for table `playermetrics`
--

CREATE TABLE `playermetrics` (
  `PlayerMetrics` char(5) NOT NULL,
  `Height` int(11) DEFAULT NULL,
  `Weight` int(11) DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `signature` varchar(50) NOT NULL,
  `division` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teamlist`
--

CREATE TABLE `teamlist` (
  `TeamID` char(5) NOT NULL CHECK (`TeamID` regexp '^TL[0-9]{3}$'),
  `TeamName` varchar(50) NOT NULL,
  `TeamNationality` varchar(50) NOT NULL,
  `TeamLogo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teamlist`
--

INSERT INTO `teamlist` (`TeamID`, `TeamName`, `TeamNationality`, `TeamLogo`) VALUES
('TL001', 'Team Liquid', 'USA', 'TeamLiquid.png'),
('TL002', 'Fnati', 'UK', 'Fnatic.png'),
('TL003', 'Evil Geniuses', 'USA', 'EvilGeniuses.png'),
('TL004', 'OG', 'Europe', NULL),
('TL005', 'Natus Vincere', 'Ukraine', NULL),
('TL006', 'G2 Esports', 'Germany', NULL),
('TL007', 'Team Secret', 'Europe', NULL),
('TL008', 'FaZe Clan', 'USA', NULL),
('TL009', 'Cloud9', 'USA', NULL),
('TL010', 'Virtus.pro', 'Russia', NULL),
('TL011', 'Team SoloMid (TSM)', 'USA', NULL),
('TL012', 'Counter Logic Gaming (CLG)', 'USA', NULL),
('TL013', 'Team Envy', 'USA', NULL),
('TL014', 'Team Empire', 'Russia', NULL),
('TL015', 'Team Vitality', 'France', NULL),
('TL016', 'Team OG', 'Europe', NULL),
('TL017', 'Team Aster', 'China', NULL),
('TL018', 'Invictus Gaming', 'China', NULL),
('TL019', 'Alter Ego', 'Indonesia', 'JFKt3MphHSP1XlpIzD1zLabstYvXDFzF4KDLfRGj.png'),
('TL020', 'Evos', 'Indonesia', 'TScyRRUDI4PubAcWc1ogvUAcvPjQMfrrkFBIH5zW.png'),
('TL021', 'test', 'test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teamroster`
--

CREATE TABLE `teamroster` (
  `RoasterPlayerID` varchar(5) NOT NULL,
  `RoasterTeamID` varchar(5) NOT NULL,
  `PlayerNumber` int(11) DEFAULT NULL,
  `PlayerWorth` int(11) DEFAULT NULL,
  `PlayerEmail` varchar(255) DEFAULT NULL,
  `TeamEmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `TicketID` char(5) NOT NULL CHECK (`TicketID` regexp '^TI[0-9]{3}$'),
  `Price` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`TicketID`, `Price`, `Quantity`) VALUES
('TI001', 50, 100),
('TI002', 60, 120),
('TI003', 55, 110),
('TI004', 45, 90),
('TI005', 70, 140),
('TI006', 65, 130),
('TI007', 75, 150),
('TI008', 40, 80),
('TI009', 80, 160),
('TI010', 90, 180);

-- --------------------------------------------------------

--
-- Table structure for table `tourlist`
--

CREATE TABLE `tourlist` (
  `TourID` char(5) NOT NULL CHECK (`TourID` regexp '^TO[0-9]{3}$'),
  `TourName` varchar(50) NOT NULL,
  `TourTier` varchar(50) NOT NULL,
  `TourStartDate` date NOT NULL,
  `TourFinishDate` date NOT NULL,
  `Location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourlist`
--

INSERT INTO `tourlist` (`TourID`, `TourName`, `TourTier`, `TourStartDate`, `TourFinishDate`, `Location`) VALUES
('TO001', 'The International', 'Tier 1', '2024-08-05', '2024-08-15', 'Stockholm'),
('TO002', 'League of Legends World Championship', 'Tier 1', '2024-09-20', '2024-10-31', 'Various Locations'),
('TO003', 'Fortnite World Cup', 'Tier 1', '2024-07-10', '2024-07-18', 'New York'),
('TO004', 'Dota 2 Major', 'Tier 1', '2024-11-12', '2024-11-21', 'Paris'),
('TO005', 'CS:GO Major Championship', 'Tier 1', '2024-06-05', '2024-06-15', 'Berlin'),
('TO006', 'MLBB Mid Season Cup', 'Tier 1', '2023-10-01', '2023-10-10', 'Riyadh'),
('TO007', 'Valorant Champions Tour', 'Tier 1', '2024-08-01', '2024-08-10', 'Los Angeles'),
('TO008', 'Overwatch League Grand Finals', 'Tier 1', '2024-09-15', '2024-09-20', 'San Francisco'),
('TO009', 'Rainbow Six Siege Invitational', 'Tier 1', '2024-02-11', '2024-02-17', 'Montreal'),
('TO010', 'PUBG Global Championship', 'Tier 1', '2024-11-10', '2024-11-18', 'Seoul'),
('TO011', 'Hearthstone World Championship', 'Tier 2', '2024-12-01', '2024-12-05', 'Las Vegas'),
('TO012', 'Rocket League Championship Series', 'Tier 1', '2024-06-20', '2024-06-25', 'London'),
('TO013', 'StarCraft II World Championship Series', 'Tier 1', '2024-07-05', '2024-07-12', 'Seoul'),
('TO014', 'Smite World Championship', 'Tier 2', '2024-01-05', '2024-01-10', 'Atlanta'),
('TO015', 'Apex Legends Global Series', 'Tier 1', '2024-05-15', '2024-05-20', 'Los Angeles'),
('TO016', 'Street Fighter V Capcom Cup', 'Tier 2', '2024-03-05', '2024-03-09', 'Tokyo'),
('TO017', 'Magic: The Gathering World Championship', 'Tier 2', '2024-04-10', '2024-04-15', 'New York'),
('TO018', 'Clash Royale League World Finals', 'Tier 2', '2024-11-01', '2024-11-05', 'Shanghai'),
('TO019', 'World of Warcraft Arena World Championship', 'Tier 2', '2024-12-10', '2024-12-15', 'San Diego'),
('TO020', 'FIFA eWorld Cup', 'Tier 1', '2024-07-20', '2024-07-25', 'Zurich'),
('TO021', 'Tekken World Tour Finals', 'Tier 2', '2024-10-20', '2024-10-25', 'Seoul'),
('TO022', 'Gears of War Esports Championship', 'Tier 2', '2024-09-01', '2024-09-05', 'Mexico City'),
('TO023', 'Paladins World Championship', 'Tier 2', '2024-02-01', '2024-02-05', 'Orlando'),
('TO024', 'Brawlhalla World Championship', 'Tier 2', '2024-03-15', '2024-03-18', 'Charlotte'),
('TO025', 'Heroes of the Storm Global Championship', 'Tier 2', '2024-05-25', '2024-05-30', 'Paris'),
('TO026', 'Dota 2 Minor', 'Tier 2', '2024-06-15', '2024-06-20', 'Moscow'),
('TO027', 'League of Legends Mid-Season Invitational', 'Tier 1', '2024-05-01', '2024-05-10', 'Shanghai'),
('TO028', 'Fortnite Champion Series', 'Tier 2', '2024-08-20', '2024-08-25', 'Los Angeles'),
('TO029', 'CS:GO Blast Premier', 'Tier 1', '2024-09-25', '2024-09-30', 'Copenhagen'),
('TO030', 'Mobile Legends MPL Invitational', 'Tier 2', '2024-11-25', '2024-11-30', 'Manila');

-- --------------------------------------------------------

--
-- Table structure for table `tourteam`
--

CREATE TABLE `tourteam` (
  `TTourID` char(5) DEFAULT NULL,
  `TTeamID` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `saldo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `type` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `saldo`, `type`) VALUES
(1, 'Ishvara', 'ishvara.lakshmana@binus.ac.id', NULL, '$2y$12$VUvanobW.zvSz0HzQqMFEuC7RwusfC7SO76WyFgVhlx5/9eOtEOIq', '6Eawu1CPxomiWGJmohM836sr7vD5ZHTSPmsHMVLduz6eKHOV6vOliwOMDuWo', '2024-06-06 23:21:41', '2024-06-06 23:21:41', 0.00, 1),
(2, 'var', 'varryabless@gmail.com', NULL, '$2y$12$VTvS2vsnAQ809gmKB/c8v.4s09MJhBDV4hiltqQmYL.sfbNu36Lzm', 'HeX5zT0HVrCZgBJIl6gBxakUVnmBNEUGfnrZfaFMn0wIm2m3Z0MzSoFAwHRg', '2024-06-06 23:35:23', '2024-06-06 23:35:23', 0.00, 0),
(3, 'Phx', 'asphyxia@gmail.com', NULL, '$2y$12$/QyAgflLE2aSccKm0iPshOmBKPZ7.zQurHoslmPuQ0geGpUiUlDYi', 'pHryBgnVLUmLlZiYnyfxPQuTqyKPYgfa3QbKl3KtAyCeKUlQBdO4S2S6dX3u', '2024-06-08 22:56:23', '2024-06-08 22:56:23', 0.00, 0),
(4, 'test name', 'test@gmail.com', NULL, '$2y$12$5qLFjHNaDnszfafTiKf5VellO19vkR5Vlc0XPLRPPYhNeg8Rmq3/m', 'gva3anvyOsrr0AroRPR2sSIb0LY9uG7KyY1eg1uLVfNPV4WJmnBjqpiJhg9G', '2024-06-10 00:14:54', '2024-06-10 00:14:54', 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_tickets`
--

CREATE TABLE `user_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `match_id` char(5) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matchschedule`
--
ALTER TABLE `matchschedule`
  ADD PRIMARY KEY (`MatchID`),
  ADD KEY `TourID` (`TourID`),
  ADD KEY `Team1ID` (`Team1ID`),
  ADD KEY `Team2ID` (`Team2ID`),
  ADD KEY `matchschedule_ibfk_4` (`TicketID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `playerlist`
--
ALTER TABLE `playerlist`
  ADD PRIMARY KEY (`PlayerID`),
  ADD KEY `TeamID` (`TeamID`);

--
-- Indexes for table `playermetrics`
--
ALTER TABLE `playermetrics`
  ADD PRIMARY KEY (`PlayerMetrics`);

--
-- Indexes for table `teamlist`
--
ALTER TABLE `teamlist`
  ADD PRIMARY KEY (`TeamID`);

--
-- Indexes for table `teamroster`
--
ALTER TABLE `teamroster`
  ADD PRIMARY KEY (`RoasterPlayerID`,`RoasterTeamID`),
  ADD KEY `RoasterTeamID` (`RoasterTeamID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TicketID`);

--
-- Indexes for table `tourlist`
--
ALTER TABLE `tourlist`
  ADD PRIMARY KEY (`TourID`);

--
-- Indexes for table `tourteam`
--
ALTER TABLE `tourteam`
  ADD KEY `TTourID` (`TTourID`),
  ADD KEY `TTeamID` (`TTeamID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_tickets`
--
ALTER TABLE `user_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `match_id` (`match_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_tickets`
--
ALTER TABLE `user_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matchschedule`
--
ALTER TABLE `matchschedule`
  ADD CONSTRAINT `matchschedule_ibfk_1` FOREIGN KEY (`TourID`) REFERENCES `tourlist` (`TourID`),
  ADD CONSTRAINT `matchschedule_ibfk_2` FOREIGN KEY (`Team1ID`) REFERENCES `teamlist` (`TeamID`),
  ADD CONSTRAINT `matchschedule_ibfk_3` FOREIGN KEY (`Team2ID`) REFERENCES `teamlist` (`TeamID`),
  ADD CONSTRAINT `matchschedule_ibfk_4` FOREIGN KEY (`TicketID`) REFERENCES `ticket` (`TicketID`);

--
-- Constraints for table `playerlist`
--
ALTER TABLE `playerlist`
  ADD CONSTRAINT `playerlist_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `teamlist` (`TeamID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `playermetrics`
--
ALTER TABLE `playermetrics`
  ADD CONSTRAINT `playermetrics_ibfk_1` FOREIGN KEY (`PlayerMetrics`) REFERENCES `playerlist` (`PlayerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teamroster`
--
ALTER TABLE `teamroster`
  ADD CONSTRAINT `teamroster_ibfk_1` FOREIGN KEY (`RoasterPlayerID`) REFERENCES `playerlist` (`PlayerID`),
  ADD CONSTRAINT `teamroster_ibfk_2` FOREIGN KEY (`RoasterTeamID`) REFERENCES `teamlist` (`TeamID`);

--
-- Constraints for table `tourteam`
--
ALTER TABLE `tourteam`
  ADD CONSTRAINT `tourteam_ibfk_1` FOREIGN KEY (`TTourID`) REFERENCES `tourlist` (`TourID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tourteam_ibfk_2` FOREIGN KEY (`TTeamID`) REFERENCES `teamlist` (`TeamID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_tickets`
--
ALTER TABLE `user_tickets`
  ADD CONSTRAINT `user_tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_tickets_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `matchschedule` (`MatchID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
