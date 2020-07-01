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
                <li><a class="rounded active" href="userIndex.php">Home</a></li>
                <li><a href="checkBill.php">Check Bills</a></li>
                <li><a href="newBill.php">Add a new bill</a></li>
                <li><a href="php/user/exitUser.php">Exit</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <p>help informations</p>
        <?php
        session_start();
        if (!empty($_SESSION['userEmail'])) {
            echo "Not Restricted area";
        } else {
            $_SESSION['msg'] = "Restricted area";
            echo "Restricted area";
            header("Location: error.html");
        }
        
        ?>
    </div>
</body>

</html>