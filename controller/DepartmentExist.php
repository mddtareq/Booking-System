<?php

require_once('../model/connect.php') ;
require_once('../model/query.php');

$dept = "";
if(isset($_REQUEST['dept'])) $dept = htmlentities(trim($_REQUEST['dept']), ENT_QUOTES);


if(!empty($dept))
{
    if(!isUniqueDept($dept)){

        echo "Department Exists!";
    }

}

?>