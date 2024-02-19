<?php
session_start();


if (!isset($_SESSION['username'])) {
    
}


require_once 'connect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $questionId = $_POST['question_id'];
    $answer = $_POST['answer'];

   
    $insertQuery = "INSERT INTO answers (question_id, answer) VALUES ('$questionId', '$answer')";
    mysqli_query($conn, $insertQuery);

   
    header("Location: insert answer.php");
    exit();
}


$query = "SELECT * FROM questions";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Answer</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-top: 0;
        }

        form {
            margin-top: 20px;
        }

        label, select, input[type="submit"] {
            display: block;
            margin-bottom: 10px;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 8px 16px;
            background-color: purple; /* Set the button color to purple */
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #6b006b; /* Set the hover color to a darker shade of purple */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Insert Answer</h1>

        <form action="insert answer.php" method="post">
            <label for="question_id">Question:</label>
            <select name="question_id" id="question_id" required>
                <option value="">Select a question</option>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['question']; ?></option>
                <?php endwhile; ?>
            </select>

            <label for="answer">Answer:</label>
            <input type="text" name="answer" id="answer" required>

            <input type="submit" value="Insert Answer">
        </form>
    </div>
</body>
</html>
