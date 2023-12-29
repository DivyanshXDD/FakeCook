<?php 
session_start();
include "connection.php";
include "function.php";

check_if_user_logged_in($_SESSION);
$user_id = $_SESSION["id"];

if(isset($_POST) && !empty($_POST)) {

    $newFirstName = "";
    if(isset($_POST["fname"]) && !empty($_POST["fname"])){
        $newFirstName = $_POST["fname"];
    }else{
        header("location:updatedata.php?error=firstNameEmpty");
        exit;   
    }

    $newLastName = "";
    if(isset($_POST["lname"]) && !empty($_POST["lname"])){
        $newLastName = $_POST["lname"];
    }else{
        header("location:updatedata?error=lastNameEmpty");
        exit;
    }

    $newUserName = "";
    if(isset($_POST["username"]) && !empty($_POST["username"] )){
        $newUserName = $_POST["username"];
    }else{
        header("location:updatedata?error=usernameEmpty");
        exit;
    }


    $newPhoneNumber = "";
    if(isset($_POST["phone"]) && !empty($_POST["phone"])){
        $newPhoneNumber = $_POST["phone"];
    }else{
        header("location:updatedata.php?error=phonenumberEmpty");
    }

    // to check if username already exit and to check if username is same and dont need an update
    $username_check = check_username_exist($newUserName, $user_id, $conn );
    if($username_check['error'] = true){
    header('location:update.php?error=usernameExits');
    }

    $sql = "UPDATE user SET fname = '$newFirstName', lname = '$newLastName' , username = '$newUserName' ,phone = '$newPhoneNumber' WHERE id = '$user_id' ";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("location:dashboard.php?message=updatedSuccessfully");
        die;
      } else {
        header("location:updatedata.php?error=cantUpdateduetosomeerror");
        die;
      }
}



