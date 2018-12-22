

<?php

$servername = "localhost";
$username = "student2nd";
$password = "mentorstudent123";
$dbname = "mentor_program_db";

$conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

$conn->query("SET NAMES 'UTF8'");
$conn->query("SET time_zone = '+08:00'");
?>

