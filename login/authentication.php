<?php      
    include('connection.php');  

    $username = $_POST['usern'];  
    $password = $_POST['psw'];  
    $level = $_POST["level"];

        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $level = stripcslashes($level);
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "SELECT * from log WHERE name ='$username' AND pass ='$password' AND lev ='$level'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 2){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }
        
        


















?>      