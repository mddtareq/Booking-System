<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../js/ValidateBooking.js"></script>
	<title>CBC</title>
<center>
	<h1>Classroom Booking System</h1>
</center>
<center><div>
  <button><b><a href="AdminHome.php">Home</a></b></button>
  <button><b><a href="AdminNewBookings.php">Create Booking</a></b></button>
  <button><b><a href="AdminCancelBooking.php">Cancel Booking</a></b></button>
  <button><b><a href="AdminBookingLog.php">Booking Log</a></b></button>
  <button><b><a href="AddRoom.php">Room Add</a></b></button>
  <button><b><a href="AddCourse.php">Course Add</a></b></button>
  <button><b><a href="AddDepartment.php">Department Add</a></b></button>
  <button><b><a href="../controller/LogOut.php">LogOut</a></b></button>
</div>
</center>
<br>
<?php
session_start();
if(!isset($_SESSION['userid']))
{
    header("location:Index.html");
}
?>
<?php
    include ("../controller/FetchList.php");
?>
</head>
<body>
	<center><p><b>Date/Time: <span id="datetime"></span></b></p>
	<script >
        var dt = new Date();
        document.getElementById("datetime").innerHTML = dt.toLocaleString();
    </script></center>
    <br>
    <center><p> <h2>Cancel Bookings</h2></p>
<br>


<div >
        <table >
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Course Name</th>
                <th>Room No</th>
            </tr>
            <?php
            $bookList = getAllBookingDetails();
            date_default_timezone_set('Asia/Dhaka');
            $day = date("Y-m-d");
            foreach ($bookList as $b){
                if($b['date']>=$day && $b['status']==1)
                {
                    $roomName = getClassRoomNum($b['classid']);
                    $courseName = getNameCourse($b['courseid']); ?>
                    <tr>
                        <td><?php echo $b['date'];?></td>
                        <td><?php echo $b['starttime']."-".$b['endtime'];?></td>
                        <td><?php echo $courseName['coursename'];?></td>
                        <td><?php echo $roomName['roomname']; ?></td>
                        <td>
                            <form action="CancelBookingDetails.php" method="POST">
                                <button  type="submit" value="<?php echo $b['id'];?>" name="bookId">
                                    CANCEL
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php }}?>
        </table>
    </div>

    </center>
</body>
</html>