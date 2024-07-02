-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 08:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `church`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `email`) VALUES
(3, 'admin', '$2y$10$5h6Wz37BCZn87DhwFU8FC.JZOmSgkoG6QUUFlb5aO75czNUD0cvk.', 'olivebaptistchurchadmin@org.com'),
(4, 'f', 'ffff', 'fff@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `description`, `cover_image`, `created_at`) VALUES
(18, 'Youth  Activity ', 'Youth Day', 'uploads/detail.jpg', '2024-06-25 12:47:51'),
(19, 'Mother\'s Day', 'Pictures by David ', 'uploads/portfolio-2.jpg', '2024-07-01 18:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `album_photos`
--

CREATE TABLE `album_photos` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `photo_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album_photos`
--

INSERT INTO `album_photos` (`id`, `album_id`, `photo_url`) VALUES
(35, 18, 'uploads/album_photos/1719319690_church-interior.png'),
(37, 18, 'uploads/album_photos/1719319851_about-1.png'),
(38, 18, 'uploads/album_photos/1719319851_associatepastor.png'),
(39, 18, 'uploads/album_photos/1719319851_church.png'),
(40, 18, 'uploads/album_photos/1719319851_church-interior.png'),
(41, 18, 'uploads/album_photos/1719319851_detail.jpg'),
(42, 18, 'uploads/album_photos/1719319851_faith.jpg'),
(43, 18, 'uploads/album_photos/1719319851_header.png'),
(44, 18, 'uploads/album_photos/1719319851_leadpastor.png'),
(45, 18, 'uploads/album_photos/1719319851_logo.png'),
(46, 18, 'uploads/album_photos/1719319851_men.png'),
(47, 18, 'uploads/album_photos/1719319851_nursery1.png'),
(48, 18, 'uploads/album_photos/1719319851_nursery2.png'),
(50, 18, 'uploads/album_photos/1719319851_nursery4.png'),
(51, 18, 'uploads/album_photos/1719319851_nursery5.png'),
(52, 18, 'uploads/album_photos/1719319851_women.png'),
(53, 18, 'uploads/album_photos/1719319851_worship.png'),
(54, 18, 'uploads/album_photos/1719319851_young.png'),
(56, 18, 'uploads/album_photos/1719848890_banner1.png'),
(57, 18, 'uploads/album_photos/1719858615_women.png'),
(58, 19, 'uploads/album_photos/1719859069_youth1.png'),
(59, 19, 'uploads/album_photos/1719859069_youth2.png'),
(60, 19, 'uploads/album_photos/1719859069_youth3.png'),
(61, 19, 'uploads/album_photos/1719859069_youth4.png'),
(62, 19, 'uploads/album_photos/1719859069_youth5.png'),
(63, 19, 'uploads/album_photos/1719859069_youth6.png'),
(64, 19, 'uploads/album_photos/1719859069_youth7.png'),
(65, 19, 'uploads/album_photos/1719859069_youth8.png'),
(66, 19, 'uploads/album_photos/1719859069_youth9.png'),
(67, 19, 'uploads/album_photos/1719859069_youth10.png'),
(68, 19, 'uploads/album_photos/1719859069_youthpastor.png');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `author`, `image`, `created_at`, `updated_at`) VALUES
(16, 'The Foundation of Faith', '<p><strong>Exploring the Core Beliefs of Olive Baptist Church</strong></p>\r\n\r\n<p>In this comprehensive blog post, we delve into the foundational beliefs that guide Olive Baptist Church. From the authority of Scripture to the principles of salvation and community, discover how these beliefs shape our worship, teachings, and outreach efforts. Through a deep dive into biblical passages and church doctrine, readers gain insight into the rich theological heritage that underpins our faith community.</p>\r\n', 'Pastor John', 'faith.jpg', '2024-07-01 18:11:28', '2024-07-01 18:11:28'),
(19, 'Building Stronger Families', '<p><strong>Biblical Principles for Nurturing Faith at Home</strong> Family is at the heart of Olive Baptist Church, and nurturing faith within our homes is a priority. In this blog post, we explore practical ways to integrate biblical principles into family life. From family devotions and discussions to modeling Christian virtues and fostering open communication, discover how intentional parenting and spousal support can strengthen spiritual foundations. With insights drawn from Scripture and real-life examples, families are empowered to cultivate a home environment where faith flourishes.</p>\r\n', 'Pastor Ruth', 'detail.jpg', '2024-07-01 18:16:50', '2024-07-01 18:16:50'),
(20, 'The Role of Prayer in Our Daily Walk', '<p><strong>Deepening Our Connection with God</strong> Prayer is a cornerstone of Christian life, providing a direct line of communication with God. This blog delves into the significance of prayer in personal and communal worship at Olive Baptist Church. From the model of Jesus&#39; prayers to the power of intercession and corporate prayer, explore how different forms of prayer enrich our spiritual journey. Practical tips for developing a consistent prayer life and testimonies of answered prayers offer encouragement and inspiration to readers seeking to deepen their connection with God.</p>\\r\\n\\r\\n<p>\\\\r\\\\n</p>\\r\\n', 'Youth President', 'nursery1.png', '2024-07-01 18:18:03', '2024-07-01 18:19:57'),
(21, 'Biblical Wisdom for Times of Uncertainty: Finding Hope and Guidance in God\'s Word', '<p>In times of uncertainty and adversity, the Bible offers timeless wisdom and unwavering hope. This blog series delves into selected passages that provide comfort, guidance, and assurance during challenging seasons. From the book of Job&#39;s exploration of suffering to the promises of peace and provision found in the Psalms, discover how God&#39;s Word remains a steadfast anchor for our souls. Practical reflections and prayers for navigating uncertainty empower readers to lean on God&#39;s promises and trust in His unfailing love.</p>\r\n', 'Pastor James', 'about.png', '2024-07-01 18:28:38', '2024-07-01 18:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `name`, `comment`, `created_at`) VALUES
(13, 19, 'Bibi', 'Got so much strength from the post, love it!', '2024-07-01 18:36:39'),
(14, 21, 'bibi', 'good', '2024-07-01 19:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(3, 'd', 'abigailbtlpar@gmail.com', 'dddddd', 'ddddddddd', '2024-06-25 17:17:37'),
(4, 'd', 'abigailbtlpar@gmail.com', 'dddddd', 'ddddddddd', '2024-06-25 17:17:37'),
(5, 'f', 'g@gmail.com', 'd', 'dddddddddd', '2024-06-25 17:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `time` varchar(50) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `day`, `month`, `year`, `title`, `time`, `description`) VALUES
(1, '7', 'Apr', '2024', 'Easter Sunrise Service', '6:00 AM', 'Join us for a special Easter sunrise service.'),
(2, '16', 'May', '2024', 'Community Potluck', '12:00 PM', 'Bring a dish to share and enjoy a meal with our community.'),
(3, '20-22', 'Jun', '2024', 'Youth Retreat', '9:00 am', 'A weekend retreat for our youth to connect and grow in faith.');

-- --------------------------------------------------------

--
-- Table structure for table `pastors`
--

CREATE TABLE `pastors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pastors`
--

INSERT INTO `pastors` (`id`, `name`, `title`, `biography`, `photo_url`, `email`, `phone`, `facebook_url`, `twitter_url`, `instagram_url`, `created_at`) VALUES
(25, 'Pastor John Doe', ' Senior Pastor', ' Pastor John Doe has been leading Olive Baptist Church for the past 15 years. He holds a Master of Divinity from Yale Divinity School. His passions include preaching, community outreach, and youth mentorship.', 'uploads/pastor/leadpastor.png', 'john.doe@olivebaptistchurch.org', '+9512345678', ' https://www.facebook.com/pastorjohndoe', 'https://www.twitter.com/pastorjohndoe', ' https://www.instagram.com/pastorjohndoe', '2024-07-02 16:24:28'),
(26, 'Pastor Jane Smith', 'Associate Pastor', ' Pastor Jane Smith focuses on family ministry and women’s fellowship at Olive Baptist Church. She graduated from Princeton Theological Seminary and has a background in counseling and pastoral care.', 'uploads/pastor/team-2.jpg', 'jane.smith@olivebaptistchurch.org', '(555) 234-5678', 'https://www.facebook.com/pastorjanesmith', ' https://www.twitter.com/pastorjanesmith', ' https://www.instagram.com/pastorjanesmith', '2024-07-02 16:26:03'),
(27, 'Pastor Michael Johnson', 'Youth Pastor', ' Pastor Michael Johnson has been serving as the Youth Pastor for five years. He is passionate about engaging with young people and helping them grow in their faith. He holds a Bachelor’s degree in Youth Ministry from Liberty University.', 'uploads/pastor/youthpastor.png', 'michael.johnson@olivebaptistchurch.org', ' (555) 345-6789', ' https://www.facebook.com/pastormichaeljohnson', ' https://www.twitter.com/pastormichaelj', ' https://www.instagram.com/pastormichaeljohnson', '2024-07-02 16:27:11'),
(28, ' Pastor Susan Lee', 'Worship Pastor', 'Pastor Susan Lee leads the worship team and coordinates music and arts ministries at Olive Baptist Church. She holds a Bachelor’s degree in Music from Berklee College of Music and a Master of Worship Studies from Liberty University.', 'uploads/pastor/team-3.jpg', 'susan.lee@olivebaptistchurch.org', ' (555) 456-7890', 'https://www.facebook.com/pastorsusanlee', 'https://www.twitter.com/pastorsusanlee', 'https://www.instagram.com/pastorsusanlee', '2024-07-02 16:28:33'),
(29, ' Pastor David Brown', ': Outreach Pastor', ' Pastor David Brown oversees the church’s outreach programs, including community service and missions. He is dedicated to spreading the message of love and service both locally and globally. He holds a Master’s degree in Theology from Fuller Theological Seminary.', 'uploads/pastor/testimonial-4.jpg', 'david.brown@olivebaptistchurch.org', ' (555) 567-8901', 'https://www.facebook.com/pastordavidbrown', 'https://www.twitter.com/pastordavidbrown', 'https://www.instagram.com/pastordavidbrown', '2024-07-02 16:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `type` enum('Like','Love') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_photos`
--
ALTER TABLE `album_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pastors`
--
ALTER TABLE `pastors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `album_photos`
--
ALTER TABLE `album_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pastors`
--
ALTER TABLE `pastors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album_photos`
--
ALTER TABLE `album_photos`
  ADD CONSTRAINT `album_photos_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reactions`
--
ALTER TABLE `reactions`
  ADD CONSTRAINT `reactions_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
