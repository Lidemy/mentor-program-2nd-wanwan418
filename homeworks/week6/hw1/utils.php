<?php
  function printMessage($msg, $redirect) {
    echo '<script>';
    echo "alert('" . htmlentities($msg, ENT_QUOTES) . "');";
    echo "window.location = '" . $redirect ."'";
    echo '</script>';
  }
  function setToken($conn, $username) {
    $token = uniqid();
    $sql = "DELETE FROM wanwan418_certificates where username='$username'";
    $conn->query($sql);
    $sql = "INSERT INTO wanwan418_certificates(username, token) VALUES('$username', '$token')";
    $conn->query($sql);
    setcookie("token", $token, time()+3600*24);
  } 

  function escape($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
  }

  function renderDeleteBtn($id) {
    return "
      <div class='delete-comment'>
        <form method='POST' action='./delete_comment.php'>
            <input type='hidden' name='id' value='$id' />
            <input type='submit' value='DELETE' class='btn danger'/>
        </form>
      </div>
    ";
  }
  function renderEditBtn($id) {
    return "
      <div class='edit-comment'>
        <form method='GET' action='./edit_comment.php'>
            <input type='hidden' name='id' value='$id' />
            <input type='submit' value='EDIT' class='btn success'/>
        </form>
      </div>
    ";
  }
?>