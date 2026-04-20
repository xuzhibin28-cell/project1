-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2026-04-20 05:22:32
-- 服务器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `quetion1`
--

-- --------------------------------------------------------

--
-- 表的结构 `ok`
--

CREATE TABLE `ok` (
  ` TrackingNumber` varchar(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ReceivingDate` date NOT NULL DEFAULT current_timestamp(),
  `Weight` varchar(255) NOT NULL,
  `CBM` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;
INSERT INTO `ok`(` TrackingNumber`, `ProductName`, `ReceivingDate`, `Weight`, `CBM`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
UPDATE `ok` SET ` TrackingNumber`='[value-1]',`ProductName`='[value-2]',`ReceivingDate`='[value-3]',`Weight`='[value-4]',`CBM`='[value-5]' WHERE 1
DELETE FROM `ok` WHERE 0