CREATE DATABASE IF NOT EXISTS `unitex_db`;

USE `unitex_db`;

SET foreign_key_checks = 0;

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `auser_name` text NOT NULL,
  `auser_password` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `admin_users` VALUES ("1","HR Admin","admin","21232f297a57a5a743894a0e4a801fc3","2018-11-25");


DROP TABLE IF EXISTS `currency`;

CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sg_rate` text NOT NULL,
  `usd_rate` text NOT NULL,
  `date` text NOT NULL,
  `up_by` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `currency` VALUES ("1","61.10","83.73","2018-12-08","Auto API");


DROP TABLE IF EXISTS `expenditure_types`;

CREATE TABLE `expenditure_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_type` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `expenditure_types` VALUES ("1","All",""),
("2","Entertainment",""),
("3","T.A",""),
("4","D.A",""),
("5","Utility Bill",""),
("6","Office Accessories",""),
("7","Mobile Bill",""),
("9","Gifts",""),
("10","Test Type X",""),
("11","Test Type YZ","");


DROP TABLE IF EXISTS `expenditures`;

CREATE TABLE `expenditures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher_no` text NOT NULL,
  `processed_by` text NOT NULL,
  `inv_for` text NOT NULL,
  `purpose_of_exp` text NOT NULL,
  `amount_bdt` text NOT NULL,
  `amount_sgd` text NOT NULL,
  `amount_usd` text NOT NULL,
  `approved` text NOT NULL,
  `processed` text NOT NULL,
  `scan_doc` text NOT NULL,
  `date` text NOT NULL,
  `up_by` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `expenditures` VALUES ("3","VCH-1811281543396200","Al-Jubaer","Nur Mohammad","T.A","600","9.86","7.15","Not Yet Assigned","Not Yet Assigned","154339620071357479712-to-5v-converter-circuit.gif","2018-11-28","jubaer"),
("4","VCH-1811281543396216","Al-Jubaer","Imran Akand","D.A","300","4.93","3.58","Not Yet Assigned","Not Yet Assigned","1543396216102853618012-to-5v-converter-circuit (1).gif","2018-11-28","jubaer"),
("5","VCH-1811281543396246","Imran Akand","Harun","T.A","150","2.46","1.79","Not Yet Assigned","Not Yet Assigned","1543396246101667006412-to-5v-converter-circuit (1).gif","2018-11-28","imran"),
("6","VCH-1811281543396257","Imran Akand","Robiul Islam","T.A","120","1.97","1.43","Yes","Not Yet Assigned","15433962576828713612-to-5v-converter-circuit.gif","2018-11-28","imran"),
("7","VCH-1812041543914285","Al-Jubaer","Rezaul Karim","All","1520","24.64","18.07","Not Yet Assigned","Not Yet Assigned","1543914285481160625binary-1254502_960_720.png","2018-12-04","jubaer");


DROP TABLE IF EXISTS `master_user`;

CREATE TABLE `master_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `muser_name` text NOT NULL,
  `muser_password` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `master_user` VALUES ("1","Master User","master","eb0a191797624dd3a48fa681d3061212","2018-11-25");


DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `user_name` text NOT NULL,
  `user_password` text NOT NULL,
  `permission` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `users` VALUES ("1","Al-Jubaer","jubaer","bd4eb9f88d8957bfacc14c94d4997c79","No","22/10/2018");


DROP TABLE IF EXISTS `xuser`;

CREATE TABLE `xuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xuser_name` text NOT NULL,
  `xuser_password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `xuser` VALUES ("1","jubaer","23f299842911f1344d0920e50117a153");


SET foreign_key_checks = 1;
CREATE DATABASE IF NOT EXISTS `unitex_db`;

USE `unitex_db`;

SET foreign_key_checks = 0;

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `auser_name` text NOT NULL,
  `auser_password` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `admin_users` VALUES ("1","HR Admin","admin","21232f297a57a5a743894a0e4a801fc3","2018-11-25");


DROP TABLE IF EXISTS `currency`;

CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sg_rate` text NOT NULL,
  `usd_rate` text NOT NULL,
  `date` text NOT NULL,
  `up_by` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `currency` VALUES ("1","61.10","83.73","2018-12-08","Auto API");


DROP TABLE IF EXISTS `expenditure_types`;

CREATE TABLE `expenditure_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_type` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `expenditure_types` VALUES ("1","All",""),
("2","Entertainment",""),
("3","T.A",""),
("4","D.A",""),
("5","Utility Bill",""),
("6","Office Accessories",""),
("7","Mobile Bill",""),
("9","Gifts",""),
("10","Test Type X",""),
("11","Test Type YZ","");


DROP TABLE IF EXISTS `expenditures`;

CREATE TABLE `expenditures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher_no` text NOT NULL,
  `processed_by` text NOT NULL,
  `inv_for` text NOT NULL,
  `purpose_of_exp` text NOT NULL,
  `amount_bdt` text NOT NULL,
  `amount_sgd` text NOT NULL,
  `amount_usd` text NOT NULL,
  `approved` text NOT NULL,
  `processed` text NOT NULL,
  `scan_doc` text NOT NULL,
  `date` text NOT NULL,
  `up_by` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `expenditures` VALUES ("3","VCH-1811281543396200","Al-Jubaer","Nur Mohammad","T.A","600","9.86","7.15","Not Yet Assigned","Not Yet Assigned","154339620071357479712-to-5v-converter-circuit.gif","2018-11-28","jubaer"),
("4","VCH-1811281543396216","Al-Jubaer","Imran Akand","D.A","300","4.93","3.58","Not Yet Assigned","Not Yet Assigned","1543396216102853618012-to-5v-converter-circuit (1).gif","2018-11-28","jubaer"),
("5","VCH-1811281543396246","Imran Akand","Harun","T.A","150","2.46","1.79","Not Yet Assigned","Not Yet Assigned","1543396246101667006412-to-5v-converter-circuit (1).gif","2018-11-28","imran"),
("6","VCH-1811281543396257","Imran Akand","Robiul Islam","T.A","120","1.97","1.43","Yes","Not Yet Assigned","15433962576828713612-to-5v-converter-circuit.gif","2018-11-28","imran"),
("7","VCH-1812041543914285","Al-Jubaer","Rezaul Karim","All","1520","24.64","18.07","Not Yet Assigned","Not Yet Assigned","1543914285481160625binary-1254502_960_720.png","2018-12-04","jubaer");


DROP TABLE IF EXISTS `master_user`;

CREATE TABLE `master_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `muser_name` text NOT NULL,
  `muser_password` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `master_user` VALUES ("1","Master User","master","eb0a191797624dd3a48fa681d3061212","2018-11-25");


DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `user_name` text NOT NULL,
  `user_password` text NOT NULL,
  `permission` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `users` VALUES ("1","Al-Jubaer","jubaer","bd4eb9f88d8957bfacc14c94d4997c79","No","22/10/2018");


DROP TABLE IF EXISTS `xuser`;

CREATE TABLE `xuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xuser_name` text NOT NULL,
  `xuser_password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `xuser` VALUES ("1","jubaer","23f299842911f1344d0920e50117a153");


SET foreign_key_checks = 1;
