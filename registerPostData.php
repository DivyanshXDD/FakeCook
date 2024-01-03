<?php
session_start();
include "connection.php";
include "function.php";
check_if_user_logged_in($_SESSION);
$user_id = $_SESSION['id'];

if (isset($_POST) && !empty($_POST)) {
    $postTitle = "";
    if (isset($_POST["postTitle"]) && !empty($_POST["postTitle"])) {
        $postTitle = $_POST["postTitle"];
    } else {
        header("location:makepost.php?error=postTitleCantBeEmpty");
        die();
    }

    $postDiscription = "";
    if (isset($_POST["postDescription"]) && !empty($_POST["postDescription"])) {
        $postDiscription = $_POST["postDescription"];
    } else {
        header("location:makepost.php?error=postDiscriptionCantBeEmpty");
        die();
    }

    $postAudienceV = "";
    if(isset($_POST["postAudience"]) && !empty($_POST["postAudience"])) {
        $postAudienceV = $_POST["postAudience"];
    }else{
        header("location:makepost.php?error=PostAudienceCannotBeEmpty");
        die();
    }

    $photo = '';
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        header("location: makepost.php?error=File_is_too_Large");
        $uploadOk = 0;
        exit;
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        header("location: makepost.php?error=File_type_error");
        $uploadOk = 0;
        exit;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

            $photo = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $createdOn = date("Y-m-d");
     
 

  
    $sql = "INSERT INTO post_table (user_id , post_title , post_discription , post_pic, created_on ,updated_on, age_limit) VALUES ('$user_id','$postTitle','$postDiscription','$photo','$createdOn','$createdOn','$postAudienceV')";

    if ($conn->query($sql) === TRUE) {
        header("location:dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}