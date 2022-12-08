<?php

require_once('connection.php'); 

if (isset($_POST['regBtn']))
{ 
    $username = $_POST['username'];  
    $pass = $_POST['password'];  
    $pass2 = $_POST["password2"];
    $level = $_POST['level'];
    $username = stripcslashes($username);  
    $pass = stripcslashes($pass);  
    $level = stripcslashes($level);
    $username = mysqli_real_escape_string($con, $username);  
    $pass = mysqli_real_escape_string($con, $pass);  
    $level = mysqli_real_escape_string($con, $level); 
    if ($pass === $pass2)
    {
        if (strlen($pass) >= 5)
        {   
            $sql = ("SELECT * FROM login WHERE name='{$username}'");
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) == 0)
            {
                $hash = hash('sha256', $pass);
                $code = ("INSERT INTO login ( name, password, lev) VALUES ('{$username}', '{$hash}', '{$level}')");
                mysqli_query($con, $code);
            
                $sql = ("SELECT * FROM login WHERE name='{$username}'");
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if ($count == 1){
                    echo '<font color="green">Yay!! Your account has been created. <a href="./index.html">Click here</a> to login!<font>';
                    }
                else{
                    echo "ERROR MORE";
                    }
            }
            else
            {
                echo 'The username <i>'.$username.'</i> is already taken. Please use another.';
            }
        }   
        else
        {
            echo "PASSWORD IS WEAK";    
        }
    }
    else
    {
        echo "PASSWORD DONT MATCH";
    }
}

?>
