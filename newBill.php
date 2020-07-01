<?
require_once("php/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles_user.css">
    <title>User Screen</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <!-- Navbar content -->
            <ul class="rounded sidenav">
                <li><a href="userIndex.php">Home</a></li>
                <li><a href="checkBill.php">Check Bills</a></li>
                <li><a class="rounded active" href="newBill.php">Add a new bill</a></li>
                <li><a href="php/user/exitUser.php">Exit</a></li>
                <li><?php
                    session_start();
                    if (!empty($_SESSION['userEmail'])) {
                        echo $_SESSION['msg'] = "Bem vindo, $_SESSION[userEmail]";
                    } else {
                        $_SESSION['msg'] = "Restricted area";
                        echo "Restricted area";
                        header("Location: error.html");
                    }

                    ?></li>
            </ul>
        </nav>
    </header>

    <div class="rounded" id="new-box">
        <div class="rounded border" id="new-box-back">
            <form method="POST" action="php/bill/newBill.php">
                <h2>Adding a new Bill</h2>
                <div class="form-group">
                    <label for="billName">Identification</label>
                    <input type="text" class="form-control" name="billName">
                </div>
                <div class="form-group">
                    <label for="billValue">Value</label>
                    <input type="number" step="0.10" class="form-control" name="billValue">
                </div>
                <div class="form-group">
                    <label for="billDate">Date</label>
                    <input type="date" class="form-control" name="billDate">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

    </div>
</body>

</html>