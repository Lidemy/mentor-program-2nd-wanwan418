<?

include_once("conn.php");
// print_r($_POST);

$error_message = '';
$blank_message = '';

if (!empty($_POST['username'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM wanwan418_users WHERE username='$username' and password='$password'";
  $result = $conn->query($sql); 

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    setcookie("user_id", $row['id'], time()+3600*24);
    header('Location: index.php');
  } else {
    $error_message = '帳號或密碼錯誤';
    // header('Location: login.php');
  }
  $conn->close();

}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>登入</title>
  <style type="text/css">
  </style>
  </head>
  <body>

<?
  if($error_message !== '') {
    echo $error_message;
  }
?>

    <h3>登入</h3>
    <form method="POST">

      
      username:<input type="text" name="username">
      password:<input type="password" name="password">

      <input type="submit" />
    </form>


  </body>
</html>