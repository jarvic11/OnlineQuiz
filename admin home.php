<?php
session_start();


if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
   
    header("Location: login.php");
    exit();
}


if (isset($_GET['logout'])) {
   
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home Page - Quiz System</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <style>
        body {
            width: 100%;
            background: grey ;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        nav {
            background-color: #1a237e; /* Dark blue color */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        nav ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>    
            <ul>
                <li><a class="navbar-brand" href="#"><b>QuizSystem</b></a></li>
                <li><a href="admin home.php">Home</a></li>
                <li><a href="registered users.php">Registered Users</a></li>
                <li><a href="manage users.php">Manage Users</a></li>
            </ul>
            <ul>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <h1>Admin Home Page</h1>
        <p class="welcome">Welcome, <?php echo $_SESSION['username']; ?>!</p>
    </div>
</body>
</html>
