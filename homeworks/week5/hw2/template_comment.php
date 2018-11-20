<div class="comment">
	<div class="comment__header">
		<div class="comment__author"><? echo $row['nickname'] ?></div>
		<div class="comment__time"><? echo $row['created_at'] ?></div>
	</div>
	<div class="comment__content"> <!-- 主留言 -->
		<? echo $row['content'] ?>
	</div>

<?
	$parent_id = $row['id'];
	$sql_child = "SELECT wanwan418_comments.*, wanwan418_users.nickname from wanwan418_comments left join wanwan418_users on wanwan418_users.id = wanwan418_comments.user_id where parent_id = $parent_id order by created_at DESC";

	$result_child = $conn->query($sql_child);

	while($sub_comment = $result_child->fetch_assoc()){
		require('template_subcomment.php');
	}
?>


		<form class="message__form" method="POST" action="add_comment.php">
			<textarea class="message__content" name="content" placeholder="請留言吧"></textarea>
			<input type="hidden" name="parent_id" value="<? echo $row['id'] ?>" />
      <?php
        if($is_login) {
          echo "<input class='message__button' type='submit' value='送出'' />";
        } else {
          echo "<input class='message__button' type='submit' value='請先登入' disabled />";
        }

      ?>
		</form>
</div>
