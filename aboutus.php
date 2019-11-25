
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title>About Us</title>
<link rel="icon" type="image/gif/png" href="homelogo.png">
<style>
body {margin:0;}
.navbar {
    overflow: hidden;
    font-size:30px;
	background-color: none;
}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.active {
    background-color: green;
    color: white;
}

.navbar a:hover {
    background-color: black;
}

a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
	border-radius: 25px;
}
a:hover {
    background-color: #ddd;
}
.bgimg{
	background-image:url(back.jpg);
	}

.logout{
    border-radius: 25px;
    float: right;
    margin-top: 12px; 
    padding: 5px;
    background-color: black;
    color: #fff;
    border-color: black;
    cursor: pointer;
    }
    </style>
<script>
	
</script>


</head>

<body style="background-image:url(bg.jpg);background-size:100% 100%;">

<header>
	<img src="logogo.png" style="height:25%;overflow:hidden;width:100%;">

	<div class="navbar">
	
		<a href="home.php">Home</a>
        <a href="mydiary.php">Diary</a>
		<a href="todo.php">To Do List</a>
		<a href="myimages.php">My Image</a>
		<a href="faq.php">FAQ</a>
		<a href="feedback.php">Feedback</a>
		<a href="aboutus.php" class="active">About Us</a>
         <form action="includes/logout.inc.php" method="post">
            <button name="submit" class="logout">Log out</button>
        </form>
	</div>

</header>
<h1 align="center" pan style="color: #66c2ff"><i>About us</i></h1>
<h3 style="color:white;">The easiest and most efficient way to contact us is by email. If you have any questions about your subscription or how the site works simply visit our faqs section. </h3>

<h3 style="color:white;">If you have other concerns, questions or suggestions about MyDiary.com please send us an email at <span style="color: #66c2ff">MyDiary@gmail.com</span> We will do our very best to get back to you as soon as possible. </h3>

<h3 style="color:white;">Thank you for visiting our website!</h3>
<h3 style="color:white;">MyDiary.com Team</h3>
<h4 style="color:white">-Brijesh Kikani <span style="color: #66c2ff">(8469004121)</span></h4>
<h4 style="color:white">-Dhaval Bamba <span style="color: #66c2ff">(9104293329)</span></h4>
<h4 style="color:white">-Rishabh Rathi <span style="color: #66c2ff">(9574770430)</span></h4>

	
</body>
</html>
