
<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </head>

  <body>
    <?php include_once('templates/navbar.php')  ?>
    <div class="container">
      <h3>Register</h3>
      <form class='form' method='POST' action='./handle_register.php'>
        <div class="form-group">
          Nickname：<input type="text" name='nickname' class="form-control" placeholder="Enter your nikename" />
        </div>
        <div class="form-group">
          Username：<input type="text" name='username' class="form-control" placeholder="Enter your username" />
        </div>
        <div class="form-group">
          Password：<input type="password" name='password' class="form-control" placeholder="Password" />
        </div>
        <input type="submit" class="btn btn-outline-info" value="submit" />
      </form>
    </div>

  </body>

</html>