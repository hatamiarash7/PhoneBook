<?php
require "include/DB_Functions.php";

$db = new DB_Functions();

$parts = parse_url($_SERVER['REQUEST_URI']);
parse_str($parts['query'], $query);
$id = $query['id'];

$result = $db->DeleteContact($id);

if ($result) {
    header('Location: index.php');
    exit();

} else {
    echo "there is some problem";
}