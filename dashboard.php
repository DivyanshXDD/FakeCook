<?php
session_start();
include "connection.php";
include "function.php";

check_if_user_logged_in($_SESSION);


$userid = $_SESSION['id'];
$username = "";
$firstname = "";
$lastname = "";
$email = "";
$phonenumber = "";

$sql = "SELECT * FROM user WHERE id ='$userid'";
$result = $conn->query($sql);



if ($result->num_rows == 1) {
    $data = $result->fetch_assoc();
    $firstname = $data["fname"];
    $lastname = $data["lname"];
    $email = $data["email"];
    $username = $data["username"];
    $phonenumber = $data["phone"];
}

$profilepic = "";

$sql = "SELECT * FROM profilepic WHERE user_id = '$userid'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $profilepic = $row["image"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>DASHBOARD</title>
</head>

<body>
    <section>
        <div class="header pt-2 pb-2 d-flex">
            <nav id="nav-bar" class="d-flex w-100 justify-content-evenly align-items-center">
                <div class="nav-bar-main d-flex container w-50 ">
                     <ul class="d-flex gap-3 list-style-none align-items-center p-0 m-0 uldashboard">
                         <li><a class="btn btn-outline-dark" href="updatedata.php">Update</a></li>
                         <li><a class="btn btn-outline-dark" href="makepost.php">Create New Post</a></li>
                         <li><a class="btn btn-outline-dark" href="seemypost.php">See My Post</a></li>
                         <li><a class="btn btn-outline-dark" href="seeallpost.php">See All Post</a></li>
                         <li><a class="btn btn-outline-dark" href="message.php">Message</a></li>
                     </ul>
                </div>
                <div class="d-flex justify-content-end align-items-center gap-2 w-50 px-3">
                  <img class="imgProfilePicUser" src="img/<?php echo $profilepic;?>" alt="">
                  <h2 class="m-0"><?php echo $username ?></h2>
                  <a class="btn btn-outline-dark" href="logout.php">Log Out</a> 
                </div>
            </nav>
        </div>
        <div class="container pt-5">
            <h2>Personal Details</h2>
            <p>First Name -
                <?php echo $firstname; ?>
            </p>
            <p>Last Name -
                <?php echo $lastname; ?>
            </p>
            <p>Username -
                <?php echo $username; ?>
            </p>
            <p>Email -
                <?php echo $email; ?>
            </p>
            <p>Phone Number -
                <?php echo $phonenumber; ?>
            </p>
        </div>
       
    </section>
    <hr class="container p-1">
    <section>
        
        <div class="container">
            <form class="d-flex flex-column form" method="POST" action="uploadImg.php" enctype="multipart/form-data">
                <input class="pb-4" type="file" name="fileToUpload" id="fileToUpload">
                <button style="width: 20%" class="btn btn-info" type="sumbit">Upload Your Image</button>
            </form>
        </div>
       
    </section>
    <hr class="container p-1">
</body>

</html>

