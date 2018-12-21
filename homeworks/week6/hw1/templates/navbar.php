<nav class='nav'>
  <ul class='nav__list nav__left'>
    <li class='nav__item'>
      <a href='./index.php'>Home</a>
    </li>
  </ul>
  <ul class='nav__list nav__right'>
    <li class='nav__item'>
      <a href='./register.php'>Register</a>
    </li>
    <li class='nav__item'>
        <?php if (isset($user) && !empty($user)) { ?>
          <a href='./logout.php'>Logout</a>
        <?php } else { ?>
          <a href='./login.php'>Login</a>
        <?php } ?>
    </li>
  </ul>
</nav>