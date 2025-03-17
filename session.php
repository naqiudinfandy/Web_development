<?php
include_once 'db.php';

session_start();

$sid = $_SESSION['staffid'];

$stmt = $conn->prepare("SELECT * FROM tbl_staffs_a188417_pt2 WHERE fld_staff_id = '$sid'");

$stmt->execute();

$readrow = $stmt->fetch(PDO::FETCH_ASSOC);
$sid = $readrow['fld_staff_id'];
$fname = $readrow['fld_staff_fname'];
$lname = $readrow['fld_staff_lname'];
$age = $readrow['fld_staff_age'];
$gender = $readrow['fld_staff_gender'];
$jobtype = $readrow['fld_staff_jobtype'];
$pos = $readrow['fld_staff_position'];
$pass = $readrow['fld_staff_pass'];

if ($sid == '') {
	header("location:login.php");
} else {
	header("");
}

?>