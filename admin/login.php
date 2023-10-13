


<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
                  unset($_SESSION["success"]);
                }
            ?>
            <div class="col-md-5">
                <h1>Login</h1>
                <form method="post" action="/admin/login_check.php">
                    <div class="mb-3">
                        <label for="usernameInput" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="usernameInput" name="username"
                        value="<?php echo (isset($_SESSION['username'])?$_SESSION['username']:null); unset($_SESSION['username']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="PasswordInput" class="form-label">Password</label>
                        <input type="password" class="form-control" id="PasswordInput" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary" name="login">Submit</button>
                    <p class="form-text">Avval ro'yxatdan o'tmaganmisiz? <a href="/admin/register.php" class="link-underline-light">Ro'yxatdan o'ting</a></p>
                </form>
            </div>
        </div>
    </div>
</body>