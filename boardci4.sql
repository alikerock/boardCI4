-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-14 04:04
-- 서버 버전: 10.4.28-MariaDB
-- PHP 버전: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `boardci4`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `bid` int(10) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `regdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`bid`, `userid`, `subject`, `content`, `regdate`) VALUES
(1, 'hong', '제목 테스트', '내용 테스트', '2023-09-01 05:12:33'),
(2, 'test', '입력 테스트', '내용 테스트', '0000-00-00 00:00:00'),
(3, 'test', '입력 테스트2', '내용 테스트2', '2023-09-04 11:37:03'),
(4, 'test', '입력 테스트3', 'test3', '2023-09-04 11:39:03'),
(5, 'test', '입력 테스트4', 'test4', '2023-09-04 11:43:43'),
(6, 'test', '입력 테스트5 - 수정', '내용 테스트5- 수정', '2023-09-11 12:58:16'),
(7, 'test', '입력 테스트5 - 수정2', '내용 테스트5 - 수정2', '2023-09-11 12:55:15'),
(9, 'test', '파일 등록 테스트1', '파일 등록 테스트1', '2023-09-12 10:41:06'),
(10, 'test', '파일 등록 테스트1', '파일 등록 테스트1', '2023-09-12 10:41:43'),
(12, 'test', '첨부파일 테스트 1', '첨부파일 테스트 1', '2023-09-13 10:19:00'),
(13, 'test', '테스트 13 - 수정', '테스트 13 - 수정', '2023-09-13 11:11:10'),
(14, 'test', '테스트 14 - 수정', '테스트 14 - 수정', '2023-09-13 11:22:46'),
(15, 'test', '테스트 15', '테스트 15', '2023-09-13 11:36:30'),
(16, 'test', 'ajax 업로드 테스트', 'ajax 업로드 테스트', '2023-09-14 10:37:48');

-- --------------------------------------------------------

--
-- 테이블 구조 `file_table`
--

CREATE TABLE `file_table` (
  `fid` int(11) NOT NULL,
  `bid` int(11) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `regdate` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 1,
  `memoid` int(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `file_table`
--

INSERT INTO `file_table` (`fid`, `bid`, `userid`, `filename`, `regdate`, `status`, `memoid`, `type`) VALUES
(1, 10, 'test', 'board/1694482903_6a83f35192e7203e8bd7.jpg', '2023-09-12 10:41:43', 1, NULL, 'board'),
(11, 0, 'test', 'board/1694571766_5d3cffde55a374133055.jpg', '2023-09-13 11:22:46', 1, NULL, 'board'),
(14, 15, 'test', 'board/1694572590_7e744e6812961623a5d9.jpg', '2023-09-13 11:36:30', 1, NULL, 'board'),
(15, 16, 'test', 'board/1694655468_f07d42ed1c2206cfbecd.jpg', '2023-09-14 10:37:48', 1, NULL, 'board'),
(16, 16, 'test', 'board/1694655468_346e9912d39532ae6c4c.jpg', '2023-09-14 10:37:48', 1, NULL, 'board'),
(17, 0, 'test', 'board/1694655644_0f14decc31a432d4906a.jpg', '2023-09-14 10:40:44', 1, NULL, 'board'),
(18, 0, 'test', 'board/1694655644_1fbe6351cc11db05368e.jpg', '2023-09-14 10:40:44', 1, NULL, 'board'),
(21, 0, 'test', 'board/1694656699_8cbcdde92594d73f5056.jpg', '2023-09-14 10:58:19', 1, NULL, 'board'),
(22, 0, 'test', 'board/1694656700_e8229f07fd3b873cda4d.jpg', '2023-09-14 10:58:20', 1, NULL, 'board');

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `idx` int(11) NOT NULL,
  `userid` varchar(145) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `username` varchar(145) DEFAULT NULL,
  `passwd` varchar(200) DEFAULT NULL,
  `regdate` datetime DEFAULT current_timestamp(),
  `level` tinyint(4) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `end_login_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `members`
--

INSERT INTO `members` (`idx`, `userid`, `email`, `username`, `passwd`, `regdate`, `level`, `last_login`, `end_login_date`) VALUES
(4, 'test', 'admin@shop.com', '테스터', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2023-08-01 17:12:32', 100, NULL, NULL);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`bid`);

--
-- 테이블의 인덱스 `file_table`
--
ALTER TABLE `file_table`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `idx_file_table_userid` (`userid`),
  ADD KEY `idx_file_table_type` (`type`);

--
-- 테이블의 인덱스 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `bid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 테이블의 AUTO_INCREMENT `file_table`
--
ALTER TABLE `file_table`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
