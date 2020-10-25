<?php


?>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title>My images</title>
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
    .img{
        object-fit: cover;
        object-position: center;
        margin: 12px;
    }
    .imgfield{
        margin-left: 35%;
        margin-top: 10px;
        margin-bottom: 10px;
        color: blue;
    }
    .addimage{
        background-color: blue;
        color: #fff;
        width: 100px;
        cursor: pointer;
        padding: 3px;
    }
    
.active {
    background-color: green;
    color: white;
}

</style>
</head>

<body>

<header>
    <img src="logogo.png" style="height:20%;overflow:hidden;width:100%;">

    <div class="navbar">
    <ul>
        <li><a href="home.php" class="a">Home</a></li>
        <li><a href="mydiary.php" class=" a">Diary</a></li>
        <li><a href="todo.php" class="a">To-Do List</a></li>
        <li><a href="myimages.php" class="a active">My Image</a></li>
        
        <li><a href="feedback.php" class="a">Feedback</a></li>
        <li   style="float: right;"><a href="includes/logout.inc.php" class="a">Logout</a></li>
        </ul>
    </div>
    
</header>
 <form method="post" enctype="multipart/form-data" >
            <input type="file" name="image" class="imgfield">
            <button type="submit" name="submit" class="addimage">Add Image</button>
        </form>
<?php
    session_start();
    function imageResize($imageResourceId,$width,$height) {


    $targetWidth =310;
    $targetHeight =310;


    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);


    return $targetLayer;
}
   if(!isset($_SESSION['u_uid'])){
   header("Location: loginpage.php");
       exit();}
    if(isset($_POST['submit'])){
       // session_start();
        if ($_FILES['image']['tmp_name']) {
            // // echo $_FILES['image']['tmp_name'];
            // echo $_FILES['image']['name'];
            $name = addslashes($_FILES['image']['name']);
            // //$image = resize_image($name,300,300);
            // echo dirname($_FILES['image']['tmp_name']);
            // //echo file_get_contents(addslashes($_FILES['image']['tmp_name']));
            // //$image =base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
            // //saveimage($name,$image);
            $file = $_FILES['image']['tmp_name']; 
        $sourceProperties = getimagesize($file);
        $fileNewName = time();
        $folderPath = "upload";
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];


        switch ($imageType) {



            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
                $image_name=$folderPath. $fileNewName. "_thump.". $ext;
                break;
            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagegif($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
                $image_name=$folderPath. $fileNewName. "_thump.". $ext;
                break;


            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
                $image_name=$folderPath. $fileNewName. "_thump.". $ext;
                break;


            default:
                echo "Invalid Image type.";
                exit;
                break;
        }
        // echo $targetLayer;
            // $image =base64_encode(file_get_contents(addslashes([$targetLayer]['tmp_name'])));
            saveimage($name,$image_name);
        }else{
            echo "<script>alert('Choose the image');</script>";
        }
    }
    function saveimage($name,$image_name){
        //include 'includes/dbh.inc.php';
                $conn = mysqli_connect("localhost","root","","diary");

            $user_uid=$_SESSION['u_uid'];

        $sqli="SELECT * FROM images where user_uid='$user_uid'";
        $result =mysqli_query($conn,$sqli);
            $sql = "INSERT INTO images(user_uid,image,name) VALUES('$user_uid','$image_name','$name')";
            $query = mysqli_query($conn,$sql);
            if(!$query){
                echo "Not Uploaded";
            }
            
    }
    display();
 function display(){
        //include 'includes/dbh.inc.php';
      $conn = mysqli_connect("localhost","root","","diary");
        $user_uid=$_SESSION['u_uid'];
        $sql =" SELECT * FROM images WHERE user_uid='$user_uid'";
       $query = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($query);
        for($i=0;$i<$num;$i++){
            $result = mysqli_fetch_array($query);
            $img = $result['image'];
            echo '<img class="img" src='.$result["image"].'>';
        }
    }       
    ?>
	
</body>
</html>








