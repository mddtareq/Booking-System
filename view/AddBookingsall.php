<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../js/ValidateBooking.js"></script>
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
    include ("../controller/AddBooking.php");
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

<header>
</header>
<body>
    <center><p><b>Date/Time: <span id="datetime"></span></b></p>
    <script >
        var dt = new Date();
        document.getElementById("datetime").innerHTML = dt.toLocaleString();
    </script></center>
    <br>
<center>
                    New Bookings
                    <br><br>
                <form action="../controller/ConfirmBooking.php" onsubmit="return validateCheckRoom()" method="post">

                        <p>Username: </p>
                        <input  type="text" name="id"
                               value="<?php echo $username;?>" readonly>

                        <p>Date: </p>
                        <input type="text" name="date"
                               value="<?php echo $day;?>" readonly>

                        <p style="font-size: 18px">Class Type: </p>
                        <input class="input100" type="text" name = "classType" value="<?php
                            if($class=="lab"){
                                echo "Lab";
                            }else{
                                echo "Theory";
                            }
                        ?>" readonly>
                        <p >Class Time: </p>
                            <?php
                            for($i = 0; $i < count($startTime); $i++)
                            {
                                echo $startTime[$i]."-".$endTime[$i];?>
                                <br><?php
                            }
                            $_SESSION['startTime']=$startTime;
                            $_SESSION['endTime']=$endTime;
                            ?>

                        <p>Course Name: </p>
                        <input type="text" name="course"
                               value="<?php echo $course;?>" readonly>
                        <p >Available Room: </p>
                        <?php

                        if(!empty($availableRoom)) {

                            for ($i = 0; $i < count($availableRoom); $i++) {
                                ?>
                                <input id="classcheck"type="radio" name="classcheck"
                                       value="<?php echo $availableRoom[$i]; ?>"><?php echo $availableRoom[$i]; ?><br>
                            <?php }

                        }else{
                            echo "<p>Sorry! No Class Available</p>";
                        }
                        ?>
                        <span id="roomNumSpan"></span><br>
                        <button type="submit" value="submit">
                            CONFIRM
                        </button>
                        <button >
                            <?php if($_SESSION['userType']==1){?>
                            <a href="../view/AdminNewBookings.php">Go Back!</a>
                            <?php }else{?>
                            <a href="../view/FacultyNewBookings.php">Go Back!</a>
                            <?php }?>
                        </button>
                        <br><br>
                </form>
                </center>
            
</body>

</html>