<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
  </head>

  <body>
    <?php include_once('templates/navbar.php')  ?>
    <div class='container'>
        <div class='form-wrapper'>
          <form class='form' method='POST' action='./handle_login.php'>
              <div class='form__row'>
                username：<input type='text' name='username' />
              </div>
              <div class='form__row'>
                password：<input type='password' name='password' />
              </div>
              <input type='submit' class='btn info'/>
          </form>
        </div>
    </div>

  </body>

</html>