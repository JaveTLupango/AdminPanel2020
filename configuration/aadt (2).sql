-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 06:11 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aadt`
--

-- --------------------------------------------------------

--
-- Table structure for table `2authfactor`
--

CREATE TABLE `2authfactor` (
  `id` int(11) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `code` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `udt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2authfactor`
--

INSERT INTO `2authfactor` (`id`, `userid`, `code`, `status`, `dt`, `udt`, `duration`) VALUES
(30, '1844156d4166d94387f1a4ad031ca5fa', 'CODE82893', 'enactive', '2020-12-17 03:39:42', '2020-12-17 02:47:25', 900),
(31, '1844156d4166d94387f1a4ad031ca5fa', 'CODE96264', 'enactive', '2020-12-17 03:48:16', '2020-12-17 02:48:59', 900),
(32, '1844156d4166d94387f1a4ad031ca5fa', 'CODE73424', 'enactive', '2020-12-17 03:56:13', '2020-12-17 03:06:33', 900),
(33, '1844156d4166d94387f1a4ad031ca5fa', 'CODE34120', 'enactive', '2020-12-17 03:58:54', '2020-12-17 03:06:33', 900),
(34, 'cfcd208495d565ef66e7dff9f98764da', 'CODE52535', 'active', '2020-12-17 03:59:12', '2020-12-17 02:59:12', 900),
(35, 'cfcd208495d565ef66e7dff9f98764da', 'CODE69213', 'active', '2020-12-17 04:01:09', '2020-12-17 03:01:09', 900),
(36, '1844156d4166d94387f1a4ad031ca5fa', 'CODE18121', 'enactive', '2020-12-17 04:03:38', '2020-12-17 03:06:33', 900),
(37, 'cfcd208495d565ef66e7dff9f98764da', 'CODE37195', 'active', '2020-12-17 04:03:57', '2020-12-17 03:03:57', 900),
(38, '1844156d4166d94387f1a4ad031ca5fa', 'CODE26688', 'enactive', '2020-12-17 04:05:26', '2020-12-17 03:06:33', 900),
(39, '1844156d4166d94387f1a4ad031ca5fa', 'CODE71647', 'enactive', '2020-12-17 04:06:11', '2020-12-17 03:06:33', 900),
(40, '1844156d4166d94387f1a4ad031ca5fa', 'CODE43514', 'enactive', '2020-12-17 04:09:03', '2020-12-17 03:09:30', 900),
(41, '1844156d4166d94387f1a4ad031ca5fa', 'CODE23048', 'enactive', '2020-12-17 06:47:03', '2020-12-17 05:48:00', 900),
(42, '1844156d4166d94387f1a4ad031ca5fa', 'CODE30949', 'enactive', '2020-12-17 07:07:10', '2020-12-17 06:08:56', 900),
(43, '1844156d4166d94387f1a4ad031ca5fa', 'CODE78649', 'enactive', '2020-12-17 07:27:58', '2020-12-17 06:29:08', 900),
(44, 'cfcd208495d565ef66e7dff9f98764da', 'CODE46936', 'active', '2020-12-17 08:29:06', '2020-12-17 07:29:06', 900),
(45, '1844156d4166d94387f1a4ad031ca5fa', 'CODE11836', 'enactive', '2020-12-17 09:16:51', '2020-12-17 08:17:22', 900),
(46, 'b4b147bc522828731f1a016bfa72c073', 'CODE53835', 'active', '2020-12-17 09:22:33', '2020-12-17 08:22:33', 900),
(47, '1844156d4166d94387f1a4ad031ca5fa', 'CODE07839', 'enactive', '2020-12-17 09:23:27', '2020-12-17 08:23:48', 900);

-- --------------------------------------------------------

--
-- Table structure for table `2authfactorlogs`
--

CREATE TABLE `2authfactorlogs` (
  `id` int(11) NOT NULL,
  `2authID` varchar(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `udt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hash` varchar(20) NOT NULL,
  `try` int(11) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2authfactorlogs`
--

