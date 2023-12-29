<?php
$error = "";
if (isset($_GET["error"]) && !empty($_GET["error"])) {
    if ($_GET['error'] == 'FirstNameError') {
        $error = 'First name cant be empty';
    } else if ($_GET['error'] == 'lastNameError') {
        $error = 'Last name cant be empty';
    } else if ($_GET['error'] == 'userNameError') {
        $error = 'User Name cant be empty';
    } else if($_GET['error'] == 'birthDateError'){
        $error = 'Birth Date Cant Be Empty';
    }else if ($_GET['error'] == 'emailError') {
        $error = 'Email cant be empty';
    } else if ($_GET['error'] == 'phoneError') {
        $error = 'Phone cant be empty';
    } else if ($_GET['error'] == 'passwordError') {
        $error = 'Password cant be empty';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Register Page</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

</head>

<body>
    <script>
        jQuery(function () {
            jQuery("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
    <section id="mainSecBSec">
        <?php include "header.php"; ?>
        <div class="container">
            <div class="form-register d-flex justify-content-center">
                <form id="register-form" class="form col-4  p-4" method="POST" action="register.php">
                    <p style="color:red">
                        <?php echo $error; ?>
                    <p>
                    <div id="formFirstName" class="forFirstNameDiv d-flex pb-4 flex-column">
                        <label for="firstName" id="forFirstName">First Name</label>
                        <input name="firstName" type="text">
                        <hr>
                    </div>
                    <div class="forLastNameDiv d-flex pb-4 flex-column">
                        <label for="lastName" id="forLastName">Last Name</label>
                        <input name="lastName" type="text">
                        <hr>
                    </div>
                    <div class="forEmailDiv d-flex pb-4 flex-column">
                        <label for="email" id="forEmail">Email</label>
                        <input name="email" type="email">
                        <hr>
                    </div>
                    <div class="forLastNameDiv d-flex pb-4 flex-column">
                        <label for="userName" id="forUserName">User Name</label>
                        <input name="userName" type="text">
                        <hr>
                    </div>
                    <div class="forLastNameDiv d-flex pb-4 flex-column">
                        <label for="birthDate">BirthDate</label>
                        <input name="birthDate" id="datepicker" type="text">
                        <hr>
                    </div>
                    <div class="forPhoneDiv d-flex pb-4 flex-column">
                        <label for="phone" class="forPhone">Phone Number</label>
                        <input name="phone" type="">
                        <hr>
                    </div>
                    <div class="forPasswordDiv d-flex pb-4 flex-column">
                        <label for="password" class="forPassword">Password</label>
                        <input name="password" type="password">
                        <hr>
                    </div>
                    <div class="subBtn">
                        <button class="btn btn-outline-info btn-lg" type="submit">Submit</button>
                    </div>
                    <div class="forGoingToLogin pt-4 text-center">
                        <a href="login.php">Already Have A Account ?</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>