<!DOCTYPE html>
<html>
<head>
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
<?php include ("../controller/fetchList.php");?>
</head>
<body>
	<?php
session_start();
if(!isset($_SESSION['userid']))
{
    header("location:index.html");
}
?>
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
<br></br>
<center><h3>User Requests For Approval</h3></center><br>
<center>
	<?php



 $conn= mysqli_connect('localhost','root','','classbookingsystem');

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 3;
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
            <th>Full Name</th>
            <th>User ID</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php
        $userList=getUserRequestPagination($offset, $no_of_records_per_page);

                foreach ($userList as $b){?>

            <tr>
                <td><?php echo $b['name'];?></td>
                <td><?php echo $b['userid'];?></td>
                <td><?php echo $b['email']; ?></td>
                <td><?php echo $b['phone']; ?></td>
                <td>
                    <form action="../controller/ConfirmUserDetails.php" method="POST">
                        <button type="submit" value="<?php echo $b['id'];?>" name="userId">
                            CONFIRM
                        </button>
                    </form>
                </td>
                <td>
                    <form action="../controller/CancelUserDetails.php" method="POST">
                        <button  type="submit" value="<?php echo $b['id'];?>" name="userId">
                            CANCEL
                        </button>
                    </form>
                </td>
            </tr>
        <?php }
        echo "</table>";
    }
    else
    {
        echo "Nothing found in db";
    }
    mysqli_close($conn);
	?>
</center>
<br>
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