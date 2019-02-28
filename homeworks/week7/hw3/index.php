<?php
  include_once('./check_login.php');
  include_once('./conn.php');
  include_once('./utils.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>你可以說說話</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="button.js"></script>
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
        LIMIT ?, ?
      ";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ii", $start, $size);
      $is_success = $stmt->execute();
      $result = $stmt->get_result();

    ?>

    <div class='container'>
      <div class='row'>
        <div class="col-md-5">
          <h1 class="text-primary">Message Board</h1>
          <form class='form' method='POST' action='./add_comment.php'>
              <input type='hidden' value="0" name="parent_id" />
              <div class="form-group">
                <h3>Hello , Writing Comments<h1>
                <div>
                  <textarea name='content' class="form-control" rows="8" cols="40" placeholder="Enter Your Comment Here"></textarea>
                </div>
              </div>

              <?php if ($user): ?>
                  <input type='submit' value='Say It!' class='btn btn-outline-info'/>
              <?php else: ?>
                  <div>Register or Login, Please.</div>
              <?php endif; ?>
          </form>
          <?php
          $count_sql = "SELECT count(*) as count FROM wanwan418_comments where parent_id=0";
          $stmt_count = $conn->prepare($count_sql);
          $is_count_success = $stmt_count->execute();
          $count_result = $stmt_count->get_result();

          if ($is_count_success && $count_result->num_rows > 0) {
            $count = $count_result->fetch_assoc()['count'];
            $total_page = ceil($count / $size);
            echo '<ul class="pagination">';
              for($i=1; $i<=$total_page; $i++) {
                echo '<li class="btn btn-secondary">';
                echo "<a class='btn btn-secondary' href='./index.php?page=$i'>$i</a>";
                echo '</li>';
              }
            echo '</ul>';
          }
          ?>
        </div>
        <div class="col-md-7">
          <div class='comments'>
          <?php
            if ($is_success) {
              while($row = $result->fetch_assoc()) {
                ?>
                  <div class="card">
                    <h5 class="card-header"><?= $row['created_at']?></h5>
                    <div class="card-body">
                      <h5 class="card-title"><?= escape($row['nickname']) ?></h5>
                      <p class="card-text"><?=  escape($row['content']) ?></p>
                      <div class="button">
                      <?php
                        if ($user === $row['username']) {
                          echo renderEditBtn($row['id']);
                          echo renderDeleteBtn($row['id']);
                        }
                      ?>

                      </div>
                    </div>
                    <hr align="center" />
                    <div class="sub-comments">
                      <?php
                        $parent_id = $row['id'];
                        $sql_sub = "
                          SELECT c.id, c.content, c.created_at, c.username, u.nickname
                          FROM wanwan418_comments as c
                          LEFT JOIN wanwan418_users as u ON c.username = u.username
                          WHERE c.parent_id = ?
                          ORDER BY c.id DESC
                        ";
                        $stmt_sub = $conn->prepare($sql_sub);
                        $stmt_sub->bind_param("i", $parent_id);
                        $is_sub_success = $stmt_sub->execute();
                        $result_sub = $stmt_sub->get_result();

                        if ($is_sub_success) {
                          while($row_sub = $result_sub->fetch_assoc()) {
                      ?>
                        <div class="sub-comment">
                          <div class="sub-comment__author"><h4><?=  escape($row_sub['nickname']) ?></h4></div>
                          <div class="text-info"><h5><?=  escape($row_sub['content']) ?><h5></div>
                          <div class="blockquote-footer"><h5><?= $row_sub['created_at']?><h5></div>

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
                            <div class="form-group">
                              <div>
                                <textarea name='content' class="form-control" rows="8" cols="40" placeholder="Enter Your Comment Here"></textarea>
                              </div>
                              <br>
                              <?php if ($user): ?>
                                <input type='submit' value='Submit' class='btn btn-outline-info'/>
                              <?php else: ?>
                                  <div>Register or Login, Please.</div>
                              <?php endif; ?>  
                            </div>
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
        
      </div>
 
    </div>

  </body>

</html>
