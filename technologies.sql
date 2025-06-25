-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 24, 2025 at 06:06 PM
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
-- Database: `rbc_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tech_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('language','framework','library','database','tool','platform','service') NOT NULL DEFAULT 'tool',
  `description` varchar(255) DEFAULT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `expertise_level` tinyint(4) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `tech_category_id`, `name`, `type`, `description`, `logo_url`, `expertise_level`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'HTML5', 'tool', 'Struktur Web Modern', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg', 5, 1, NULL, NULL),
(2, 1, 'CSS3', 'tool', 'Styling & Animation', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg', 5, 2, NULL, NULL),
(3, 1, 'JavaScript', 'tool', 'ES6+ & TypeScript', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg', 5, 3, NULL, NULL),
(4, 1, 'React.js', 'tool', 'Component Library', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg', 4, 4, NULL, NULL),
(5, 1, 'Tailwind CSS', 'tool', 'Utility-first CSS Framework', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-original-wordmark.svg\r\n', 5, 5, NULL, NULL),
(6, 1, 'Bootstrap', 'tool', 'CSS Framework for Responsive Design', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg', 4, 6, NULL, NULL),
(7, 1, 'SASS', 'tool', 'CSS Preprocessor', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sass/sass-original.svg', 4, 7, NULL, NULL),
(8, 1, 'Vue.js', 'tool', 'Progressive Framework', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg', 4, 8, NULL, NULL),
(9, 1, 'jQuery', 'tool', 'Fast JavaScript Library', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jquery/jquery-original.svg', 4, 9, NULL, NULL),
(10, 1, 'TypeScript', 'tool', 'Typed JavaScript', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg', 3, 10, NULL, NULL),
(11, 2, 'PHP', 'tool', 'Laravel, CodeIgniter', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg', 5, 1, NULL, NULL),
(12, 2, 'Node.js', 'tool', 'Express, Fastify', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg', 4, 2, NULL, NULL),
(13, 2, 'Python', 'tool', 'Django, FastAPI', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg', 4, 3, NULL, NULL),
(14, 2, 'Golang', 'tool', 'Gin, Fiber', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original.svg', 3, 4, NULL, NULL),
(15, 2, 'Laravel', 'tool', 'PHP Framework for Web Artisans', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg\r\n', 5, 5, NULL, NULL),
(16, 2, 'Express.js', 'tool', 'Fast Node.js Web Framework', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/express/express-original.svg', 4, 6, NULL, NULL),
(17, 2, 'CodeIgniter', 'tool', 'Lightweight PHP Framework', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/codeigniter/codeigniter-plain.svg', 4, 7, NULL, NULL),
(18, 2, 'Django', 'tool', 'Python Web Framework', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/django/django-plain.svg', 3, 8, NULL, NULL),
(19, 2, 'FastAPI', 'tool', 'Modern Python API Framework', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/fastapi/fastapi-original.svg', 3, 9, NULL, NULL),
(20, 2, 'Spring Boot', 'tool', 'Java Enterprise Framework', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/spring/spring-original.svg', 3, 10, NULL, NULL),
(21, 2, 'ASP.NET Core', 'tool', 'Microsoft Web Framework', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/dotnetcore/dotnetcore-original.svg', 3, 11, NULL, NULL),
(22, 2, 'Ruby on Rails', 'tool', 'Ruby Web Framework', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/rails/rails-original-wordmark.svg', 2, 12, NULL, NULL),
(23, 3, 'MySQL', 'tool', 'Relational Database', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg', 5, 1, NULL, NULL),
(24, 3, 'MongoDB', 'tool', 'NoSQL Document Store', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg', 4, 2, NULL, NULL),
(25, 3, 'Redis', 'tool', 'In-memory Cache', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/redis/redis-original.svg', 3, 3, NULL, NULL),
(26, 3, 'AWS', 'tool', 'Cloud Infrastructure', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-plain-wordmark.svg', 3, 4, NULL, NULL),
(27, 3, 'Docker', 'tool', 'Containerization', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg', 4, 5, NULL, NULL),
(28, 3, 'Kubernetes', 'tool', 'Container Orchestration', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kubernetes/kubernetes-plain.svg', 3, 6, NULL, NULL),
(29, 4, 'React Native', 'tool', 'Cross Platform', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg', 4, 1, NULL, NULL),
(30, 4, 'Flutter', 'tool', 'Dart Framework', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg', 4, 2, NULL, NULL),
(31, 4, 'Java', 'tool', 'Android & Enterprise Apps', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg', 3, 3, NULL, NULL),
(32, 4, 'Kotlin', 'tool', 'Android Development', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kotlin/kotlin-original.svg', 3, 4, NULL, NULL),
(33, 4, 'Swift', 'tool', 'iOS Development', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/swift/swift-original.svg', 3, 5, NULL, NULL),
(34, 5, 'AI Agent', 'tool', 'Custom AI Chatbot & Automation', NULL, 3, 1, NULL, NULL),
(35, 5, 'Python AI', 'tool', 'LangChain, OpenAI, HuggingFace', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg', 4, 2, NULL, NULL),
(36, 5, 'TensorFlow', 'tool', 'Deep Learning & Model Training', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tensorflow/tensorflow-original.svg', 3, 3, NULL, NULL),
(37, 5, 'PyTorch', 'tool', 'AI Model & NLP', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/pytorch/pytorch-original.svg', 3, 4, NULL, NULL),
(38, 5, 'n8n', 'tool', 'Workflow Automation & Integration', 'https://raw.githubusercontent.com/n8n-io/n8n/master/assets/images/n8n-logo.png', 3, 5, NULL, NULL),
(39, 5, 'OpenAI API', 'tool', 'Integrasi GPT, ChatGPT, DALL-E, dsb', 'https://seeklogo.com/images/O/openai-logo-8B9BFEDC26-seeklogo.com.png', 3, 6, NULL, NULL),
(40, 6, 'Figma', 'tool', 'UI/UX Design & Prototyping', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg', 4, 1, NULL, NULL),
(41, 6, 'Adobe Photoshop', 'tool', 'Image Editing & Graphics', 'images/tech/photo-shop.png', 3, 2, NULL, NULL),
(42, 6, 'Adobe Illustrator', 'tool', 'Vector & Logo Design', 'images/tech/adobe-illustrator.png', 3, 3, NULL, NULL),
(43, 6, 'Canva', 'tool', 'Desain Grafis & Konten Visual', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/canva/canva-original.svg', 3, 4, NULL, NULL),
(87, 2, 'Symfony', 'tool', 'enterprise framework based', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/symfony/symfony-original.svg\r\n', 5, 13, '2025-06-23 19:15:03', '2025-06-23 19:15:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `technologies_tech_category_id_foreign` (`tech_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `technologies`
--
ALTER TABLE `technologies`
  ADD CONSTRAINT `technologies_tech_category_id_foreign` FOREIGN KEY (`tech_category_id`) REFERENCES `tech_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
