<?php
session_start();


if (!isset($_SESSION['username'])) {
   
    header("Location: login.php");
    exit();
}


if (!isset($_SESSION['current_question'])) {
    
    $_SESSION['current_question'] = 1;
}

$currentQuestion = $_SESSION['current_question'];

require_once 'connect.php';
$conn = mysqli_connect('localhost', 'root', '', 'registration');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  

    $selectedAnswer = $_POST['answer'];

    $insertQuery = "INSERT INTO quiz_results (username, question_id, selected_answer) 
                    VALUES ('{$_SESSION['username']}', $currentQuestion, '$selectedAnswer')";
    mysqli_query($conn, $insertQuery);

    
    $_SESSION['current_question']++;

    
    if ($_SESSION['current_question'] <= 5) {
        header("Location: questions.php");
        exit();
    } else {
        header("Location: quiz_complete.php");
        exit();
    }
}


$query = "SELECT * FROM questions WHERE id = $currentQuestion";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$question = $row['question'];
$answer1 = $row['answer1'];
$answer2 = $row['answer2'];
$answer3 = $row['answer3'];
$subject = $row['subject'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz System - Questions</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        h1 {
            color: #333;
        }
        
        h2 {
            color: #666;
        }
        
        p {
            margin-bottom: 20px;
        }
        
        form {
            margin-bottom: 20px;
        }
        
        input[type="radio"] {
            margin-right: 10px;
        }
        
        input[type="submit"] {
            background-color: #800080;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #6a006a;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a class="navbar-brand" href="#"><b>QuizSystem</b></a></li>
                <li><a href="#">Home</a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>
            <ul>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>

    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>

    <h2>Question <?php echo $currentQuestion; ?></h2>
    <p><?php echo $question; ?></p>

    <form action="" method="post">
        <input type="radio" name="answer" value="<?php echo $answer1; ?>" required><?php echo $answer1; ?><br>
        <input type="radio" name="answer" value="<?php echo $answer2; ?>"><?php echo $answer2; ?><br>
        <input type="radio" name="answer" value="<?php echo $answer3; ?>"><?php echo $answer3; ?><br>

        <br>
        <input type="submit" value="Next Question">

    </form>

    <br>
</body>
</html>
