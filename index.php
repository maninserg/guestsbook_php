<?php
error_reporting(-1);
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
            <div class="alert alert-info" role="alert">
                A simple info alert—check it out!
            </div>
            <div class="alert alert-danger" role="alert">
                A simple danger alert—check it out!
            </div>
            <!-- End Alerts -->

            <div class="col-4 mx-auto ">

                <!-- Form for Registration -->
                <h2>Registration</h2>
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Registration</button>
                </form>
                <!-- End Form for Registration -->

                <hr>
                <!-- Form for Authorization -->
                <h2>Authorization</h2>
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Authorization</button>
                </form>
                <!-- End Form for Authorization -->

                <!-- Welcome message and Logout link -->
                <div class="mt-2 mb-2">Welcome, User! <a href="">Log out</a></div>
                <!-- End Welcome message -->

                <!-- Form for Message -->
                <form>
                    <div class="mb-3">
                        <textarea class="form-control" id="message" rows="3" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
                <!-- End Message -->

                <hr>
                <!-- Show Messages -->
                <div class="card">
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