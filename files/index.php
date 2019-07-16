<?php 

// Initial includes, especially database connections and my register/login scripts.
include("database.php");
include("register.php");
include("login.php");
include("search_functions.php");
// INITIALIZES SESSION START
session_start(); // HTML BELOW
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>ROADE | BIKESHARE</title>
</head>

<body>
    <div class="allWrap">

    <div class="splashLogo justify-content-center align-items-center text-center"><img src="images/roade-footer@2x.png"></div>
    <div class="splashWrap">
        <div class="formWrap text-center">
            <h1 class="formHeader text-align-center">LOGIN</h1>
            <form action="login.php" method="post">
                <label for="username" class="formLabels">Username</label>
                <input type="text" id="username" name="username"><br>
                <label for="password" class="formLabels">Password </label>
                <input type="text" id="password" name="password"><br>
                <button type="button" class="btn btn-outline-warning btnSplash">
                    
                <input type="submit" name="login" value="LOGIN">
                </button>
            </form>
        </div>
        <div class="formWrap text-center">
            <h1 class="formHeader text-align-center">REGISTER</h1>
            <form action="register.php" method="post">
                <label for="username" class="formLabels">Username</label>
                <input type="text" id="username" name="username"><br>
                <label for="password" class="formLabels">Password</label>
                <input type="text" id="password" name="password"><br>
                <button type="button" class="btn btn-outline-warning btnSplash">
                <input type="submit" name="register" value="Register"></button>
            </form>
        </div>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>