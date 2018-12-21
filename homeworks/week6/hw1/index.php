<?php
  include_once('./check_login.php');
  include_once('./conn.php');
  include_once('./utils.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>你可以說說話</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
  </head>

  <body>
    <?php include_once('templates/navbar.php') ?>
    <?php 
      // 1 => 0
      // 2 => $size
      $page = 1;
      if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = (int) $_GET['page'];
      }
      $size = 2;
      $start = $size * ($page - 1);
      $sql = " SELECT c.id, c.content, c.created_at, c.username, u.nickname FROM wanwan418_comments as c
        LEFT JOIN wanwan418_users as u ON c.username = u.username WHERE c.parent_id = 0 ORDER BY c.id DESC
        LIMIT $start, $size
      ";
      $result = $conn->query($sql);
    ?>
    <div class='container'>
      <div class='form-wrapper'>
        <h1 style="font-size:4vw">Message Board</h1>
        <form class='form' method='POST' action='./add_comment.php'>
            <input type='hidden' value="0" name="parent_id" />
            <div class='form__row'>
              <h1>Hello , Writing Comments<h1>
              <div>
                <textarea name='content' rows="10" cols="50" class="textarea" placeholder="Enter Your Comment Here"></textarea>
              </div>
            </div>

            <?php if ($user): ?>
                <input type='submit' value='Say It!' class='btn info'/>
            <?php else: ?>
                <div>Register or Login, Please.</div>
            <?php endif; ?>
            
        </form>
      </div>
      <?php
          $count_sql = "SELECT count(*) as count FROM wanwan418_comments where parent_id=0";
          $count_result = $conn->query($count_sql);
          if ($count_result && $count_result->num_rows > 0) {
            $count = $count_result->fetch_assoc()['count'];
            $total_page = ceil($count / $size);
            echo '<div class="page">';
            for($i=1; $i<=$total_page; $i++) {
              echo "<a href='./index.php?page=$i'>$i</a>";
            }
            echo '</div>';
          }
      ?>
      <div class='comments'>
          <?php
            if ($result) {
              while($row = $result->fetch_assoc()) {
                ?>
                  <div class='comment'>
                    <div class='comment__author'>User：<?= escape($row['nickname']) ?></div>
                    <div class='comment__content'><?=  escape($row['content']) ?></div>
                    <div class='comment__time'>Time：<?= $row['created_at']?></div>

                    <?php
                      if ($user === $row['username']) {
                        echo renderEditBtn($row['id']);
                        echo renderDeleteBtn($row['id']);
                      }
                    ?>

                    <div class="sub-comments">
                      <?php
                        $parent_id = $row['id'];
                        $sql_sub = "
                          SELECT c.id, c.content, c.created_at, c.username, u.nickname
                          FROM wanwan418_comments as c
                          LEFT JOIN wanwan418_users as u ON c.username = u.username
                          WHERE c.parent_id = $parent_id
                          ORDER BY c.id DESC
                        ";
                        $result_sub = $conn->query($sql_sub);
                        if ($result_sub) {
                          while($row_sub = $result_sub->fetch_assoc()) {
                      ?>
                        <div class="sub-comment">
                            <div class="sub-comment__author">User：<?=  escape($row_sub['nickname']) ?></div>
                            <div class="sub-comment__content"><?=  escape($row_sub['content']) ?></div>
                            <div class="sub-comment__time">Time：<?= $row_sub['created_at']?></div>
                            <?php
                              if ($user === $row_sub['username']) {
                                echo renderEditBtn($row_sub['id']);
                                echo renderDeleteBtn($row_sub['id']);
                              }
                            ?>
                        </div>
                      <?php
                          }
                        }
                      ?>
                      <div class="add-sub-comment">
                          <h3>LEAVE A REPLY</h3>
                          <form method='POST' action='./add_comment.php'>
                            <input type='hidden' value="<?php echo $parent_id; ?>" name="parent_id" />
                            <div class='form__row'>
                              
                              <div>
                                <textarea name='content' rows="10" cols="50" class="textarea2" placeholder="Enter Your Comment Here"></textarea>
                              </div>
                            </div>

                            <?php if ($user): ?>
                                <input type='submit' value='Submit' class='btn info'/>
                            <?php else: ?>
                                <div>Register or Login, Please.</div>
                            <?php endif; ?>
                            
                        </form>
                      </div>
                    </div>
                </div>
                <?php
              }
            }
          ?>
      </div>
    </div>

  </body>

</html>
