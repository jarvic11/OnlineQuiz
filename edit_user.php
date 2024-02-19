<?php
require_once 'connect.php'; 


if (isset($_GET['id'])) {
    $userId = $_GET['id'];

  
    $query = "SELECT * FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $query);

   
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $password = $row['password'];
        $role = $row['role'];

      
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $updatedUsername = $_POST['username'];
            $updatedPassword = $_POST['password'];
            $updatedRole = $_POST['role'];

          
            $updateQuery = "UPDATE users SET username = '$updatedUsername', password = '$updatedPassword', role = '$updatedRole' WHERE id = $userId";
            mysqli_query($conn, $updateQuery);

            
            header("Location: manage users.php");
            exit();
        }
    } else {
       
        die('User not found.');
    }
} else {
   
    die('Invalid request.');
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            margin-top: 0;
        }
        
        form {
            margin-top: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>

        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo $username; ?>" required>

            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $password; ?>" required>

            <label for="role">Role:</label>
            <input type="text" name="role" value="<?php echo $role; ?>" required>

            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>
