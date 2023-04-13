<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    Login Here
    <form action="includes/login.process.php" method="POST">
      <div>Email <input type="text" name="email" /></div>
      <div>Password <input type="password" name="password" /></div>
      <div>
        <button type="submit" id="next-btn" name="submit-btn">Login</button>
      </div>
    </form>
  </body>
</html>