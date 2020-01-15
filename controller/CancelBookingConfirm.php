<?php

require_once('../model/connect.php') ;
require_once('../model/query.php');
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $reason = $_POST['reason'];
    $bookingId = $_POST['booking'];
    $cancelledby = $_SESSION['userid'];
    if(cancelBookingStatus($bookingId, $reason, $cancelledby)){

        header('Location:../view/SuccessfulRequest.php');

    }else {

        header("Location:../view/UnsuccessfulRequest.php");
    }

}

?>