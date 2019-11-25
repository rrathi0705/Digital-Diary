<?php
session_start();
include 'includes/dbh.inc.php';
 $user_uid=$_SESSION['u_uid'];

    $sql="SELECT * FROM users where user_uid='$user_uid'";
    $result = mysqli_query($conn,$sql);

    $record = mysqli_fetch_assoc($result);
  
if(isset($_POST['submit'])){
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    if(!preg_match('/^\d{10}$/',$phone)){
        header("Location: edit.php?lengthofphoneno=invalid");
        exit();
    } 
       $sqlii = "DELETE FROM profile WHERE user_uid='$user_uid'";
    mysqli_query($conn,$sqlii);
      $sqli = "INSERT INTO profile (user_uid,user_phone,user_dob) VALUES ('$user_uid','$phone','$dob');";
    mysqli_query($conn,$sqli);
     header("location: home.php?changes=success");
    exit();
}

?><html>
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
.fieldsetalign{
    border-radius: 5px; 
    margin-left: 25%;
    margin-right: 25%;
    border: 3.5px solid #4CAF50;
}
legend{
    font-size: 35px;
    padding: 7px;
    margin-left: 8px;
}
</style>

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
    <div>
        <fieldset class="fieldsetalign">
            <legend>Profile</legend>
        <form method="post" action="edit.php">
            <table class="tableset">
                        <thead>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo "
                            <tr>
                                <td><label for='fname'>First Name</label></td>
                                <td><input type='text' id='fname' name='fname' readonly value=
                                ".$record['user_first']."></td>
                            </tr>";?>
                            <?php echo "
                            <tr>
                                <td><label for='lname'>Last Name</label></td>
                                <td><input type='text' id='lname' name='lname' readonly value=
                                ".$record['user_last']."></td>
                            </tr>";?>
                            <?php echo "
                            <tr>
                                <td><label for='uname'>User Name</label></td>
                                <td><input type='text' id='uname' name='uname' readonly value=
                                ".$record['user_uid']."></td>
                            </tr>";?>
                           <?php echo "
                            <tr>
                                <td><label for='email'>Email-ID</label></td>
                                <td><input type='text' id='email' name='email' readonly value=
                                ".$record['user_email']."></td>
                            </tr>";?>
                             <tr>
                                <td><label for="dob">Birth Date</label></td>
                                <td><input type="date" id="dob" name="dob" ></td>
                            </tr>
                           <tr>
                                <td><label for="phone">Contact-No.</label></td>
                                <td><input type="text" id="phone" name="phone" placeholder="Contact-No." maxlength="10"></td>
                            </tr>
                            <tr>
                                <td><button type="submit" name="submit" style="margin :10px;height: 30px;width:100px;"><a>Save Changes</a></button></td>
                                <td><button type="submit" style="margin :10px;height: 30px;width:100px;"><a href="home.php">Cancel</a></button></td>
                            </tr>
                        </tbody>
                    </table>
        
        </form>
        </fieldset>
    </div>
    
</header>
</body>
</html>
