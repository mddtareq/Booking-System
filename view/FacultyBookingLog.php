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

<center>
     <?php
    $conn= mysqli_connect('localhost','root','','classbookingsystem');

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 5;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM booking";
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $statement="select * from booking LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($conn, $statement);

    if (mysqli_num_rows($res_data) > 0)
    {

        echo "<table>";
        ?>
        <tr>
            <th>User ID</th>
            <th>Course Name</th>
            <th>Room</th>
            <th>Time</th>
            <th>Status</th>
        </tr>
        <?php
        $addedby=$_SESSION['userid'];
        $bookList = getFacultyBookingDetailsPagination($addedby,$offset, $no_of_records_per_page);
        foreach ($bookList as $b){
            $roomName = getClassRoomNum($b['classid']);
            $courseName = getNameCourse($b['courseid']);
            $user = getUsername($b['userid']);
            ?>

            <tr>
            <td><?php echo $user['userid'];?></td>
            <td><?php echo $courseName['coursename']; ?></td>
            <td><?php echo $roomName['roomname']; ?></td>
            <td><?php echo $b['starttime']."-".$b['endtime']; ?></td>
            <td><?php
            if($b['status']==1){
                ?>
                    <p><b>Confirmed</b></p>
            <?php }else{?>
                <p>Cancelled</p>
                </tr>
            <?php }}
        echo "</table>";
        echo "</div>";

    }
    else
    {
        echo "Nothing found in db";
    }
    mysqli_close($conn);
    ?>
</center>

<center>
    
 <div>
        <div>
            <div >
                <nav >
                    
                        <li ><a  href="?pageno=1">First</a></li>
                        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                        </li>
                        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                            <a  href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                        </li>
                        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                    
                </nav>
            </div>
        </div>
    </div>


</center>

</body>
</html>