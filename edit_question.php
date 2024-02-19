<?php
session_start();

if (!isset($_SESSION['username'])) {
    
}

require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['question_id'])) {
    $questionId = $_POST['question_id'];

    $selectQuery = "SELECT * FROM questions WHERE id = $questionId";
    $result = mysqli_query($conn, $selectQuery);
    $question = mysqli_fetch_assoc($result);

    
    if ($question) {
       
        if (isset($_POST['update_question'])) {
            
            $updatedQuestion = mysqli_real_escape_string($conn, $_POST['question']);
            $updatedAnswer1 = mysqli_real_escape_string($conn, $_POST['answer1']);
            $updatedAnswer2 = mysqli_real_escape_string($conn, $_POST['answer2']);
            $updatedAnswer3 = mysqli_real_escape_string($conn, $_POST['answer3']);

           
            $updateQuery = "UPDATE questions SET question = '$updatedQuestion', answer1 = '$updatedAnswer1', answer2 = '$updatedAnswer2', answer3 = '$updatedAnswer3' WHERE id = $questionId";
            mysqli_query($conn, $updateQuery);

            
            header("Location: quiz_management.php");
            exit();
        }
    } else {
        
        header("Location: quiz_management.php");
        exit();
    }
} else {
   
    header("Location: quiz_management.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Question</title>
    <link rel="stylesheet" type="text/css" href="teacher.css">
</head>
<body>
    <h1>Edit Question</h1>

    <form action="" method="post">
        <label>Question:</label>
        <input type="text" name="question" value="<?php echo $question['question']; ?>" required><br>
        <label>Answer 1:</label>
        <input type="text" name="answer1" value="<?php echo $question['answer1']; ?>" required><br>
        <label>Answer 2:</label>
        <input type="text" name="answer2" value="<?php echo $question['answer2']; ?>" required><br>
        <label>Answer 3:</label>
        <input type="text" name="answer3" value="<?php echo $question['answer3']; ?>" required><br>
        <input type="submit" name="update_question" value="Update Question">
    </form>

    <br>
    <a href="quiz_management.php">Back to Quiz Management</a>
</body>
</html>
