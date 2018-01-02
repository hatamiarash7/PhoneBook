<?php
require "include/DB_Functions.php";

$db = new DB_Functions();

$f_name = $_POST['fname'];
$l_name = $_POST['lname'];
$p_h = $_POST['p_h'];
$p_W = $_POST['p_w'];
$p_m = $_POST['p_m'];
$email = $_POST['email'];
$a_h = $_POST['a_h'];
$a_w = $_POST['a_w'];
$job = $_POST['job'];
$birthday = $_POST['birthday'];

$result = $db->StoreContact(
    $f_name,
    $l_name,
    $p_h,
    $p_m,
    $p_W,
    $email,
    $a_h,
    $a_w,
    $birthday,
    $job
);

if ($result) {
    header('Location: index.php');
    exit();
} else {
    echo "there is some problem";
}