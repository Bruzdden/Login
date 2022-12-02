<?php      
    $host = "localhost";  
    $user = "root";  
    $password = 'root';  
    $db_name = "login";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(!$con) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());   
    }  
?>  