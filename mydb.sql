-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2024 at 12:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `description` varchar(355) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `price`, `stock`, `language`, `description`, `genre`) VALUES
(1, 'The Last Devil to Die', 'Richard Osman', 20, 150, 'English', 'A thrilling and humorous mystery featuring a group of amateur detectives.', 'Fiction'),
(2, 'Fourth Wing', 'Rebecca Yarros', 18, 200, 'English', 'A gripping tale of courage and resilience set in a dystopian world.', 'Fiction'),
(3, 'The 6:20 Man', 'David Baldacci', 22, 175, 'English', 'A suspenseful and captivating thriller about a man seeking justice.', 'Fiction'),
(4, 'Demon Copperhead', 'Barbara Kingsolver', 25, 120, 'English', 'A powerful and moving novel exploring themes of poverty and resilience.', 'Fiction'),
(5, 'The Covenant of Water', 'Abraham Verghese', 24, 180, 'English', 'A sweeping epic about a family’s journey through a century of change.', 'Fiction'),
(6, 'Mad Honey', 'Jodi Picoult & Jennifer Finney Boylan', 19, 160, 'English', 'A compelling story about love, secrets, and the complexities of family life.', 'Fiction'),
(7, 'Happy Place', 'Emily Henry', 21, 140, 'English', 'A heartwarming and humorous romance set in a picturesque seaside town.', 'Fiction'),
(8, 'The Wishing Game', 'Meg Shaffer', 17, 190, 'English', 'An enchanting story about a young girl’s journey to fulfill her dreams.', 'Fiction'),
(9, 'Pineapple Street', 'Jenny Jackson', 23, 155, 'English', 'A sharp and witty novel about a wealthy New York family and their intricate dynamics.', 'Fiction'),
(10, 'The Nightingale', 'Kristin Hannah', 26, 130, 'English', 'A historical fiction novel about the resilience of two sisters during World War II.', 'Fiction'),
(11, 'Shyamchi Aai', 'Sane Guruji', 15, 100, 'Marathi', 'A poignant story about the relationship between a mother and her son.', 'Fiction'),
(12, 'Kosla', 'Bhalchandra Nemade', 20, 80, 'Marathi', 'A groundbreaking novel that explores the internal world of a young man.', 'Fiction'),
(13, 'Mrutyunjay', 'Shivaji Sawant', 25, 90, 'Marathi', 'A retelling of the Mahabharata from the perspective of Karna.', 'Fiction'),
(14, 'Yayati', 'V.S. Khandekar', 22, 70, 'Marathi', 'A retelling of the mythological story of Yayati.', 'Fiction'),
(15, 'Prawas', 'P. L. Deshpande', 180, 90, 'Marathi', 'A humorous travelogue about the author\'s experiences.', 'Fiction'),
(16, 'Godaan', 'Munshi Premchand', 20, 150, 'Hindi', 'A classic novel depicting the struggles of rural farmers.', 'Fiction'),
(17, 'Nirmala', 'Munshi Premchand', 18, 140, 'Hindi', 'A novel highlighting the social issues of child marriage and dowry.', 'Fiction'),
(18, 'Gunahon Ka Devta', 'Dharamvir Bharati', 22, 130, 'Hindi', 'A touching love story set in Allahabad.', 'Fiction'),
(19, 'Madhushala', 'Harivansh Rai Bachchan', 25, 120, 'Hindi', 'A famous collection of poetry exploring themes of life and philosophy.', 'Fiction'),
(20, 'Rashmirathi', 'Ramdhari Singh Dinkar', 21, 100, 'Hindi', 'An epic poem about the life of Karna from the Mahabharata.', 'Fiction'),
(21, 'How to stop worrying and start living', 'Dale Carnegi', 120, 20, 'English', 'Self Help', 'Fiction'),
(22, 'The Great Gatsby', 'F. Scott Fitzgerald', 160, 25, 'English', 'A novel set in the 1920s that explores themes of wealth, love, and the American Dream.', 'Fiction'),
(24, 'Don Quixote', 'Miguel de Cervantes', 1020, 15, 'English', 'A tale of a man who becomes so enamored with chivalric romances that he decides to become a knight-errant himself.', 'Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Kanchan Jadhav', 'kj@gmail.com', 'Kanchan', '$2y$10$YET.DRW/qvnCK5NaSh/ODe/Gv95l5Xe1JhT5YYKD3rzpx6UUDqdZK'),
(2, 'Akash', 'aj@gmail.com', 'Akash', 'Akash'),
(3, 'Ankita', 'ankita@gmail.com', 'Ankita', NULL),
(4, 'Suraj', 'suraj@gmail.com', 'Suraj', '$2y$10$i8bH3Pu1e7bbP3pl0xFPheL2WzhR3cp1t9NZz4GaNj9UrrdSohcs.'),
(5, 'Snehal', 'sj@gmail.com', 'Snehal', '$2y$10$T5zTmNOZBDna4fuPdyTuY.speOaNQMzPhKCzIBNF15Bkbwt/RwyaG'),
(8, 'Pratik', 'pratik@gmail.com', 'Pratik', '$2y$10$JtAz4YosNbNVHtteZcp68.9tYnwXw4T10hj66OVaiOY4kQ7124mHe'),
(10, 'Arjun', 'arjun@gmail.com', 'Arjun', '$2y$10$h7MD3CJpqFh8nGqtS1JTXeJWuvg4.UpyIyYVU5hHIQ7c/vKQvxcaq'),
(11, 'Shubham Kale', 'shubham@gmail.com', 'shubham', '$2y$10$Tl0XL3OYJwqSH8BsMbQlGubfFp3Q6nFwP7aqA.Yu8QzOTpMNuPCu6'),
(12, 'Kanchan', 'kj@gmail.com', 'Kanchan', '$2y$10$OCVMxV1GGSBnagiypRnVVeLw8EX/WAOdqDHrQ3ixDepB8WxPH9qMa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
