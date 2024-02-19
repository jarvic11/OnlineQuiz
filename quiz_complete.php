<?php
session_start();


if (!isset($_SESSION['username'])) {
  
}

require_once 'connect.php';
$conn = mysqli_connect('localhost', 'root', '', 'registration');


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_SESSION['username'];
$query = "SELECT * FROM quiz_results WHERE username = '$username'";
$result = mysqli_query($conn, $query);

$totalQuestions = mysqli_num_rows($result);
$correctAnswers = 0;

while ($row = mysqli_fetch_assoc($result)) {
    
    $questionId = $row['question_id'];
    $selectedAnswer = $row['selected_answer'];

    $query = "SELECT answer FROM answers WHERE id = $questionId";
    $answerResult = mysqli_query($conn, $query);
    $correctAnswer = mysqli_fetch_assoc($answerResult)['answer'];

    if ($selectedAnswer == $correctAnswer) {
        $correctAnswers++;
    }
}

$score = 0;
if ($totalQuestions > 0) {
    $score = ($correctAnswers / $totalQuestions) * 100;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz System - Quiz Complete</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f5f5f5;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 40px;
        }

        p {
            margin-bottom: 20px;
            text-align: center;
        }

        .score {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            align-items: center;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar-brand {
            font-size: 24px;
        }

        .logout-btn {
            background-color: #333;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
        }

        .logout-btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
              
                
            </ul>
            <a href="logout.php" class="logout-btn">Logout</a>
        </nav>
        
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>

        <h2>Quiz Complete</h2>
        <p>Your quiz has been completed. Here are your results:</p>

        <p>Total Questions: <?php echo $totalQuestions; ?></p>
        <p>Correct Answers: <?php echo $correctAnswers; ?></p>
        <p class="score">Score: <?php echo $score; ?>%</p>

        <br>
    </div>
</body>
</html>
