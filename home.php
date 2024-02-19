<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="home.css">
     <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #f2f2f2;
        }
		
        body {
            width: 100%;
            background: grey ;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .nav {
            background-color: #1a237e; /* Dark blue color */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .nav ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .nav ul li {
            display: inline;
            margin-right: 10px;
        }

        .nav ul li a {
            color: white;
            text-decoration: none;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }
    
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    
        th {
            background-color: #f2f2f2;
        }
    
        body {
            width: 100%;
            background: white;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .btn-purple {
            background-color: purple;
            color: white;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="nav">
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

        <h1>Welcome !!!</h1>

        <?php
     
        session_start();

     
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            echo "<p>Welcome, $username! You are logged in.</p>";

          
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
                if ($page === "ranking") {
                    echo "<h2>Ranking</h2>";
                    echo "<p>This is the ranking section.</p>";
                } elseif ($page === "history") {
                    echo "<h2>History</h2>";
                    echo "<p>This is the history section.</p>";
                }
            } else {
                
                echo '<table>
                    <tr>
                        <th>S.N.</th>
                        <th>Module</th>
                        <th>Total Questions</th>
                        <th>Marks</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Computer security </td>
                        <td>5</td>
                        <td>100</td> 
                        <td><a href="questions.php" class="btn-purple">Start</a></td>
                        
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Data structure</td>
                        <td>5</td>
                        <td>100</td>
                         <td><a href="questions.php" class="btn-purple">Start</a></td>
                         
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Mobile computing</td>
                        <td>5</td>
                        <td>100</td>
                        <td><a href="questions.php" class="btn-purple">Start</a></td>
                       
                    </tr>
                </table>';
            }
        } else {
            echo "<p>Please log in to access your account.</p>";
        }
        ?>

    </div>
</body>
</html>
