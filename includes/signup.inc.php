<?php

    session_start();
    if(isset($_POST['submit'])){    
        include_once 'dbh.inc.php';
        $fname=mysqli_real_escape_string($conn,$_POST['fname']);
        \$lname=mysqli_real_escape_string($conn,$_POST['lname']);
        $uid=mysqli_real_escape_string($conn,$_POST['uid']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
        $ans=mysqli_real_escape_string($conn,$_POST['ans']);
        // Error handling
            // IF empty
        if(empty($fname))
        {
           // $fnameerror="Must be filled";
           header("location: ../signup.php?signup=firstname_empty&lname=$lname&email=$email&uid=$uid");
            exit();
        }else {
            if(empty($lname))
        {
           // $fnameerror="Must be filled";
           header("location: ../signup.php?signup=lastname_empty&fname=$fname&email=$email&uid=$uid");
            exit();
        }
        else {
            if(empty($uid))
        {
           // $fnameerror="Must be filled";
           header("location: ../signup.php?signup=username_empty&lname=$lname&email=$email&fname=$fname");
            exit();
        }
        else {
            if(empty($email))
        {
           // $fnameerror="Must be filled";
           header("location: ../signup.php?signup=email_empty&lname=$lname&fname=$fname&uid=$uid");
            exit();
        }
        else {
            if(empty($pwd))
        {
           // $fnameerror="Must be filled";
           header("location: ../signup.php?signup=password_empty&lname=$lname&email=$email&uid=$uid&fname=$fname");
            exit();
        }
        else {
            if(empty($ans))
        {
           // $fnameerror="Must be filled";
           header("location: ../signup.php?signup=answer_empty&lname=$lname&email=$email&uid=$uid&fname=$fname");
            exit();
        }
        else{
            
            //check for correct firstname or lastname
            if(!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname))
            {
                $fnameerror="Invalid format";
                header("location: ../signup.php?signup=invalidName");
                exit();
            }
            else{
                // check for valid Email
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("location: ../signup.php?signup=email&fname=$fname&lname=$lname&uid=$uid");
                    exit();
                }
                else{
                    // check for username
                    $sql = "SELECT * FROM users WHERE user_uid='$uid'";
                    $result = mysqli_query($conn, $sql);
                    $resultcheck = mysqli_num_rows($result);
                    if($resultcheck > 0){
                       header("location: ../signup.php?signup=usertaken");
                        
                        exit(); 
                    }
                        else{
                        $answer=$_SESSION["answer"];
                        $user_answer=$_POST['ans'];
                        if($answer != $user_answer){   
                            header("location: ../signup.php?signup=invalidsecuritycode");
                        exit();
                        }
                        else{
                        // hashing the password
                        $hashpwd = password_hash($pwd,PASSWORD_DEFAULT);
                        // Insert into database
                        $sql = "INSERT INTO users (user_first,user_last,user_email,user_uid,user_pwd) VALUES ('$fname','$lname','$email','$uid','$hashpwd');";
                        
                        mysqli_query($conn, $sql);
                        header("location: ../loginpage.php?signup=success");
                        exit();
                    }        
                }
             
            }
        }
    }
        }
        }
        }
        }
        }
    }else{
        header("location: ../signup.php");
        exit();
    }
?>