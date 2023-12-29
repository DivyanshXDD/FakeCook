<?php
session_start();
include "connection.php";
$userId = $_SESSION['id'];

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
    header("Location: dashboard.php?error=File_is_too_Large");
    $uploadOk = 0;
    exit;
}

if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    header("Location: dashboard.php?error=File_type_error");
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

$sql = "INSERT INTO profilepic (user_id ,`image`) VALUES ('$userId' ,'$photo')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("LOCATION:dashboard.php?message=completed");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();




?>