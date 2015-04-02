<?php
$studentId = "";
$password = "";
$name = "";
$ename = "";
$nickname = "";
$gender = "";
$birthday = "";
$type = "";
$email = "";
$phone = "";
$edu = "";
$work = "";
$memo = "";

if (isset ( $_POST ["studentId"] )) {
	$studentId = trim ( $_POST ["studentId"] );
}
if (isset ( $_POST ["password"] )) {
	$password = md5(trim ( $_POST ["password"]) );
}
if (isset ( $_POST ["name"] )) {
	$name = trim ( $_POST ["name"] );
}
if (isset ( $_POST ["ename"] )) {
	$ename = trim ( $_POST ["ename"] );
}
if (isset ( $_POST ["nickname"] )) {
	$nickname = trim ( $_POST ["nickname"] );
}
if (isset ( $_POST ["gender"] )) {
	$gender = trim ( $_POST ["gender"] );
}
if (isset ( $_POST ["birthday"] )) {
	$birthday = trim ( $_POST ["birthday"] );
}
if (isset ( $_POST ["type"] )) {
	$type = trim ( $_POST ["type"] );
}
if (isset ( $_POST ["email"] )) {
	$email = trim ( $_POST ["email"] );
}
if (isset ( $_POST ["phone"] )) {
	$phone = trim ( $_POST ["phone"] );
}
if (isset ( $_POST ["edu"] )) {
	$edu = trim ( $_POST ["edu"] );
}
if (isset ( $_POST ["work"] )) {
	$work = trim ( $_POST ["work"] );
}
if (isset ( $_POST ["memo"] )) {
	$memo = trim ( $_POST ["memo"] );
}

$mysqli = new mysqli ( "sdm2.im.ntu.edu.tw", "Group1", "sdmg1", "Group1" );

mysqli_query($mysqli,"set names'utf8'");
mysqli_query($mysqli,"set character_set_client=utf8");
mysqli_query($mysqli,"set character_set_results=utf8");

// query string
$query = "insert into Member (StudentId,Password, Name, EName, Nickname, Gender, Birthday, Type, Email, Phone, Edu, Work, Memo) values (?,?,?,?,?,?,?,?,?,?,?,?,?)";

// to get the prepare statement
$stmt = mysqli_prepare ( $mysqli, $query );

// to bind parameter
mysqli_stmt_bind_param ( $stmt, "sssssssssssss", $studentId, $password, $name, $ename, $nickname, $gender, $birthday, $type, $email, $phone, $edu, $work, $memo );

// to execute
mysqli_stmt_execute ( $stmt );

?>