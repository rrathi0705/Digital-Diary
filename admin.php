<?php
	include 'includes/dbh.inc.php';
    $sql = "Select * from feedback";
    $result =mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="icon" type="image/gif/png" href="homelogo.png">
<style type="text/css">
	*{
		margin:0px;
		padding: 0px;
	}
	.feedbacktable{
		margin-left: 15%;
		margin-top: 2%;
	}
	table{
		border-collapse: collapse;
	}
</style>
</head>

<body>
	<img src="logogo.png" height="125px" width="100%">
    <div class="feedbacktable">       
		<table width="70%" border="1">
			<thead>
				<th width="3%">Sr.No</th>
				<th width="10%">Username</th>
				<th width="15%">Experience</th>
				<th>Comments</th>
			</thead>
			<tbody>
				<?php 
					$i=1;
					while($record=mysqli_fetch_assoc($result)){
               			echo "<tr><td>".$i."</td><td>".$record['user_uid']."</td><td>".$record['experience']."</td><td>".$record['comments']."</td></tr>";
               			$i++;
            		}
				?>
			</tbody>
		</table>
	</div> 
</body>
</html>