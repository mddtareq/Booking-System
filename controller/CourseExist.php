<?php

require_once('../model/connect.php') ;
require_once('../model/query.php');

$course = "";
if(isset($_REQUEST['course'])){
 $course = htmlentities(trim($_REQUEST['course']), ENT_QUOTES);
}

if(!empty($course))
{
    if(!isUniqueCourse($course)){

        echo "Course Exists!";
    }

}

?>