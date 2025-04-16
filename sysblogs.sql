-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 11:18 AM
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
-- Database: `sysblogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_5c785c036466adea360111aa28563bfd556b5fba', 'i:1;', 1744794856),
('laravel_cache_5c785c036466adea360111aa28563bfd556b5fba:timer', 'i:1744794856;', 1744794856);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'Great read! Laravel Starter Kits are truly a game-changer for kickstarting projects quickly with built-in auth, frontend scaffolding, and best practices. I\'ve personally used Breeze and Jetstream.', '2025-04-16 03:41:54', '2025-04-16 03:41:54'),
(2, 2, 5, 'This blog perfectly highlights how Laravel Starter Kits simplify the initial setup. They save so much time and help maintain clean architecture from the start. Whether you\'re building a quick MVP or a full-scale app, these kits provide a solid foundation. Thanks for sharing this insight!', '2025-04-16 03:43:40', '2025-04-16 03:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_16_035827_create_posts_table', 1),
(5, '2025_04_16_055136_create_comments_table', 1);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `author` varchar(255) NOT NULL,
  `author_title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `reading_time` varchar(255) DEFAULT NULL,
  `content` longtext NOT NULL,
  `tags` longtext DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `author`, `author_title`, `image`, `reading_time`, `content`, `tags`, `is_published`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Is Your SEO Strategy Ready For 2025? Learn Now Before It’s Too Late', 'In 2025, SEO will be about more than just keywords and backlinks—it will be about understanding user intent, improved experience, and staying ahead of algorithm updates.', 'Kunal Pandharkar', 'Web Developer', 'posts/EGZsEcom6oPEvfR307OdJ5i4LXcBpHE0XHAtxD4P.png', '20 Mins', '<p>What if your SEO strategy is already outdated for 2025? Are you prepared for the rapid changes that are reshaping how search engines rank your site? With digital marketing evolving faster than ever, businesses that don’t adapt their SEO game are at risk of falling behind—big time.</p><p>Have you asked yourself how <a href=\"https://www.digital4design.com/search-engine-optimization/\"><strong>search engine optimization</strong></a> will evolve next year? Will your current tactics still work, or are there new trends you need to be aware of? And if you’re not already collaborating with a skilled web development company that understands these shifts, are you ready to risk your online visibility?</p><p>In 2025, SEO will be about more than just keywords and backlinks—it will be about understanding user intent, improved experience, and staying ahead of algorithm updates.</p><p>The question is: Is your business ready to face the challenges ahead?</p><h3><strong>The Evolving SEO: Why Act Now</strong></h3><p>Imagine this: It’s 2025, and your website is nowhere to be found on Google’s search results. You’re left wondering, “What went wrong?” The reality is, SEO is no longer just about adding keywords or hoping your page ranks. Things are changing fast, and if you don’t adapt, you could be left in the dust.</p><p>As the digital world progresses, search engines like Google are getting smarter. What worked yesterday won’t work tomorrow. Google’s algorithms are increasingly focused on delivering results that are not only relevant but that also provide users with the best possible experience. In the past, it was enough to optimize for a few keywords. But now, it’s all about satisfying the user’s intent—giving them exactly what they need in a quick, efficient, and engaging way.</p><p>Think about your own online behavior. How often do you visit a site that’s slow, clunky, or hard to navigate? Chances are, you leave almost immediately. Google has noticed this too. In 2025, being mobile-friendly, fast, and easy to navigate will be essential to keeping your rankings high. If your site is hard to use or takes too long to load, it’s going to hurt your search results.</p><p>Now, ask yourself: Are you prepared for these changes? SEO is evolving rapidly, and businesses that recognize these shifts early will be the ones to succeed. It’s time to take action and adjust your strategy before it’s too late.</p><h3><strong>Why SEO Matters for Your Business in 2025?</strong></h3><p>The importance of SEO will only continue to grow in 2025. With over 3.5 billion searches conducted every day, how your business appears in search results can determine whether or not you get noticed.</p><p>An optimized SEO strategy can help:</p><ul><li><strong>Increase Visibility:</strong> Rank higher on search engines to ensure your business is front and center when potential customers are looking for your products or services.</li><li><strong>Improve User Experience:</strong> Focus on speed, mobile-friendliness, and intuitive design to improve your website’s performance.</li><li><strong>Build Credibility:</strong> Quality content and a seamless user experience not only rank well but also build trust with your audience.</li><li><strong>Stay Competitive:</strong> With SEO evolving constantly, businesses that don’t adapt their strategies may fall behind their competitors who invest in stronger SEO practices.</li></ul><h3><strong>Key SEO Trends to Watch in 2025</strong></h3><p>As we approach 2025, several key trends will shape SEO strategies. Understanding these trends and preparing your strategy accordingly will be critical to maintaining a strong online presence of your business.</p><p><strong>User Intent and Content Quality:</strong> Search engines are becoming more sophisticated in understanding user intent. In 2025, Search Engine Optimization will shift even further toward focusing on high-quality content that answers specific user queries. Search engines will prioritize websites that provide value, solve problems, and satisfy user needs.</p><p><strong>Core Web Vitals and User Experience:</strong> Core Web Vitals, a set of user experience metrics including page speed, interactivity, and stability, have become an important part of SEO. In 2025, these factors will play an even greater role in ranking. Websites that deliver a seamless, fast, and easy-to-navigate experience will continue to thrive in search engine results.</p><p><strong>Mobile-First Indexing:</strong> Mobile-first indexing means that search engines evaluate the mobile version of your website first. With mobile internet usage far outpacing desktop, optimizing your site for mobile is no longer optional. Businesses that don’t prioritize mobile optimization will likely see their rankings suffer.</p><p><strong>Voice Search and Conversational SEO:</strong> Voice search continues to rise with the popularity of devices like smart speakers and virtual assistants. By 2025, more users will interact with search engines using natural, conversational language. Optimizing your content to reflect this type of query will be essential to capturing voice search traffic.</p><p><strong>AI and Automation in SEO:</strong> Artificial intelligence and machine learning are transforming the way SEO is handled. From content creation to SEO auditing, AI is already playing a significant role in optimizing websites. In 2025, these technologies will become more powerful, helping businesses predict trends and refine their SEO strategies in real time.</p>', 'SEO, Keywords Research, Backlinks, Google Search Console, GA4', 1, 1, '2025-04-16 03:27:26', '2025-04-16 03:27:26'),
