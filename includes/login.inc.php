<?php

session_start();
if(isset($_POST['submit']))
{
    include 'dbh.inc.php';
    $uid = mysqli_real_escape_string($conn,$_POST['uid']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    
    // Error handler
    //check for empty
    if(empty($uid) || empty($pwd)){
        header("Location: ../loginpage.php?login=error");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE user_uid='$uid'";
        $result = mysqli_query($conn,$sql);
        $resultcheck = mysqli_num_rows($result);
        if($resultcheck < 1){
         header("Location: ../loginpage.php?login=error");
            
          exit();
        }else{
            if($row = mysqli_fetch_assoc($result)){
                //dehashing the password
                $hashedpwdCheck = password_verify($pwd,$row['user_pwd']);
                if(hashedpwdCheck == false){
                    header("Location: ../loginpage.php?login=Invalid Password");
                    exit(); 
                }
                else if(hashedpwdCheck == true){
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                    header("Location: ../greeting.php?login=success");
                    exit();
                }
            }
        }
    }
}else{
    header("Location: ../loginpage.php?login=error");
    
    exit();
}