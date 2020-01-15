<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../js/ValidateBooking.js"></script>
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
    <br>
    <center>
        <span class="login100-form-title p-b-41">
                    New Bookings
                    <br><br>
                </span>
                <form  action="AddBookingsall.php" onsubmit="return validateBooking()" method="post">
                    <div>
                        <input class="input100" type="text" name="id"
                               value="<?php
                               $user = getUserInfo($_SESSION['userid']);
                               echo $user['userid']?>" readonly>
                    </div>
                    <br>
                    <div >
                        <input  type="date" name="date" id="selectDate">
                        <br>
                        <span class="stopp" id="dateSpan"></span>
                    </div>
                    <br>
                    <div >
                        <select id="classType"  name="classType" onchange="showTime(this)">
                            <option value="classType">Class Type</option>
                            <option value="lab">Lab (3 hrs)</option>
                            <option value="theory1">Theory (1.5hrs)</option>
                            <option value="theory2">Theory (2 hrs)</option>
                        </select>
                        <br>
                        <span id="classSpan"></span>
                    </div>
                    
                    <div >
                        <p >Class Time:</p>
                        <div id="th1" style="display: none">
                            <p>Theory (1.5 hrs)</p>
                            <input name="theo1[]" id = "th11" type="checkbox" value="8:00-9:30">8:00-9:30<br>
                            <input name="theo1[]" id = "th12" type="checkbox" value="9:30-11:00">9:30-11:00<br>
                            <input name="theo1[]" id = "th13" type="checkbox" value="11:00-12:30">11:00-12:30<br>
                            <input name="theo1[]" id = "th14" type="checkbox" value="12:30-2:00">12:30-2:00<br>
                            <input name="theo1[]" id = "th15" type="checkbox" value="2:00-3:30">2:00-3:30<br>
                            <input name="theo1[]" id = "th16" type="checkbox" value="3:30-5:00">3:30-5:00<br>
                        </div>
                        <div id="th2" style="display: none">
                            <p>Theory (2 hrs)</p>
                            <input name="theo2[]" id = "th21" type="checkbox" value="8:00-10:00">8:00-10:00<br>
                            <input name="theo2[]" id = "th22" type="checkbox" value="10:00-12:00">10:00-12:00<br>
                            <input name="theo2[]" id = "th23" type="checkbox" value="12:00-2:00">12:00-2:00<br>
                            <input name="theo2[]" id = "th24" type="checkbox" value="2:00-4:00">2:00-4:00<br>
                            <input name="theo2[]" id = "th25" type="checkbox" value="4:00-6:00">4:00-6:00<br>
                        </div>
                        <div id="lb" style="display: none">
                            <p>Lab (3 hrs)</p>
                            <input name="lab[]" id = "lb1" type="checkbox" value="8:00-11:00">8:00-11:00<br>
                            <input name="lab[]" id = "lb2" type="checkbox" value="11:00-2:00">11:00-2:00<br>
                            <input name="lab[]" id = "lb3" type="checkbox" value="2:00-5:00">2:00-5:00<br>
                        </div>
                        <br>
                        <span id="timeSpan"></span>
                    </div>
                    <div >
                        <select id="course" name="course">
                            <option value="course">Course Name</option>
                            <?php
                                $course = getCourse($_SESSION['userid']);
                                foreach ($course as $c){?>
                            <option value="<?php echo $c['coursename'];?>"><?php echo $c['coursename'];?></option>
                            <?php }?>
                        </select>
                        <br>
                        <span id="courseSpan"></span>
                    </div>
                    <br>
                <div  >
                    <button  type="submit" value="submit">
                        CONFIRM
                    </button>
                    <br><br>

</center>
</body>
</html>