-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2017 at 01:34 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `handyman`
--

-- --------------------------------------------------------

--
-- Table structure for table `sv_admin_login`
--

CREATE TABLE IF NOT EXISTS `sv_admin_login` (
  `admin_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `site_desc` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `paypal_id` varchar(200) NOT NULL,
  `currency_mode` varchar(200) NOT NULL,
  `paypal_site_mode` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sv_admin_login`
--

INSERT INTO `sv_admin_login` (`admin_id`, `user_name`, `password`, `email_id`, `site_name`, `logo`, `favicon`, `site_desc`, `keyword`, `site_url`, `paypal_id`, `currency_mode`, `paypal_site_mode`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'support@migrateshop.com', 'domestic cleaning', '4887handyman-logo.png', '9804favicon.png', 'Domestic Cleaning tutorials', 'HTML,CSS,XML,JavaScript', 'http://localhost/athi/handyman/', 'info@codexworld.com', 'USD', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `sv_city`
--

CREATE TABLE IF NOT EXISTS `sv_city` (
  `city_id` int(25) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sv_city`
--

INSERT INTO `sv_city` (`city_id`, `city_name`) VALUES
(1, 'chennai'),
(2, 'sydney'),
(3, 'california'),
(5, 'madurai'),
(6, 'delhi');

-- --------------------------------------------------------

--
-- Table structure for table `sv_contact`
--

CREATE TABLE IF NOT EXISTS `sv_contact` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sv_contact`
--

INSERT INTO `sv_contact` (`id`, `name`, `email`, `contact_no`, `msg`) VALUES
(1, 'demo', 'demo@gmail.com', '5673466', 'msg');

-- --------------------------------------------------------

--
-- Table structure for table `sv_pages`
--

CREATE TABLE IF NOT EXISTS `sv_pages` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sv_pages`
--

INSERT INTO `sv_pages` (`id`, `page_name`, `page_content`) VALUES
(1, 'home page', '<section id="trustandsecurity-teaser" class="teaser home-img">\r\n<div class="min-space">&nbsp;</div>\r\n<div class="container">\r\n<div class="col-lg-12 col-md-12 col-sm-12 home_icon">\r\n<h3 style="color: #fff;">CLEVER STAFF</h3>\r\n<p class="abt-staff">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. All the Lorem Ipsum generators on the Internet tend to repeat predefined.</p>\r\n</div>\r\n</div>\r\n<div class="min-space">&nbsp;</div>\r\n</section>\r\n<section id="trustandsecurity-teaser" class="teaser">\r\n<div class="container">\r\n<div class="min-space">&nbsp;</div>\r\n<div class="col-lg-4 col-md-4 col-sm-4 "><img class="icon_round" src="img/icon1.png" />\r\n<p>Our Team</p>\r\n<h4><strong>2271</strong></h4>\r\n</div>\r\n<div class="col-lg-4 col-md-4 col-sm-4"><img class="icon_round" src="img/icon3.png" />\r\n<p>Satisfied Clients</p>\r\n<h4><strong>5682</strong></h4>\r\n</div>\r\n<div class="col-lg-4 col-md-4 col-sm-4"><img class="icon_round" src="img/icon2.png" />\r\n<p>Jobs Done</p>\r\n<h4><strong>2685</strong></h4>\r\n</div>\r\n</div>\r\n<div class="min-space">&nbsp;</div>\r\n</section>\r\n<section id="customer-testimonials-teaser" class="slideshow-teaser teaser bg-secondary">\r\n<div class="min-space">&nbsp;</div>\r\n<h3>HAPPY CLIENTS</h3>\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-md-12">\r\n<div id="quote-carousel" class="carousel slide" data-ride="carousel"><!-- Bottom Carousel Indicators --> <!-- Carousel Slides / Quotes -->\r\n<div class="carousel-inner"><!-- Quote 1 -->\r\n<div class="item active">\r\n<div class="row">\r\n<div class="col-sm-12">\r\n<p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.&rdquo;</p>\r\n<img class="test-client" src="img/img1.jpg" /> <small><strong class="test-name clearfix">Vulputate M., Dolor</strong></small></div>\r\n</div>\r\n</div>\r\n<!-- Quote 3 -->\r\n<div class="item">\r\n<div class="row">\r\n<div class="col-sm-12">\r\n<p>&ldquo;Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Maecenas faucibus mollis interdum. Cras mattis consectetur purus sit amet fermentum.&rdquo;</p>\r\n<img class="test-client" src="img/img3.jpg" /> <small><strong class="test-name clearfix">Aenean A., Justo Cras</strong></small></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="min-space">&nbsp;</div>\r\n</section>'),
(2, 'how it works', '<section class="teaser bg-primary three-columns">\r\n<div class="container">\r\n<div class="min-space">&nbsp;</div>\r\n<h3>Book a Helpling from $29 per hour &ndash; just 3 easy steps</h3>\r\n<ul>\r\n<li class="home_icon col-md-4 col-sm-4"><span class="fa fa-map font-icon">&nbsp;</span>\r\n<p><strong>Enter Your Location</strong></p>\r\n<p>Enter the address of the place you need cleaned.</p>\r\n</li>\r\n<li class="home_icon col-md-4 col-sm-4"><span class="fa fa-calendar-o font-icon">&nbsp;</span>\r\n<p><strong>Make an Appointment</strong></p>\r\n<p>Choose a date and time that best suits you.</p>\r\n</li>\r\n<li class="home_icon col-md-4 col-sm-4"><span class="fa fa-smile-o font-icon">&nbsp;</span>\r\n<p><strong>Enjoy a Clean Home</strong></p>\r\n<p>Sit back and enjoy. We will take care of the rest.</p>\r\n</li>\r\n</ul>\r\n<div class="min-space">&nbsp;</div>\r\n</div>\r\n</section>\r\n<section class="teaser work-bg">\r\n<div class="min-space">&nbsp;</div>\r\n<div class="container">\r\n<h2>Most Frequent Questions</h2>\r\n<div class="min-space">&nbsp;</div>\r\n<div class="panel-group" data-fillspace="0" data-event="click" data-collapsible="0" data-clearstyle="0" data-animated="slide" data-active="0" data-disabled="0" data-autoheight="0">\r\n<div class="col-lg-3 col-md-3 col-sm-3">\r\n<div class="panel qstn-bg">\r\n<div class="panel-heading head">\r\n<div class="question">Question</div>\r\n</div>\r\n<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut lacus a ligula placerat mattis. Vivamus in ligula at lacus ullamcorper malesuada.</div>\r\n</div>\r\n</div>\r\n<div class="col-lg-3 col-md-3 col-sm-3">\r\n<div class="panel qstn-bg">\r\n<div class="panel-heading head">\r\n<div class="question">Question</div>\r\n</div>\r\n<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut lacus a ligula placerat mattis. Vivamus in ligula at lacus ullamcorper malesuada.</div>\r\n</div>\r\n</div>\r\n<div class="col-lg-3 col-md-3 col-sm-3">\r\n<div class="panel qstn-bg">\r\n<div class="panel-heading head">\r\n<div class="question">Question</div>\r\n</div>\r\n<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut lacus a ligula placerat mattis. Vivamus in ligula at lacus ullamcorper malesuada.</div>\r\n</div>\r\n</div>\r\n<div class="col-lg-3 col-md-3 col-sm-3">\r\n<div class="panel qstn-bg">\r\n<div class="panel-heading head">\r\n<div class="question">Question</div>\r\n</div>\r\n<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut lacus a ligula placerat mattis. Vivamus in ligula at lacus ullamcorper malesuada.</div>\r\n</div>\r\n</div>\r\n<p class="actions">&nbsp;</p>\r\n</div>\r\n</div>\r\n</section>\r\n<section style="text-align: center; background-color: #f3f3f3;">\r\n<div class="min-space">&nbsp;</div>\r\n<div class="container">\r\n<div class="col-lg-6 col-md-6 col-sm-6"><img class="img-responsive" src="../img/bucket.png" /></div>\r\n<div class="col-lg-6 col-md-6 col-sm-6">\r\n<div class="email">\r\n<div class="min-space">&nbsp;</div>\r\n<p><strong>Couldn`t find what you were looking for?</strong> <br />Send us a direct e-mail</p>\r\n<p class="actions"><a class="btn btn-primary btn-sm" href="mailto:info@sangvish.com">Email</a></p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="min-space">&nbsp;</div>\r\n</section>'),
(3, 'pricing', '<section class="teaser bg-primary">\r\n<div>\r\n<div class="min-space">&nbsp;</div>\r\n<h3>60 Seconds to Your Booking</h3>\r\n<p class="actions"><a class="btn btn-secondary btn-lg" href="../index.php" data-checkout="true">Book a Helpling</a></p>\r\n<div class="min-space">&nbsp;</div>\r\n</div>\r\n</section>\r\n<section id="price" class="teaser padding-top">\r\n<div class="container">\r\n<div class="min-space">&nbsp;</div>\r\n<div class="col-lg-6 col-md-6 col-sm-6">\r\n<div class="single-booking">\r\n<h3>Single Booking</h3>\r\n<h4 style="text-align: center;">$35 / Hour</h4>\r\n<h5 class="sub-head">Inclusive of Goods and Services Tax(GST) if applicable*</h5>\r\n<div class="price-icon">&nbsp;&nbsp;&nbsp;One of clean</div>\r\n<div class="price-icon">&nbsp;&nbsp;&nbsp;No binding contract</div>\r\n<div class="price-icon">&nbsp;&nbsp;&nbsp;Flexible online Booking</div>\r\n</div>\r\n</div>\r\n<div class="col-lg-6 col-md-6 col-sm-6">\r\n<div class="single-booking recurring">\r\n<h3>Recurring Booking</h3>\r\n<h4 style="text-align: center; color: #66bb6a;">$35 / Hour</h4>\r\n<h5 class="sub-head1">Inclusive of Goods and Services Tax(GST) if applicable*</h5>\r\n<div class="price-icon">&nbsp;&nbsp;&nbsp;Regular clean every week or fortnight</div>\r\n<div class="price-icon">&nbsp;&nbsp;&nbsp;Discounted price</div>\r\n<div class="price-icon">&nbsp;&nbsp;&nbsp;Book your preferred cleaner</div>\r\n<div class="price-icon">&nbsp;&nbsp;&nbsp;No binding contract</div>\r\n<div class="price-icon">&nbsp;&nbsp;&nbsp;Flexible online Booking</div>\r\n</div>\r\n</div>\r\n<div class="min-space">&nbsp;</div>\r\n</div>\r\n</section>'),
(4, 'help', '<section class="teaser most_freq_ques">\r\n<div class="container">\r\n<div class="min-space">&nbsp;</div>\r\n<h4>Most Frequent Questions</h4>\r\n<div id="accordion-1" class="accordion-font">\r\n<h3 class="help-title">How does Helpling work?</h3>\r\n<div>\r\n<p class="help">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin fermentum volutpat justo quis cursus. Sed sit amet eros nec nibh vestibulum interdum. Praesent id sapien sem. Aenean varius laoreet urna, quis iaculis ex egestas volutpat. Praesent porta dignissim libero ac viverra. Ut non dignissim ante, gravida porta lacus. Maecenas felis neque, imperdiet a vestibulum ut, tempus sed tellus. Integer volutpat, mi et sagittis rhoncus, nulla nibh pharetra ante, ut laoreet nibh ipsum non dolor. Fusce vel velit porttitor, viverra metus eu, rhoncus tortor. Sed vulputate varius molestie.</p>\r\n</div>\r\n<h3 class="help-title">How is Helpling different from a cleaning company?</h3>\r\n<div>\r\n<p class="help">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin fermentum volutpat justo quis cursus. Sed sit amet eros nec nibh vestibulum interdum. Praesent id sapien sem. Aenean varius laoreet urna, quis iaculis ex egestas volutpat. Praesent porta dignissim libero ac viverra. Ut non dignissim ante, gravida porta lacus. Maecenas felis neque, imperdiet a vestibulum ut, tempus sed tellus. Integer volutpat, mi et sagittis rhoncus, nulla nibh pharetra ante, ut laoreet nibh ipsum non dolor. Fusce vel velit porttitor, viverra metus eu, rhoncus tortor. Sed vulputate varius molestie.</p>\r\n</div>\r\n<h3 class="help-title">How can I register?</h3>\r\n<div>\r\n<p class="help">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin fermentum volutpat justo quis cursus. Sed sit amet eros nec nibh vestibulum interdum. Praesent id sapien sem. Aenean varius laoreet urna, quis iaculis ex egestas volutpat. Praesent porta dignissim libero ac viverra. Ut non dignissim ante, gravida porta lacus. Maecenas felis neque, imperdiet a vestibulum ut, tempus sed tellus. Integer volutpat, mi et sagittis rhoncus, nulla nibh pharetra ante, ut laoreet nibh ipsum non dolor. Fusce vel velit porttitor, viverra metus eu, rhoncus tortor. Sed vulputate varius molestie.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</section>'),
(5, 'contact', '<p><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26360763.088299938!2d-113.74592522530561!3d36.242734688809676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1467104302695" width="100%" height="360" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>\r\n<h3 class="sv_contact_address">Address Details</h3>\r\n<p>DieSachbearbeiter SchÃ¶nhauser Allee</p>\r\n<p>167c 10435 Berlin Germany</p>\r\n<p>Telephone: +49 30 47373795</p>\r\n<p>E-mail: moin@blindtextgenerator.de</p>');

-- --------------------------------------------------------

--
-- Table structure for table `sv_services`
--

CREATE TABLE IF NOT EXISTS `sv_services` (
  `services_id` int(25) NOT NULL AUTO_INCREMENT,
  `services_name` varchar(255) NOT NULL,
  `service_img` varchar(255) NOT NULL,
  PRIMARY KEY (`services_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sv_services`
--

INSERT INTO `sv_services` (`services_id`, `services_name`, `service_img`) VALUES
(1, 'laundry', '8511laundry.png'),
(2, 'Electricians', '65electricians.png'),
(3, 'Mechanic', '8506mechanic.png'),
(4, 'Plumbers', '2275plumbers.png'),
(5, 'Handyman', '2033handyman.png'),
(6, 'Carpenters', '4948carpenters.png');

-- --------------------------------------------------------

--
-- Table structure for table `sv_services_sub`
--

CREATE TABLE IF NOT EXISTS `sv_services_sub` (
  `sid` int(20) NOT NULL AUTO_INCREMENT,
  `services_name` varchar(255) NOT NULL,
  `services_sub_name` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sv_services_sub`
--

INSERT INTO `sv_services_sub` (`sid`, `services_name`, `services_sub_name`, `price`) VALUES
(1, '1', 'for home', 10),
(2, '2', 'for office', 20),
(3, '1', 'for hostel', 30),
(4, '3', 'for four wheeler', 40),
(5, '4', 'for home', 50),
(6, '5', 'for home', 60),
(7, '6', 'for home', 70),
(8, '3', 'for two wheeler', 80);

-- --------------------------------------------------------

--
-- Table structure for table `sv_service_provider`
--

CREATE TABLE IF NOT EXISTS `sv_service_provider` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `confirm_email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mob_no` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `exp` varchar(255) NOT NULL,
  `paid_work` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `abt_us` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `creat_time` date NOT NULL,
  `update_time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sv_service_provider`
--

INSERT INTO `sv_service_provider` (`id`, `email`, `confirm_email`, `first_name`, `last_name`, `mob_no`, `post_code`, `exp`, `paid_work`, `gender`, `dob`, `nationality`, `address`, `suburb`, `abt_us`, `phone_no`, `creat_time`, `update_time`) VALUES
(1, 'athi@gmail.com', 'athi@gmail.com', 'athi', 'lakshmi', '6987541236', '96265', '1', '1', '1', '2017-04-20', 'nationality', '              ', 'location', '', '111', '2017-04-07', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sv_user_order`
--

CREATE TABLE IF NOT EXISTS `sv_user_order` (
  `order_id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  `sub_services` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `order_time` varchar(200) NOT NULL,
  `requirement` varchar(255) NOT NULL,
  `order_phone_no` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `price` int(200) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `currency_code` varchar(200) NOT NULL DEFAULT '-',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sv_user_order`
--

INSERT INTO `sv_user_order` (`order_id`, `name`, `address`, `services`, `sub_services`, `date`, `order_time`, `requirement`, `order_phone_no`, `phone_no`, `city_name`, `price`, `payment_mode`, `payment_status`, `currency_code`) VALUES
(1, 'demo', 'chennai', '1', '1', '2017-04-14', '10:00 AM', '        ', '', '111', '1', 10, 'cash', 'completed', '-'),
(2, 'demo', 'rajapalayam', '3', '4', '2017-04-10', '11:00 AM', '            requiremnt', '111', '111', '2', 40, 'cash', 'completed', '-');

-- --------------------------------------------------------

--
-- Table structure for table `sv_user_profile`
--

CREATE TABLE IF NOT EXISTS `sv_user_profile` (
  `signup_id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pin_code` varchar(255) NOT NULL,
  `gender` int(25) NOT NULL,
  `date` date NOT NULL,
  `updat_time` date NOT NULL,
  PRIMARY KEY (`signup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sv_user_profile`
--

INSERT INTO `sv_user_profile` (`signup_id`, `name`, `email_id`, `password`, `phone_no`, `city`, `address`, `pin_code`, `gender`, `date`, `updat_time`) VALUES
(1, 'demo', 'demo@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', '111', 'city', 'address', '626111', 2, '2017-04-14', '2017-04-07');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
