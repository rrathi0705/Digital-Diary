<?php
session_start();
if(!isset($_SESSION['u_uid'])){
   header("Location: loginpage.php");
}else{
if(isset($_POST['submit'])){
    include_once 'includes/dbh.inc.php';
    $task = $_POST['task'];
    $user_uid = $_SESSION['u_uid'];
    $sql = "INSERT INTO todolist (user_uid,task) VALUES ('$user_uid','$task');";
    mysqli_query($conn,$sql);
    header("Location: todo.php?Newtask=added");
    
   
}
include_once 'includes/dbh.inc.php'; 
$user_uid = $_SESSION['u_uid'];
$sqlview = "SELECT * FROM todolist WHERE user_uid = '$user_uid'";
$results = mysqli_query($conn,$sqlview);

if(isset($_GET['del_task'])){
    $task = $_GET['del_task'];
    mysqli_query($conn,"DELETE FROM todolist where task='$task'");
    header("Location: todo.php?delete=success");
    exit();
}
}
    
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <style>

    *{
        margin: 0px;
        padding: 0px;
    }
body {margin:0px;padding: 0px;}
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
.header1 {
  background-color: none;
  padding: 30px 40px;
  color: black;
  text-align: center;
}


input {
  width: 75%;
  padding: 10px;
  float: left;
  font-size: 16px;
}

.addBtn {
  padding: 10px;
  width: 15%;
  background:yellow;
  color: #555;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
    border-radius: 25px;
    float: left;
    border: none;
}
.alert{
    color: red;
}
.active {
    background-color: green;
    color: white;
}

.addBtn:hover {
  background-color: red;
}
/*    #######table-styling######        */
table{
    width: 30%;
    margin: 15px 310px;
    border-radius: 10px;
}

tr{
    border: 1px solid #fff;
    
}
th{
     border: 1px solid #fff;
    font-size: 20px;
    
}
th,td{

    border:none;
    height: 30px;
    padding: 2px;
}
.task{
    text-align: center;
    font-size: 20px;
}
.delete{
    text-align: center;                
}
.delete a{
    background: #a52a2a;
    padding: 2px 7px;
    text-decoration: none;
    color: #fff;
}


 </style>    
</head>
   <body>

<header>
  <img src="logogo.png" style="height:125px;overflow:hidden;width:100%;">

  <div class="navbar">
      <ul>
        <li><a href="home.php" class="a">Home</a></li>
        <li><a href="mydiary.php" class=" a">Diary</a></li>
        <li><a href="todo.php" class="active a">To Do List</a></li>
        <li><a href="myimages.php" class="a">My Image</a></li>
        
        <li><a href="feedback.php" class="a">Feedback</a></li>
        <li style="float: right;"><a href="includes/logout.inc.php" class="a">Logout</a></li>
      </ul>
    </div>
</header>
    <div class="header1" style="margin-left:23%;margin-right:20%;">
        <h2>My To-Do List</h2><br>
        <form method="post" action="todo.php">
            <input type="text" style="border-radius: 25px;" placeholder="Title..." name="task" required>
            <button class="addBtn" name="submit">Add</button>
        </form>
    </div>
    <table>
        <thead>
            <tr>
            <th>Task</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($record = mysqli_fetch_array($results)){?>
            <tr>
                <td class="task"><?php echo $record['task']; ?></td>
                <td class="delete"><a href="todo.php?del_task=<?php echo $record['task'];?>">x</a></td>
            </tr>
            <?php } ?>
        </tbody> 
    
    
    </table>
  </body>
</html>