
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../js/ValidateCancelBooking.js"></script>
	<title>CBC</title>
<center>
	<h1>Classroom Booking System</h1>
</center>

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
<?php
if($_SESSION['userType']==1){?>
 <center>
    <div>
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

<?php } ?>
<?php
if($_SESSION['userType']==2){?>
<center><div>
  <button><b><a href="FacultyHome.php">Home</a></b></button>
  <button><b><a href="FacultyNewBookings.php">Create Booking</a></b></button>
  <button><b><a href="FacultyCancelBooking.php">Cancel Booking</a></b></button>
  <button><b><a href="FacultyBookingLog.php">Booking Log</a></b></button>
  <button><b><a href="../controller/LogOut.php">LogOut</a></b></button>
</div>
</center>
<br>
<?php }?>

</head>
<body>
	<center><p><b>Date/Time: <span id="datetime"></span></b></p>
	<script >
        var dt = new Date();
        document.getElementById("datetime").innerHTML = dt.toLocaleString();
    </script></center>
    <br>
    <center><p> <h2>Cancel Bookings Details</h2></p>
<br></center>

<center>
   <form action="../controller/CancelBookingConfirm.php" onsubmit="return cancelValidate()" method="post">
                    <?php
                    if($_SERVER["REQUEST_METHOD"]=="POST"){

                        $bookId = $_POST['bookId'];
                        $bookDetails = getBook($bookId);
                        $courseName = getNameCourse($bookDetails['courseid']);
                        $roomName = getClassRoomNum($bookDetails['classid']);
                        $userName = getUsername($bookDetails['userid']);

                        ?>
                        <input  type="text" name="id" value ="<?php echo "Faculty Username:".$userName['userid']; ?> " readonly><br><br>
                        <input  type="text" name="booking"  value ="<?php echo $bookDetails['id']; ?> " readonly><br><br>
                        <input  type="text" name="date" value ="<?php echo "Date: ".$bookDetails['date']; ?> " readonly><br><br>
                        <input  type="text" name="coursename" value ="<?php echo "Course Name: ".$courseName['coursename'];?>" readonly><br><br>
                        <input  type="text" name="coursetime" value = "<?php echo "Time: ".$bookDetails['starttime']."-".$bookDetails['endtime'];?>" readonly><br><br>
                        <input  type="text" name="Roomnumber" value ="<?php echo "Room No: ".$roomName['roomname']; ?>" readonly><br><br>
                        <textarea  id="reason" type="text" name="reason" placeholder="Reason" rows="2" cols="10"></textarea><br>
                        <span  id="reasonSpan"></span><br>
                            <button  type="submit" value="submit">
                                CANCEL
                            </button>
                        <br>
                    <?php
                }
                ?>
                </form>

</center>
</body>
</html>