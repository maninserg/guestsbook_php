<?php
error_reporting(-1);

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/funcs.php';

session_start();

if (isset($_POST['register'])) {
    registration();
    header("Location: index.php");
    die;
}

if (isset($_POST['auth'])) {
    debug($_POST);
    login();
    //header("Location: index.php");
    //die;
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Guest's Book</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <!-- Alerts -->
            <?php if (!empty($_SESSION['success'])): ?>
            <div class="alert alert-info" role="alert">
               <?php 
               echo $_SESSION['success'];
               unset($_SESSION['success']);
               ?> 
            </div>
            <?php endif; ?>
            <?php if (!empty($_SESSION['errors'])) : ?>
            <div class="alert alert-danger" role="alert">
               <?php
               echo $_SESSION['errors'];
               unset($_SESSION['errors']);
               ?> 
            </div>
            <?php endif; ?>
            <!-- End Alerts -->

            <div class="col-4 mx-auto ">
                <?php if (empty($_SESSION['user']['name'])): ?>
                <!-- Form for Registration -->
                <h2>Registration</h2>
                <form action="index.php" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="login" id="loginReg" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" id="passReg" placeholder="Password">
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                </form>
                <!-- End Form for Registration -->

                <hr>
                <!-- Form for Authorization -->
                <h2>Authorization</h2>
                <form action="index.php" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="login" id="loginAuth" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" id="passAuth" placeholder="Password">
                    </div>
                    <button type="submit" name="auth" class="btn btn-primary">Auth</button>
                </form>
                <!-- End Form for Authorization -->

                <?php else: ?>
                <!-- Welcome message and Logout link -->
                <div class="mt-2 mb-2">Welcome, <?= htmlspecialchars($_SESSION['user']['name'])?>! <a href="">Log out</a></div>
                <!-- End Welcome message -->

                <!-- Form for Message -->
                <form action="index.php" method="post">
                    <div class="mb-3">
                        <textarea class="form-control" id="message" rows="3" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" name="add" class="btn btn-primary">Send</button>
                </form>
                <!-- End Message -->
                <?php endif; ?>
                <hr>
                <!-- Show Messages -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Author: User</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <h6 class="card-subtitle mb-2 text-muted">Date: 01.01.2022</h6>
                    </div>
                </div>
                <!-- End Show Messages -->
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js">
    < /body> 
</html>