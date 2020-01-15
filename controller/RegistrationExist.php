<?php

require_once('../model/connect.php') ;
require_once('../model/query.php');

if(isset($_REQUEST['email'])) {
	$email = ($_REQUEST['email']);
}
if(isset($_REQUEST['id'])) {
	$id =($_REQUEST['id']);
}

if(!empty($email))
{
    if(!isUniqueEmail($email)){

        echo "Email Exists!";
    }

}

if(!empty($id))
{
    if(!isUniqueId($id)){

        echo "User Exists!";
    }
}

?>