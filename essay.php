<!DOCTYPE html>
<html>
<head>
    <title>Essay Question Insertion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        textarea, select, input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #800080;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #6b006b;
        }
    </style>
</head>
<body>
    <h1>Essay Question Insertion</h1>

    <?php
   
    require_once 'connect.php';

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
        $question = $_POST['question'];
        $level = $_POST['level'];
        $subject = $_POST['subject'];

       
        $insertQuery = "INSERT INTO essay_questions (question, level, subject) VALUES ('$question', '$level', '$subject')";
        mysqli_query($conn, $insertQuery);

        echo '<p>Question saved successfully!</p>';
    }
    ?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="question">Essay Question:</label><br>
        <textarea id="question" name="question" rows="4" cols="50" required></textarea><br><br>

        <label for="level">NTA Level:</label>
        <select id="level" name="level" required>
            <option value="">Select NTA Level</option>
            <option value="NTA Level 6">NTA Level 6</option>
            <option value="NTA Level 7">NTA Level 7</option>
            <option value="NTA Level 8">NTA Level 8</option>
        </select><br><br>

        <label for="subject">Subject:</label><br>
        <input type="text" id="subject" name="subject" required><br><br>

        <input type="submit" value="Save Question">
    </form>
</body>
</html>
