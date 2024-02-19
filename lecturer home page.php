<?php
session_start();


if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'lecturer') {
   
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
    <title>Lecturer Home Page</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        h1 {
            color: #333;
        }
        
        p {
            margin-bottom: 20px;
        }
        
        .welcome {
            font-size: 24px;
            font-weight: bold;
        }
        
        .logout {
            text-decoration: none;
            color: #4CAF50;
        }
        
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
                <li><a href="teacher.php">Add MultipleQn</a></li>
                <li><a href="essay.php">Add Essay Qn</a></li>
                <li><a href="insert answer.php">Insert Answer</a></li>
                <li><a href="results.php">Results</a></li>
                <li><a href="submission.php">View Submission</a></li>
            </ul>
            <ul>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <h1>Lecturer Home Page</h1>

        <p class="welcome">Welcome, <?php echo $_SESSION['username']; ?>!</p>
    </div>
</body>
</html>
