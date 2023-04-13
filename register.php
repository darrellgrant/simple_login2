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
    <style>
      #warning {
        color:red;
      }
    </style>
  </head>
  <body>
    Register Here
    <form action="includes/process.register.php" method="POST">
      <div id="warning">
        <?php if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);}?>
      </div>

      <div>First Name <input type="text" name="first_name" /></div>
      <div>Last Name <input type="text" name="last_name" /></div>
      <div>Email <input type="text" name="email" /></div>
      <div>Password <input type="password" name="password" /></div>
      <div>
        <button type="submit" id="next-btn" name="submit-btn">Register</button>
      </div>
    </form>
  </body>
</html>
