-- create database
CREATE DATABASE IF NOT EXISTS `xcelsznews`;

-- create table users
CREATE TABLE `users` (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(500) NOT NULL
);