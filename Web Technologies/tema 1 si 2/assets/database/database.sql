/* Create Database and Table */
create database crud_db;
use crud_db;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100),
  `email` varchar(100),
  `address` varchar(100),
  `phone` varchar(15),
  PRIMARY KEY (`id`)
);
CREATE TABLE `admins` (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE `news` (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(50) NOT NULL UNIQUE,
  body VARCHAR(700) NOT NULL UNIQUE,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE `results` (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  student VARCHAR(50) NOT NULL UNIQUE,
  s1 INT NOT NULL,
  s2 INT NOT NULL,
  s3 INT NOT NULL,
  s4 INT NOT NULL,
  s5 INT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);