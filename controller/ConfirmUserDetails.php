<?php
require_once('../model/connect.php') ;
require_once('../model/query.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $userId = $_POST['userId'];

    if(confirmUser($userId)){

        header('Location:../view/AdminHome.php');

    }else {

        header("Location:../view/UnsuccessfulRequest.php");
    }

}

?>