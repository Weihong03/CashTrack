-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 09:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdp2107`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccounts`
--

CREATE TABLE `tblaccounts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `balance` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblaccounts`
--

INSERT INTO `tblaccounts` (`id`, `user_id`, `name`, `balance`) VALUES
(1, 1, 'Maybank', 1000.00),
(2, 1, 'Hong Leong', 2000.00),
(3, 1, 'Cash', 89.00),
(7, 2, 'Maybank', 1019.89),
(8, 2, 'Hong Leong', 975.00),
(9, 3, 'Cash', 20.11);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `adminName`, `email`, `password`) VALUES
(1, 'Ooi Wei Hong', 'TP065329@mail.apu.edu.my', 'Weihong123'),
(2, 'Loy Te Hong', 'TP065615@mail.apu.edu.my', 'Tehong123'),
(3, 'Lee Hao', 'TP065510@mail.apu.edu.my', 'Leehao123');

-- --------------------------------------------------------

--
-- Table structure for table `tblbudget`
--

CREATE TABLE `tblbudget` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `account` varchar(50) NOT NULL,
  `expenseCategory` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbudget`
--

INSERT INTO `tblbudget` (`id`, `user_id`, `title`, `amount`, `account`, `expenseCategory`, `category`, `date`) VALUES
(1, 2, 'Wifi Bill', 52.94, 'Hong Leong', 'Phone', 'Expense', '2023-06-01'),
(2, 2, 'Utilities', 30.00, 'Maybank', 'Utilities', 'Expense', '2023-06-02'),
(3, 3, 'Part-time Job', 2000.00, 'Maybank', 'Part-Time Job', 'Income', '2023-06-04'),
(4, 2, 'Salary', 2672.88, 'Hong Leong', 'Salary', 'Income', '2023-05-04'),
(5, 2, 'Part-Time Job', 120.00, 'Maybank', 'Part-Time Job', 'Income', '2023-06-02'),
(6, 1, 'Wifi Bill', 62.94, 'Hong Leong', 'Utilities', 'Expense', '2023-06-02'),
(7, 1, 'Part-Time Job', 120.00, 'Maybank', 'Part-Time Job', 'Income', '2023-06-04'),
(13, 2, 'Mid Valley', 250.00, 'Hong Leong', 'Shopping', 'Expense', '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `tblexpense`
--

CREATE TABLE `tblexpense` (
  `id` int(15) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblexpense`
--

INSERT INTO `tblexpense` (`id`, `categoryName`, `type`) VALUES
(1, 'Food', 'Expense'),
(2, 'Groceries', 'Expense'),
(3, 'Transportation', 'Expense'),
(4, 'Utilities', 'Expense'),
(5, 'Phone', 'Expense'),
(6, 'House', 'Expense'),
(7, 'Clothes', 'Expense'),
(8, 'Car', 'Expense'),
(9, 'Entertainment', 'Expense'),
(10, 'Beauty', 'Expense'),
(11, 'Socializing', 'Expense'),
(12, 'Books', 'Expense'),
(13, 'Insurance', 'Expense'),
(14, 'Tax', 'Expense'),
(15, 'Health', 'Expense'),
(16, 'Education', 'Expense'),
(29, 'Salary', 'Income'),
(30, 'Allowance', 'Income'),
(31, 'Part-Time Job', 'Income'),
(37, 'Shopping', 'Expense');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`id`, `userName`, `email`, `feedback`) VALUES
(1, 'Lisetta Sainthill', 'lsainthill0@lycos.com', 'The application includes many function and benefits my budget saving plan.'),
(2, 'Jacinta Peirson', 'jpeirson2@unicef.org', 'I like the design of the user interface.'),
(3, 'Gilly Dunklee', 'gdunklee5@bbb.org', 'The Expense and Income Management can be more specific.'),
(4, 'Susie Zottoli', 'szottoli9@bluehost.com', 'The budget application should be updated once in a month.'),
(5, 'Rock Leupold', 'rleupoldb@kickstarter.com', 'I think the application is good enough!');

-- --------------------------------------------------------

--
-- Table structure for table `tblreminder`
--

CREATE TABLE `tblreminder` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreminder`
--

INSERT INTO `tblreminder` (`id`, `user_id`, `detail`, `date`) VALUES
(16, 2, '1st of July Wifi Bill ', '2023-06-13 14:31:04'),
(18, 2, 'Monthly installment due date 30th June', '2023-06-13 15:45:29'),
(19, 2, 'RM20k to collect from Maybank', '2023-06-13 14:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `tblsetting`
--

CREATE TABLE `tblsetting` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsetting`
--

