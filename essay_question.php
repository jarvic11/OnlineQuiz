<?php
session_start();


if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'student') {
    
}
require_once 'connect.php';


$selectQuery = "SELECT * FROM essay_questions";
$result = mysqli_query($conn, $selectQuery);
$essayQuestions = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            margin-top: 40px;
            margin-bottom: 20px;
            color: #555;
        }

        .essay-question {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .essay-question h3 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #333;
        }

        .essay-question form {
            margin-top: 10px;
        }

        .essay-question textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .essay-question input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            border: none;
            background-color: purple;
            color: white;
            cursor: pointer;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>

    <h2>Essay Questions</h2>
    <?php if (!empty($essayQuestions)) : ?>
        <?php foreach ($essayQuestions as $question) : ?>
            <div class="essay-question">
                <h3><?php echo $question['question']; ?></h3>
                <form action="submit_essay.php" method="post">
                    <input type="hidden" name="question_id" value="<?php echo $question['id']; ?>">
                    <textarea name="essay_answer" rows="5" cols="50" placeholder="Enter your essay answer" required></textarea>
                    <input type="submit" value="Submit Answer">
                </form>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No essay questions found.</p>
    <?php endif; ?>

    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
