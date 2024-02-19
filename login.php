<?php
session_start();
require_once 'connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

   
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $role = $row["role"];

        if ($role == "student") {
           
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $role;

           
            header("Location: home.php");
            exit();
        } elseif ($role == "lecturer") {
           
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $role;

           
            header("Location: lecturer home page.php");
            exit();
        } elseif ($role == "admin") {
           
            $adminQuery = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
            $adminResult = mysqli_query($conn, $adminQuery);

            if (mysqli_num_rows($adminResult) == 1) {
               
                $_SESSION["username"] = $username;
                $_SESSION["role"] = $role;
            
                
                header("Location: admin home.php");
                exit();
            } else {
                $error = "Invalid admin username or password.";
            }
        } else {
            $error = "Invalid role. Only students, lecturers, and admin can log in.";
        }
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            width: 100%;
            background: url(image/book.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }  
		
		.login-container {
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border-radius: 5px;
            margin: 0 auto;
            width: 300px;
            margin-top: 100px;
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
