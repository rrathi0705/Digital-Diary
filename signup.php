<?php   
    session_start();
        $a=rand(1,50);
        $b=rand(1,50);
    $realanswer=0;
$realanswer=$a+$b;
$_SESSION["answer"]=$realanswer;

?>
<!DOCTYPE>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style1.css">
        
    </head>
    
    <body class="body">
            <img src="logogo.png" height="20%" width="100%">
            <div class="wrapper">
                <fieldset class="fieldsetalign"> 
                    <legend>SIGN UP</legend>
                <form action="includes/signup.inc.php" method="POST" autocomplete="off">
                    <table class="tableset">
                        <thead>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>                           
                            <tr>
                                <td><label for="fname">First Name</label><span><d style="color:red; margin-left:3px;">*</d></span></td>
                                <td><?php 
                                    if(isset($_GET['fname'])){
                                    $fname = $_GET['fname'];
                                    echo '<input type="text" id="fname" name="fname" placeholder="Firstname" value="'.$fname.'">';
                                    }
                                    else{
                                        echo ' <input type="text" id="fname" name="fname" placeholder="Firstname">';
                                    }
                                    ?>
                               </td>
                                <td><?php
                                    if(isset($_GET['signup'])){
                                        $signupcheck = $_GET['signup'];
                                        if($signupcheck=="firstname_empty"){
                                            echo "<p class='required'>Firstname Required</p>";
                                        }
                                    
                                    }
                                    
                                    ?></td>
                            </tr>
                            <tr>
                                <td><label for="lname">Last Name</label><span><d style="color:red; margin-left:3px;">*</d></span></td>
                                  <td><?php 
                                    if(isset($_GET['lname'])){
                                    $lname = $_GET['lname'];
                                    echo '<input type="text" id="lname" name="lname" placeholder="Lastname" value="'.$lname.'">';
                                    }
                                    else{
                                        echo ' <input type="text" id="lname" name="lname" placeholder="Lastname">';
                                    }
                                    ?>
                               </td>
                                <td><?php
                                    if(isset($_GET['signup'])){
                                        $signupcheck = $_GET['signup'];
                                        if($signupcheck=="lastname_empty"){
                                            echo "<p class='required'>Lastname Required</p>";
                                        }
                                    }
                                    
                                    ?></td>
                            <tr>
                                <td><label for="Uname">User Name</label><span><d style="color:red; margin-left:3px;">*</d></span></td>
                                  <td><?php 
                                    if(isset($_GET['uid'])){
                                    $uid = $_GET['uid'];
                                    echo '<input type="text" id="Uname" name="uid" placeholder="Username" value="'.$uid.'">';
                                    }
                                    else{
                                        echo ' <input type="text" id="Uname" name="uid" placeholder="Username">';
                                    }
                                    ?>
                               </td>
                                <td><?php
                                    if(isset($_GET['signup'])){
                                        $signupcheck = $_GET['signup'];
                                        if($signupcheck=="username_empty"){
                                            echo "<p class='required'>Username Required</p>";
                                        }
                                    
                                    }
                                    
                                    ?></td>
                            </tr>
                            <tr>
                                <td><label for="email">Email-ID</label><span><d style="color:red; margin-left:3px;">*</d></span></td>
                                  <td><?php 
                                    if(isset($_GET['email'])){
                                    $email = $_GET['email'];
                                    echo '<input type="text" id="email" name="email" placeholder="Email-ID" value="'.$email.'">';
                                    }
                                    else{
                                        echo ' <input type="text" id="email" name="email" placeholder="Email-ID">';
                                    }
                                    ?>
                               </td>
                                <td><?php
                                    if(isset($_GET['signup'])){
                                        $signupcheck = $_GET['signup'];
                                        if($signupcheck=="email_empty"){
                                            echo "<p class='required'>Email-ID Required</p>";
                                        }
                                    
                                    }
                                    
                                    ?></td>
                            </tr>
                            <tr>
                                <td><label for="pwd">Password</label><span><d style="color:red; margin-left:3px;">*</d></span></td>
                                  <td><?php 
                                    if(isset($_GET['pwd'])){
                                    $fname = $_GET['pwd'];
                                    echo '<input type="text" id="pwd" name="pwd" placeholder="Password" value="'.$pwd.'">';
                                    }
                                    else{
                                        echo ' <input type="password" id="pwd" name="pwd" placeholder="Password">';
                                    }
                                    ?>
                               </td>
                                <td><?php
                                    if(isset($_GET['signup'])){
                                        $signupcheck = $_GET['signup'];
                                        if($signupcheck=="password_empty"){
                                            echo "<p class='required' >Password Required</p>";
                                        }
                                    
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <td><label for="secCheck"><?php echo $a. " + " .$b ;?></label><span><d style="color:red; margin-left:3px;">*</d></span></td>
                                <td> <?php 
                                    if(isset($_GET['ans'])){
                                    $ans = $_GET['ans'];
                                    echo '<input type="text" id="secCheck" name="ans" placeholder="Answer" value="'.$ans.'">';
                                    }
                                    else{
                                        echo ' <input type="text" id="secCheck" name="ans" placeholder="Answer">';
                                    }
                                    ?>
                               </td>
                                <td><?php
                                    if(isset($_GET['signup'])){
                                        $signupcheck = $_GET['signup'];
                                        if($signupcheck=="answer_empty"){
                                            echo "<p class='required'>Answer Required</p>";
                                        }
                                    
                                    }
                                    
                                    ?></td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td><button type="submit" name="submit" style="width:100px;">Submit</button></td>
                                <td><button type="submit" name="submit0" style="width:100px;"><a href="loginpage.php" style="color: #fff; text-decoration: none;">Login</a></button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                </fieldset>
        </div>
    
    </body>
</html>