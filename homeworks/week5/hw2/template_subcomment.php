<div class="comment__subcontent"> <!-- 子留言 -->
	<div class="comment">
		<div class="comment__header">
			<div class="comment__author"><? echo $sub_comment['nickname'] ?></div>
			<div class="comment__time"><? echo $sub_comment['created_at'] ?></div>
		</div>
		<div class="comment__content">
			<? echo $sub_comment['content'] ?>
		</div>
	</div>
</div>