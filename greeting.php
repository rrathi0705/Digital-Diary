<?php
session_start();
?>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title>Home</title>
<link rel="icon" type="image/gif/png" href="homelogo.png">
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
.a a:hover {
    background-color: black;
}
.greeting{
   color:black;
   font-size:25px;
   text-align: center;
    margin:4px;
    }
</style>
<script>
	
</script>


</head>

<body>

<header>
	<img src="logogo.png" style="height:20%;overflow:hidden;width:100%;">
    <div class="navbar">
        <ul>
            <li><a href="home.php" class="active a">Home</a></li>
            <li><a href="mydiary.php" class="a">Diary</a></li>
            <li><a href="todo.php" class="a">To Do List</a></li>
            <li><a href="myimages.php" class="a">My Image</a></li>
            
            <li><a href="feedback.php" class="a">Feedback</a></li>
            <li><a href="includes/logout.inc.php" class="a" style="margin-left: 855px;">Logout</a></li>
        </ul>
    </div>
    <div class="greeting">
    <?php
         if(isset($_SESSION['u_id'])){
        echo  "Welcome ".$_SESSION['u_first'];
    }   ?>
    </div>

</header>
</body>
</html>