<?php
include "connection.php";
include "function.php";

if (isset($_POST) && !empty($_POST)) {

    $firstName = "";
    if (isset($_POST["firstName"]) && !empty($_POST["firstName"])) {
        $firstName = $_POST["firstName"];
    } else {
        header("location: index.php?error=FirstNameError");
        exit();
    }

    $lastName = "";
    if (isset($_POST["lastName"]) && !empty($_POST["lastName"])) {
        $lastName = $_POST["lastName"];
    } else {
        header("location:index.php?error=lastNameError");
        exit();
    }

    $userName = "";
    if (isset($_POST["userName"]) && !empty($_POST["userName"])) {
        $userName = $_POST["userName"];
    } else {
        header("location:index.php?error=userNameError");
        exit();
    }

    $birthDate = "";
    if(isset($_POST["birthDate"]) && !empty($_POST["birthDate"])) {
        $birthDate = $_POST["birthDate"];
        // $formated_date = date('Y-m-d', strtotime($birthDate));
    }else{
        header("location:index.php?error=birthDateError");
        exit();
    }

    $email = "";
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $email = $_POST["email"];
    } else {
        header("location:index.php?error=emailError");
        exit();
    }

    $phone = "";
    if (isset($_POST["phone"]) && !empty($_POST["phone"])) {
        $phone = $_POST["phone"];
    } else {
        header("location:index.php?error=phoneError");
        exit();
    }

    $password = "";
    if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $password = md5($_POST["password"]);
    } else {
        header("location:index.php?error=passwordError");
        exit();
    }

    $createdAt = date("Y-m-d");

    // check if username already exist.
    $username_check = check_usernme_email_form_user_table( 'username', $userName, $conn );
    if( isset($username_check['error']) && $username_check['error'] == 1 ) {
        header("location:index.php?error=".$username_check['error_type']);
        exit();
    }

    // check if email already exist .
    $email_check = check_usernme_email_form_user_table( 'email', $email, $conn );
    if( isset($email_check['error']) && $email_check['error'] == 1 ) {
        header("location:index.php?error=".$email_check['error_type']);
        exit();
    }

    $role = "employ";
    
    $sql = "INSERT INTO user (fname ,lname ,username,birthdate ,email ,phone ,password ,role,created_at ,updated_at) VALUES ('$firstName', '$lastName' ,'$userName','$birthDate','$email','$phone', '$password','$role','$createdAt' ,'$createdAt' )";



        if ($conn->query($sql) === TRUE) {
            header("location:dashboard.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
}
?>