<?php
session_start();
if(!isset($_SESSION['u_uid'])){
   header("Location: loginpage.php");
}else{
    if(isset($_POST['submit'])){
     include 'includes/dbh.inc.php';
        $user_uid=$_SESSION['u_uid'];
        $comments= mysqli_real_escape_string($conn,$_POST['comments']);
        $experience= mysqli_real_escape_string($conn,$_POST['experience']);
        if(empty($comments)){
            header("Location: feedback.php?feedback=emptytextarea");
            exit();
        }
        $sql = "INSERT INTO feedback (user_uid,experience,comments) VALUES('$user_uid','$experience','$comments');";
            mysqli_query($conn, $sql);
            header("location: feedback.php?feedback=success");
            exit();
    }
    }?>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="form.js"></script>
<head>
<title>Feedback</title>
<link rel="icon" type="image/gif/png" href="homelogo.png">
<style>
        *{
        margin: 0px;
        padding: 0px;
    }
body {margin:0px;}
.navbar {
    overflow: hidden;
    font-size:30px;
    background-color: none;
}

.navbar a {
    float: left;
    font-size: 16px;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    color: black;
}

.active {
    background-color: green;
    color: white;
}

.navbar a:hover {
    background-color: blue;
    color: #fff;
}

li{
    float: left;
    list-style: none;
    padding: none;
    margin: 0px;
}
.a {
    border-radius: 25px;
}
* {
box-sizing: border-box;
}

input[type=text], select, textarea {
width: 100%;
padding: 12px;
border: 1px solid #ccc;
border-radius: 4px;
resize: vertical;
}

label {
padding: 12px 12px 12px 0;
display: inline-block;
}

input[type=submit] {
background-color: #4CAF50;
color: white;
padding: 12px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
float: right;
margin-top: 10px;
}

input[type=submit]:hover {
background-color: #45a049;
}

.container {
border-radius: 5px;
background-color: #f2f2f2;
padding: 20px;
height:400px;
margin-top: 10px;
}
</style>


</head>

<body>

<header>
    <img src="logogo.png" style="height:20%;overflow:hidden;width:100%;">

    <div class="navbar">
    <ul>
        <li><a href="home.php" class="a">Home</a></li>
        <li><a href="mydiary.php" class="= a">Diary</a></li>
        <li><a href="todo.php" class="a">To-Do List</a></li>
        <li><a href="myimages.php" class="a">My Image</a></li>
        
        <li><a href="feedback.php" class="active a">Feedback</a></li>
        <li  style="float: right;"><a href="includes/logout.inc.php" class="a">Logout</a></li>
        </ul>
    </div>
    
</header>

    <div class="container" style="margin-left:25%;margin-right:25%;">
    <form action="feedback.php" method="post">


        <label for="experience">How is your overall experience?</label>
        <select id="experience" name="experience">
        <option value="good">Good</option>
        <option value="average">Average</option>
        <option value="bad">Bad</option>
        </select>
        <label for="comments">Comments</label>
        <textarea id="subject" name="comments" placeholder="Write something.." style="height:200px"></textarea>
        <input type="submit" value="Submit" name="submit">
    </form>
    </div>
</body>
</html>
