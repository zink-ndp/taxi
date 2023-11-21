<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taxi";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
require 'functions.php';
session_start();
?>