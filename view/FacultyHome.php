<!DOCTYPE html>
<html>
<head>
	<title>CBC</title>
<center>
	<h1>Classroom Booking System</h1>
</center>
<center><div>
  <button><b><a href="FacultyHome.php">Home</a></b></button>
  <button><b><a href="FacultyNewBookings.php">Create Booking</a></b></button>
  <button><b><a href="FacultyCancelBooking.php">Cancel Booking</a></b></button>
  <button><b><a href="FacultyBookingLog.php">Booking Log</a></b></button>
  <button><b><a href="../controller/LogOut.php">LogOut</a></b></button>
</div>
</center>
<br>
<?php
session_start();
if(!isset($_SESSION['userid']))
{
    header("location:index.html");
}
?>
<?php
    include ("../controller/fetchList.php");
?>
</head>
<body>
	<center><p><b>Date/Time: <span id="datetime"></span></b></p>
	<script >
        var dt = new Date();
        document.getElementById("datetime").innerHTML = dt.toLocaleString();
    </script></center>
    <center>
		<p>
    <?php
    $user = getUserInfo($_SESSION['userid']);
    $typeid = $user['type'];
    $type = " ";
    if($typeid == 1){
        $type = "Admin";
    }else $type = "Faculty";
    echo "<h2>"."Logged in ".$user['name']." ( ".$type." )"."</h2>";
    ?>
    </p>
</center>

	<center>
		<h3>Today</h3>

        <?php
            $bookList = getFacultyBooking($_SESSION['userid']);
            date_default_timezone_set('Asia/Dhaka');
            $day = date("Y-m-d");

            foreach ($bookList as $b){
                $status = $b['status'];
                if($b['date']==$day && $status == 1){
                    $roomName = getClassRoomNum($b['classid']);
                    //echo $roomName['roomname']."==>".$b['starttime']."-".$b['endtime']."<br>";
                    echo "Room No:".$roomName['roomname']." Time: ".$b['starttime']."-".$b['endtime']."<br>";
                }
            }

        ?>
</center>
<br>
<center>
	<h3>Upcoming</h3>

        <?php
        $bookList = getFacultyBooking($_SESSION['userid']);
        date_default_timezone_set('Asia/Dhaka');
        $day = date("Y-m-d");

        foreach ($bookList as $b){
            $status = $b['status'];
            if($b['date']>$day && $status==1){
                $roomName = getClassRoomNum($b['classid']);
                echo "Room No:".$roomName['roomname']." Time: ".$b['starttime']."-".$b['endtime']." on ".$b['date']."<br>";
            }
        }

        ?>
</center>
</body>
</html>