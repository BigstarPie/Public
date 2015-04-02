<?php
session_start();
include_once './db.php';
if (!isset ( $_SESSION ["account"] )) {
	
	//echo ("fatal error~");
	header("http://140.112.107.18/group1/group1/index.php");
	return;
}

$studentId = $_SESSION ["account"];

$oldPassword = "";

$newPassword = "";

$newPassword2 = "";

if (isset ( $_GET ["oldPassword"] )) {
	$oldPassword = trim ( $_GET ["oldPassword"] );
}
if (isset ( $_GET ["newPassword"] )) {
	$newPassword = trim ( $_GET ["newPassword"] );
}
if (isset ( $_GET ["newPassword2"] )) {
	$newPassword2 = trim ( $_GET ["newPassword2"] );
}

if ($newPassword != $newPassword2) {
	echo json_encode(array('state' => 'ERROR')); //newPassword doesn't correspond to newPassword2.
	return;
}

if ($newPassword == "") {
	
	echo json_encode(array('state' => 'ERROR'));//newPassword has nothing.
return;
}

// to generate a random key (eg:BqyZtc5BDA)
$keyTokens = array (
		"A",
		"B",
		"C",
		"D",
		"E",
		"F",
		"G",
		"H",
		"I",
		"J",
		"K",
		"L",
		"M",
		"N",
		"O",
		"P",
		"Q",
		"R",
		"S",
		"T",
		"U",
		"V",
		"W",
		"X",
		"Y",
		"Z",
		"a",
		"b",
		"c",
		"d",
		"e",
		"f",
		"g",
		"h",
		"i",
		"j",
		"k",
		"l",
		"m",
		"n",
		"o",
		"p",
		"q",
		"r",
		"s",
		"t",
		"u",
		"v",
		"w",
		"x",
		"y",
		"z",
		"1",
		"2",
		"3",
		"4",
		"5",
		"6",
		"7",
		"8",
		"9",
		"0" 
);

$randomKey = "";

for($i = 0; $i < 10; $i ++) {
	$randomKey = $randomKey . $keyTokens [rand ( 0, 61 )];
}

$mysqli = new mysqli ( "sdm2.im.ntu.edu.tw", "Group1", "sdmg1", "Group1" );

mysqli_query ( $mysqli, "set names'utf8'" );
mysqli_query ( $mysqli, "set character_set_client=utf8" );
mysqli_query ( $mysqli, "set character_set_results=utf8" );

// Get the real old password to check and the email.

$realOldPassword = "";

$email = "";

// query string
$query = "select Password, Email from Member where StudentId = ?";

// to get the prepare statement
$stmt = mysqli_prepare ( $mysqli, $query );

// to bind parameters
mysqli_stmt_bind_param ( $stmt, "s", $studentId );

// to execute
mysqli_stmt_execute ( $stmt );

// to store result
mysqli_stmt_store_result ( $stmt );

// to bind result
mysqli_stmt_bind_result ( $stmt, $realOldPassword, $email );

if (mysqli_stmt_fetch ( $stmt )) {
	
	if ($realOldPassword != $oldPassword) {
		
		echo json_encode(array('state' => 'ERROR')); // the old password the user key in is not correct.
		
		
	}
}

// to record the randomKey and new Password.

// query string
$query = "insert into password_change_request (RandomKey,StudentId,NewPassword,Validity) values (?,?,?,1)";

// to get the prepare statement
$stmt = mysqli_prepare ( $mysqli, $query );

// to bind parameter
mysqli_stmt_bind_param ( $stmt, "sss", $randomKey, $studentId, $newPassword );

// to execute
mysqli_stmt_execute ( $stmt );



// Todo:send an email to provide the url for confriming this password change.
// $url = "http://sdm.im.ntu.edu.tw/~Group1/ConfirmPasswordChange?q=".$randomKey;
// $email
$sql = "SELECT Email FROM member WHERE StudentId = '".$studentId."'";

$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);
$sCharset = "utf8";
//@ 要送給誰
$sMailTo = $row["Email"];
//@ 誰送的
$sMailFrom = "z552283@gmail.com";
//@ 信件的主旨
$sSubject = "Confirm changing password";
//@ 信件內容
$sMessage = "
click link to change password!
http://sdm.im.ntu.edu.tw/~Group1/ConfirmPasswordChange?q=".$randomKey."";

//@ 為了傳送 HTML 格式的 email, 我們需要設定 MIME 版本和 Content-type header 內容.
$sHeaders = "MIME-Version: 1.0\r\n" .
            "Content-type: text/html; charset=$sCharset\r\n" .
            "From: $sMailFrom\r\n";
//@ 傳送 email
if(mail($sMailTo, $sSubject, $sMessage, $sHeaders))
echo json_encode(array('state' => 'OK'));
else
echo json_encode(array('state' => 'ERROR'));

?>