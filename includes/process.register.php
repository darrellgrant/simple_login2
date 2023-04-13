<?php
session_start();
//$allowedTitleLimit = 60;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //require database connection here***
    include 'dbconnect.php';

    //sanitize input and store in php variables
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    //check if variables are empty
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        $_SESSION['message'] = "Error: One or more inputs are empty. Please try again.";
        header("Location: ../register.php?error=missing_input_data");
        exit();

    }
    //validate name fields
    if (!preg_match("/^[a-zA-Z]+$/", $first_name) || !preg_match("/^[a-zA-Z]+$/", $last_name)) {
        $_SESSION['message'] = "Error: First Name and Last Name fields should contain only letters!";
        header("Location: ../register.php?error=invalid_name_inputs");
        exit();

    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Error: Please enter a valid email address!";
        header("Location: ../register.php?error=invalid_email");
        exit();
    }
    //check if email already taken
    //change *
    $sql_query = "SELECT email FROM users where email = '$email';";
    $result = mysqli_query($conn, $sql_query);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $_SESSION['message'] = "Error: That email is already in our system!";
        header("Location: ../register.php?error=email_already_taken");
        exit();

    } else {
        //hash password here
        $hashedPWD = password_hash($password, PASSWORD_DEFAULT);

        //store info in database
        $sql_insert = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashedPWD');";
        mysqli_query($conn, $sql_insert);

        echo "SUCCESFUL REGISTRATION";
        //send user to login page
        header("Location: ../login.php?SUCCESFUL_REGISTRATION");
        exit();
    }

} else {
    //if no info sent with submit...
    header("Location: ../register.php?user_error");
} //if isset $_POST end
