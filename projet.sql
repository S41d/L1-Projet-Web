-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2020 at 02:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentpost`
--

CREATE TABLE `commentpost` (
  `Idcompost` int(11) NOT NULL,
  `Idpost` int(11) NOT NULL,
  `idcomment` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commentpost`
--

INSERT INTO `commentpost` (`Idcompost`, `Idpost`, `idcomment`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 3, 8),
(9, 3, 9),
(10, 3, 10),
(11, 4, 11),
(12, 4, 12),
(13, 4, 13),
(14, 5, 14),
(15, 5, 15),
(16, 5, 16),
(17, 6, 17),
(18, 6, 18),
(19, 6, 19),
(20, 7, 20),
(21, 7, 21),
(22, 7, 22),
(23, 8, 23),
(24, 8, 24),
(25, 9, 25),
(26, 10, 26),
(27, 10, 27),
(28, 11, 28),
(29, 12, 29);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Idcomment` int(11) NOT NULL,
  `commentBody` varchar(2040) NOT NULL,
  `author` varchar(510) NOT NULL,
  `dateComment` varchar(510) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Idcomment`, `commentBody`, `author`, `dateComment`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.\n\nVestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 'Test', '2020-04-02 12:55:59'),
(2, 'In congue. Etiam justo. Etiam pretium iaculis justo.\n\nIn hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 'User', '2020-04-02 12:55:59'),
(3, 'Sed ante. Vivamus tortor. Duis mattis egestas metus.', 'User', '2020-04-02 12:55:59'),
(4, 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\n\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\n\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 'User', '2020-04-02 12:55:59'),
(5, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.\n\nVestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 'Test', '2020-04-02 12:56:13'),
(6, 'In congue. Etiam justo. Etiam pretium iaculis justo.\n\nIn hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 'User', '2020-04-02 12:56:13'),
(7, 'Sed ante. Vivamus tortor. Duis mattis egestas metus.', 'User', '2020-04-02 12:56:13'),
(8, 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\n\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\n\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 'User', '2020-04-02 12:56:13'),
(9, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\n\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\n\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 'User', '2020-04-02 12:56:13'),
(10, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\n\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\n\nDuis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 'Test', '2020-04-02 12:56:13'),
(11, 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla nisl. Nunc nisl.', 'Test', '2020-04-02 12:56:13'),
(12, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 'User', '2020-04-02 12:56:13'),
(13, 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 'Test', '2020-04-02 12:56:13'),
(14, 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\n\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 'Test', '2020-04-02 12:56:14'),
(15, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 'User', '2020-04-02 12:56:14'),
(16, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\n\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', 'User', '2020-04-02 12:56:14'),
(17, 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 'Test', '2020-04-02 12:56:14'),
(18, 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\n\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 'User', '2020-04-02 12:56:14'),
(19, 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\n\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 'Test', '2020-04-02 12:56:14'),
(20, 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 'User', '2020-04-02 12:56:14'),
(21, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\n\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 'Test', '2020-04-02 12:56:14'),
(22, 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.\n\nProin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\n\nDuis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 'User', '2020-04-02 12:56:14'),
(23, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 'Test', '2020-04-02 12:56:14'),
(24, 'In congue. Etiam justo. Etiam pretium iaculis justo.\n\nIn hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\n\nNulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 'User', '2020-04-02 12:56:14'),
(25, 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 'Test', '2020-04-02 12:56:14'),
(26, 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\n\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.\n\nNullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', 'Test', '2020-04-02 12:56:14'),
(27, 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 'User', '2020-04-02 12:56:14'),
(28, 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\n\nNulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.\n\nCras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', 'User', '2020-04-02 12:56:14'),
(29, 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 'Test', '2020-04-02 12:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `Idfilm` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Link-film` varchar(500) NOT NULL,
  `Autorfilm` varchar(500) NOT NULL,
  `Link-photo` varchar(510) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`Idfilm`, `Title`, `Link-film`, `Autorfilm`, `Link-photo`) VALUES
(1, '3D Kanojo', './Films/3d-kanojo.jpg', 'Mao Nanami', './Photos/3d-kanojo.jpg'),
(2, 'Adventure Time', './Films/Adventure-Time', 'Pendelton Ward', './Photos/Adventure-Time.jpg'),
(3, 'Avatar - The Last Airbender', './Films/Avatar', 'Bryan Konietzko & Michael Dante DiMartino', './Photos/Avatar.jpg'),
(4, 'Coraline', './Films/Coraline', 'Neil Gaiman', './Photos/Coraline.jpg'),
(5, 'Fullmetal Alchemist - Brotherhood', './Films/FMA', 'Hiromu Arakawa', './Photos/FMA.png'),
(6, 'Inception', './Films/Inception', 'Christopher Nolan', './Photos/Inception.jpg'),
(7, 'Intouchables', './Films/Intouchables', 'Philippe Pozzo di Borgo', './Photos/Intouchables.jpg'),
(8, 'Jack et la mécanique du coeur', './Films/Jack', 'Mathias Malzieu', './Photos/Jack.jpg'),
(9, 'Lucifer', './Films/Lucifer', 'Neil Gaiman, Sam Kieth & Mike Dringenberg', './Photos/Lucifer.jpg'),
(10, 'Mr Robot', './Films/Mr-robot', 'Sam Esmail', './Photos/Mr-robot.jpg'),
(11, 'Nerve', './Films/Nerve', 'Jeanne Ryan', './Photos/Nerve.jpg'),
(12, 'Paprika', './Films/Paprika', 'Satoshi Kon', './Photos/Paprika.jpg'),
(13, 'Parasyte', './Films/Parasyte', 'Hitoshi Iwaaki', './Photos/Parasyte.jpg'),
(14, 'Perfect Blue', './Films/Perfect-Blue', 'Satoshi Kon', './Photos/Perfect-Blue.jpg'),
(15, 'Persona 5', './Films/Persona-5', ' Shinichi Inotsume', './Photos/Persona-5.jpg'),
(16, 'Song of the Sea', './Films/Song-Of-The-sea', 'Tomm Moore', './Photos/Song-Of-The-Sea.jpg'),
(17, 'The Conjuring', './Films/The-Conjuring', 'Chad Hayes & Carey W. Hayes', './Photos/The-Conjuring.jpg'),
(18, 'The Nightmare Before Christmas', './Films/The-Nightmare-Before-Christmas', 'Tim Burton', './Photos/The-Nightmare-Before-Christmas.jpg'),
(19, 'The Originals', './Films/The-Originals', 'Julie Plec', './Photos/The-Originals.jpg'),
(20, 'The Secret of Kells', './Films/The-Secret-Of-Kells', 'Tomm Moore', './Photos/The-Secret-Of-Kells.jpg'),
(21, 'Tokyo Ghoul', './Films/Tokyo-Ghoul', 'Sui Ishida', './Photos/Tokyo-Ghoul.jpg'),
(22, 'Toradora', './Films/Toradora', 'Yuyuko Takemiya', './Photos/Toradora.jpg'),
(23, 'Vikings', './Films/Vikings', 'Michael Hirst', './Photos/Vikings.jpg'),
(24, 'Interstellar', './Films/Interstellar', 'Christopher & Jonathon Nolan', './Photos/Interstellar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `Idplaylist` int(11) NOT NULL,
  `Nameplaylist` varchar(30) NOT NULL,
  `iduser` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `playlist_films`
--

CREATE TABLE `playlist_films` (
  `Idplayvid` int(11) NOT NULL,
  `Idplaylist` int(11) NOT NULL,
  `Idfilm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Idpost` int(11) NOT NULL,
  `idsub` int(10) NOT NULL,
  `Autorpost` int(10) NOT NULL,
  `Title` varchar(510) NOT NULL,
  `Body` varchar(2040) NOT NULL,
  `Photo` varchar(1020) DEFAULT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Idpost`, `idsub`, `Autorpost`, `Title`, `Body`, `Photo`, `Date`) VALUES
(1, 1, 1, 'Title post test', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', NULL, '0000-00-00'),
(2, 1, 2, 'Title 2', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', NULL, '0000-00-00'),
(3, 1, 2, 'Title 3', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', NULL, '0000-00-00'),
(4, 2, 2, 'Title 1', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', NULL, '0000-00-00'),
(5, 2, 1, 'Title 2', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', NULL, '0000-00-00'),
(6, 2, 1, 'Title 3', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', NULL, '0000-00-00'),
(7, 3, 2, 'Title 1', 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', NULL, '0000-00-00'),
(8, 3, 2, 'Title 2', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', NULL, '0000-00-00'),
(9, 3, 1, 'Title 3', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', NULL, '0000-00-00'),
(10, 4, 1, 'Title 1', 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', NULL, '0000-00-00'),
(11, 4, 2, 'Title 2', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.', NULL, '0000-00-00'),
(12, 4, 1, 'Title 3', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `idsub` int(10) NOT NULL,
  `namesub` varchar(255) DEFAULT NULL,
  `description` varchar(1020) DEFAULT NULL,
  `photo-sub` varchar(1020) DEFAULT NULL,
  `modid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`idsub`, `namesub`, `description`, `photo-sub`, `modid`) VALUES
(1, 'Test Sub', 'Testing', '../logo.jpeg', 1),
(2, 'Coraline Sub', 'Coraline', './Photo/Coraline.jpg', 1),
(3, 'SUB 3', 'Description de sub 3', NULL, 1),
(4, 'SUB 4', 'Description de sub 4', NULL, 2),
(5, 'qfrsegtdh', 'hdfgjhkvjkl', './photosSubs/paprika.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Iduser` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Pseudo` varchar(30) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `photoProfile` varchar(1020) NOT NULL DEFAULT '../logo.jpeg',
  `accountType` varchar(20) NOT NULL DEFAULT 'free'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Iduser`, `Name`, `Pseudo`, `Email`, `Password`, `photoProfile`, `accountType`) VALUES
(1, 'Test', 'test', 'Test@test.com', '$2y$10$D11hQ3ocZxPLPiWKHheVS.uhr2hkIh.Lzj.28heGPzRoHsAXsjxva', '../logo.jpeg', 'free'),
(2, 'User', 'user', 'user@gmail.com', '$2y$10$jP47e7OZyDSqPgo5pPqAl.LEz4CTZyanXK3kKeMGH7obpMrtdlcqq', '../logo.jpeg', 'free');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentpost`
--
ALTER TABLE `commentpost`
  ADD PRIMARY KEY (`Idcompost`),
  ADD KEY `com-compost` (`idcomment`),
  ADD KEY `post-compost` (`Idpost`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Idcomment`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`Idfilm`),
  ADD KEY `Image_Post` (`Link-photo`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`Idplaylist`),
  ADD KEY `playlist-owner` (`iduser`);

--
-- Indexes for table `playlist_films`
--
ALTER TABLE `playlist_films`
  ADD PRIMARY KEY (`Idplayvid`),
  ADD KEY `vids-for` (`Idplaylist`),
  ADD KEY `films` (`Idfilm`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Idpost`),
  ADD KEY `parent-sub` (`idsub`),
  ADD KEY `author` (`Autorpost`);

--
-- Indexes for table `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`idsub`),
  ADD KEY `sub-mod` (`modid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentpost`
--
ALTER TABLE `commentpost`
  MODIFY `Idcompost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `Idfilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub`
--
ALTER TABLE `sub`
  MODIFY `idsub` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Iduser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentpost`
--
ALTER TABLE `commentpost`
  ADD CONSTRAINT `com-comtpost` FOREIGN KEY (`idcomment`) REFERENCES `comments` (`Idcomment`),
  ADD CONSTRAINT `post-compost` FOREIGN KEY (`Idpost`) REFERENCES `posts` (`Idpost`);

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlist-owner` FOREIGN KEY (`iduser`) REFERENCES `users` (`Iduser`);

--
-- Constraints for table `playlist_films`
--
ALTER TABLE `playlist_films`
  ADD CONSTRAINT `films` FOREIGN KEY (`Idfilm`) REFERENCES `films` (`Idfilm`),
  ADD CONSTRAINT `vids-for` FOREIGN KEY (`Idplaylist`) REFERENCES `playlists` (`Idplaylist`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `author` FOREIGN KEY (`Autorpost`) REFERENCES `users` (`Iduser`),
  ADD CONSTRAINT `parent-sub` FOREIGN KEY (`idsub`) REFERENCES `sub` (`idsub`);

--
-- Constraints for table `sub`
--
ALTER TABLE `sub`
  ADD CONSTRAINT `sub-mod` FOREIGN KEY (`modid`) REFERENCES `users` (`Iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
