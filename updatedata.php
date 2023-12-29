<?php
session_start();
include "connection.php";
include "function.php";
check_if_user_logged_in($_SESSION);
$user_id = $_SESSION['id'];

$username = "";
$firstname = "";
$lastname = "";
$phonenumber = "";

$sql = "SELECT * FROM user WHERE id = '$user_id'";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $firstname = $row["fname"];
        $lastname = $row["lname"];
        $username = $row["username"];
        $phonenumber = $row["phone"];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/updatedata.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Update Data</title>
</head>

<body>
    <section>
        <div id="update_form" class="container">
            <form class="formMain" method="POST" action="updatedataTwo.php">
                <div class="d-flex flex-column forFormUpdate" id="for_first_name">
                    <lable for="fname">First Name</lable>
                    <input name="fname" value="<?php echo $firstname ?>">
                    <hr class="m-0">
                </div>
                <div class="d-flex flex-column forFormUpdate" id="for_last_name">
                    <lable for="lname">Last Name</lable>
                    <input name="lname" value="<?php echo $lastname; ?>">
                    <hr class="m-0">
                </div>
                <div class="d-flex flex-column forFormUpdate" class="username">
                    <lable for="username">Username</lable>
                    <input name="username" value="<?php echo $username; ?>">
                    <hr class="m-0">
                </div>
                <div class="d-flex flex-column forFormUpdate" class="phone">
                    <lable for="phone">Phone Number</lable>
                    <input name="phone" value="<?php echo $phonenumber; ?>">
                    <hr class="m-0">
                </div>
                <div class="pt-4">
                    <button class="btn btn-info" type="submit">Update</button>
                </div>
            </form>
        </div>
    
    </section>
</body>

</html>