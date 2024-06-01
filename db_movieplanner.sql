/*
SQLyog Job Agent v11.11 (64 bit) Copyright(c) Webyog Inc. All Rights Reserved.


MySQL - 5.7.9 : Database - movieplanner
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Database structure for database `movieplanner` */

CREATE DATABASE /*!32312 IF NOT EXISTS*/`movieplanner` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `movieplanner`;

/*Table structure for table `actor_schedule` */

DROP TABLE IF EXISTS `actor_schedule`;

CREATE TABLE `actor_schedule` (
  `actor_schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `actor_id` int(11) DEFAULT NULL,
  `schedule_date` varchar(100) DEFAULT NULL,
  `schedule_place` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`actor_schedule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `actor_schedule` */

insert  into `actor_schedule` values (1,1,'2022-11-20','Kottayam');

/*Table structure for table `actors` */

DROP TABLE IF EXISTS `actors`;

CREATE TABLE `actors` (
  `actor_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) DEFAULT NULL,
  `login_id` int(11) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`actor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `actors` */

insert  into `actors` values (1,1,4,'Rock','Jd','uploads/uploads_6374785b174d1.jpg','6238526459','rock332@gmail.com');

/*Table structure for table `auction` */

DROP TABLE IF EXISTS `auction`;

CREATE TABLE `auction` (
  `auction_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) DEFAULT NULL,
  `starting_price` varchar(100) DEFAULT NULL,
  `advance_amount` varchar(100) DEFAULT NULL,
  `bid_start_date` varchar(100) DEFAULT NULL,
  `bid_end_date` varchar(100) DEFAULT NULL,
  `auction_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `auction` */

insert  into `auction` values (1,1,'500','100','2022-11-16','2022-11-17','pending'),(2,1,'500','250','2022-11-17','2022-11-18','ended'),(3,2,'1000','200','2022-11-17','2022-11-20','ended'),(4,2,'200','2','2022-11-20','2022-12-03','stop');

/*Table structure for table `auction_details` */

DROP TABLE IF EXISTS `auction_details`;

CREATE TABLE `auction_details` (
  `details_id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) DEFAULT NULL,
  `distributor_id` int(11) DEFAULT NULL,
  `offered_amount` varchar(100) DEFAULT NULL,
  `details_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`details_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `auction_details` */

insert  into `auction_details` values (1,2,1,'600','pending'),(2,3,1,'10002','pending'),(3,4,1,'210','winner');

/*Table structure for table `director` */

DROP TABLE IF EXISTS `director`;

CREATE TABLE `director` (
  `director_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) DEFAULT NULL,
  `login_id` int(11) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`director_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `director` */

insert  into `director` values (1,1,2,'Robin','hoob','06238526459','sankarb.b00@gmail.com');

/*Table structure for table `distributors` */

DROP TABLE IF EXISTS `distributors`;

CREATE TABLE `distributors` (
  `distributor_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`distributor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `distributors` */

insert  into `distributors` values (1,5,'Krishnendhu','kurup','9846356521','krishna2266@gmail.com');

/*Table structure for table `filim_schedule` */

DROP TABLE IF EXISTS `filim_schedule`;

CREATE TABLE `filim_schedule` (
  `filim_schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `filim_id` int(11) DEFAULT NULL,
  `filim_schedule_place` varchar(100) DEFAULT NULL,
  `filim_schedule_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`filim_schedule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `filim_schedule` */

insert  into `filim_schedule` values (2,1,'Ernakulam','2022-11-25'),(3,1,'alpy','2022-11-06');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login` values (1,'pro','pro','producer'),(2,'dir','dir','director'),(3,'controller','controller','production controller'),(4,'act','act','actor'),(5,'dis','dis','distributor');

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `messge_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_type` varchar(200) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message_desc` varchar(300) DEFAULT NULL,
  `message_datetime` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`messge_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `messages` */

insert  into `messages` values (1,'director-producer',2,0,'director to producer','2022-11-16 11:10:57'),(2,'director-controller',2,3,'director to controller','2022-11-16 11:11:12'),(3,'controller-director',3,2,'controller to director','2022-11-16 11:13:12'),(4,'controller-producer',3,0,'controller to producer','2022-11-16 11:13:29'),(5,'director-actor',3,4,'controller to actor','2022-11-16 11:13:44'),(6,'actor-controller',4,3,'actor - controller','2022-11-16 11:17:16'),(7,'actor-director',4,2,'actor - director','2022-11-16 11:17:32'),(8,'producer-controller',0,3,'pro to controller','2022-11-16 11:18:04'),(16,'director-producer',2,0,'dsee','2022-11-16 14:32:05'),(15,'producer-actor',0,4,'da','2022-11-16 14:26:48'),(14,'producer-actor',0,4,'odd','2022-11-16 14:26:38'),(13,'actor-producer',4,0,'hiii','2022-11-16 14:25:46'),(17,'actor-producer',4,0,'how are you','2022-11-16 14:45:06'),(18,'actor-producer',4,0,'i am act','2022-11-18 12:00:31'),(19,'actor-producer',4,0,'hello','2022-11-18 12:00:35'),(20,'actor-producer',4,0,'hellos','2022-11-18 12:00:40'),(21,'actor-producer',4,0,'new','2022-11-18 12:11:30'),(22,'actor-producer',4,0,'dsad','2022-11-18 12:11:50'),(23,'actor-producer',4,0,'das','2022-11-18 12:12:42'),(24,'actor-producer',4,0,'','2022-11-18 12:17:57'),(25,'actor-producer',4,0,'','2022-11-18 12:21:11'),(26,'actor-producer',4,0,'','2022-11-18 12:21:12'),(27,'actor-producer',4,0,'i am act','2022-11-18 12:32:17'),(28,'actor-producer',4,0,'da','2022-11-18 12:32:20');

/*Table structure for table `movie` */

DROP TABLE IF EXISTS `movie`;

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(100) DEFAULT NULL,
  `movie_desc` varchar(200) DEFAULT NULL,
  `cast_and_crew` varchar(100) DEFAULT NULL,
  `poster` varchar(100) DEFAULT NULL,
  `release_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `movie` */

insert  into `movie` values (1,'Avatar','the best ever ','actor : Samuel Henry','uploads/uploads_637475b52b6b0.jfif','23/12/2022'),(2,'Anaconda','snake thriller','actor : mammootty','uploads/uploads_6374c778eb331.jpg','23/12/2022');

/*Table structure for table `notifications` */

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `controller_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL,
  `notification_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `notifications` */

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) DEFAULT NULL,
  `distributor_id` int(11) DEFAULT NULL,
  `amount_paid` varchar(100) DEFAULT NULL,
  `payemnt_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

insert  into `payment` values (3,4,1,'210','Payment Confirmed by Producer');

/*Table structure for table `posters_trailer` */

DROP TABLE IF EXISTS `posters_trailer`;

CREATE TABLE `posters_trailer` (
  `poster_trailer_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) DEFAULT NULL,
  `file_path` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`poster_trailer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `posters_trailer` */

insert  into `posters_trailer` values (1,1,'uploads/uploads_637477cc9ff11.mp4');

/*Table structure for table `producer` */

DROP TABLE IF EXISTS `producer`;

CREATE TABLE `producer` (
  `login_id` int(11) DEFAULT NULL,
  `product_house_name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `producer` */

/*Table structure for table `production_controller` */

DROP TABLE IF EXISTS `production_controller`;

CREATE TABLE `production_controller` (
  `controller_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) DEFAULT NULL,
  `login_id` int(11) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `phone1` varchar(100) DEFAULT NULL,
  `phone2` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`controller_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `production_controller` */

insert  into `production_controller` values (1,1,3,'Ananthu','john','06238526459','6238526459','sankarb.b00@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
