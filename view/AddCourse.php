<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../js/ValidateAddBooking.js"></script>
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

	<center>

		<h1> Course List</h1>
                <table >
                    <tr>
                        <th>COURSE NAME</th>
                        <th>DEPARTMENT</th>
                    </tr>
                    <?php
                    $courseList = allCourseList();
                    foreach ($courseList as $b) {
                        $deptname = deptIdForCourse($b['deptid']);
                        ?>
                        <tr>
                            <td><?php echo $b['coursename'];?></td>
                            <td><?php echo $deptname['name'];?></td>
                        </tr>
                    <?php }?>
                </table>

		<br><br>
	</center>

	<center><p>New COURSE</p>
<form action="../controller/AddCourse.php" onsubmit="return validateFormCourse()" method="post" >

                        <input id = "coursename" type="text" name="coursename" placeholder="Course Name" onkeyup="checkCourseName(this.value)"><br>
                        <span id="courseSpan"></span>

                    <p>Department</p>
                    <select id="dept" name="department">
                        <option value="select">SELECT</option>
                        <?php
                        $dept = getDeptName();
                        foreach($dept as $d) {
                            if($d['name']!="ADMIN"){?>
                                <option value="<?php echo $d['name']?>"><?php echo $d['name']?></option>
                            <?php }}?>
                    </select>
                    <br>
                    <span id="deptSpan"></span>
                    <br>
                    <div >
                        <button type="submit" value="submit">
                            CONFIRM
                        </button>
                    </div>
                    <br><br>
                </form>
	</center>
	</body>
	</html>