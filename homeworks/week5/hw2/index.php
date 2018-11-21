<?php
  $is_login = false;
  $user_id = '';

  if(isset($_COOKIE["user_id"]) && !empty($_COOKIE["user_id"])){
    $is_login = true;
    $user_id = $_COOKIE["user_id"];
  } else {

  }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>title</title>
  <style type="text/css">
   	.message__main {
   		width: 600px;
   		margin: 0 auto;
   		/*border: 1px solid gray;*/
   	}

   	.message__title {
   		padding: 15px;
   	}

   	.message__nickname {
   		padding-bottom: 20px;
   		display: block;
   		margin-left: 20px;
   	}

   	.message__content {
   		width: 500px;
   		height: 100px;
   		margin-top: 20px;
   		margin-left: 10px;
   	}

   	.message__button {
   		width: 100px;
   		height: 30px;
   		color: white;
   		background: #4494f3d6;
   		border-radius: 4px;
   		margin: 10px 15px; 
   	}
		
		.comment {
			padding: 10px;
			margin: 10px;
			border: 1px solid rgba(0, 0, 0, 0.5);
		}

   	.comment__header {
   		padding: 10px;
   		border-bottom: 1px solid rgba(0, 0, 0, 0.5);
   		display: flex;
   		justify-content: space-between;
   	}

   	.comment__subcontent .comment {
			border: none;
			background: #91c9ff26;
			margin-left: 100px;
			width: 80%;
   	}

    .comment__content {
      margin: 10px;
    }

		.comment__subcontent .message__form {
			margin-left: 90px;
		}

		.comment__subcontent .message__content {
			width: 400px;
			height: 80px;
		}

  </style>
  </head>
  <body>

	<div class="message__main">
  
  <?
    if(!$is_login) {
  ?>
    <a href="register.php">註冊</a>
    <a href="login.php">登入</a>
  <? } else {
  ?>
    <a href="logout.php">登出</a>
  <?
  } 
  ?>

		<div class="message__title"><h1>我是一個很醜的留言板</h1></div>		
			<form method="POST" action="add_comment.php" class="message__form">
				<textarea class="message__content" name="content" placeholder="請留言吧"></textarea>
				<input type="hidden" name="parent_id" value="0" />
        <?php
          if($is_login) {
            echo "<input class='message__button' type='submit' value='送出'' />";
          } else {
            echo "<input class='message__button' type='submit' value='請先登入' disabled />";
          }
        ?>			
			</form>

	<?
		//顯示所有留言
		require_once('conn.php');
		$sql = "SELECT wanwan418_comments.id , wanwan418_comments.content , wanwan418_comments.created_at , wanwan418_users.nickname FROM wanwan418_comments LEFT JOIN wanwan418_users ON wanwan418_comments.user_id = wanwan418_users.id WHERE parent_id = 0 ORDER BY created_at DESC";

		$result = $conn->query($sql);

    if ($result) {
      while($row = $result->fetch_assoc()){
        require('template_comment.php');
      }
		// while($row = $result->fetch_assoc()){
		// 	require('template_comment.php');
		}
	?>

  </body>
</html>