INSERT INTO `2authfactorlogs` (`id`, `2authID`, `username`, `status`, `dt`, `udt`, `hash`, `try`, `duration`) VALUES
(33, '202012171608172783', '1844156d4166d94387f1a4ad031ca5fa', 'enactive', '2020-12-17 03:39:42', '2020-12-17 08:23:48', 'admin12', 0, 900),
(34, '202012171608173296', '1844156d4166d94387f1a4ad031ca5fa', 'enactive', '2020-12-17 03:48:16', '2020-12-17 08:23:48', 'admin12', 0, 900),
(35, '202012171608173773', '1844156d4166d94387f1a4ad031ca5fa', 'enactive', '2020-12-17 03:56:13', '2020-12-17 08:23:48', 'admin12', 0, 900),
(36, '202012171608173934', '1844156d4166d94387f1a4ad031ca5fa', 'enactive', '2020-12-17 03:58:54', '2020-12-17 08:23:48', 'admin12', 0, 900),
(37, '202012171608173952', 'cfcd208495d565ef66e7dff9f98764da', 'inactive', '2020-12-17 03:59:12', '2020-12-17 08:16:58', '0', 0, 900),
(38, '202012171608174069', 'cfcd208495d565ef66e7dff9f98764da', 'validate', '2020-12-17 04:01:09', '2020-12-17 07:29:12', '0', 1, 900),
(39, '202012171608174218', '1844156d4166d94387f1a4ad031ca5fa', 'enactive', '2020-12-17 04:03:38', '2020-12-17 08:23:48', 'admin12', 0, 900),
(40, '202012171608174237', 'cfcd208495d565ef66e7dff9f98764da', 'validate', '2020-12-17 04:03:57', '2020-12-17 07:29:12', '0', 2, 900),
(41, '202012171608174327', '1844156d4166d94387f1a4ad031ca5fa', 'enactive', '2020-12-17 04:05:26', '2020-12-17 08:23:48', 'admin12', 0, 900),
(42, '202012171608174372', '1844156d4166d94387f1a4ad031ca5fa', 'enactive', '2020-12-17 04:06:11', '2020-12-17 08:23:48', 'admin12', 0, 900),
(43, '202012171608174543', '1844156d4166d94387f1a4ad031ca5fa', 'enactive', '2020-12-17 04:09:03', '2020-12-17 08:23:48', 'admin12', 0, 900),
(44, '202012171608184023', '1844156d4166d94387f1a4ad031ca5fa', 'enactive', '2020-12-17 06:47:03', '2020-12-17 08:23:48', 'admin12', 0, 900),
(45, '202012171608185231', '1844156d4166d94387f1a4ad031ca5fa', 'enactive', '2020-12-17 07:07:10', '2020-12-17 08:23:48', 'admin12', 0, 900),
(46, '202012171608186479', '1844156d4166d94387f1a4ad031ca5fa', 'enactive', '2020-12-17 07:27:58', '2020-12-17 08:23:48', 'admin12', 0, 900),
(47, '202012171608190147', 'cfcd208495d565ef66e7dff9f98764da', 'validate', '2020-12-17 08:29:06', '2020-12-17 07:29:12', '0', 4, 900),
(48, '202012171608193012', '1844156d4166d94387f1a4ad031ca5fa', 'enactive', '2020-12-17 09:16:51', '2020-12-17 08:23:48', 'admin12', 0, 900),
(49, '202012171608193354', 'b4b147bc522828731f1a016bfa72c073', 'validate', '2020-12-17 09:22:33', '2020-12-17 08:22:38', '00', 4, 900),
(50, '202012171608193408', '1844156d4166d94387f1a4ad031ca5fa', 'enactive', '2020-12-17 09:23:27', '2020-12-17 08:23:48', 'admin12', 0, 900);

-- --------------------------------------------------------

--
-- Table structure for table `creditlogs`
--

CREATE TABLE `creditlogs` (
  `id` int(11) NOT NULL,
  `logs_id` varchar(50) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `ap_id` varchar(50) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(20) NOT NULL,
  `duration` bigint(20) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creditlogs`
--

INSERT INTO `creditlogs` (`id`, `logs_id`, `userid`, `ap_id`, `dt`, `type`, `duration`, `credit`) VALUES
(1, '202011271606463806', '11', '95', '2020-11-27 07:56:46', 'ReloadVoucher', 0, -20),
(2, '202011271606463862', '11', '95', '2020-11-27 07:57:42', 'ReloadVoucher', 0, 11),
(3, '202011271606465392', '11', '95', '2020-11-27 08:23:12', 'ReloadVoucher', 0, 1),
(4, '202011271606465417', '11', '95', '2020-11-27 08:23:37', 'ReloadVoucher', 0, 100),
(5, '202011271606474732', '11', '98', '2020-11-27 10:58:51', 'ReloadDuration', 2592000, 1),
(6, '202011271606477077', '11', '101', '2020-11-27 11:37:56', 'ReloadDuration', 2592000, 1),
(7, '202011271606477123', '11', '104', '2020-11-27 11:38:43', 'ReloadDuration', 5184000, 2),
(8, '202011271606477176', '11', '98', '2020-11-27 11:39:35', 'ReloadVoucher', 0, 10),
(9, '202011301606721648', '11', '121', '2020-11-30 07:34:07', 'ReloadVoucher', 0, 10),
(10, '202012171608174511', '11', '132', '2020-12-17 03:08:31', 'ReloadVoucher', 0, 20),
(11, '202012171608174524', '11', '132', '2020-12-17 03:08:43', 'ReloadVoucher', 0, 180),
(12, '202012171608183815', '132', '142', '2020-12-17 05:43:34', 'ReloadDuration', 2592000, 1),
(13, '202012171608198058', '11', '152', '2020-12-17 09:40:58', 'ReloadDuration', 2592000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `logsID` varchar(20) NOT NULL,
  `logsData` text NOT NULL,
  `do` varchar(20) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `doer` varchar(10) NOT NULL,
  `ap_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `logsID`, `logsData`, `do`, `dt`, `doer`, `ap_user`) VALUES
