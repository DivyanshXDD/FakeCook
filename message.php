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
    <title>Document</title>
</head>

<body>
    <section class="container">
        <div class="row">
            <div class="col d-flex justify-content-center pt-2">
                <h1>Messages</h1>
            </div>
        </div>
        <div class="row d-flex flex-column">
            
        </div>
    </section>
</body>

</html>