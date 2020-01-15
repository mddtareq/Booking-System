<?php

function execute($query){
	$conn= mysqli_connect('localhost','root','','classbookingsystem');

		$result=mysqli_query($conn,$query);
		mysqli_close($conn);

		return $result;
}

?>