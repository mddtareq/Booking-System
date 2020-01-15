<?php

require_once('../model/connect.php') ;
require_once('../model/query.php');

$theory1 = $theory2 = $lab = $course = $class = $username = " ";
$startTime = $endTime = $time = array();
$cnt = 0;
date_default_timezone_set('Asia/Dhaka');
$classList = array();
$availableRoom = array();
if($_SERVER['REQUEST_METHOD']=="POST"){

    if(isset($_POST['theo1'])){

        $theory1 = $_POST['theo1'];

    }else if(isset($_POST['theo2'])){

        $theory2 = $_POST['theo2'];

    }else if(isset($_POST['lab'])){

        $lab = $_POST['lab'];
    }

    $course = $_POST['course'];
    $username = $_POST['id'];
    $class = $_POST['classType'];
    $day =$_POST['date'];

    if($class == "lab"){

        $startTime = $endTime = $classList = $roomList = $availableRoom = array();
        foreach ($lab as $i){

            $time = explode("-",$i);
            $startTime[$cnt] = $time[0];
            $endTime[$cnt] = $time[1];
            $cnt++;

        }

        for($i = 0; $i< $cnt ; $i++){

            $result = checkClassRoom($day, $startTime[$i], $endTime[$i]);

            if(!empty($result))
                $classList[$i] = $result['classid'];

        }
        $classListLastIndex = count($classList);

        for($i = 0; $i< $cnt ; $i ++){

            $result = checkStartTime($day, $startTime[$i]);
            if(!empty($result)){

                foreach ($result as $r){

                    $classList[$classListLastIndex] =$r['classid'];
                    $classListLastIndex++;
                }
            }

        }

        $test = getClassRoom(2);

        $i = 0;
        foreach ($test as $t){

            $roomList[$i] = $t['id'];
            $i++;
        }

        for ($i =0; $i<count($classList); $i++){

            for($j = 0 ; $j< count($roomList); $j++){

                if($classList[$i]==$roomList[$j]){
                    $roomList[$j] = 0;
                }
            }
        }

        $i = 0;
        foreach ($test as $t){

            for($j = 0 ; $j< count($roomList); $j++){

                if($t['id']==$roomList[$j]){

                    $availableRoom[$i]=$t['roomname'];
                    $i++;
                }
            }

        }


    }else if($class == "theory1"){

        $startTime = $endTime = $classList = $roomList = $availableRoom = array();
        foreach ($theory1 as $i){

            $time = explode("-",$i);
            $startTime[$cnt] = $time[0];
            $endTime[$cnt] = $time[1];
            $cnt++;

        }

        for($i = 0; $i< $cnt ; $i++){

            $result = checkClassRoom($day, $startTime[$i], $endTime[$i]);

            if(!empty($result))
            $classList[$i] = $result['classid'];

        }


        $classListLastIndex = count($classList);

        for($i = 0; $i< $cnt ; $i ++){

            $result = checkStartTime($day, $startTime[$i]);
            if(!empty($result)){

                foreach ($result as $r){

                    $classList[$classListLastIndex] =$r['classid'];
                    $classListLastIndex++;
                }
            }

        }


        $test = getClassRoom(1);

        $i = 0;
        foreach ($test as $t){

            $roomList[$i] = $t['id'];
            $i++;
        }

        for ($i =0; $i<count($classList); $i++){

            for($j = 0 ; $j< count($roomList); $j++){

                if($classList[$i]==$roomList[$j]){
                    $roomList[$j] = 0;
                }
            }
        }

        $i = 0;
        foreach ($test as $t){

            for($j = 0 ; $j< count($roomList); $j++){

                if($t['id']==$roomList[$j]){

                    $availableRoom[$i]=$t['roomname'];
                    $i++;
                }
            }

        }


    }else{

        $startTime = $endTime = $classList = $roomList = $availableRoom = array();
        foreach ($theory2 as $i){

            $time = explode("-",$i);
            $startTime[$cnt] = $time[0];
            $endTime[$cnt] = $time[1];
            $cnt++;
        }

        for($i = 0; $i< $cnt ; $i++){

            $result = checkClassRoom($day, $startTime[$i], $endTime[$i]);

            if(!empty($result))
                $classList[$i] = $result['classid'];

        }


        $classListLastIndex = count($classList);

        for($i = 0; $i< $cnt ; $i ++){

            $result = checkStartTime($day, $startTime[$i]);


            if(!empty($result)){

                foreach ($result as $r){

                    $classList[$classListLastIndex] =$r['classid'];
                    $classListLastIndex++;
                }
            }

        }

        $test = getClassRoom(1);

        $i = 0;
        foreach ($test as $t){

            $roomList[$i] = $t['id'];
            $i++;
        }

        for ($i =0; $i<count($classList); $i++){

            for($j = 0 ; $j< count($roomList); $j++){

                if($classList[$i]==$roomList[$j]){
                    $roomList[$j] = 0;
                }
            }
        }

        $i = 0;
        foreach ($test as $t){

            for($j = 0 ; $j< count($roomList); $j++){

                if($t['id']==$roomList[$j]){

                    $availableRoom[$i]=$t['roomname'];
                    $i++;
                }
            }

        }


    }



}

?>