INSERT INTO `tblsetting` (`id`, `user_id`, `category`, `amount`) VALUES
(1, 1, 'Food', 2000.00),
(2, 1, 'Utilities', 200.00),
(3, 1, 'Shopping', 800.00),
(4, 2, 'Food', 2500.00),
(6, 2, 'Shopping', 500.00),
(10, 2, 'Utilities', 35.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(4) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telephone` int(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `creditscore` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `firstname`, `lastname`, `email`, `password`, `telephone`, `address`, `creditscore`) VALUES
(1, 'Lisetta', 'Sainthill', 'lsainthill0@lycos.com', 'lZL37w', 2147483647, '99828 Veith Circle', 65),
(2, 'Keenans', 'Theaker', 'ktheaker1@imdb.com', '8IEzidO0f', 2147483647, '87332 Nobel Street', 9),
(3, 'Jacinta', 'Peirson', 'jpeirson2@unicef.org', 'z7ZvhBRj3ClT', 2147483647, '60269 Waxwing Hill', 2),
(4, 'Hervey', 'O\'Fogerty', 'hofogerty3@themeforest.net', 'voAtXLy5SUbB', 2147483647, '7 Heffernan Court', 50),
(5, 'Nana', 'Normavill', 'nnormavill4@ameblo.jp', 'YGA3N9TuS6Nb', 1254893451, '7964 Summit Avenue', 59),
(6, 'Gilly', 'Dunklee', 'gdunklee5@bbb.org', '2KryuyJGL9', 2147483647, '0 Ryan Crossing', 97),
(7, 'Bess', 'Uman', 'buman6@dropbox.com', 'elBh7Fr', 12747899, '2 Bartelt Street', 81),
(8, 'Caspar', 'Seiter', 'cseiter7@independent.co.uk', 'AxaFnz', 1517799789, '70 Eastwood Plaza', 40),
(9, 'Al', 'Easey', 'aeasey8@illinois.edu', 'qXTcILB', 1965467889, '86 Pennsylvania Parkway', 67),
(10, 'Susie', 'Zottoli', 'szottoli9@bluehost.com', 'bXl9YxFj', 2147483647, '9 Northwestern Way', 10),
(11, 'Othello', 'Anstead', 'oansteada@ask.com', 'Fifr0R9AccVg', 2147483647, '68514 Brentwood Street', 23),
(12, 'Rock', 'Leupold', 'rleupoldb@kickstarter.com', 'ihPuMW', 2147483647, '8530 Blaine Drive', 51),
(13, 'Bucky', 'Schreurs', 'bschreursc@howstuffworks.com', 'EHtNBw0Fi4Tn', 2147483647, '40 Hazelcrest Alley', 20),
(14, 'Kimmie', 'Whewell', 'kwhewelld@homestead.com', 'r2mr4C', 2147483647, '5 Mcbride Alley', 19),
(15, 'Denys', 'Audley', 'daudleye@wunderground.com', 'K3N6YY4Y', 2147483647, '9190 Waubesa Pass', 49),
(16, 'Ingram', 'Bortolotti', 'ibortolottif@weather.com', 'K8Uq8Q', 12477894, '2 Waubesa Hill', 57),
(17, 'Hobard', 'Ault', 'haultg@tamu.edu', 'kRf09K', 2147483647, '05505 Ruskin Junction', 81),
(18, 'Phillip', 'Brooksbank', 'pbrooksbankh@cbslocal.com', 'IOi0I8TqCqx', 2147483647, '2914 Crowley Lane', 34),
(19, 'Nester', 'Belin', 'nbelini@printfriendly.com', 'IklaGoWZ5ZNE', 2147483647, '71 Mosinee Trail', 17),
(20, 'Aggi', 'Batie', 'abatiej@sphinn.com', 'AA3nyt4', 125787994, '25409 Westerfield Alley', 75),
(21, 'Nikolaus', 'Stancer', 'nstancerk@wired.com', 'ZfEixYe9FAx', 2147483647, '29 Burrows Avenue', 18),
(22, 'Crin', 'Lembrick', 'clembrickl@sakura.ne.jp', 'd9DjHcNI', 12459954, '94 Lakewood Gardens Court', 32),
(23, 'Siobhan', 'Jeram', 'sjeramm@zdnet.com', 'BSsLkxuK', 12456987, '0001 Hauk Terrace', 60),
(24, 'Francine', 'Mossdale', 'fmossdalen@baidu.com', '8XqNALZkW', 2147483647, '3660 Bobwhite Road', 62),
(25, 'Morgen', 'Hassey', 'mhasseyo@blogs.com', 'Rd6EU01Rw2HC', 2147483647, '8 Banding Junction', 28),
(26, 'Tades', 'Hourston', 'thourstonp@fotki.com', 'qZHpBk', 2147483647, '1820 Muir Drive', 35),
(27, 'Natale', 'de Pinna', 'ndepinnaq@oakley.com', 'Ni8VKb3vhU', 2147483647, '345 Lukken Point', 56),
(28, 'Con', 'Wingar', 'cwingarr@illinois.edu', 'pDpsUd', 2147483647, '3471 Pawling Avenue', 98),
(29, 'Ailina', 'Acott', 'aacotts@printfriendly.com', 'oaRJ6aDo', 1481666465, '768 Bobwhite Junction', 1),
(30, 'Gan', 'Paddison', 'gpaddisont@slideshare.net', 'B5VqRz0PJS', 2147483647, '4671 Westridge Alley', 2),
(31, 'Alaster', 'Di Iorio', 'adiioriou@addthis.com', 'f4xvpzN', 2147483647, '01565 Springview Circle', 67),
(32, 'Vidovic', 'Albinson', 'valbinsonv@wordpress.org', 'VqNluMzYBO', 2147483647, '07 Crowley Court', 12),
(33, 'Lani', 'Rickeard', 'lrickeardw@pinterest.com', '1Ryt5YZrGrEq', 2147483647, '53 Hollow Ridge Court', 99),
(34, 'Dareen', 'Mugridge', 'dmugridgex@senate.gov', 'qhZeXxsgf', 2147483647, '54 Village Center', 22),
(35, 'Hewe', 'Bleyman', 'hbleymany@weebly.com', 'TxWIRd', 2147483647, '1 Clyde Gallagher Street', 3),
(36, 'Webb', 'Carroll', 'wcarrollz@e-recht24.de', 'EPGiXyb4JK', 2147483647, '712 Meadow Valley Court', 35),
(37, 'Conny', 'Thomasen', 'cthomasen10@github.com', 'knllxoV', 2147483647, '386 Little Fleur Plaza', 57),
(38, 'Ettie', 'Akerman', 'eakerman11@chron.com', 'h7Md1OB1', 2147483647, '89 Di Loreto Circle', 35),
(39, 'Brad', 'Rookesby', 'brookesby12@mysql.com', 'gxhadWOb', 2147483647, '1795 Columbus Place', 22),
(40, 'Ethyl', 'Ferrarello', 'eferrarello13@github.com', 'sTnteAjQS3Zc', 1322492696, '25 Forest Dale Trail', 46),
(41, 'Kermie', 'Polglase', 'kpolglase14@mozilla.com', 'Wf0hHhVw5lq', 2147483647, '8 Summit Road', 77),
(42, 'Floria', 'Cowlam', 'fcowlam15@arizona.edu', '8mC6RXUd8', 2147483647, '584 Gale Trail', 0),
(43, 'Denna', 'Goldis', 'dgoldis16@wikispaces.com', '5gqhJF', 2147483647, '2620 Arapahoe Parkway', 35),
(44, 'Antin', 'Kann', 'akann17@nih.gov', '5NyjfMmaTl5', 2147483647, '07 Talisman Point', 64),
(45, 'Dion', 'Backhouse', 'dbackhouse18@de.vu', 'c4pAd1Gx5w', 2147483647, '7325 Doe Crossing Road', 35),
(46, 'Daron', 'Olivet', 'dolivet19@slate.com', 'Mc77adD', 2147483647, '85643 Glacier Hill Parkway', 53),
(47, 'Salaidh', 'Monahan', 'smonahan1a@wikimedia.org', 'Krr2EdNEe', 1498334924, '67 Loomis Court', 67),
(48, 'Taber', 'Gribbell', 'tgribbell1b@desdev.cn', 'QFt9UeY8z0M', 2147483647, '4159 Waubesa Hill', 78),
(49, 'Adaline', 'Pomfret', 'apomfret1c@istockphoto.com', 'sqbnV0rkk6Y6', 2147483647, '5 Lunder Terrace', 35),
(50, 'Kamillah', 'Chitham', 'kchitham1d@odnoklassniki.ru', 'OdSW6fhdDlV', 2147483647, '9 Prentice Trail', 87),
(51, 'Brantley', 'Flament', 'bflament1e@vimeo.com', 'AoVVnKiKma', 2147483647, '7791 Lillian Court', 45),
(52, 'Imelda', 'Prosch', 'iprosch1f@seattletimes.com', '4nIVpoj0', 2147483647, '1 La Follette Terrace', 24),
(53, 'Minne', 'Cloutt', 'mcloutt1g@simplemachines.org', 'NtaycW', 2147483647, '13009 Crescent Oaks Pass', 55),
(54, 'Amabel', 'Malshinger', 'amalshinger1h@nih.gov', 'EhRbxyvKh2', 2147483647, '01 West Junction', 67),
(55, 'Anthiathia', 'Carik', 'acarik1i@google.co.jp', 'r2QNvcp', 1519057137, '224 Red Cloud Alley', 99),
(56, 'Eddie', 'Clemendot', 'eclemendot1j@about.com', 'Q3uGCo', 2147483647, '72579 Westend Alley', 33),
(57, 'Yuri', 'Cuningham', 'ycuningham1k@addtoany.com', '4AdbagZFgBa', 2147483647, '72145 Red Cloud Lane', 25),
(58, 'Nerissa', 'Woolger', 'nwoolger1l@bloglovin.com', 'N1oCIMphRH', 1635094319, '3 Forster Plaza', 75),
(59, 'Lela', 'Rraundl', 'lrraundl1m@upenn.edu', 'QGlzJXZi', 2147483647, '96 Maywood Road', 46),
(60, 'Joseph', 'Giscken', 'jgiscken1n@phoca.cz', 'ogsrnGMPw', 2147483647, '90 Pearson Plaza', 46),
(61, 'Adlai', 'Jarmain', 'ajarmain1o@dyndns.org', 'GiW0IiCo', 2147483647, '8570 Green Ridge Terrace', 68),
(62, 'Benoite', 'McGonigle', 'bmcgonigle1p@amazonaws.com', 'bY5sXzSHL', 2147483647, '4300 Prairieview Terrace', 57),
(63, 'Normy', 'Noorwood', 'nnoorwood1q@google.es', '5tuZ4vF5kOLH', 2147483647, '188 Bayside Drive', 25),
(64, 'Gifford', 'Faas', 'gfaas1r@a8.net', 'N1YTjjLAFGR0', 1258676515, '66952 Harper Point', 36),
(65, 'Flinn', 'Butterly', 'fbutterly1s@scientificamerican.com', 'zQsHLtyaUa2', 2147483647, '2716 Vidon Crossing', 77),
(66, 'Percival', 'Sitlington', 'psitlington1t@usnews.com', '0k1VXlfxRp', 2147483647, '8 Bultman Plaza', 57),
(67, 'Fern', 'MacCathay', 'fmaccathay1u@phoca.cz', '11A1l4FlhRf', 2147483647, '796 School Plaza', 34),
(68, 'Blondelle', 'Uzzell', 'buzzell1v@toplist.cz', 'fckVJ6K', 2147483647, '24179 Oriole Hill', 36),
(69, 'Malynda', 'Phifer', 'mphifer1w@phpbb.com', '5SPnxC1Ld', 2147483647, '33 Pennsylvania Trail', 68),
(70, 'Madella', 'Brasier', 'mbrasier1x@forbes.com', 'mB7bX5', 2147483647, '0139 Jay Street', 35),
(71, 'Kelvin', 'Rickets', 'krickets1y@auda.org.au', '1KUjxLB', 2147483647, '456 Del Sol Circle', 66),
(72, 'Penelopa', 'Ormshaw', 'pormshaw1z@sphinn.com', 'h8QEesYEWMun', 2147483647, '0 Columbus Center', 77),
(73, 'Rand', 'Batcheldor', 'rbatcheldor20@cam.ac.uk', 'P3MaECw', 1848163240, '3 Montana Parkway', 66),
(74, 'Stephi', 'Boich', 'sboich21@barnesandnoble.com', 'AJCSW5pW', 2147483647, '90 3rd Crossing', 25),
(75, 'Ham', 'Claige', 'hclaige22@ft.com', '05ESZDQ', 2147483647, '11335 American Ash Crossing', 64),
(76, 'Ammamaria', 'Jillions', 'ajillions23@ucla.edu', 'NsWnRhJMk', 2147483647, '165 Glendale Point', 25),
(77, 'Lorrie', 'Wyper', 'lwyper24@deliciousdays.com', '4pMGRG', 2147483647, '1457 Arizona Alley', 36),
(78, 'Bethany', 'Bostick', 'bbostick25@diigo.com', 'kvZ5WEj', 2147483647, '89 Rusk Court', 64),
(79, 'Kevin', 'Sams', 'ksams26@photobucket.com', 'mCiOv1DZ4tf', 2147483647, '24239 Hansons Way', 63),
(80, 'Chicky', 'Collough', 'ccollough27@cdbaby.com', 'HXKl2YKZT', 2147483647, '59 Bashford Point', 0),
(81, 'Clay', 'Itzchaky', 'citzchaky28@flavors.me', 'Ji434nJj', 2147483647, '737 Waxwing Drive', 66),
(82, 'Rosetta', 'MacAskill', 'rmacaskill29@bluehost.com', 'IgF2JsPos', 2147483647, '88 Scofield Center', 57),
(83, 'Orton', 'Nowell', 'onowell2a@jugem.jp', 'LFVpKJf', 2147483647, '5815 Northview Way', 57),
(84, 'Sunny', 'Mewton', 'smewton2b@sfgate.com', 'BaVR2YlSsz', 2147483647, '85 Lillian Circle', 35),
(85, 'Jacquenette', 'People', 'jpeople2c@phpbb.com', 'I72IPBrGw', 2147483647, '97 Marcy Lane', 78),
(86, 'Andrei', 'Rummin', 'arummin2d@blogs.com', '1vV49uqnh1a', 2147483647, '094 Surrey Plaza', 36),
(87, 'Dawna', 'Scartifield', 'dscartifield2e@histats.com', 'pSgiOXp', 2147483647, '0124 Northland Park', 86),
(88, 'Alexis', 'Snaith', 'asnaith2f@seesaa.net', '0sOG7a9ZV1E', 2147483647, '837 Miller Junction', 37),
(89, 'Karol', 'Duding', 'kduding2g@umn.edu', 'XKSMlDwZ', 2125133637, '6 Armistice Alley', 37),
(90, 'Ethelbert', 'Brumpton', 'ebrumpton2h@discovery.com', 'RW33vpC', 2147483647, '68950 Rusk Hill', 79),
(91, 'Ebba', 'Puddifer', 'epuddifer2i@youku.com', 'IZyCXbe2jy', 2147483647, '3853 Crescent Oaks Alley', 57),
(92, 'Diandra', 'Tames', 'dtames2j@yellowpages.com', 'SDIPZZ1hK', 2147483647, '3 Ridgeway Parkway', 56),
(93, 'Gratiana', 'Schachter', 'gschachter2k@ustream.tv', 'oZf8IeXuX', 2147483647, '65 Mendota Park', 35),
(94, 'Pete', 'Kaubisch', 'pkaubisch2l@npr.org', 'QtbucWzOO', 2147483647, '71309 Meadow Vale Junction', 22),
(95, 'Christian', 'Lenz', 'clenz2m@cisco.com', '7KdEypqan', 2147483647, '12735 Talmadge Road', 75),
(96, 'Gilly', 'Gossan', 'ggossan2n@npr.org', 'jsJsgxbMJ', 2147483647, '54 Harbort Parkway', 64),
(97, 'Ogdon', 'Honsch', 'ohonsch2o@about.com', '28Fq15o3', 2147483647, '7340 Arapahoe Center', 24),
(98, 'Eduardo', 'Mann', 'emann2p@yellowpages.com', 'q2qKA0T8x', 2147483647, '4 Starling Lane', 14),
(99, 'Welsh', 'Duffyn', 'wduffyn2q@washington.edu', 'RVvAu715Y', 2147483647, '7894 Dryden Pass', 55),
(100, 'Bogart', 'Maskrey', 'bmaskrey2r@symantec.com', 'iETJpvNWFX', 2147483647, '22909 Pierstorff Crossing', 82);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbudget`
--
ALTER TABLE `tblbudget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblexpense`
--
ALTER TABLE `tblexpense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreminder`
--
ALTER TABLE `tblreminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsetting`
--
ALTER TABLE `tblsetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblbudget`
--
ALTER TABLE `tblbudget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblexpense`
--
ALTER TABLE `tblexpense`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblreminder`
--
ALTER TABLE `tblreminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblsetting`
--
ALTER TABLE `tblsetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
