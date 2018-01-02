PHP-Login
=========

A simple, secure system with PHP, MySQL and jQuery (AJAX) using Bootstrap 3 for the form design a phone book.


## Installation
### Clone the Repository
    $ git clone https://github.com/hatamiarash7/PhoneBook

### Creating the MySQL Database

Create database "login" and create tables "members" and "loginAttempts" and "contacts" :

```sql
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
```
### Setup the `login/dbconf.php` file
```php
<?php
    //DATABASE CONNECTION VARIABLES
    $host = "localhost"; // Host name
    $username = "user"; // Mysql username
    $password = "password"; // Mysql password
    $db_name = "login"; // Database name

```

### Setup the `login/config.php` file
<i>Read code comments for a description of each variable</i>

```php
<?php
    //Set this for global site use
    $site_name = 'Test Site';

    //Maximum Login Attempts
    $max_attempts = 5;
    //Timeout (in seconds) after max attempts are reached
    $login_timeout = 300;

    //ONLY set this if you want a moderator to verify users and not the users themselves, otherwise leave blank or comment out
    $admin_email = '';

    //EMAIL SETTINGS
    //SEND TEST EMAILS THROUGH FORM TO https://www.mail-tester.com GENERATED ADDRESS FOR SPAM SCORE
    $from_email = 'youremail@domain.com'; //Webmaster email
    $from_name = 'Test Email'; //"From name" displayed on email

    //Find specific server settings at https://www.arclab.com/en/kb/email/list-of-smtp-and-pop3-servers-mailserver-list.html
    $mailServerType = 'smtp';
    //IF $mailServerType = 'smtp'
    $smtp_server = 'smtp.mail.domain.com';
    $smtp_user = 'youremail@domain.com';
    $smtp_pw = 'yourEmailPassword';
    $smtp_port = 465; //465 for ssl, 587 for tls, 25 for other
    $smtp_security = 'ssl';//ssl, tls or ''

    //HTML Messages shown before URL in emails (the more
    $verifymsg = 'Click this link to verify your new account!'; //Verify email message
    $active_email = 'Your new account is now active! Click this link to log in!';//Active email message
    //LOGIN FORM RESPONSE MESSAGES/ERRORS
    $signupthanks = 'Thank you for signing up! You will receive an email shortly confirming the verification of your account.';
    $activemsg = 'Your account has been verified! You may now login at <br><a href="'.$signin_url.'">'.$signin_url.'</a>';

    //IGNORE CODE BELOW THIS
```
### Place this code (from `index.php`) at the head of each page :
> *** **Important** *** Checks to see if username $_SESSION variable is set. If not set, redirects to login page. 

```php
<?php require "login/loginheader.php"; ?>
```

### Check the Username and the Password using jQuery (Ajax) :

If the user has the right username and password, then the `checklogin.php` will send 'true', register the username and the password in a session, and redirect to `index.php`.
If the username and/or the password are wrong the `checklogin.php` will send "Wrong Username or Password".


### Signup/Login Workflow:
> 1) Create new user using `signup.php` form
> (note: validation occurs both client and server side)
> &nbsp;&nbsp;&nbsp;&nbsp;<b>Validation requires: </b>
> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Passwords to match and be at least 4 characters
> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Valid email address
> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Unique username
> 2) Password gets hashed and new GUID is generated for User ID
> 3) User gets added to database as unverified
> 4) Email is sent to user email (or $admin_email if set) with verification link
> 5) User (or admin) clicks verification link which sends them to `verifyuser.php` and verifies user in the database
> 6) Verified user may now log in
