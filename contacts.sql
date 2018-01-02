CREATE TABLE IF NOT EXISTS contacts (
  id           INT(11)      NOT NULL             AUTO_INCREMENT,
  unique_id    VARCHAR(100) NOT NULL PRIMARY KEY,
  fname        VARCHAR(100) NOT NULL,
  lname        VARCHAR(100) NOT NULL,
  phone_home   VARCHAR(100) NULL,
  phone_work   VARCHAR(100) NULL,
  phone_mobile VARCHAR(100) NULL,
  job          VARCHAR(100) NULL,
  email        VARCHAR(100) NULL,
  address_work TEXT         NULL,
  address_home TEXT         NULL,
  birthday     DATE         NULL,
  UNIQUE KEY unique_id (unique_id),
  UNIQUE KEY email (email),
  UNIQUE KEY id (id)
)
  CHARACTER SET utf8
  COLLATE utf8_unicode_ci;

CREATE TABLE `members` (
  `id`            CHAR(23)    NOT NULL,
  `username`      VARCHAR(65) NOT NULL DEFAULT '',
  `password`      VARCHAR(65) NOT NULL DEFAULT '',
  `email`         VARCHAR(65) NOT NULL,
  `verified`      TINYINT(1)  NOT NULL DEFAULT '0',
  `mod_timestamp` TIMESTAMP   NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `loginAttempts` (
  `IP`        VARCHAR(20) NOT NULL,
  `Attempts`  INT(11)     NOT NULL,
  `LastLogin` DATETIME    NOT NULL,
  `Username`  VARCHAR(65)          DEFAULT NULL,
  `ID`        INT(11)     NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;