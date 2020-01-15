<?php

require_once('../model/Connect.php') ;
require_once('../model/Query.php');

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $name=($_POST['name']);
    $userid=($_POST['id']);
    $phone=($_POST['phone']);
    $email=($_POST['email']);
    $password=md5(($_POST['password']));
    $department=($_POST['department']);
    $result=getDepartmentId($department);
    $departmentid=$result['id'];


    
   if(addUser($userid, $name, $email, $phone, $password, $departmentid)){

        header('Location:../view/RegistrationApproval.html');

    }else{

        header('Location:../view/UnsuccessfulRequest.html');

    }

    

}

?>