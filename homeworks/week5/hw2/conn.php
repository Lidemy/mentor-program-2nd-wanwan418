<?

$servername = "localhost";
$username = "student2nd";
$password = "mentorstudent123";
$dbname = "mentor_program_db";

?>

<?php
// $conn = mysqli_connect("localhost","root","","mentor_program");
$conn = new mysqli($servername ,$username, $password, $dbname);
$conn->query("SET NAMES 'UTF8'");
// Check connection
if (!$conn)
  {
  die("Connection error: " . mysqli_connect_error());
  }
?>
