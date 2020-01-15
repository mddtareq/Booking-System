<?php
require('../model/connect.php') ;
require('../model/query.php');

function getDeptName(){

    $dept = getDeptList();
    return $dept;
}
function getUserInfo($username){

    $user = getUser($username);
    return $user;
}
function getNameCourse($courseId){

    $courseName = getCourseName($courseId);

    return $courseName;
}
function getAllBookingDetails(){

    $bookList = getALLBooking();
    return $bookList;
}
function getBook($bookId){

    $bookDetails = getBookingDetails($bookId);

    return $bookDetails;
}
function getUserRequestPagination($offset, $no_of_records_per_page){

    $UserRequestPagination= getUserRequestPaginationModel($offset, $no_of_records_per_page);
    return $UserRequestPagination;
}
function getUsername($userId){

    $userName = getUsersName($userId);
    return $userName;
}
function getFacultyBooking($username){

    $user = getUserInfo($username);

    $userId = $user['id'];

    $bookList = getFacultyBookingInfo($userId);

    return $bookList;

}
function getClassRoomNum($classId){

    $roomName = getClassRoomName($classId);

    return $roomName;
}
function getCourse($username){

    $user = getUser($username);
    $deptId = $user['departmentid'];

    $courseList = getCourseList($deptId);

    return $courseList;

}
function getALLCourseName(){

    $course = getAllCourse();

    return $course;
}
function deptIdForCourse($dept){

    $deptname =getFacultyDept($dept);

    return $deptname;
}

function allCourseList()
{

    $courseList = getAllCourse();

    return $courseList;
}
function getAllRoomList(){

    $roomList = getAllRoom();

    return $roomList;
}

function roomType($typeId){

    $type = getRoomType($typeId);
    return $type;
}

function roomLocation($annexId){

    $location = getRoomLocation($annexId);
    return $location;
}
function allRoomType()
{
    $typeList = getAllRoomType();

    return $typeList;
}

function allRoomLocation(){

    $locationList = getAllRoomLocation();

    return $locationList;

}
function getAllBookingDetailsPagination($offset, $no_of_records_per_page)
{
    $bookingListPagination= getAllBookingDetailsPaginationModel($offset, $no_of_records_per_page);
    return $bookingListPagination;
}
function getFacultyBookingDetailsPagination($addedby,$offset, $no_of_records_per_page)
{
    $bookingListPagination= getFacultyBookingDetailsPaginationModel($addedby,$offset, $no_of_records_per_page);
    return $bookingListPagination;
}
?>