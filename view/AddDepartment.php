<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../js/ValidateDepartmentBooking.js"></script>
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

		<h1> Department List</h1>
                <table >
                    <tr>
                        <th>DEPARTMENT</th>
                    </tr>
                    <?php
                    $deptList = getDeptName();
                    foreach ($deptList as $b) {
                        if($b['name']!="ADMIN"){
                            ?>
                            <tr>
                                <td><?php echo $b['name'];?></td>
                            </tr>
                        <?php }}?>
                </table>
                </table>

		<br><br>
	</center>

	<center><p>New DEPARTMENT</p>
                    <br><br>
                </span>
                <form action="../Controller/AddDepartment.php" onsubmit="return validateFormDept()" method="post">

                    <div >
                        <input id="dept" type="text" name="department" placeholder="Department" onkeyup="checkDeptName(this.value)"><br>
                        <span id="deptSpan" ></span>
                        <br>
                    </div>

                    <br><br>
                    <div  >
                        <button  type ="submit" value="submit">
                            CONFIRM
                        </button>
                    </div>
                    <br><br>
                </form>
	</center>
	</body>
	</html>