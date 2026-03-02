-- ===================================================
-- Covid HTC Database Schema
-- ใช้ Import ไฟล์นี้ใน phpMyAdmin
-- 1. สร้างฐานข้อมูลชื่อ 'covid' ก่อน
-- 2. เลือกฐานข้อมูล 'covid' แล้ว Import ไฟล์นี้
-- ===================================================

SET NAMES utf8;
SET foreign_key_checks = 0;

-- ---------------------------------------------------
-- ตาราง: covid1 (เก็บข้อมูลผู้ป่วยรายวัน แยกตามแผนก)
-- ---------------------------------------------------
CREATE TABLE IF NOT EXISTS `covid1` (
  `id`        INT(11) NOT NULL AUTO_INCREMENT,
  `date`      DATE NOT NULL,
  `infect`    INT(11) NOT NULL DEFAULT 0,
  `recovered` INT(11) NOT NULL DEFAULT 0,
  `death`     INT(11) NOT NULL DEFAULT 0,
  `htc`       VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_date_htc` (`date`, `htc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------
-- ตาราง: user (เก็บข้อมูลผู้ดูแลระบบ)
-- ---------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
  `id`         INT(11) NOT NULL AUTO_INCREMENT,
  `username`   VARCHAR(100) NOT NULL,
  `password`   VARCHAR(255) NOT NULL COMMENT 'bcrypt hashed password',
  `full_name`  VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------
-- ข้อมูล Default: Admin User
-- username: admin | password: Admin@1234
-- (bcrypt hash of "Admin@1234")
-- ---------------------------------------------------
INSERT IGNORE INTO `user` (`username`, `password`, `full_name`) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ผู้ดูแลระบบ');

SET foreign_key_checks = 1;