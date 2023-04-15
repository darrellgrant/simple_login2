<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //require database connection here***
    include 'dbconnect.php';

    //sanitize input and store in php variables
    $email = check_input($_POST["email"]);
    $password = check_input($_POST["password"]);

    //check if variables are empty
    if (empty($email) || empty($password)) {
        header("Location: ../login.php?error=missing_login_data");
        exit();
    } else {
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
            header("Location: ../login.php?error=email_not_found");
            exit();
        } else {
            //check if password = password in db
            $row = mysqli_fetch_assoc($result);

            // if ($row['password'] !== $password) {
            $pwdCheck = password_verify($password, $row['password']);

            if ($pwdCheck == false) {
                $pwdCheck = 0;

                header("Location: ../login.php?error=incorrect_password&pwdcheck=" . $pwdCheck);
                exit();

            } else {
                $pwdCheck = 1;

                $_SESSION['first_name'] = $row['first_name'];
                //echo "<br>Greetings, <b> " . $_SESSION['first_name'] . " !";

                header("Location: ../profile.php?&pwdcheck=" . $pwdCheck . "login=success!");
                exit();

            }
        }
    }

} else {
//if user error
    header("Location: ../login.php?error=user_login_error");
    exit();

}
function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
