<!DOCTYPE html>
<html>
<head>
	<title>CBC</title>
	<?php
session_start();
if(!isset($_SESSION['userid']))
{
    header("location:Index.html");
}

?>
<center>
	<h1>Classroom Booking System</h1>
</center>
</head>
<body>
	<center><h3><font color="green"><b>Successfull Request.</b></font></h2>
	</center>
	<center>
	<?php if($_SESSION['userType']==1) {

                    echo '<button>';
                    echo '<a href="AdminHome.php">Go Back</a>';
                    echo '</button>';
                }else{
                    echo '<button>';
                    echo '<a href="FacultyHome.php">Go Back</a>';
                    echo '</button>';
                }?>
</center>

</body>
</html>