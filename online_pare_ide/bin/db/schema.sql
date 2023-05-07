DROP DATABASE IF EXISTS `online_pare_ide`;

CREATE DATABASE `online_pare_ide`;

USE `online_pare_ide`;

CREATE TABLE `users` (
    `usr_id`             int NOT NULL AUTO_INCREMENT,
    `usr_password`       varchar(45) NOT NULL,
    `usr_first_name`     varchar(45) NOT NULL,
    `usr_last_name`      varchar(45) NOT NULL,
    `usr_email`          varchar(100) DEFAULT NULL,
    PRIMARY KEY (`usr_id`)
);

CREATE TABLE `projects` (
    `prj_id`             int NOT NULL AUTO_INCREMENT,
    `prj_name`			 varchar(100) NOT NULL,
    `prj_code`           varchar(100) DEFAULT NULL,
    `prj_usr_id`         int NOT NULL,          
    PRIMARY KEY (`prj_id`),
    INDEX `prj_usr_id` (`prj_usr_id`)
)

-- needed tables
-- *what information do you have to store

-- user has projects

-- project has code

-- 1.) user logs in (need to create accont, record user email and password)
-- 2.) user can create projects (need to store information about projects and code in projects)



