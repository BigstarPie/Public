<?php
session_start ();

if (!isset ( $_SESSION ["account"] )) {
	echo ("fatal error~");
	header("Location:http://sdm.im.ntu.edu.tw/~Group1/");
}


$studentId = ""; 
$name = "";
$ename = "";
$nickname = "";
$gender = "";
$birthday = "";
$phone = "";
$education = "";
$work = "";
$intro = "";
$city ="";
if (isset ( $_SESSION ["account"] )) {
	$studentId = trim ( $_SESSION ["account"] );
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

if (isset ( $_POST ["phone"] )) {
	$phone = trim ( $_POST ["phone"] );
}
if (isset ( $_POST ["city"] )) {
	$city = trim ( $_POST ["city"] );
}
if (isset ( $_POST ["education"] )) {
	$education = trim ( $_POST ["education"] );
}
if (isset ( $_POST ["work"] )) {
	$work = trim ( $_POST ["work"] );
}

if (isset ( $_POST ["intro"] )) {
	$intro = trim ( $_POST ["intro"] );
}

$mysqli = new mysqli ( "sdm2.im.ntu.edu.tw", "Group1", "sdmg1", "group1" );

mysqli_query($mysqli,"set names'utf8'");
mysqli_query($mysqli,"set character_set_client=utf8");
mysqli_query($mysqli,"set character_set_results=utf8");

// query string
$query = "update Member set Name=?, EName=?, Nickname=?, Gender=?, Birthday=?, Phone=? , City=? ,Intro=?, Education=? ,Work=? where StudentId = ?";

// to get the prepare statement
$stmt = mysqli_prepare ( $mysqli, $query );

// to bind parameter
mysqli_stmt_bind_param ( $stmt, "sssssssssss", $name, $ename, $nickname, $gender, $birthday, $phone, $city, $intro,$education, $work,$studentId );

// to execute

if(mysqli_stmt_execute ( $stmt )){

echo json_encode(array("state" => "OK"));

}
else{
echo json_encode(array("state" => "ERROR"));
}
//回傳

?>