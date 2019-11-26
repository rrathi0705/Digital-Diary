<?php

session_start();
if(!isset($_SESSION['u_uid'])){
   header("Location: loginpage.php");
}else{
    include 'includes/dbh.inc.php';
        $user_uid=$_SESSION['u_uid'];

    $sql="SELECT * FROM diary where user_uid='$user_uid'";
    $result =mysqli_query($conn,$sql);
}
?>

<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title>Diary</title>
<link rel="icon" type="image/gif/png" href="homelogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    *{
        margin: 0px;
        padding: 0px;
    }
body {margin:0px;}
button { 
    margin-left: 11px;
    border: 1px blue;
    background: blue;
    margin-bottom: 7px;
border-radius: 5px;
}
    button a{
        color: #fff;
        text-decoration: none;
    }
    input{
        width: 300px;
        margin: 4px;
        padding: 2px;
        font-size: 14px;
        margin-left: 10px;
    }
    label{
        font-size: 18px;
        margin-left: 10px;
    }
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
.logout{
      
}
    .newentry{
        margin-top: 5px;
        margin-bottom: 5px;
        margin-left: 45%;
        text-decoration: none;
        font-size: 25px;
    }
    .newentry:hover{
        background: blue;
        color: #fff;
        border-radius: 20px;
        padding: 4px;
    }
    .block{
        width: 200px;
        height: 300px;
        display: block;
        margin: 7px;
        float: left;
        border: 2px solid;
        background: #ffe;
        color: #004d99;
        text-align: center;
        border-radius: 15px;
    }
    .block label{
        font-weight: 500;
        font-size: 0.9em;
        text-transform: uppercase; 
    }
    .block input[type="text"]{
        border: 1px solid #b3d9ff;
        border-radius: 4px;
        color: blue;
        width: 180px;
        text-align: center;
        margin-bottom: 10px;
        font-size: .8em;
    }
    .block input[type="date"]{
        border: 1px solid #b3d9ff;
        border-radius: 2px;
        color: blue;
    }
    textarea{
        margin-bottom: 10px;
        border: 1px solid #b3d9ff;
        border-radius: 4px;
        width: 88.5%;
    }
</style>

</head>

<body>

<header>
	<img src="logogo.png" style="height:20%;overflow:hidden;width:100%;">

    <div class="navbar">
    <ul>
        <li><a href="home.php" class="a">Home</a></li>
        <li><a href="mydiary.php" class="active a">Diary</a></li>
        <li><a href="todo.php" class="a">To-Do List</a></li>
        <li><a href="myimages.php" class="a">My Image</a></li>
        
        <li><a href="feedback.php" class="a">Feedback</a></li>
        <li   style="float: right;"><a href="includes/logout.inc.php" class="a">Logout</a></li>
        </ul>
    </div>
    
</header>
<br>
    <a href="newentry.php" class="newentry">New Entry</a><br><br>
<div class="tabledisplay">
    <?php
    while($record=mysqli_fetch_assoc($result)){
               echo "<div class='block'><label>Diary Title</label> <input type='text' value=".$record['diary_title']." readonly><br>";
                     echo "<label>Diary date</label> <input type='text' value=".$record['diary_date']." readonly><br>";
             echo "<label>Diary Category</label> <input type='text' value=".$record['diary_category']." readonly><br>";
             echo "<label>Diary Content</label> <textarea rows='5' col='50' readonly>" .$record['diary_content']."</textarea>";
             echo "<button style='border-radius: 12px; color: #fff; padding: 5px;width:50px'><a href = 'editDiary.php?diary_id=".$record['diary_id']."'>Edit</a></button> 
             </div>";
            
            }
            
            ?>
    </div>   
</body>
</html>
