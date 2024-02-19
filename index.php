<?php


include_once 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Quiz System </title>
 
    <style type="text/css">
        body {
            width: 100%;
            background: url(image/book.jpg) ;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        
 body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
     
 /* Style the intro section */
 .intro {
  text-align: center;
   }
     
.intro h1 {
    font-size: 2.5em;
    margin-bottom: 20px;
    color: white;
  }
     
.intro a.btn {
     display: inline-block;
     padding: 10px 20px;
	 margin: 10px;
     background-color: #337ab7;
     color: #fff;
     text-decoration: none;
     border-radius: 5px;
 }
     
.intro h2 {
     margin-top: 20px;
     font-size: 1.5em;
     color: white;
 }
    
	</style>
</head>
<body>
    <center>
        <div class="intro">
            <h1> Welcome To Quiz System </h1>
            <a href="login.php" class="btn"> login </a> &emsp;
            <a href="register.php" class="btn"> register </a>
            <h2> Wish You&nbsp;The Best. </h2>
        </div>
    </center>
</body>
</html>
