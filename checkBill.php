<?php
require_once("php/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
    <!--Script-->
    <script src="js/script.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles_user.css">
    <title>User Screen</title>
</head>

<body onload="load()">
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <!-- Navbar content -->
            <ul class="rounded sidenav">
                <li><a href="userIndex.php">Home</a></li>
                <li><a class="rounded active" href="checkBill.php">Check Bills</a></li>
                <li><a href="newBill.php">Add a new bill</a></li>
                <li><a href="php/user/exitUser.php">Exit</a></li>
            </ul>
        </nav>
    </header>
    <div class="rounded" id="table-box">
        <div class="rounded " id="table-box-back">
            <h1>ALl</h1>
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-striped table-dark" id="myTableAll">
                    <caption></caption>
                    <thead>
                        <th scope="col">Name</th>
                        <th scope="col">Value</th>
                        <th scope="col">Month</th>
                        <th scope="col">Year</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="rounded" id="table-box">
        <div class="rounded " id="table-box-back">
            <h1>Total by month</h1>
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-striped table-dark" id="myTableMonth">
                    <caption></caption>
                    <thead>
                        <th scope="col">Name</th>
                        <th scope="col">Total</th>
                        <th scope="col">Month</th>
                        <th scope="col">Year</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>