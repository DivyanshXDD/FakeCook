<?php
session_start();

include "connection.php";
include "function.php";

if (isset($_POST) && !empty($_POST)) {

    //validating login inputs
    $userAndEmail = "";
    if (isset($_POST["eAndU"]) && !empty($_POST["eAndU"])) {
        $userAndEmail = $_POST["eAndU"];
    } else {
        header("location: login.php?error=UsernameEmailEmpty");
        exit();
    }

    $password = "";
    if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $password = md5($_POST["password"]);
    } else {
        header("location:login.php?error=passwordError");
        exit();
    }

    // sarting login process

    $check_result = "";
    $user_id = "";
    $security_check = false;

    $sql = "SELECT * FROM user WHERE (username ='$userAndEmail' || email = '$userAndEmail') && password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user_data = $result->fetch_assoc();
        $_SESSION["id"] = $user_data['id'];
        header("location:dashboard.php");
        die;
    } else {
        header("location:login.php?error=UsernameOrEmailOrPasswordError");
    }

}


?>