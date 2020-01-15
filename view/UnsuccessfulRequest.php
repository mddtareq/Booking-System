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
	<center><h3><font color="red"><b>Unsuccessfull Request.</b></font></h2>
	</center>
	<center>
	<?php if($_SESSION['userType']==1) {

                    echo '<button class="login100-form-btn">';
                    echo '<a href="AdminHome.php">Go Back</a>';
                    echo '</button>';
                }else if($_SESSION['userType']==2){
                    echo '<button class="login100-form-btn">';
                    echo '<a href="FacultyHome.php">Go Back</a>';
                    echo '</button>';
                }else{
                    echo '<button class="login100-form-btn">';
                    echo '<a href="Index.html">Go Back</a>';
                    echo '</button>';
                }?>
</center>

</body>
</html>