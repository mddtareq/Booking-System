<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../js/ValidateRoomBooking.js"></script>
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

		<h1> Classroom List</h1>
                <table>
                    <tr>
                        <th>ROOM NO</th>
                        <th>ROOM TYPE</th>
                        <th>LOCATION</th>
                    </tr>
                    <?php
                    $roomList = getAllRoomList();
                    foreach ($roomList as $b){
                        $type = roomType($b['typeid']);
                        $location = roomLocation($b['annexid']);
                        ?>
                        <tr>
                            <td><?php echo $b['roomname'];?></td>
                            <td><?php echo $type['typename'];?></td>
                            <td><?php echo $location['name'];?></td>
                        </tr>
                    <?php }?>
                </table>

		<br><br>
	</center>

	<center><p>New ROOM</p>
                    <br><br>
                </span>
                <form action="../controller/AddRoom.php" onsubmit="return validateFormRoom()" method="post">

                    <p >Room Type</p>
                    <select id="roomtype" name="roomtype" >
                        <option value="select">SELECT</option>
                        <?php
                        $typeList = allRoomType();
                        foreach($typeList as $t) {?>
                                <option value="<?php echo $t['typename']?>"><?php echo $t['typename']?></option>
                            <?php }?>
                    </select><br>

                    <span  id="typeSpan"></span>
                    <br>

                    <p class="input100">Room Location</p>
                    <select id="roomlocation" name="roomlocation" >
                        <option value="select">SELECT</option>
                        <?php
                        $locationList = allRoomLocation();
                        foreach($locationList as $l) {?>
                            <option value="<?php echo $l['name']?>"><?php echo $l['name']?></option>
                        <?php }?>
                    </select>
                    <br>
                    <span  id="locationSpan"></span>
<br>
                    <div >
                        <input id="room" type="text" name="room" placeholder="Room" onkeyup="checkRoomName(this.value)"><br>
                        <span  id="roomSpan"></span>
                        <br>
                    </div>

                    <br><br>
                    <div  >
                        <button type ="submit" value="submit">
                            CONFIRM
                        </button>
                    </div>
                    <br><br>
                </form>
	</center>
	</body>
	</html>