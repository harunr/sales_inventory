-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 06:03 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sales_inventory_systems`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email_address` varchar(100) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `access_level` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email_address`, `admin_password`, `access_level`, `deletion_status`) VALUES
(1, 'Khayer', 'mmkhayer@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0),
(2, 'Al Amin', 'alamin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 0),
(3, 'Muktia', 'muktia@gmail.com', '01cfcd4f6b8770febfb40cb906715822', 2, 1),
(4, 'Shurela', 'shurela@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_info`
--

CREATE TABLE `tbl_company_info` (
  `id` int(4) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_address` varchar(200) NOT NULL,
  `company_contact` varchar(36) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_company_info`
--

INSERT INTO `tbl_company_info` (`id`, `company_name`, `company_address`, `company_contact`, `status`, `deletion_status`, `created_date_time`) VALUES
(1, 'আমাদের কোম্পানীর নাম', 'বাগেরহাটা', '01407090999', 1, 0, '2022-07-28 05:53:56'),
(2, 'ERP Systems Ltd', 'Monipuri Para, Dhaka', '0123456987', 1, 1, '2022-07-28 05:59:29'),
(3, 'Mantrust Info Systems edited', 'Banani, Dhaka edited', '01236547889', 1, 1, '2022-07-28 05:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_info`
--

CREATE TABLE `tbl_customer_info` (
  `customer_id` int(4) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `customer_image` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer_info`
--

INSERT INTO `tbl_customer_info` (`customer_id`, `first_name`, `last_name`, `address`, `contact_no`, `email_address`, `customer_image`, `date_of_birth`, `gender`, `city`, `country`, `status`, `deletion_status`, `created_date_time`) VALUES
(1, 'Sumon', 'Khondoker', 'Kacharipara, Jamalpur\r\nedited address', '0123654789', 'sumon@gmail.com', 'customer_images_folder/101.png', '1975-02-02', 'male', 'Jamalpur', 'Bangladesh', 1, 0, '2022-08-01 10:40:10'),
(2, 'Any', 'Talukder', 'Thanapara, Tangail', '0123654789', 'any@yahoo.com', 'customer_images_folder/103.png', '1975-01-04', 'female', 'Dhaka', 'Bangladesh', 1, 0, '2022-08-01 10:16:48'),
(3, 'Tania', 'Sultana', 'Modhupur, Dhaka', '0123654789', 'sultana@yahoo.com', 'customer_images_folder/102.png', '2001-01-02', 'female', 'Tangail', 'Bangladesh', 1, 0, '2022-08-01 10:18:37'),
(4, 'শিশির', 'তালুকদার', 'Tangail Sadar, Tangail', '0123654789', 'shishir@hotmail.com', 'customer_images_folder/104.png', '2006-03-05', 'male', 'Jamalpur', 'Bangladesh', 1, 0, '2022-08-02 04:03:00'),
(5, 'Anjum', 'Kobir', 'Mohammadpur, Dhaka', '0123654789', 'anjum@yahoo.com', 'customer_images_folder/105.png', '1995-02-02', 'female', 'Dhaka', 'Bangladesh', 1, 0, '2022-08-02 04:00:26'),
(6, 'Mohima', 'Kobir', 'Dhanmondi, Dhaka', '0133654789', 'mohima@gmail.com', 'customer_images_folder/106.png', '1991-03-07', 'female', 'Dhaka', 'Bangladesh', 1, 0, '2022-08-01 10:55:57'),
(7, 'New', 'Customer', 'Chamragudam', '01718297412', 'mmkhayer@gmail.com', 'customer_images_folder/khayer-image.jpg', '1968-01-06', 'male', 'Dhaka', 'Bangladesh', 1, 0, '2022-08-18 05:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_payment_info`
--

CREATE TABLE `tbl_customer_payment_info` (
  `customer_payment_id` int(4) NOT NULL,
  `customer_id` int(4) NOT NULL,
  `date` date NOT NULL,
  `amnt_paid` float NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer_payment_info`
--

INSERT INTO `tbl_customer_payment_info` (`customer_payment_id`, `customer_id`, `date`, `amnt_paid`, `remarks`, `status`, `deletion_status`, `created_date_time`) VALUES
(1, 4, '2021-02-02', 12500, 'payment-111', 1, 0, '2022-08-02 05:12:49'),
(2, 2, '2120-01-12', 2500, 'Payments 222 77777', 1, 0, '2022-08-02 05:13:42'),
(3, 1, '2021-02-01', 15000, 'payment by sumon', 1, 0, '2022-08-02 05:28:10'),
(4, 5, '2021-05-05', 2500, 'payment by Anjum 444555', 1, 0, '2022-08-02 05:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `footer_id` int(4) NOT NULL,
  `footer_content` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`footer_id`, `footer_content`, `status`, `deletion_status`) VALUES
(1, 'Copyright: Webtricker Web Design and Development Agency', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_front_content`
--

CREATE TABLE `tbl_front_content` (
  `front_content_id` int(4) NOT NULL,
  `front_content_title` varchar(100) NOT NULL,
  `front_content_description` text NOT NULL,
  `front_content_image` varchar(100) NOT NULL,
  `menu_id` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_front_content`
--

INSERT INTO `tbl_front_content` (`front_content_id`, `front_content_title`, `front_content_description`, `front_content_image`, `menu_id`, `status`, `deletion_status`) VALUES
(1, 'Our Commitment 222', '<h2 style=\"font-style:italic\"><span style=\"font-size:12px\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</span></h2>\r\n', 'front_image_folder/108.png', 2, 1, 0),
(2, 'Home Title 111', '<h2 style=\"font-style:italic;\"><span style=\"font-size:12px\"><samp><kbd><code><tt>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</tt></code></kbd></samp></span></h2>\r\n', 'front_image_folder/100.png', 1, 1, 0),
(3, 'Contact Title 333', '<p><span style=\"font-size:14px\"><span style=\"font-family:comic sans ms,cursive\">W-7, Noorjahan Road</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:comic sans ms,cursive\">Mohammadpur</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:comic sans ms,cursive\">Dhaka-1207</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:comic sans ms,cursive\">Bangladesh</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:comic sans ms,cursive\">Phone; 01718297412</span></span></p>\r\n', 'front_image_folder/105.jpg', 6, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `logo_id` int(4) NOT NULL,
  `logo_image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`logo_id`, `logo_image`, `status`, `deletion_status`) VALUES
(2, 'logo_folder/mylogo.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufact_info`
--

CREATE TABLE `tbl_manufact_info` (
  `manufact_id` int(4) NOT NULL,
  `manufact_name` varchar(100) NOT NULL,
  `manufact_address` text NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `manufact_email` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deletion_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_manufact_info`
--

INSERT INTO `tbl_manufact_info` (`manufact_id`, `manufact_name`, `manufact_address`, `contact_no`, `manufact_email`, `status`, `deletion_status`, `created_date_time`) VALUES
(1, 'Shell Enterprise', 'Tejgaon Dhaka', '09363525224', 'shell_info@gmail.com', 1, 0, '2022-07-04 06:06:16'),
(4, 'Motul Company Ltd', 'Tejgaon, Dhaka, Bangladesh', '23453637833', 'motul_info@gmail.com', 1, 0, '2022-07-04 05:41:26'),
(5, 'Havolin Limited', 'Bagerhata, Jamalpur', '0231456987', 'havolininfo@yahoo.com', 1, 0, '2022-07-01 08:20:35'),
(6, 'Castrol Lubricant Ltd. Ltd. Ltd.', 'Zindabager, Sylhet, Bangladesh', '36547895522', 'castrolinfo@hotmail.com', 1, 0, '2022-07-04 06:06:32'),
(7, 'Mobil Energy Inc.', 'NY, USA', '17899664102', 'mobilquery@webtricker.com', 1, 1, '2022-07-04 05:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(4) NOT NULL,
  `menu_title` varchar(50) NOT NULL,
  `menu_link` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_title`, `menu_link`, `status`) VALUES
(1, 'Log In', 'admin/index.php', 1),
(2, 'Supplier Info', 'supplier_info.php', 1),
(8, 'Customer Info', 'customer_info.php', 1),
(9, 'Sales Report', 'sales_report_info.php', 1),
(10, 'Profit and Loss', 'profit_loss_date_wise.php', 1),
(12, 'Date Wise Sales', 'sales_date_wise_report.php', 1),
(13, 'Date Wise Purchase', 'purchase_date_wise_report.php', 1),
(16, 'Product List', 'product_info.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_opn_stck_info`
--

CREATE TABLE `tbl_opn_stck_info` (
  `opn_stck_id` int(4) NOT NULL,
  `mon_yyyy` varchar(7) NOT NULL,
  `product_id` int(4) NOT NULL,
  `stock_in_hand` int(4) NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_opn_stck_info`
--

INSERT INTO `tbl_opn_stck_info` (`opn_stck_id`, `mon_yyyy`, `product_id`, `stock_in_hand`, `remarks`, `status`, `deletion_status`, `created_date_time`) VALUES
(1, 'jul-202', 6, 210, 'remarks 1ssadfas', 1, 0, '2022-07-15 06:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page_content`
--

CREATE TABLE `tbl_page_content` (
  `page_content_id` int(4) NOT NULL,
  `menu_id` int(4) NOT NULL,
  `page_content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deletion_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_page_content`
--

INSERT INTO `tbl_page_content` (`page_content_id`, `menu_id`, `page_content`, `status`, `deletion_status`, `created_date_time`) VALUES
(6, 1, '<p><span style=\"font-size:28px\"><span style=\"font-family:comic sans ms,cursive\">Home Content</span></span><br />\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, &nbsp;sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, &nbsp;sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, &nbsp;sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\n', 1, 0, '2015-06-16 12:35:37'),
(7, 2, '<p><span style=\"font-size:28px\"><span style=\"font-family:comic sans ms,cursive\">About Us Content</span></span><br />\r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, &nbsp;sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, &nbsp;sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, &nbsp;sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n', 1, 0, '2015-06-16 12:29:47'),
(8, 6, '<p><span style=\"font-size:28px\"><span style=\"font-family:comic sans ms,cursive\">Contact Us Content</span></span><br />\r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, &nbsp;sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, &nbsp;sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, &nbsp;sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n', 1, 0, '2015-07-06 15:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_cat_info`
--

CREATE TABLE `tbl_product_cat_info` (
  `product_cat_id` int(4) NOT NULL,
  `product_cat_name` varchar(100) NOT NULL,
  `manufact_id` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deletion_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product_cat_info`
--

INSERT INTO `tbl_product_cat_info` (`product_cat_id`, `product_cat_name`, `manufact_id`, `status`, `deletion_status`, `created_date_time`) VALUES
(3, 'Shell Advance Ax Star 20W40555', 6, 1, 0, '2022-07-04 06:03:45'),
(4, 'Shell Advance AX5 10W30kkkkkk', 5, 1, 0, '2022-07-04 06:05:05'),
(5, 'Motul Ax Star 20W40', 7, 1, 0, '2022-07-04 06:03:49'),
(6, 'Shell Advance Ax Star 20W40', 1, 1, 1, '2022-07-04 05:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_info`
--

CREATE TABLE `tbl_product_info` (
  `product_id` int(4) NOT NULL,
  `product_cat_id` int(4) NOT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `rol_qty` int(4) NOT NULL,
  `qty_stock` int(4) NOT NULL,
  `current_price` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product_info`
--

INSERT INTO `tbl_product_info` (`product_id`, `product_cat_id`, `product_code`, `product_name`, `product_image`, `rol_qty`, `qty_stock`, `current_price`, `status`, `deletion_status`, `created_date_time`) VALUES
(6, 5, NULL, 'Shell Advance 10W30 Name 1111111', 'product_images_folder/107.png', 20, 735, 250, 1, 0, '2022-08-16 11:55:43'),
(7, 4, NULL, 'Shell Advance AX Star 20W4055 two two two', 'product_images_folder/101.png', 15, 708, 250, 1, 0, '2022-08-12 12:05:25'),
(9, 5, NULL, 'Shell Advance 10W30 Name 5555555555', 'product_images_folder/104.png', 25, 1815, 250, 1, 0, '2022-08-12 10:31:51'),
(18, 3, NULL, 'Shell Advance 10W30 Name 6666666', 'product_images_folder/105.png', 21, 1520, 250, 1, 0, '2022-08-16 09:51:36'),
(20, 4, NULL, 'Shell Advance AX Star 20W40555 777777', 'product_images_folder/106.png', 20, 1850, 220, 1, 0, '2022-08-12 12:05:25'),
(21, 5, NULL, 'Motul 100Kb nite 88888888888', 'product_images_folder/103.png', 30, 3190, 550, 1, 0, '2022-08-01 05:58:54'),
(22, 4, NULL, 'Motul 100Kb nite 10101010101010', 'product_images_folder/105.png', 25, 1090, 250, 1, 0, '2022-08-06 05:41:48'),
(23, 5, NULL, 'Motul 100Kb nite', 'product_images_folder/103.png', 30, 900, 0, 1, 1, '2022-07-04 12:22:38'),
(24, 5, NULL, 'Motul 100Kb nite i999999999', 'product_images_folder/102.png', 25, 2035, 250, 1, 0, '2022-08-09 10:39:55'),
(26, 4, NULL, 'Shell Advance AX Star 20W40555 888888', 'product_images_folder/104.png', 15, 1590, 250, 1, 0, '2022-08-04 12:03:42'),
(27, 4, NULL, 'Shell Advance 10W30 Name 777888', 'product_images_folder/107.png', 30, 520, 350, 1, 0, '2022-08-11 04:39:31'),
(28, 4, NULL, 'hkjhkjhkjh', 'product_images_folder/104.png', 5, 509, 240, 1, 0, '2022-08-16 11:55:43'),
(29, 3, NULL, 'বাংলায় প্রোডাক্ট সমর্থণ করে', 'product_images_folder/103.png', 20, 475, 140, 1, 0, '2022-08-01 05:39:37'),
(30, 5, 'PMotul001', 'Motul 150Kb nite', 'product_images_folder/101.png', 30, 270, 150, 1, 0, '2022-08-01 05:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_detail_info`
--

CREATE TABLE `tbl_purchase_detail_info` (
  `purchase_detail_id` int(4) NOT NULL,
  `purchase_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `product_cost` float NOT NULL,
  `shipment_cost` float NOT NULL,
  `others_cost` float NOT NULL,
  `vat_rate` float NOT NULL,
  `qty_purchased` int(4) NOT NULL,
  `qty_remain` int(4) NOT NULL,
  `unit_cost` float NOT NULL,
  `unit_price` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_purchase_detail_info`
--

INSERT INTO `tbl_purchase_detail_info` (`purchase_detail_id`, `purchase_id`, `product_id`, `product_cost`, `shipment_cost`, `others_cost`, `vat_rate`, `qty_purchased`, `qty_remain`, `unit_cost`, `unit_price`, `status`, `deletion_status`, `created_date_time`) VALUES
(504, 166, 9, 13000, 200, 160, 2.5, 250, 340, 53.44, 350, 1, 0, '2022-08-16 05:33:53'),
(505, 166, 22, 14000, 300, 250, 3.5, 200, 199, 72.75, 350, 1, 0, '2022-08-04 11:50:49'),
(506, 167, 9, 12000, 22, 13, 2.5, 130, 127, 92.5769, 250, 1, 0, '2022-08-06 05:33:56'),
(507, 167, 24, 10000, 20, 230, 4, 200, 111, 51.25, 420, 1, 0, '2022-08-03 10:43:12'),
(508, 167, 9, 12000, 22, 13, 2.5, 130, 95, 92.5769, 250, 1, 0, '2022-08-12 10:31:51'),
(509, 167, 24, 10000, 20, 230, 4, 200, 105, 51.25, 420, 1, 0, '2022-08-06 05:45:06'),
(510, 168, 20, 12000, 250, 230, 3.5, 200, 400, 62.4, 420, 1, 0, '2022-08-12 12:05:25'),
(511, 168, 28, 15000, 550, 150, 2.5, 130, 185, 120.769, 250, 1, 0, '2022-08-04 10:52:11'),
(512, 170, 18, 12000, 250, 230, 3.5, 200, 368, 62.4, 420, 1, 0, '2022-08-04 09:54:26'),
(513, 170, 26, 15000, 550, 150, 3.5, 130, 500, 120.769, 250, 1, 0, '2022-08-04 12:03:42'),
(514, 171, 22, 25000, 200, 500, 2.5, 130, 290, 197.692, 250, 1, 0, '2022-08-06 05:41:48'),
(515, 171, 28, 10000, 1000, 700, 3.5, 120, 190, 97.5, 420, 1, 0, '2022-08-16 05:01:16'),
(516, 173, 7, 1200, 120, 250, 2.5, 233, 168, 6.7382, 250, 1, 0, '2022-08-16 09:51:36'),
(517, 173, 24, 5000, 500, 200, 3.5, 364, 350, 15.6593, 420, 1, 0, '2022-08-04 09:56:14'),
(518, 175, 6, 12005, 501, 635, 2.5, 250, 180, 52.564, 350, 1, 0, '2022-08-16 11:55:43'),
(519, 175, 18, 2500, 104, 204, 5, 350, 320, 8.02286, 450, 1, 0, '2022-08-06 06:10:10'),
(520, 176, 18, 12000, 520, 220, 2.5, 200, 195, 63.7, 250, 1, 0, '2022-08-06 05:41:48'),
(521, 176, 27, 10000, 650, 240, 2, 150, 0, 72.6, 350, 1, 0, '2022-08-11 04:39:31'),
(522, 177, 18, 12000, 250, 230, 2.5, 250, 240, 49.92, 250, 1, 0, '2022-08-04 12:20:24'),
(523, 177, 28, 10000, 500, 450, 3.5, 110, 110, 99.5455, 240, 1, 0, '2022-08-04 12:08:36'),
(524, 178, 18, 2500, 200, 150, 2.5, 200, 195, 14.25, 250, 1, 0, '2022-08-11 04:26:01'),
(525, 178, 20, 5000, 120, 240, 3.5, 250, 250, 21.44, 350, 1, 0, '2022-08-05 05:53:41'),
(526, 179, 24, 12000, 200, 300, 2.5, 120, 100, 104.167, 250, 1, 0, '2022-08-09 10:39:55'),
(527, 179, 6, 5000, 300, 100, 3.5, 100, 80, 54, 220, 1, 0, '2022-08-16 11:55:43'),
(528, 180, 6, 10000, 250, 150, 2.5, 100, -36, 104, 250, 1, 0, '2022-08-16 08:25:34'),
(529, 180, 20, 5000, 100, 100, 3.5, 120, 120, 43.3333, 220, 1, 0, '2022-08-12 12:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_info`
--

CREATE TABLE `tbl_purchase_info` (
  `purchase_id` int(4) NOT NULL,
  `p_invoice` varchar(20) NOT NULL,
  `supplier_id` int(4) NOT NULL,
  `date` date NOT NULL,
  `paid_amnt` float NOT NULL,
  `due_amnt` float NOT NULL,
  `total_supplier_paid` float NOT NULL,
  `remarks` text NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_purchase_info`
--

INSERT INTO `tbl_purchase_info` (`purchase_id`, `p_invoice`, `supplier_id`, `date`, `paid_amnt`, `due_amnt`, `total_supplier_paid`, `remarks`, `user_name`, `status`, `deletion_status`, `created_date_time`) VALUES
(127, 'P100111', 1, '2020-02-02', 111, 200, 311, 'remarks late', '', 1, 0, '2022-08-10 04:33:58'),
(128, 'P2022001', 3, '2020-02-20', 250, 81, 331, 'late remarks', '', 1, 0, '2022-08-10 04:34:13'),
(129, 'P2022002', 5, '2050-04-05', 150, 63, 213, '', '', 1, 0, '2022-08-10 04:34:20'),
(130, 'P2022003', 7, '2021-03-01', 50, 52, 102, 'remarks-edited', '', 1, 0, '2022-08-10 04:34:27'),
(131, 'P2022004', 2, '2020-02-02', 50, 52, 102, '', '', 1, 0, '2022-08-10 04:34:33'),
(132, 'P2022005', 2, '2020-03-03', 80, 142, 222, '', '', 1, 0, '2022-08-10 04:34:39'),
(133, 'P2022006', 4, '2020-02-02', 100, 203, 303, '', '', 1, 0, '2022-08-10 04:34:43'),
(134, 'P2022007', 7, '2020-02-02', 80, 133, 213, '', '', 1, 0, '2022-08-10 04:34:49'),
(135, 'P2022008', 2, '2020-02-20', 0, 0, 0, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-10 04:34:55'),
(136, 'P2022009', 4, '2020-05-02', 0, 0, 0, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-10 04:34:59'),
(137, 'P2022031', 2, '2020-02-05', 0, 0, 0, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-10 04:35:22'),
(138, 'P20220011', 1, '2020-03-02', 90, 123, 213, '', 'Muktia Salma', 1, 0, '2022-08-10 04:35:09'),
(139, 'P2022041', 1, '2020-02-02', 55, 158, 213, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-10 04:35:38'),
(140, 'P2022042', 4, '2020-02-02', 130, 93, 223, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-10 04:35:45'),
(141, 'P10001', 2, '2022-02-01', 75, 138, 213, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-27 04:44:38'),
(142, 'P10002', 4, '2021-03-02', 100, 122, 222, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-27 04:58:12'),
(143, 'P100003', 6, '2010-05-06', 212, 100, 312, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-27 05:19:29'),
(144, 'P102020', 3, '2020-03-02', 80.95, 110.11, 191.06, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-27 09:12:39'),
(145, 'P100035', 7, '1998-03-09', 20000, 7500, 27500, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-27 11:42:15'),
(146, 'P2002', 2, '2012-01-02', 12500, 5000, 7500, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-27 12:28:23'),
(147, 'P34028', 1, '2015-01-03', 10000, 3950, 13950, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-27 12:05:37'),
(148, 'P100256', 5, '2015-01-02', 9000, 6400, 15400, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-28 05:57:35'),
(149, 'P10002', 1, '2021-01-02', 8000, 7000, 15000, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-28 06:02:01'),
(150, 'P102020', 2, '2020-02-02', 7500, 7500, 15000, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-28 06:18:53'),
(151, 'P1000015', 2, '2015-02-03', 2500, 500, 3000, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-28 06:57:55'),
(152, 'P100036', 4, '2016-02-03', 2500, 1500, 4000, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-28 07:03:18'),
(153, 'P10005', 4, '2021-02-02', 2780, 770, 3550, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-28 08:49:42'),
(154, 'P100038', 6, '2015-03-01', 0, 0, 0, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-29 04:04:49'),
(155, 'P102025', 2, '2021-02-02', 50, 52, 102, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-29 08:58:31'),
(156, 'P102020', 2, '2021-03-03', 12550, 2450, 15000, '', 'Md. Monjoor Khayer', 1, 0, '2022-07-29 11:19:19'),
(157, 'P10202035', 5, '2021-02-02', 0, 0, 0, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-01 04:19:18'),
(158, 'P102020', 4, '2500-02-02', 15000, 5000, 20000, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-01 04:26:05'),
(159, 'P100078', 3, '2021-02-02', 5000, 15505, 20505, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-01 04:42:16'),
(160, 'P10000365', 6, '3221-02-02', 12000, 8000, 20000, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-01 04:45:21'),
(161, 'P100041', 5, '2021-03-02', 5400, 14600, 20000, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-01 04:49:59'),
(162, 'P1000074', 5, '2020-02-01', 5400, 13600, 19000, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-01 05:39:37'),
(163, 'P100036', 7, '2021-03-02', 6000, 14000, 20000, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-01 05:43:54'),
(164, 'P10000356', 4, '2021-02-02', 45000, 11000, 56000, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-01 05:58:54'),
(165, 'P1007852', 7, '2021-02-01', 8000, 2000, 10000, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-01 06:11:23'),
(166, 'P2022043', 1, '2021-02-02', 22000, 5000, 27000, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-10 04:35:58'),
(167, 'P2022044', 4, '2021-03-02', 15000, 7000, 22000, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-10 04:36:03'),
(168, 'P168', 3, '2021-02-02', 19000, 8000, 27000, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-01 08:57:44'),
(169, 'P2022045', 3, '2020-03-02', 0, 0, 0, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-10 04:36:07'),
(170, 'P170', 3, '2020-03-02', 17000, 10000, 27000, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-01 09:00:58'),
(171, 'P171', 7, '2021-02-03', 28000, 7000, 35000, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-02 07:08:04'),
(172, 'P2022046', 4, '2020-03-02', 0, 0, 0, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-10 04:36:12'),
(173, 'P173', 1, '2120-02-02', 5000, 1200, 6200, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-02 11:54:33'),
(174, 'P2022047', 3, '2021-02-02', 0, 0, 0, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-10 04:36:17'),
(175, 'P175', 2, '2021-02-02', 10000, 4505, 14505, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 04:00:49'),
(176, 'P176', 3, '2020-02-02', 15000, 7000, 22000, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 08:43:06'),
(177, 'P177', 5, '2021-02-02', 15000, 7000, 22000, 'remarks', 'Md. Monjoor Khayer', 1, 0, '2022-08-05 10:17:01'),
(178, 'P178', 4, '2020-02-02', 7000, 500, 7500, 'Remarks', 'Md. Monjoor Khayer', 1, 0, '2022-08-05 10:17:12'),
(179, 'P179', 2, '2021-02-02', 15000, 2000, 17000, '', 'Khayer', 1, 0, '2022-08-06 05:49:05'),
(180, 'P180', 6, '2020-02-02', 14000, 1000, 15000, '', 'Khayer', 1, 0, '2022-08-12 12:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return_sales_info`
--

CREATE TABLE `tbl_return_sales_info` (
  `id` int(4) NOT NULL,
  `date` date NOT NULL,
  `sales_detail_id` int(4) NOT NULL,
  `purchase_detail_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `qty_return` int(4) NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_detail_info`
--

CREATE TABLE `tbl_sales_detail_info` (
  `sales_detail_id` int(4) NOT NULL,
  `sales_id` int(4) NOT NULL,
  `purchase_detail_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `unit_price` float NOT NULL,
  `qty_sold` int(4) NOT NULL,
  `total_amnt` float NOT NULL,
  `vat_amnt` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sales_detail_info`
--

INSERT INTO `tbl_sales_detail_info` (`sales_detail_id`, `sales_id`, `purchase_detail_id`, `product_id`, `unit_price`, `qty_sold`, `total_amnt`, `vat_amnt`, `status`, `deletion_status`, `created_date_time`) VALUES
(47, 24, 514, 22, 100, 15, 1500, 5, 1, 0, '2022-08-04 09:29:29'),
(49, 25, 512, 18, 100, 12, 1200, 5, 1, 0, '2022-08-04 09:47:25'),
(50, 26, 512, 18, 100, 22, 2200, 10, 1, 0, '2022-08-04 09:52:12'),
(51, 26, 512, 18, 100, 22, 2200, 10, 1, 0, '2022-08-04 09:52:59'),
(52, 26, 512, 18, 100, 22, 2200, 10, 1, 0, '2022-08-04 09:54:03'),
(53, 26, 512, 18, 100, 22, 2200, 10, 1, 0, '2022-08-04 09:54:26'),
(54, 27, 517, 24, 100, 14, 1400, 10, 1, 0, '2022-08-04 09:56:14'),
(55, 28, 515, 28, 100, 15, 1500, 10, 1, 0, '2022-08-04 09:57:51'),
(56, 29, 521, 27, 100, 14, 1400, 0, 1, 0, '2022-08-04 10:23:56'),
(57, 30, 521, 27, 100, 16, 1600, 10, 1, 0, '2022-08-04 10:26:15'),
(58, 31, 511, 28, 100, 30, 3000, 5, 1, 0, '2022-08-04 10:38:20'),
(59, 32, 521, 27, 200, 15, 3000, 5, 1, 0, '2022-08-04 10:42:19'),
(60, 32, 521, 27, 200, 15, 3000, 5, 1, 0, '2022-08-04 10:42:55'),
(61, 33, 511, 28, 150, 15, 2250, 200, 1, 0, '2022-08-04 10:52:11'),
(62, 35, 518, 6, 25, 10, 250, 12.5, 1, 0, '2022-08-04 11:39:09'),
(63, 35, 508, 9, 35, 20, 700, 35, 1, 0, '2022-08-04 11:39:09'),
(64, 36, 521, 27, 100, 25, 2500, 150, 1, 0, '2022-08-04 11:45:50'),
(65, 43, 518, 6, 250, 10, 2500, 100, 1, 0, '2022-08-04 12:18:30'),
(66, 43, 516, 7, 500, 5, 2500, 250, 1, 0, '2022-08-04 12:18:30'),
(67, 44, 522, 18, 140, 10, 1400, 100, 1, 0, '2022-08-04 12:20:24'),
(68, 44, 504, 9, 50, 5, 250, 50, 1, 0, '2022-08-04 12:20:24'),
(69, 45, 516, 7, 250, 10, 2500, 125, 1, 0, '2022-08-05 04:03:41'),
(70, 45, 506, 9, 500, 5, 2500, 125, 1, 0, '2022-08-05 04:03:41'),
(71, 46, 506, 9, 250, 10, 2500, 100, 1, 0, '2022-08-06 05:33:56'),
(72, 47, 520, 18, 100, 5, 500, 50, 1, 0, '2022-08-06 05:41:48'),
(73, 47, 514, 22, 200, 10, 2000, 100, 1, 0, '2022-08-06 05:41:48'),
(74, 48, 504, 9, 100, 10, 1000, 100, 1, 0, '2022-08-06 05:45:06'),
(75, 48, 509, 24, 150, 15, 2250, 250, 1, 0, '2022-08-06 05:45:06'),
(76, 50, 519, 18, 100, 10, 1000, 100, 1, 0, '2022-08-06 06:08:22'),
(77, 51, 519, 18, 200, 20, 4000, 100, 1, 0, '2022-08-06 06:10:10'),
(78, 61, 526, 24, 100, 20, 2000, 200, 1, 0, '2022-08-09 10:39:55'),
(79, 61, 508, 9, 150, 10, 1500, 150, 1, 0, '2022-08-09 10:39:55'),
(80, 62, 518, 6, 220, 10, 2200, 200, 1, 0, '2022-08-11 04:26:01'),
(81, 62, 524, 18, 100, 5, 500, 100, 1, 0, '2022-08-11 04:26:01'),
(82, 63, 521, 27, 350, 10, 3500, 100, 1, 0, '2022-08-11 04:39:31'),
(83, 63, 516, 7, 250, 7, 1750, 100, 1, 0, '2022-08-11 04:39:31'),
(84, 66, 516, 7, 100, 10, 1000, 100, 1, 0, '2022-08-12 10:31:51'),
(85, 66, 508, 9, 200, 5, 1000, 50, 1, 0, '2022-08-12 10:31:51'),
(86, 67, 516, 7, 100, 15, 1500, 200, 1, 0, '2022-08-12 12:05:25'),
(87, 67, 510, 20, 200, 10, 2000, 150, 1, 0, '2022-08-12 12:05:25'),
(88, 70, 515, 28, 420, 10, 4200, 147, 1, 0, '2022-08-16 05:01:16'),
(89, 71, 528, 28, 420, 17, 4200, 147, 1, 0, '2022-08-16 06:58:02'),
(90, 71, 528, 28, 420, 17, 4200, 147, 1, 0, '2022-08-16 06:59:01'),
(91, 71, 528, 28, 420, 17, 4200, 147, 1, 0, '2022-08-16 06:59:34'),
(92, 71, 528, 28, 420, 17, 4200, 147, 1, 0, '2022-08-16 06:59:56'),
(93, 71, 528, 28, 420, 17, 4200, 147, 1, 0, '2022-08-16 07:04:01'),
(94, 71, 528, 28, 420, 17, 4200, 147, 1, 0, '2022-08-16 07:04:48'),
(95, 71, 528, 28, 420, 17, 4200, 147, 1, 0, '2022-08-16 07:07:00'),
(96, 71, 528, 28, 420, 17, 4200, 147, 1, 0, '2022-08-16 08:25:34'),
(97, 76, 527, 28, 100, 10, 1000, 120, 1, 0, '2022-08-16 09:51:36'),
(98, 76, 516, 18, 200, 5, 1000, 50, 1, 0, '2022-08-16 09:51:36'),
(99, 80, 518, 28, 0, 10, 0, 0, 1, 0, '2022-08-16 10:03:05'),
(100, 80, 518, 28, 0, 10, 0, 0, 1, 0, '2022-08-16 10:04:12'),
(101, 81, 527, 28, 220, 10, 2200, 300, 1, 0, '2022-08-16 11:55:43'),
(102, 81, 518, 6, 350, 5, 1750, 250, 1, 0, '2022-08-16 11:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_info`
--

CREATE TABLE `tbl_sales_info` (
  `sales_id` int(4) NOT NULL,
  `s_invoice` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(4) NOT NULL,
  `paid_amnt` float NOT NULL,
  `discount_amnt` float NOT NULL,
  `due_amnt` float NOT NULL,
  `total_customer_paid` float NOT NULL,
  `remarks` text NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sales_info`
--

INSERT INTO `tbl_sales_info` (`sales_id`, `s_invoice`, `date`, `customer_id`, `paid_amnt`, `discount_amnt`, `due_amnt`, `total_customer_paid`, `remarks`, `user_name`, `status`, `deletion_status`, `created_date_time`) VALUES
(29, 'S29', '2021-03-02', 6, 900, 100, 500, 1400, 'remarks edited', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 10:23:05'),
(30, 'S30', '2023-05-05', 1, 1400, 60, 210, 1610, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 10:25:25'),
(31, 'S31', '2020-02-02', 2, 2100, 50, 905, 3005, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 10:37:00'),
(32, 'S32', '2021-03-02', 4, 2500, 150, 505, 3005, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 10:41:20'),
(33, 'S33', '2020-02-02', 3, 2000, 150, 450, 2450, 'remarks-edited', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 10:50:54'),
(35, 'S35', '2021-03-02', 4, 800, 97.5, 197.5, 997.5, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 11:37:06'),
(36, 'S36', '2000-02-02', 3, 2000, 150, 500, 2650, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 11:45:08'),
(37, 'S37', '2026-04-05', 6, 1400, 100, 200, 1700, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 11:50:02'),
(38, 'S38', '2021-06-05', 2, 500, 75, 140, 715, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 11:52:39'),
(39, 'S39', '2020-05-05', 4, 270, 7, 100, 377, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 11:55:08'),
(40, 'S40', '2021-01-02', 5, 8000, 200, 5450, 13650, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 11:58:19'),
(41, 'S41', '2021-03-02', 2, 5000, 150, 400, 5550, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 12:02:15'),
(42, 'S42', '2020-02-02', 4, 790, 100, 200, 1090, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 12:09:34'),
(43, 'S43', '2020-02-02', 3, 5000, 150, 200, 5350, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 12:17:09'),
(44, 'S44', '2020-02-20', 2, 1500, 100, 200, 1800, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-04 12:19:36'),
(45, 'S45', '2020-02-02', 4, 4250, 100, 900, 5250, '', 'Md. Monjoor Khayer', 1, 0, '2022-08-05 04:02:07'),
(46, 'S46', '2021-02-11', 3, 2000, 100, 500, 2600, '', 'Khayer', 1, 0, '2022-08-06 05:33:09'),
(47, 'S47', '2021-02-02', 1, 2000, 50, 600, 2650, '', 'Khayer', 1, 0, '2022-08-06 05:40:51'),
(48, 'S48', '2030-03-01', 4, 3000, 200, 400, 3600, '', 'Khayer', 1, 0, '2022-08-06 05:43:45'),
(50, 'S50', '2020-02-02', 4, 1000, 20, 80, 1100, '', 'Khayer', 1, 0, '2022-08-06 06:07:50'),
(51, 'S51', '2020-02-02', 5, 4000, 0, 100, 4100, '', 'Khayer', 1, 0, '2022-08-06 06:09:36'),
(61, 'S61', '2021-02-02', 4, 3000, 150, 700, 3850, '', 'Khayer', 1, 0, '2022-08-09 10:38:08'),
(62, 'S62', '2020-02-02', 4, 2200, 50, 750, 3000, '', 'Khayer', 1, 0, '2022-08-11 04:24:05'),
(63, 'S63', '2020-02-02', 4, 4000, 50, 1400, 5450, '', 'Khayer', 1, 0, '2022-08-11 04:28:53'),
(66, 'S66', '2020-02-02', 4, 2000, 50, 100, 2150, '', 'Khayer', 1, 0, '2022-08-12 10:30:26'),
(67, 'S67', '2020-02-02', 4, 3500, 50, 300, 3850, '', 'Khayer', 1, 0, '2022-08-12 12:04:27'),
(70, 'S70', '2020-02-02', 1, 2000, 100, 2247, 4347, '', 'Khayer', 1, 0, '2022-08-16 04:14:42'),
(71, 'S71', '2020-02-02', 3, 1000, 100, 3247, 4347, '', 'Khayer', 1, 0, '2022-08-16 06:57:08'),
(76, 'S76', '2020-02-02', 4, 1500, 50, 620, 2170, '', 'Khayer', 1, 0, '2022-08-16 09:50:14'),
(77, '', '2020-02-02', 4, 0, 0, 0, 0, '', 'Khayer', 1, 1, '2022-08-16 09:52:47'),
(78, '', '2020-02-02', 4, 0, 0, 0, 0, '', 'Khayer', 1, 1, '2022-08-16 09:54:47'),
(79, '', '2020-02-02', 4, 0, 0, 0, 0, '', 'Khayer', 1, 1, '2022-08-16 09:59:18'),
(80, '', '2020-02-02', 5, 0, 0, 0, 0, '', 'Khayer', 1, 1, '2022-08-16 10:02:44'),
(81, 'S81', '2020-02-02', 4, 4000, 100, 400, 4500, '', 'Khayer', 1, 0, '2022-08-16 11:53:53'),
(82, '', '2020-02-02', 4, 0, 0, 0, 0, '', 'Khayer', 1, 1, '2022-08-17 04:14:46'),
(83, '', '2022-02-02', 1, 0, 0, 0, 0, '', 'Khayer', 1, 1, '2022-08-19 04:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_info`
--

CREATE TABLE `tbl_supplier_info` (
  `supplier_id` int(4) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `supplier_image` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `manufact_id` int(4) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_supplier_info`
--

INSERT INTO `tbl_supplier_info` (`supplier_id`, `first_name`, `last_name`, `address`, `contact_no`, `email_address`, `supplier_image`, `date_of_birth`, `manufact_id`, `gender`, `city`, `country`, `status`, `deletion_status`, `created_date_time`) VALUES
(1, 'Monjoor', 'Khayer', 'kachijhuli', '01718297412', 'asad@hotmail.com', 'supplier_images_folder/khayer-image.jpg', '1998-01-02', 0, 'male', 'Mymensingh', 'Bangladesh', 1, 0, '2022-07-04 09:57:09'),
(2, 'Hasan', 'Morshed', 'Dhanmondi, Dhaka', '0123654789', 'hasan@gmail.com', 'supplier_images_folder/100.png', '1995-12-04', 0, 'male', 'Dhaka', 'Bangladesh', 1, 0, '2022-07-04 09:57:07'),
(3, 'Zakia', 'Sultana', 'Bagerhata, Jamalpur', '0123456987', 'zakia@yahoo.com', 'supplier_images_folder/103.png', '2000-12-06', 0, 'female', 'Jamalpur', 'Bangladesh', 1, 0, '2022-07-04 06:03:57'),
(4, 'Shurela', 'Yesmin', 'Bangmia Building', '01478963254', 'shurela@yahoo.com', 'supplier_images_folder/101.png', '2001-01-05', 0, 'female', 'Jamalpur', 'Bangladesh', 1, 0, '2022-07-04 06:03:59'),
(5, 'Salma', 'Khatun', 'Kacharipara, near Nurul Islam Jamalpuri', '12365478999', 'salma@gmail.com', 'supplier_images_folder/102.png', '1999-12-08', 0, 'female', 'Jamalpur', 'Bangladesh', 1, 0, '2022-07-04 06:04:00'),
(6, 'Asad', 'Kari', 'Nandina', '02365987411', 'asad@hotmail.com', 'supplier_images_folder/103.png', '1998-04-05', 0, 'female', 'Mymensingh', 'Bangladesh', 1, 0, '2022-07-04 06:04:24'),
(7, 'Mamunur', 'Rashid', 'Shafi Miyar Bazar', '01478523697', 'mamun@yahoo.com', 'supplier_images_folder/104.png', '1968-01-02', 0, 'male', 'Dhaka', 'Bangladesh', 1, 0, '2022-07-04 06:04:09'),
(8, 'Muktia', 'Khatun', 'Kacharipara, Boshpara', '03214569874', 'muktia@gmail.com', 'supplier_images_folder/105.png', '1995-01-05', 0, 'female', 'Jamalpur', 'Bangladesh', 1, 1, '2022-07-04 04:51:09'),
(9, 'Sherela', 'Yeasmin', 'dsfdfdf', '01236547899', 'shurela@gmail.com', 'supplier_images_folder/106.png', '2000-01-02', 0, 'female', 'Jamalpur', 'Bangladesh', 1, 0, '2022-07-04 10:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_payment_info`
--

CREATE TABLE `tbl_supplier_payment_info` (
  `supplier_payment_id` int(4) NOT NULL,
  `supplier_id` int(4) NOT NULL,
  `date` date NOT NULL,
  `amnt_paid` float NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_supplier_payment_info`
--

INSERT INTO `tbl_supplier_payment_info` (`supplier_payment_id`, `supplier_id`, `date`, `amnt_paid`, `remarks`, `status`, `deletion_status`, `created_date_time`) VALUES
(4, 1, '2030-01-02', 2500, 'payments by khayer', 1, 0, '2022-07-28 09:38:26'),
(5, 2, '2021-03-02', 5000, 'payments by Hasan Morshed edited once', 1, 0, '2022-07-28 09:39:22'),
(6, 3, '2070-05-04', 5600, 'payments by zakia edited twice', 1, 0, '2022-07-28 09:39:53'),
(7, 4, '2080-06-05', 4587, 'payments by Shurela 555555555', 1, 0, '2022-07-28 09:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_log_info`
--

CREATE TABLE `tbl_user_log_info` (
  `id` int(4) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `entry_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_log_info`
--

INSERT INTO `tbl_user_log_info` (`id`, `user_name`, `entry_time`, `status`, `deletion_status`) VALUES
(10, 'Khayer', '2022-08-16 11:50:28', 1, 0),
(11, 'Al Amin', '2022-08-16 11:51:09', 1, 0),
(12, 'Khayer', '2022-08-16 11:53:42', 1, 0),
(13, 'Al Amin', '2022-08-16 11:58:04', 1, 0),
(14, 'Khayer', '2022-08-16 11:58:27', 1, 0),
(15, 'Khayer', '2022-08-17 04:14:37', 1, 0),
(16, 'Khayer', '2022-08-17 06:19:42', 1, 0),
(17, 'Khayer', '2022-08-17 06:33:08', 1, 0),
(18, 'Khayer', '2022-08-17 08:46:51', 1, 0),
(19, 'Khayer', '2022-08-17 08:50:29', 1, 0),
(20, 'Khayer', '2022-08-17 10:13:29', 1, 0),
(21, 'Khayer', '2022-08-17 10:32:58', 1, 0),
(22, 'Khayer', '2022-08-17 10:41:52', 1, 0),
(23, 'Khayer', '2022-08-18 04:12:16', 1, 0),
(24, 'Khayer', '2022-08-19 04:50:22', 1, 0),
(25, 'Khayer', '2022-08-19 11:36:26', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_info`
--
ALTER TABLE `tbl_customer_info`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_customer_payment_info`
--
ALTER TABLE `tbl_customer_payment_info`
  ADD PRIMARY KEY (`customer_payment_id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`footer_id`);

--
-- Indexes for table `tbl_front_content`
--
ALTER TABLE `tbl_front_content`
  ADD PRIMARY KEY (`front_content_id`);

--
-- Indexes for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `tbl_manufact_info`
--
ALTER TABLE `tbl_manufact_info`
  ADD PRIMARY KEY (`manufact_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_opn_stck_info`
--
ALTER TABLE `tbl_opn_stck_info`
  ADD PRIMARY KEY (`opn_stck_id`),
  ADD UNIQUE KEY `UC_product_id_mm_yyyy` (`product_id`,`mon_yyyy`);

--
-- Indexes for table `tbl_page_content`
--
ALTER TABLE `tbl_page_content`
  ADD PRIMARY KEY (`page_content_id`);

--
-- Indexes for table `tbl_product_cat_info`
--
ALTER TABLE `tbl_product_cat_info`
  ADD PRIMARY KEY (`product_cat_id`);

--
-- Indexes for table `tbl_product_info`
--
ALTER TABLE `tbl_product_info`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_code_unique_key` (`product_code`);

--
-- Indexes for table `tbl_purchase_detail_info`
--
ALTER TABLE `tbl_purchase_detail_info`
  ADD PRIMARY KEY (`purchase_detail_id`);

--
-- Indexes for table `tbl_purchase_info`
--
ALTER TABLE `tbl_purchase_info`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `tbl_return_sales_info`
--
ALTER TABLE `tbl_return_sales_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales_detail_info`
--
ALTER TABLE `tbl_sales_detail_info`
  ADD PRIMARY KEY (`sales_detail_id`);

--
-- Indexes for table `tbl_sales_info`
--
ALTER TABLE `tbl_sales_info`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `tbl_supplier_info`
--
ALTER TABLE `tbl_supplier_info`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tbl_supplier_payment_info`
--
ALTER TABLE `tbl_supplier_payment_info`
  ADD PRIMARY KEY (`supplier_payment_id`);

--
-- Indexes for table `tbl_user_log_info`
--
ALTER TABLE `tbl_user_log_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_customer_info`
--
ALTER TABLE `tbl_customer_info`
  MODIFY `customer_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_customer_payment_info`
--
ALTER TABLE `tbl_customer_payment_info`
  MODIFY `customer_payment_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `footer_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_front_content`
--
ALTER TABLE `tbl_front_content`
  MODIFY `front_content_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `logo_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_manufact_info`
--
ALTER TABLE `tbl_manufact_info`
  MODIFY `manufact_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_opn_stck_info`
--
ALTER TABLE `tbl_opn_stck_info`
  MODIFY `opn_stck_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_page_content`
--
ALTER TABLE `tbl_page_content`
  MODIFY `page_content_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_product_cat_info`
--
ALTER TABLE `tbl_product_cat_info`
  MODIFY `product_cat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product_info`
--
ALTER TABLE `tbl_product_info`
  MODIFY `product_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_purchase_detail_info`
--
ALTER TABLE `tbl_purchase_detail_info`
  MODIFY `purchase_detail_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=530;

--
-- AUTO_INCREMENT for table `tbl_purchase_info`
--
ALTER TABLE `tbl_purchase_info`
  MODIFY `purchase_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `tbl_return_sales_info`
--
ALTER TABLE `tbl_return_sales_info`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT for table `tbl_sales_detail_info`
--
ALTER TABLE `tbl_sales_detail_info`
  MODIFY `sales_detail_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tbl_sales_info`
--
ALTER TABLE `tbl_sales_info`
  MODIFY `sales_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_supplier_info`
--
ALTER TABLE `tbl_supplier_info`
  MODIFY `supplier_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_supplier_payment_info`
--
ALTER TABLE `tbl_supplier_payment_info`
  MODIFY `supplier_payment_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user_log_info`
--
ALTER TABLE `tbl_user_log_info`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
