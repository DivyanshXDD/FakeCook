<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <section>
    <?php include "header.php"; ?>
        <div  id="loginPageMainSec" class="form-register">
            <form id="loginForm" method="POST" action="logincon.php">
                <div class="d-flex flex-column pb-5">
                    <label for="eAndU"> Username Or Email</label>
                    <input name="eAndU" type="">
                    <hr>
                </div>
                <div class="d-flex flex-column pb-4">
                    <label for="password"> Password </label>
                    <input name="password" type="password">
                    <hr>
                </div>
                <div class="mainBtn pb-4">
                    <button class="btn btn-outline-info btn-lg"  type="submit">Submit</button>
                </div>
                <div>
                    <a class="p-2" href="index.php">Don't Have An Account ?</a>
                    <a href="#">Forgot Password ?</a>
                </div>
            </form>
        </div>
    </section>
</body>
</html>