(1, '202011271606459714', '02286b94948f628cfb3a9f5a8459f419j7O+SKsZyVYynsSo6WX8jZdUM1wrp9E2cSKjQ30x+NcX2t9m6KZzPpwfcWJr', 'ReloadVoucher', '2020-11-27 06:48:34', '11', '95'),
(2, '202011271606460674', '3515137e4dafbf4d27fc23dcedc5c730hwz5Hi4s/mc7/tx1HS/L/+5dfa1lcPSTx82plcfOAcuuhPS5U/5wj0xLzIFn', 'ReloadVoucher', '2020-11-27 07:04:33', '11', '95'),
(3, '202011271606460792', '2b6d37faf0663dfa5224378577ed8bc6ouJ1F+sA/zQ5VbFqlLu1JiRdlpyWnPDkxjTdm/vTv2qEXcQOEiTI9YhGNBk3', 'ReloadVoucher', '2020-11-27 07:06:32', '11', '95'),
(4, '202011271606460848', '03052f5d2ee55a91a31d1f04eedbda74Bs9FcVyZqgO0Ex3kLlpzxnk0qRob/Rj3+/ubc6QA76Bp/btQzzDPPDYkfsNZ', 'ReloadVoucher', '2020-11-27 07:07:27', '11', '95'),
(5, '202011271606460854', '7e5c080e2f65aa0a795e1e469f88e1caFLenE2b0vOMwVGcIwf4NXJ1Tngifq2bMsh4bSfRIZZiriP9K/aqRrMyFCuYh', 'ReloadVoucher', '2020-11-27 07:07:34', '11', '95'),
(6, '202011271606460873', '46435d77bcc46bd13ad0f8b9101fdb0d0DEeAtUpSSr8rRiegLdRNXTRViXCM9px9cJbsBDje1REE/VgdzhPt0H9rikp', 'ReloadVoucher', '2020-11-27 07:07:52', '11', '95'),
(7, '202011271606461077', 'e443965b93c9fb9cad12ccfea581f7d1H3EqsoklFea++bIa0wWdgbpsfjv9ATylS4heWqPZLfJSLJkEUjJK5BFGvwM+', 'ReloadVoucher', '2020-11-27 07:11:17', '11', '95'),
(8, '202011271606461175', '4512ebffe255d844b7d5aaf6d9b7f8d5nBqBNotTKRacAfXOG+WLUwZPFXcb1bZDnwmqEk5qzO3YdsBkI2+eg1MpumgE', 'ReloadVoucher', '2020-11-27 07:12:55', '11', '95'),
(9, '202011271606461226', '09f7d42b39a76aeaf7d2fb4d8857a4374FYLPbkdqEjVegunCRG65JGLKPRQUib9jS0iV2igLiww60hPdYcp1vcRCtXJ', 'ReloadVoucher', '2020-11-27 07:13:46', '11', '95'),
(10, '202011271606461234', 'c60b1f7b45911aa7df65d44e260414afHyIPGvGy4nySEZEfI/ygQa3tnG2PidSzDucsWcUbx4LLOZsmCW6Th8TA2koc', 'ReloadVoucher', '2020-11-27 07:13:54', '11', '95'),
(11, '202011271606461471', '8af3c3878627bddc6eb48147dfb7540ci8f7U3ZPd2GRKzEHVwKGHYqOndylpdeKyZpTUTqg01IF910Q+BkUd3PT8G6z', 'ReloadVoucher', '2020-11-27 07:17:51', '11', '98'),
(12, '202011271606463606', 'f8796ebacb4cb42de651a72e50edd4a6/K652k/FwNbxkV++0nOnVwRif2KcVcKFx4MZekOGYI/VgG9IuHdCcN4IG5BS', 'ReloadVoucher', '2020-11-27 07:53:26', '11', '95'),
(13, '202011271606463744', '7bc0c6c10010a709454ad35a719330b3hlKUfc01OcR0eZEVGJ6aHb/KewBXlO4WIsJHNNqyzoWEQx6g+w+CMDqjE3SM', 'ReloadVoucher', '2020-11-27 07:55:44', '11', '95'),
(14, '202011271606463806', '5ff19d1e9089b5387c714a45d412ab21Mlh7WXDf66xo2Pgq1wvuZtV+0dkf5Cu1UTEfokXVEkm0/Kql8tdpKhVIeEo=', 'ReloadVoucher', '2020-11-27 07:56:45', '11', '95'),
(15, '202011271606463862', '4fe223f889f2e73b31bf47e26168e311k2b6dd5Pp21SInKTTqPVYyKOqMGbTe8s4SbxljGOEiFKDo1txvstyVceg4JN', 'ReloadVoucher', '2020-11-27 07:57:42', '11', '95'),
(16, '202011271606465392', '43599acc380144ddb878963694563ad323N/IpLEA63pCIbU8Bltl6U/lgF9Nm7MaKi0GwkUG/o54JdlYjGZbY7JXzid', 'ReloadVoucher', '2020-11-27 08:23:11', '11', '95'),
(17, '202011271606465417', 'c32c912bef1f9ef831356fc7ee238348gkBmkbuz2hPQMa0NFc9UQSIWyQqPwZBGbLLtkJ/zCX2cN872FZMKTlCwKYnBHQ==', 'ReloadVoucher', '2020-11-27 08:23:36', '11', '95'),
(18, '202011271606474732', 'a27e5ee7345e0a3eb453e937c4c4fdc83vG+xdaEXS79cHyJ3ooCSS7GGyj8r2aXuq28GFe+c8S0wT1Qc3bbrGWZN+InXhyFBazA', 'ReloadDuration', '2020-11-27 10:58:51', '11', '98'),
(19, '202011271606477077', 'bc1c7de0d2d26b676cf98ce049e7f03fldTAun8D54r0LARI2BmQNCviZXpilBbbX6mrMHy8AC4gBJZjLn9sfNj01ykvh1PPZ3peTQ==', 'ReloadDuration', '2020-11-27 11:37:56', '11', '101'),
(20, '202011271606477123', 'd2375ea2a24ead9f98b86635a4ab24684m3cdqKxjrZ4e9arvsOGlYal1YOBP7HRJCft1EYkkUx5RmyuTJbVec+Jht0ak1OyCUXkFw==', 'ReloadDuration', '2020-11-27 11:38:43', '11', '104'),
(21, '202011271606477175', 'de5fd9742dd8d7077a85272d20a7e653Y2xtg7WrVqStJq0o9Ae5oiIh3LE68Aa5lNMbMteGLbK+dCXX/ph7I7jhW6tz', 'ReloadVoucher', '2020-11-27 11:39:35', '11', '98'),
(22, '202011301606721648', 'dcd782e114717d7f5d3422fcd9917badObyM0BiWJJF951HR1fxZlMtvplIxmOA5jBbdpfbFMSSkTeuwD+WcimdcdGcYIA==', 'ReloadVoucher', '2020-11-30 07:34:07', '11', '121'),
(23, '202012171608174511', 'ec6360859a4b95550e38da12926a545f1EVo/YEJNoBseYdO6XRu3A5xMnHaskyz5FQTZEQNtC4Ql5/jRXqFvVHqPFollw==', 'ReloadVoucher', '2020-12-17 03:08:31', '11', '132'),
(24, '202012171608174524', '3d5f762b17c1ab9472abc466cf36777fDG7yKKe94wSeg8mzguDhUJE5d6bJkf3YFG7WQYEm2k2KBLMD1bPr5mffs0x/lWA=', 'ReloadVoucher', '2020-12-17 03:08:43', '11', '132'),
(25, '202012171608183815', 'bd634bda06560f3e77ae3a045ad03e32FMdP9ey5KOYDLX74nvEVbXbFGx+y9Q/K2ZekCjvYwfxl1trMoXp4+ducuod+MnCjDoSk8w==', 'ReloadDuration', '2020-12-17 05:43:34', '132', '142'),
(26, '202012171608198058', 'fb3cd31a351364622f8760381dc4afc0OWJ/m5649MEtYzjhjFM1aUHSPu+Ts7yLD4/uOkL/xufTQ6HPlAacP2u8JQ357s1Dd6L4fw==', 'ReloadDuration', '2020-12-17 09:40:58', '11', '152');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `passkey` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `profilepic` longblob NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `voucher` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dtjoin` datetime NOT NULL,
  `upline` varchar(20) NOT NULL,
  `duration` bigint(20) NOT NULL,
  `label` varchar(10) NOT NULL,
  `2authfactor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `username`, `password`, `passkey`, `email`, `name`, `profilepic`, `usertype`, `voucher`, `status`, `dtjoin`, `upline`, `duration`, `label`, `2authfactor`) VALUES
