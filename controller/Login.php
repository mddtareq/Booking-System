
<?php

require_once('../model/Connect.php') ;
require_once('../model/Query.php');

if($_SERVER['REQUEST_METHOD']=="POST")
{
    session_start();
    $userid=($_POST['id']);
    $password=md5(($_POST['password']));

    if (teacherCheck($userid,$password)) {
        $_SESSION['userid']=$userid;

        $res=getUserType($userid,$password);
        $type=$res['type'];
        $status=$res['status'];
        $_SESSION['userType']=$type;

    if($type==1){
        header('Location:../view/AdminHome.php');
    }
    else{
        if($status){
            header('Location:../view/FacultyHome.php');

        }
    
    else{
        header('Location:../view/RegistrationPending.html');
    }}

}
else{
    header('Location:../view/InvalidUser.html');
}
}
?>