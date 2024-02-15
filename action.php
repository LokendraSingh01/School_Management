<?php
session_start();
include 'School.php';
$school = new School();
if(!empty($_GET['action']) && $_GET['action'] == 'logout') {
	session_unset();
	session_destroy();
	header("Location:index.php");
}

if(isset($_POST['student_add'])) {
	$school->addstudent();
}
if(isset($_POST['student_edit'])) {
	$school->studentEdit();
}

if(isset($_GET['roll_no'])){
	$school->deletestudent();
}
if(isset($_POST['studentfees_edit'])){
	$school->studentFeeUpdate();
}

if(isset($_POST['techer_add'])){
	$school->addtecher();
}

if(isset($_POST['techer_edit'])){
	$school->TecherEdit();
}


if(isset($_GET['teacher_id'])){
	$school->deleteTecher();
}

if(isset($_POST['Fees_Add'])){
	$school->addFee();
}

if(isset($_POST['Fees_edit'])){
	$school->FeesEdit();
}
if(isset($_GET['Fee_id'])){
	$school->deleteFees();
}