(3, 'How CMS Development Services Can Save You Time and Money?', 'CMS development services are focused on creating and customizing a Content Management System to meet the specific needs of your business.', 'Kunal Pandharkar', 'Web Developer', 'posts/eVG5OMjdYd5npzZUcCR3s50EsSXUUkiehBi0p79E.png', '20 Mins', '<p>Are you finding it hard to balance growing your business while managing your website? When you’re focused on scaling, the task of maintaining an up-to-date website can quickly become overwhelming. From marketing campaigns to team management and customer satisfaction, your plate is full. On top of that, your website—a core part of your digital presence—requires constant updates and attention. This is where <a href=\"https://www.digital4design.com/cms-development-company/\"><strong>CMS development services</strong></a> come in. They simplify website management, saving you time and cutting costs. Think of a Content Management System (CMS) as your virtual assistant, helping you organize, edit, and scale your website effortlessly without needing a developer at every turn.</p><p>By partnering with experts like Digital4design, you can ensure your CMS is tailored to your unique business needs. In this blog, we’ll explore how CMS development services streamline your processes, reduce expenses, and set your business up for long-term success.</p><h3><strong>What Are CMS Development Services?</strong></h3><p>CMS development services are focused on creating and customizing a Content Management System to meet the specific needs of your business. These services typically include:</p><p><strong>Platform Selection:</strong> Choosing the right CMS (e.g., WordPress, Joomla, or Drupal) based on your goals.</p><p><strong>Designing a User-Friendly Interface:</strong> Ensuring that the CMS is intuitive and easy to navigate.</p><p><strong>Integrating Plugins &amp; Tools:</strong> Adding necessary functionalities, such as SEO, social media sharing, or e-commerce.</p><p><strong>Security &amp; Scalability:</strong> Making sure your CMS is secure and can grow with your business.</p><p>By partnering with a professional <a href=\"https://www.digital4design.com/web-development-company/\"><strong>web development company</strong></a> like Digital4design, you can create a CMS solution that is efficient and user-friendly for your team.</p><h3><strong>The Practical Benefits of CMS Development Services</strong></h3><p>Now that we’ve explored what CMS development services are, let’s dive into the specific benefits they offer your business. Each of these advantages helps save time, cut costs, and streamline your website management.</p><h4><img src=\"https://www.digital4design.com/wp-content/uploads/2024/11/Practical-Benefits-of-CMS-Development-Services.png\" alt=\"Practical Benefits of CMS Development Services - Digital4design\" srcset=\"https://www.digital4design.com/wp-content/uploads/2024/11/Practical-Benefits-of-CMS-Development-Services.png 1024w, https://www.digital4design.com/wp-content/uploads/2024/11/Practical-Benefits-of-CMS-Development-Services-300x225.png 300w, https://www.digital4design.com/wp-content/uploads/2024/11/Practical-Benefits-of-CMS-Development-Services-768x576.png 768w, https://www.digital4design.com/wp-content/uploads/2024/11/Practical-Benefits-of-CMS-Development-Services-600x450.png 600w\" sizes=\"100vw\" width=\"1024\"></h4><p>&nbsp;</p><h4><strong>Streamlined Content Management</strong></h4><p>A CMS makes website updates simple, even for non-technical users. Whether adding a blog post, updating product descriptions, or changing images, you can do it all in just a few clicks.&nbsp;&nbsp;</p><p><strong>Key Benefits:&nbsp;&nbsp;</strong></p><ul><li>Instant Updates: Add or edit content whenever needed.&nbsp;&nbsp;</li><li>Lower Costs: Reduce reliance on developers for routine changes.&nbsp;&nbsp;</li><li>Ease of Use: Intuitive design makes it accessible for everyone.&nbsp;&nbsp;</li></ul><p>With the right services, your platform will be tailored for efficiency, allowing you to focus on growing your business instead of worrying about website maintenance.&nbsp;&nbsp;</p>', 'CRM, CMS, Develpment, Drupal, Magneto', 1, 1, '2025-04-16 03:29:07', '2025-04-16 03:29:07'),
(4, 'How a Digital Marketing and Web Development Company Can Drive Your Business Growth?', 'A digital marketing and web development company offers the expertise to build and maintain websites while promoting them effectively to your target audience.', 'Kunal Pandharkar', 'Web Developer', 'posts/OOLxDwGZnR2rdAFEXrvJxLu2lbGdd29Ft4Dq6nyG.jpg', '20 Mins', '<p>Businesses today need a strong online presence to attract and retain customers. They need a comprehensive strategy that involves both web development and digital marketing to reach the right audience and grow. If you’re considering working with a <a href=\"https://www.digital4design.com/\"><strong>digital marketing and web development company</strong></a>, this guide will help you understand how these services can fuel your business growth, especially if you’re targeting a market like Australia.</p><p>In this blog post, we’ll explain how partnering with a company like Digital4Design can give your business a competitive edge, whether through website development or digital marketing strategies.</p><p>A digital marketing and web development company offers the expertise to build and maintain websites while promoting them effectively to your target audience. These services go hand in hand, as a well-designed website needs strong digital marketing to drive traffic.</p><p>With services like website development and digital marketing, companies like Digital4Design help businesses improve their visibility, increase leads, and drive conversions.</p><h3><strong>How a Digital Marketing and Web Development Company Can Help You Grow</strong></h3><h4><strong>What Is Digital Marketing?</strong></h4><p>Digital marketing is the practice of promoting your business through online channels like search engines, social media, email, and websites. The goal is to reach your target audience where they spend most of their time—online. It includes:</p><ul><li>Search Engine Optimization (SEO)</li><li>Pay-Per-Click Advertising (PPC)</li><li>Social Media Management</li><li>Content Marketing</li></ul><h4><strong>The Role of Web Development in Business Success</strong></h4><p>Web development refers to the technical process of building a website, ensuring it’s functional, responsive, and user-friendly. Having a well-developed website means faster loading times, smooth navigation, and overall better user experience, which translates to higher customer satisfaction and conversion rates.</p><p>A combination of web development and digital marketing ensures that your website not only looks good but also reaches the right audience.</p><h4><strong>Importance of a Professional Website for Businesses</strong></h4><p>Your website is often the first impression customers have of your business. A professional, easy-to-navigate website builds trust with visitors. When you partner with a <a href=\"https://www.digital4design.com/web-development-company/\"><strong>website development</strong></a> company, they ensure that your site is not only visually appealing but also optimized for performance.</p><p>Whether you are an eCommerce store or a service provider, a well-structured website is essential for:</p><ul><li>Showcasing products and services</li><li>Providing key information to your customers</li><li>Enhancing customer engagement through interactive features</li></ul><p>By leveraging website development services, businesses can stand out in crowded markets and effectively reach their target audience.</p><h3><strong>Why Web Design Matters in Australia</strong></h3><p>A <a href=\"https://www.digital4design.com/web-design-development-company-australia/\"><strong>web design company in Australia</strong></a> can provide localized expertise, ensuring that your site appeals to the local market. Understanding cultural preferences, trends, and design aesthetics is critical to developing a website that resonates with your Australian audience.</p><p>Additionally, Australians are increasingly using mobile devices to browse the internet, so responsive design is key. A responsive website adjusts seamlessly to different devices, providing users with a consistent experience whether they’re on a smartphone, tablet, or desktop.</p><h3><strong>Key Services Offered by a Digital Marketing and Web Development Company</strong></h3><h4><strong>SEO Services</strong></h4><p><a href=\"https://www.digital4design.com/search-engine-optimization/\"><strong>Search Engine Optimization</strong></a> (SEO) is crucial for ranking higher in search engine results.&nbsp;</p><p>By optimizing your website content and structure, SEO makes it easier for potential customers to find you online. A digital marketing and web development company provides SEO strategies that boost your online visibility.</p><h4><strong>Social Media Marketing</strong></h4><p>Social media platforms are powerful tools for engaging with your audience. Companies like Digital4Design offer social media marketing services to help businesses build and maintain relationships with their customers through platforms like Facebook, Instagram, and LinkedIn.</p><h4><strong>Custom Web Development</strong></h4><p>No two businesses are the same, and your website should reflect your unique brand. Custom web development services ensure that your website is tailored to meet your specific business needs, from eCommerce functionality to lead generation forms.</p><h3><strong>How Digital4Design Can Boost Your Business</strong></h3><p>Partnering with a professional digital marketing and web development company like Digital4Design offers various advantages. They provide:</p><ul><li>Expert strategy for both website development and digital marketing</li><li>Ongoing website maintenance to ensure smooth operations</li><li>Expertise in the Australian market to help businesses tap into local opportunities</li></ul><p>By working with Digital4Design, businesses can expect better online visibility, more website traffic, and ultimately, higher sales.</p><h3><strong>Conclusion</strong></h3><p>A successful online business requires both a solid website and effective digital marketing strategies. By partnering with a digital marketing and web development company, you can ensure your website is not only visually appealing but also designed to attract and convert visitors into customers. Companies like Digital4Design provide the expertise to help your business grow in today’s digital world.</p><p>Whether you’re looking to improve your website or need a comprehensive marketing strategy, investing in the right services will position your business for success in a highly competitive market.</p>', 'Web, Development, Digital, Marketing, SEO', 1, 1, '2025-04-16 03:30:35', '2025-04-16 03:30:35'),
(5, 'Laravel Starter Kits: A New Beginning for Your Next Project', 'Our starter kits currently have all the features you saw in the previous Breeze starter kit', 'Kunal Pandharkar', 'Web Developer', 'posts/6JuyTMmHGJqKBTkC5XSU7rBkXK9C7Dppdn2XJ07f.png', '20 Mins', '<p>We’ve overhauled our previous starter kits, replacing Jetstream and Breeze with three distinct, purpose-built starter kits. These new kits allow you to focus on building your app instead of creating boilerplate code from scratch.</p><p>Our starter kits currently have all the features you saw in the previous Breeze starter kit and we’re looking at adding more features like two-factor authentication (2FA) and teams functionality soon.</p><h3>What are the new Laravel starter kits?</h3><p>These new starter kits are complete, ready-to-go applications that you can begin building on immediately. Unlike the previous packages that required installing into existing projects, these standalone starter kits will start a new project with <strong>all of the code inside of your project from day one</strong>.</p><p>The files can be found directly in your app/ and resources/ folders. You have the freedom to browse through your files and edit them as you see fit.</p><h3>Installing a starter kit</h3><p>You can either use the <a href=\"https://laravel.com/docs/12.x#installing-php\">Laravel Installer</a> or clone the starter kit repo directly. We have starter kits for:</p><ul><li>Livewire (<a href=\"https://github.com/laravel/livewire-starter-kit\">GitHub</a>, <a href=\"https://livewire-starter-kit-main-spxvec.laravel.cloud/\">preview</a>)</li><li>Inertia with React (<a href=\"https://github.com/laravel/react-starter-kit\">GitHub</a>, <a href=\"https://react-starter-kit-main-trfk6v.laravel.cloud/\">preview</a>)</li><li>Inertia with Vue (<a href=\"https://github.com/laravel/vue-starter-kit\">GitHub</a>, <a href=\"https://vue-starter-kit-main-jvxppc.laravel.cloud/\">preview</a>)</li></ul><p>Each starter kit comes with best practices for handling routing, controllers, views, and authentication. Even if you don’t have a project to start, feel free to peruse through the code in each starter kit.</p><h3>Each starter kit includes:</h3><ul><li>A full authentication system (login, registration, password reset)</li><li>User profile management</li><li>Dark mode support</li><li>Multiple layout options</li><li>Tailwind CSS integration (Tailwind v4 for React and Livewire)<br>&nbsp;</li></ul>', 'Web, Development, Digital, Marketing, SEO', 1, 1, '2025-04-16 03:36:27', '2025-04-16 03:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6m2CIMgPinH3rcwWiwFBIugsjmkV0MqNE0lKTJDb', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo1OntzOjM6InVybCI7YTowOnt9czo2OiJfdG9rZW4iO3M6NDA6InJqUDRQNEdQeXVQeldrMDlYVlBVQ0FRMWc0MUxvWFJkMDJDWEpZNWgiO3M6NjoiX2ZsYXNoIjthOjI6e3M6MzoibmV3IjthOjA6e31zOjM6Im9sZCI7YTowOnt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcG9zdC81Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1744795028),
('tSZyswdkTZ4qZuPL1OoOPOXAWXOOPEv3xUGauxJE', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjM6InVybCI7YTowOnt9czo2OiJfdG9rZW4iO3M6NDA6Ik5iZ0h0VURDMHlhNDBOVDRzUGM5a1d3SzRVTzVQVHdQYTM3YzRMUlkiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcG9zdHMvNSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1744795014);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `profile_picture`, `phone`, `bio`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kunal Pandharkar', 'profile_pictures/paXb2B5MQbWuf4EiYvQxLRYzXRPbI7NabJZX74hV.jpg', '+917774843561', 'I’m a passionate Laravel developer with hands-on experience in building scalable and secure web applications. Skilled in PHP, Laravel, MySQL, RESTful APIs, and frontend technologies like Blade, Bootstrap, jQuery, and JavaScript. I specialize in creating clean, efficient code and user-friendly interfaces, with a strong focus on backend logic, authentication, and API development. Always eager to learn, collaborate, and deliver high-quality solutions.', 'kunalpandharkar17@gmail.com', '2025-04-16 03:15:46', '$2y$12$SAcl7lmeaub6ZJi4OdLoLepXC8WFIIFBvZevartkyaMgD6rJNVfP.', NULL, '2025-04-16 03:15:46', '2025-04-16 03:16:10'),
(2, 'Roy Peterson', NULL, NULL, NULL, 'roy@gmail.com', '2025-04-16 03:43:17', '$2y$12$XNA1KPOxvuHMR.0jjo6NwO2aXd96.IUvjysAp5oI9iNHKMYyfzF3C', NULL, '2025-04-16 03:43:17', '2025-04-16 03:43:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
