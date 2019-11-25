<?php
session_start();
if(!isset($_SESSION['u_uid'])){
   header("Location: loginpage.php");
}else{
if(isset($_POST['add'])){
    
    include_once 'dbh.inc.php';
    
    $user_uid=$_SESSION['u_uid'];
     $title=mysqli_real_escape_string($conn,$_POST['title']);
     $date= date("Y/m/d");
    $category=mysqli_real_escape_string($conn,$_POST['category']);
     $newentry=mysqli_real_escape_string($conn,$_POST['newentry']);
    if(empty($newentry)){
        header("Location: ../newentry.php?newentry=emptytextarea");
        exit();
    }
    if(empty($title)){
        header("Location: ../newentry.php?newentry=titleEmpty");
        exit();
    }
    $sql = "INSERT INTO diary (user_uid,diary_title,diary_date,diary_category,diary_content) VALUES ('$user_uid','$title','$date','$category','$newentry');";
                        
                        mysqli_query($conn, $sql);
                        header("location: ../mydiary.php?Newentry=success");
                        exit();
}
else if(isset($_POST['save'])){
    
    include_once 'dbh.inc.php';
    $diary_id = $_POST['diary_id'];
    $user_uid=$_SESSION['u_uid'];
     $title=mysqli_real_escape_string($conn,$_POST['title']);
     $date= mysqli_real_escape_string($conn,$_POST['date']);;
    $category=mysqli_real_escape_string($conn,$_POST['category']);
     $newentry=mysqli_real_escape_string($conn,$_POST['newentry']);
    if(empty($newentry)){
        header("Location: ../newentry.php?newentry=emptytextarea");
        exit();
    }
    if(empty($title)){
        header("Location: ../newentry.php?newentry=titleEmpty");
        exit();
    }
    $sql = "UPDATE diary set diary_title = '$title', diary_category = '$category' , diary_content = '$newentry' where diary_id='$diary_id';";    
        mysqli_query($conn, $sql);
        header("location: ../mydiary.php?Newentry=success");
        exit();
}
}
?>