(11, '202010291603970896', '00', 'b4b147bc522828731f1a016bfa72c073', '00', '0@0.com', 'admin0', '', 'admin', 275, 'active', '2020-10-29 12:28:15', 'admin', 0, 'trial', 0),
(94, '20201141604491789', 'pre88898', '2ecbaae1a73bdb3abfcfcd790b0691eb', 'pre88898', 'pre88898@admin.com', 'pre88898', '', 'client', 0, 'delete', '2020-11-04 13:09:48', '202010291603970896', 0, 'trial', 0),
(95, '20201141604491917', 'LXFJp17294', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '3', 'LXFJp17294@admin.com', 'LXFJp17294', '', 'reseller', 112, 'active', '2020-11-04 13:11:57', '202010291603970896', 0, 'trial', 0),
(96, '20201141604491918', 'LXFJq18342', 'cfcd208495d565ef66e7dff9f98764da', '0', 'LXFJq18342@admin.com', 'LXFJq18342', '', 'reseller', 0, 'active', '2020-11-04 13:11:58', '202010291603970896', 0, 'trial', 0),
(97, '20201141604491975', '8', 'c9f0f895fb98ab9159f51fd0297e236d', '8', 'asdaasdas@asdasd.csd', 'asdasdas', '', 'client', 0, 'delete', '2020-11-04 13:12:55', '202010291603970896', 0, 'trial', 0),
(98, '20201141604492331', '9', '45c48cce2e2d7fbdea1afc51c7c6ad26', '9', 'sddfsdfs@asdas.cdss', 'ssfsdfsdfsdf', '', 'reseller', 22, 'delete', '2020-11-04 13:18:51', '202010291603970896', 0, 'trial', 0),
(99, '20201141604492388', 'mark88416', '3e779fa5abeda7e3db9781282175afd5', 'mark88416', 'mark88416@admin.com', 'mark88416', '', 'client', 0, 'delete', '2020-11-04 13:19:48', '202010291603970896', 0, 'trial', 0),
(100, '20201141604492389', 'mark89473', '87e957f800812a6a718ed4c9bd7838b9', 'mark89473', 'mark89473@admin.com', 'mark89473', '', 'client', 0, 'active', '2020-11-04 13:19:49', '202010291603970896', 300, 'trial', 0),
(101, '20201141604492391', 'mark90506', '2ff9f4a531ca514cf1d16b3b4f032d49', 'mark90506', 'mark90506@admin.com', 'mark90506', '', 'client', 0, 'active', '2020-11-04 13:19:50', '202010291603970896', 2592300, 'trial', 0),
(102, '20201141604492392', 'mark91529', '3b8080cf85e26f2c4cfc5852d08e1ef1', 'mark91529', 'mark91529@admin.com', 'mark91529', '', 'client', 0, 'active', '2020-11-04 13:19:51', '202010291603970896', 300, 'trial', 0),
(103, '20201141604492393', 'mark92629', 'e241389343daff881685290190876dff', 'mark92629', 'mark92629@admin.com', 'mark92629', '', 'client', 0, 'active', '2020-11-04 13:19:52', '202010291603970896', 300, 'trial', 0),
(104, '20201141604492394', 'mark93683', 'dbf72b919bee3cbcc43d3b025a347833', 'mark93683', 'mark93683@admin.com', 'mark93683', '', 'client', 0, 'active', '2020-11-04 13:19:53', '202010291603970896', 5184300, 'trial', 0),
(105, '20201141604492395', 'mark94716', '317bceb631c6f2375ec610737c2e5000', 'mark94716', 'mark94716@admin.com', 'mark94716', '', 'client', 0, 'active', '2020-11-04 13:19:54', '202010291603970896', 300, 'trial', 0),
(106, '20201141604492396', 'mark95750', 'b6ec5db96e5a1ffc1af9267ce2f517f1', 'mark95750', 'mark95750@admin.com', 'mark95750', '', 'client', 0, 'active', '2020-11-04 13:19:55', '202010291603970896', 300, 'trial', 0),
(107, '20201141604492397', 'mark96781', 'cd5b9f2d7aeaa4cf142ab4e8b548da79', 'mark96781', 'mark96781@admin.com', 'mark96781', '', 'client', 0, 'active', '2020-11-04 13:19:56', '202010291603970896', 300, 'trial', 0),
(108, '20201141604492398', 'mark97818', 'd1c144af005f0d8d8d56836c569a47fd', 'mark97818', 'mark97818@admin.com', 'mark97818', '', 'client', 0, 'active', '2020-11-04 13:19:57', '202010291603970896', 300, 'trial', 0),
(109, '20201141604492444', 'aa', '4124bc0a9335c27f086f24ba207a4912', 'aa', 'adas@dfasda.csa', 'assdasdadasd', '', 'client', 0, 'active', '2020-11-04 13:20:43', '202010291603970896', 300, 'trial', 0),
(110, '20201141604492908', '9Client07554', '126ad1ce6cb85cb1c8a83127291ddaaf', '9Client07554', '9Client07554@admin.com', '9Client07554', '', 'client', 0, 'active', '2020-11-04 13:28:27', '20201141604492331', 300, 'trial', 0),
(111, '20201141604492909', '9Client08596', '526b1ffba3552983f1217aae90cf013d', '9Client08596', '9Client08596@admin.com', '9Client08596', '', 'client', 0, 'active', '2020-11-04 13:28:28', '20201141604492331', 300, 'trial', 0),
(112, '20201141604492910', '9Client09638', '151cc23fd676c1ee7e3adaaf2d244cd7', '9Client09638', '9Client09638@admin.com', '9Client09638', '', 'client', 0, 'active', '2020-11-04 13:28:29', '20201141604492331', 300, 'trial', 0),
(113, '20201141604492911', '9Client10677', '45ef1921ae0335e749d9d8cc4043570c', '9Client10677', '9Client10677@admin.com', '9Client10677', '', 'client', 0, 'active', '2020-11-04 13:28:30', '20201141604492331', 300, 'trial', 0),
(114, '20201141604492912', '9Client11725', 'a28d47c0137733d94de7972d6b4efac1', '9Client11725', '9Client11725@admin.com', '9Client11725', '', 'client', 0, 'active', '2020-11-04 13:28:31', '20201141604492331', 300, 'trial', 0),
(115, '20201141604492913', '9Client12744', '7ef7b19d7d5f0aab690a277872d4344a', '9Client12744', '9Client12744@admin.com', '9Client12744', '', 'client', 0, 'delete', '2020-11-04 13:28:32', '20201141604492331', 0, 'trial', 0),
(116, '20201141604492914', '9Client13781', '0d2a6f0a5ee796706de7365a00db3e14', '9Client13781', '9Client13781@admin.com', '9Client13781', '', 'client', 0, 'delete', '2020-11-04 13:28:33', '20201141604492331', 0, 'trial', 0),
(120, '20201151604577269', '2', 'c81e728d9d4c2f636f067f89cc14862c', '2', '2@2.cs', '2', '', 'reseller', 0, 'active', '2020-11-05 12:54:29', '20201141604492331', 300, 'trial', 0),
(121, '20201171604742263', 'res', '9b207167e5381c47682c6b4f58a623fb', 'res', 'asdas@as.cs', 'reseller', '', 'reseller', 10, 'active', '2020-11-07 10:44:22', '202010291603970896', 300, 'trial', 0),
(122, '20201171604742323', 'Re22887', 'c41ed6500388dae814d4c1fea976e987', 'Re22887', 'Re22887@admin.com', 'Re22887', '', 'client', 0, 'active', '2020-11-07 10:45:22', '202010291603970896', 300, 'trial', 0),
(123, '20201171604742324', 'Re23937', '353dbfeca374ee8f5b8d979b7cec4fb8', 'Re23937', 'Re23937@admin.com', 'Re23937', '', 'client', 0, 'active', '2020-11-07 10:45:23', '202010291603970896', 300, 'trial', 0),
(124, '20201171604742325', 'Re24974', 'd6ae3c7cbdf66b5398aa2fba49dc2c1c', 'Re24974', 'Re24974@admin.com', 'Re24974', '', 'client', 0, 'active', '2020-11-07 10:45:24', '202010291603970896', 300, 'trial', 0),
(125, '20201171604742326', 'Re26013', '978ac4d60a21992cc5cf54ec4dba24e3', 'Re26013', 'Re26013@admin.com', 'Re26013', '', 'client', 0, 'active', '2020-11-07 10:45:26', '202010291603970896', 300, 'trial', 0),
(126, '20201171604742327', 'Re27038', 'b54b25448ff7c8134bfd1b8f96a9f0c9', 'Re27038', 'Re27038@admin.com', 'Re27038', '', 'client', 0, 'active', '2020-11-07 10:45:27', '202010291603970896', 300, 'trial', 0),
(127, '20201171604742328', 'Re28095', '635246c1ef6ca4a9b2f2aa72bb8425b3', 'Re28095', 'Re28095@admin.com', 'Re28095', '', 'client', 0, 'active', '2020-11-07 10:45:28', '202010291603970896', 300, 'trial', 0),
(128, '20201171604742329', 'Re29122', 'b80b53590dafd748bf4d3f2ae764ed09', 'Re29122', 'Re29122@admin.com', 'Re29122', '', 'client', 0, 'active', '2020-11-07 10:45:29', '202010291603970896', 300, 'trial', 0),
(129, '20201171604742330', 'Re30159', '13345ba44cec00ba5213c91cff2a1875', 'Re30159', 'Re30159@admin.com', 'Re30159', '', 'client', 0, 'active', '2020-11-07 10:45:30', '202010291603970896', 300, 'trial', 0),
(130, '20201171604742331', 'Re31190', 'a5ccb9677a59147fd8440685b6a0c7ba', 'Re31190', 'Re31190@admin.com', 'Re31190', '', 'client', 0, 'active', '2020-11-07 10:45:31', '202010291603970896', 300, 'trial', 0),
(131, '20201171604742332', 'Sandok', 'de26f834088174262bb8f37f5c526cc7', 'Sandok', 'spicyjellyflavored@gmail.com', 'Re32270', '', 'client', 0, 'active', '2020-11-07 10:45:32', '202010291603970896', 300, 'trial', 0),
(132, '20201281607422082', 'admin12', '1844156d4166d94387f1a4ad031ca5fa', 'admin12', 'lupangojave@gmail.com', 'Jave Lupango', '', 'reseller', 199, 'active', '2020-12-08 11:08:02', '202010291603970896', 3300, 'trial', 0),
(133, '202012171608174594', 'rr94424', '211435aed250de1f92ff7bdf94db19cc', 'rr94424', 'rr94424@admin.com', 'rr94424', '', 'client', 0, 'active', '2020-12-17 04:09:54', '20201281607422082', 7200, 'trial', 0),
(134, '202012171608174595', 'rr95475', 'd5653682b17e9946a6635fc7a7c0574d', 'rr95475', 'rr95475@admin.com', 'rr95475', '', 'client', 0, 'active', '2020-12-17 04:09:55', '20201281607422082', 7200, 'trial', 0),
(135, '202012171608174597', 'rr96509', '6d3491feae05eacdfb4c035674ea038f', 'rr96509', 'rr96509@admin.com', 'rr96509', '', 'client', 0, 'active', '2020-12-17 04:09:56', '20201281607422082', 7200, 'trial', 0),
(136, '202012171608174598', 'rr97534', '64f5704a5e3073de85bb51af5a3c5748', 'rr97534', 'rr97534@admin.com', 'rr97534', '', 'client', 0, 'active', '2020-12-17 04:09:57', '20201281607422082', 7200, 'trial', 0),
(137, '202012171608174599', 'rr98577', '6701338907017cb591036b161274ab58', 'rr98577', 'rr98577@admin.com', 'rr98577', '', 'client', 0, 'active', '2020-12-17 04:09:58', '20201281607422082', 7200, 'trial', 0),
(138, '202012171608174600', 'rr99610', '871794feffa5aa271478d3fa74185312', 'rr99610', 'rr99610@admin.com', 'rr99610', '', 'client', 0, 'active', '2020-12-17 04:09:59', '20201281607422082', 7200, 'trial', 0),
(139, '202012171608174601', 'rr00644', '0fb432f3338376bfcc481b74a8a0aadb', 'rr00644', 'rr00644@admin.com', 'rr00644', '', 'client', 0, 'active', '2020-12-17 04:10:00', '20201281607422082', 7200, 'trial', 0),
(140, '202012171608174602', 'rr01771', '70873beaa9c0f6eed6f79dc485299199', 'rr01771', 'rr01771@admin.com', 'rr01771', '', 'client', 0, 'active', '2020-12-17 04:10:01', '20201281607422082', 7200, 'trial', 0),
(141, '202012171608174603', 'rr02811', 'ded78623b91bf14305a45768ffcc92dc', 'rr02811', 'rr02811@admin.com', 'rr02811', '', 'client', 0, 'active', '2020-12-17 04:10:02', '20201281607422082', 7200, 'trial', 0),
(142, '202012171608174604', 'rr03837', '5f88630f9ad8c26e656c1c54a2ded2f7', 'rr03837', 'rr03837@admin.com', 'rr03837', '', 'client', 0, 'active', '2020-12-17 04:10:03', '20201281607422082', 2599200, 'trial', 0),
(143, '202012171608194389', 'xsdfs89264', '6f495959513f63a30257ec45c91dcab8', 'xsdfs89264', 'xsdfs89264@admin.com', 'xsdfs89264', '', 'client', 0, 'active', '2020-12-17 09:39:49', '20201281607422082', 7200, 'trial', 0),
(144, '202012171608194390', 'xsdfs90356', '293d75dbd8a82c2202a425824bea9c65', 'xsdfs90356', 'xsdfs90356@admin.com', 'xsdfs90356', '', 'client', 0, 'active', '2020-12-17 09:39:50', '20201281607422082', 7200, 'trial', 0),
(145, '202012171608194391', 'xsdfs91381', '9b2113085c270cd302bd5f3f1759fa90', 'xsdfs91381', 'xsdfs91381@admin.com', 'xsdfs91381', '', 'client', 0, 'active', '2020-12-17 09:39:51', '20201281607422082', 7200, 'trial', 0),
(146, '202012171608194392', 'xsdfs92406', 'e91db9136f90010e9988f0ac44dcde1a', 'xsdfs92406', 'xsdfs92406@admin.com', 'xsdfs92406', '', 'client', 0, 'active', '2020-12-17 09:39:52', '20201281607422082', 7200, 'trial', 0),
(147, '202012171608194393', 'xsdfs93449', '5c722909beb2a1b1da4e25e5ab08380b', 'xsdfs93449', 'xsdfs93449@admin.com', 'xsdfs93449', '', 'client', 0, 'active', '2020-12-17 09:39:53', '20201281607422082', 7200, 'trial', 0),
(148, '202012171608194394', 'xsdfs94481', '226e0886906b15bba352c16a8ef53fad', 'xsdfs94481', 'xsdfs94481@admin.com', 'xsdfs94481', '', 'client', 0, 'active', '2020-12-17 09:39:54', '20201281607422082', 7200, 'trial', 0),
(149, '202012171608194396', 'xsdfs95524', '60af7f9b0957615613b72c3fbc2746a2', 'xsdfs95524', 'xsdfs95524@admin.com', 'xsdfs95524', '', 'client', 0, 'active', '2020-12-17 09:39:55', '20201281607422082', 7200, 'trial', 0),
(150, '202012171608194397', 'xsdfs96549', '9af2540bc2361add97b99dac057212d8', 'xsdfs96549', 'xsdfs96549@admin.com', 'xsdfs96549', '', 'client', 0, 'active', '2020-12-17 09:39:56', '20201281607422082', 7200, 'trial', 0),
(151, '202012171608194398', 'xsdfs97600', '5098afb5451847183eea611ae3a178dd', 'xsdfs97600', 'xsdfs97600@admin.com', 'xsdfs97600', '', 'client', 0, 'active', '2020-12-17 09:39:57', '20201281607422082', 7200, 'trial', 0),
(152, '202012171608194399', 'xsdfs98626', '18032f98b90a057356bf68d343540118', 'xsdfs98626', 'xsdfs98626@admin.com', 'xsdfs98626', '', 'reseller', 0, 'active', '2020-12-17 09:39:58', '20201281607422082', 2599200, 'trial', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `2authfactor`
--
ALTER TABLE `2authfactor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2authfactorlogs`
--
ALTER TABLE `2authfactorlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creditlogs`
--
ALTER TABLE `creditlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `2authfactor`
--
ALTER TABLE `2authfactor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `2authfactorlogs`
--
ALTER TABLE `2authfactorlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `creditlogs`
--
ALTER TABLE `creditlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
