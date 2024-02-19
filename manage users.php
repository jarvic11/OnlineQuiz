<?php require_once 'connect.php';
?> 
<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tr:hover {
            background-color: #e2e2e2;
        }
        
        .purple-button {
            color: #fff;
            background-color: purple;
            padding: 6px 10px;
            border-radius: 4px;
            text-decoration: none;
        }
        
        .purple-button:hover {
            background-color: #8a2be2;
        }
    </style>
</head>
<body>
    <?php
  
    function deleteUser($userId)
    {
        global $conn;

       
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        
        if ($stmt->affected_rows > 0) {
            return true; 
        } else {
            return false; 
        }
    }

   
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

   
    if (mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Username</th><th>Password</th><th>Role</th><th>Action</th></tr>';

       
        while ($row = mysqli_fetch_assoc($result)) {
            $userId = $row['id'];
            $username = $row['username'];
            $password = $row['password'];
            $role = $row['role'];

            echo "<tr>";
            echo "<td>$userId</td>";
            echo "<td>$username</td>";
            echo "<td>$password</td>";
            echo "<td>$role</td>";
            echo "<td><a class='purple-button' href='delete_user.php?id=$userId'>Delete</a></td>";
            echo "<td><a class='purple-button' href='edit_user.php?id=$userId'>Edit</a></td>";
            echo "</tr>";
        }

        echo '</table>';
    } else {
        echo 'No users found.';
    }

   
    mysqli_close($conn);
    ?>
</body>
</html>
