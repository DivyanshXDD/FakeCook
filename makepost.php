<?php 
session_start();
include "connection.php";
include "function.php";
check_if_user_logged_in($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>
<style>
        /* Add any custom styles here */
        body {
            background-color: #bee0e5; /* Bootstrap background color */
        }

        .mainFormDiv {
            background-color: #ffffff; /* White background for the form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-size: 1.2em; /* Larger font size for labels */
        }
    </style>
</head>
<body class="vh-100 vw-100">
    <section class="container d-flex justify-content-center align-items-center vh-100">
        <div class="mainFormDiv">
            <form class="d-flex flex-column" action="registerPostData.php" method="POST">
                <div class="form-group mb-3">
                    <label for="postTitle">Post Title</label>
                    <input name="postTitle" type="text" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="postDescription">Post Description</label>
                    <textarea name="postDescription" rows="4" class="form-control"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="uploadPhoto">Upload Photo -</label>
                    <input type="file" name="uploadPhoto" class="form-control-file">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>