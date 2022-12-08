
<?php      
    include('connection.php');  

    $username = $_POST['usern'];  
    $pass = $_POST['psw'];  
    $level = $_POST["level"];

        $username = stripcslashes($username);  
        $pass = stripcslashes($pass);  
        $level = stripcslashes($level);
        $username = mysqli_real_escape_string($con, $username);  
        $pass = mysqli_real_escape_string($con, $pass);  
        $level = mysqli_real_escape_string($con, $level);  
        $hash = hash("sha256", $pass);
      
        $sql = "SELECT * from login WHERE name ='$username' AND password='$pass' AND lev ='$level'";  
        $result = mysqli_query($con, $sql); 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){
            if($pass === $hash){
                echo "<h1><center> Login successful </center></h1>";  
            }
            }  
        else{  
                echo "<h1> Login failed. Invalid username or password.</h1>";  
            }
        
        
        
        


















?>      
