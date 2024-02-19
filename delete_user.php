<?php

if (isset($_GET['id'])) {
   
    $userId = $_GET['id'];


    require_once 'connect.php';

  
    $query = "DELETE FROM users WHERE id = ?";
	
            header("Location: manage users.php");
            exit();

  
    $stmt = $conn->prepare($query);

    if ($stmt) {
      
        $stmt->bind_param("i", $userId);

       
        $stmt->execute();

       
        if ($stmt->affected_rows > 0) {
            echo "User deleted successfully.";
        } else {
            echo "No user found with the provided ID.";
        }

     
        $stmt->close();
    } else {
        echo "Error: Unable to prepare the delete statement.";
    }

   
    $conn->close();
} else {
    echo "Error: User ID not provided.";
}
?>
