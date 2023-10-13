<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-start">
            <?php 
                if(isset($_SESSION["error"])){
                    echo "<div class='alert alert-danger' role='alert'>
                            ".$_SESSION["error"]."
                           </div>
                  ";
                  unset($_SESSION["error"]);
                }

                if(isset($_SESSION["success"])){
                    echo "<div class='alert alert-success' role='alert'>
                            Ro'yxatdan o'tdingiz. Endi login qilishingiz mumkin
                           </div>
                  ";
                  unset($_SESSION["success"]);
                }
            ?>
            <div class="col-md-5">
                <h1>Ro'yxatdan o'tish</h1>
                <form method="post" action="/admin/registration.php">
                    <div class="mb-3">
                        <label for="usernameInput" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="usernameInput" name="username">
                    </div>

                    <div class="mb-3">
                        <label for="PasswordInput" class="form-label">Password</label>
                        <input type="password" class="form-control" id="PasswordInput" name="password">
                    </div>

                    <div class="mb-3">
                        <label for="ConfpassInput" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="ConfpassInput" name="confirm-password">
                    </div>
                    
                    <div class="mb-3">
                        <label for="firstnameInput" class="form-label">Firstname</label>
                        <input type="text" class="form-control" id="firstnameInput" name="firstname">
                    </div>

                    <div class="mb-3">
                        <label for="lastnameInput" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="lastnameInput" name="lastname">
                    </div>
                    <button type="submit" class="btn btn-primary" name="register">Submit</button>
                    <p class="form-text">Already have an account? <a href="/admin/login.php" class="link-underline-light">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>