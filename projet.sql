-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2020 at 02:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentpost`
--

CREATE TABLE `commentpost`
(
    `Idcompost` int(11) NOT NULL,
    `Idpost`    int(11) NOT NULL,
    `idcomment` int(10) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments`
(
    `Idcomment`   int(11)       NOT NULL,
    `commentBody` varchar(2040) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films`
(
    `Idfilm`     int(11)      NOT NULL,
    `Title`      varchar(200) NOT NULL,
    `Link-film`  varchar(500) NOT NULL,
    `Autorfilm`  varchar(500) NOT NULL,
    `Link-photo` varchar(510) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`Idfilm`, `Title`, `Link-film`, `Autorfilm`, `Link-photo`)
VALUES (1, '3D Kanojo', './Films/3d-kanojo.jpg', 'Mao Nanami', './Photos/3d-kanojo.jpg'),
       (2, 'Adventure Time', './Films/Adventure-Time', 'Pendelton Ward', './Photos/Adventure-Time.jpg'),
       (3, 'Avatar - The Last Airbender', './Films/Avatar', 'Bryan Konietzko & Michael Dante DiMartino',
        './Photos/Avatar.jpg'),
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
       (18, 'The Nightmare Before Christmas', './Films/The-Nightmare-Before-Christmas', 'Tim Burton',
        './Photos/The-Nightmare-Before-Christmas.jpg'),
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

CREATE TABLE `playlists`
(
    `Idplaylist`   int(11)     NOT NULL,
    `Nameplaylist` varchar(30) NOT NULL,
    `iduser`       int(10)     NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `playlist_films`
--

CREATE TABLE `playlist_films`
(
    `Idplayvid`  int(11) NOT NULL,
    `Idplaylist` int(11) NOT NULL,
    `Idfilm`     int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts`
(
    `Idpost`    int(11)       NOT NULL,
    `idsub`     int(10)       NOT NULL,
    `Autorpost` int(10)       NOT NULL,
    `Title`     varchar(510)  NOT NULL,
    `Body`      varchar(2040) NOT NULL,
    `Photo`     varchar(1020) DEFAULT NULL,
    `Date`      date          NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Idpost`, `idsub`, `Autorpost`, `Title`, `Body`, `Photo`, `Date`)
VALUES (1, 1, 1, 'Title post test',
        'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
        NULL, '0000-00-00'),
       (2, 1, 1, 'Title 2',
        'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.',
        NULL, '0000-00-00'),
       (3, 1, 1, 'Title 3',
        'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.',
        NULL, '0000-00-00'),
       (4, 2, 1, 'Title 1',
        'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.',
        NULL, '0000-00-00'),
       (5, 2, 1, 'Title 2',
        'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.',
        NULL, '0000-00-00'),
       (6, 2, 1, 'Title 3',
        'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.',
        NULL, '0000-00-00'),
       (7, 3, 1, 'Title 1', 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', NULL,
        '0000-00-00'),
       (8, 3, 1, 'Title 2',
        'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.',
        NULL, '0000-00-00'),
       (9, 3, 1, 'Title 3',
        'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.',
        NULL, '0000-00-00'),
       (10, 4, 1, 'Title 1',
        'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.',
        NULL, '0000-00-00'),
       (11, 4, 1, 'Title 2', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.', NULL, '0000-00-00'),
       (12, 4, 1, 'Title 3',
        'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
        NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub`
(
    `idsub`       int(10) NOT NULL,
    `namesub`     varchar(255)  DEFAULT NULL,
    `description` varchar(1020) DEFAULT NULL,
    `photo-sub`   varchar(1020) DEFAULT NULL,
    `modid`       int(10)       DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`idsub`, `namesub`, `description`, `photo-sub`, `modid`)
VALUES (1, 'Test Sub', 'Testing', '../logo.jpeg', 1),
       (2, 'Coraline Sub', 'Coraline', './Photo/Coraline.jpg', 1),
       (3, 'SUB 3', 'Description de sub 3', NULL, 1),
       (4, 'SUB 4', 'Description de sub 4', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
    `Iduser`       int(10)       NOT NULL,
    `Name`         varchar(50)   NOT NULL,
    `Pseudo`       varchar(30)   NOT NULL,
    `Email`        varchar(255)  NOT NULL,
    `Password`     varchar(255)  NOT NULL,
    `photoProfile` varchar(1020) NOT NULL DEFAULT '../logo.jpeg',
    `accountType`  varchar(20)   NOT NULL DEFAULT 'free'
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Iduser`, `Name`, `Pseudo`, `Email`, `Password`, `photoProfile`, `accountType`)
VALUES (1, 'Test', 'test', 'Test@test.com', '$2y$10$D11hQ3ocZxPLPiWKHheVS.uhr2hkIh.Lzj.28heGPzRoHsAXsjxva',
        '../logo.jpeg', 'free'),
       (2, 'User', 'user', 'user@gmail.com', '$2y$10$jP47e7OZyDSqPgo5pPqAl.LEz4CTZyanXK3kKeMGH7obpMrtdlcqq',
        '../logo.jpeg', 'free');

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
    MODIFY `Idcompost` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
    MODIFY `Idfilm` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 25;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
    MODIFY `Idpost` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 13;

--
-- AUTO_INCREMENT for table `sub`
--
ALTER TABLE `sub`
    MODIFY `idsub` int(10) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `Iduser` int(10) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentpost`
--
ALTER TABLE `commentpost`
    ADD CONSTRAINT `com-compost` FOREIGN KEY (`idcomment`) REFERENCES `comments` (`Idcomment`),
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

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
