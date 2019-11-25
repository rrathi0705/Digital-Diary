<?php
session_start();
if(!isset($_SESSION['u_uid'])){
   header("Location: loginpage.php");
    exit();
}
include 'includes/dbh.inc.php';
$user_uid = $_SESSION['u_uid'];
$diary_id = $_GET['diary_id'];
    $sql = "Select * from diary where user_uid = '$user_uid' AND diary_id='$diary_id'";

    $result =mysqli_query($conn,$sql);
    $record = mysqli_fetch_assoc($result);
@$message = $_GET['newentry'];

?>

<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title>Edit Entry</title>
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
    
</style>

</head>


<body>
<header>
	<img src="logogo.png" style="height:20%;overflow:hidden;width:100%;">

	<div class="navbar">
    <ul>
        <li><a href="home.php" class="a">Home</a></li>
        <li><a href="mydiary.php" class="active a">Diary</a></li>
        <li><a href="todo.php" class="a">To Do List</a></li>
        <li><a href="myimages.php" class="a">My Image</a></li>
        
        <li><a href="feedback.php" class="a">Feedback</a></li>
        <li><a href="includes/logout.inc.php" class="a" style="margin-left: 855px;">Logout</a></li>
        </ul>
    </div>
</header>
<div style="margin-left: 20%;margin-top: 2%">
<h1>Edit Entry</h1>
    <form method="post" action="includes/newentry.inc.php">
    <label>Title: </label>
    <input type="text" style="width:250px;" name="title" value="<?php echo $record['diary_title']; ?>">
    <br>
    <label>Date: </label>
    <input type="text" value="<?php echo $record['diary_date']; ?>" name="date" readonly>
    <label>Category:</label>
    <select name="category" required style="border-radius: 12px;" value="<?php echo $record['diary_category'];?>">
            <option value="family">Family</option>
            <option value="friend">Friend</option>
    		<option value="office">Office</option>
    </select>
        <br><br>	
	<textarea name="newentry" maxlength="800" rows="10" cols="70" style="margin-left: 10px;" ><?php echo $record['diary_content'];?></textarea>
	<br>	<br>
    <input type="hidden" name="diary_id" value="<?php echo $diary_id;?>">
	<button type="submit" name="save"  style="border-radius: 12px; color: #fff; padding: 5px;">Save</button>
    
    </form>
	</div>
</body>
</html>
