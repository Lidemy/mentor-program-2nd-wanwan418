<?php
session_start();
require_once("conn.php");
require_once("utils.php");

if (
	isset($_POST['nickname']) && 
    isset($_POST['username']) && 
    isset($_POST['password']) &&
    !empty($_POST['nickname']) &&
    !empty($_POST['username']) &&
    !empty($_POST['password'])
  ) {
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$nickname = $_POST['nickname'];

	$sql = "INSERT INTO wanwan418_users (username, password, nickname) VALUES ('$username', '$password', '$nickname')";
	
	if ($conn->query($sql)) {
		$_SESSION['$username'] = $username;
		// setToken($conn, $username);
		printMessage('註冊成功！', './index.php');
		} else {
		printMessage($conn->error, './register.php'); 
		}
	} else {
	printMessage('請輸入帳號或是密碼!', './register.php'); 
	}

?>
