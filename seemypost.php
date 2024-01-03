<?php
session_start();
include "connection.php";
include "function.php";
check_if_user_logged_in($_SESSION);
$user_id = $_SESSION['id'];


$postTitle = "";
$postDiscription = "";
$postPicture = "";
$agelimit = "";

$sql = "SELECT * FROM post_table WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <h2>
            <?php echo $row["post_title"]; ?>
        </h2><br>
        <img style="width: 20%;" src="img/<?php echo $row["post_pic"] ?>" alt=""><br>
        <h3>
            <?php echo $row["post_discription"] ?>
        </h3>
        <hr>
        <?php
    }
} else {
    echo "0 results";
}
$conn->close();


die;
