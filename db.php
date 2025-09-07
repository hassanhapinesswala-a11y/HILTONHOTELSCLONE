<?php
// db.php
// Use this include on every PHP file that needs DB access.
$DB_HOST = 'localhost';
$DB_USER = 'uyhezup6l0hgf';
$DB_PASS = 'pr634bpk3knb';
$DB_NAME = 'dbfwbcq8tyu1ba';
 
 
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
die('DB connection failed: ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');
?>
