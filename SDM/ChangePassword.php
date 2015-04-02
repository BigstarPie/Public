<?php
if (! isset ( $_SESSION ["account"] )) {
	
	echo ("fatal error~");
	return;
}

$studentId = $_SESSION ["account"];

$oldPassword = "";

$newPassword = "";

$newPassword2 = "";

if (isset ( $_POST ["oldPassword"] )) {
	$oldPassword = trim ( $_POST ["oldPassword"] );
}
if (isset ( $_POST ["newPassword"] )) {
	$newPassword = trim ( $_POST ["newPassword"] );
}
if (isset ( $_POST ["newPassword2"] )) {
	$newPassword2 = trim ( $_POST ["newPassword2"] );
}

if ($newPassword != $newPassword2) {
	echo "1"; //newPassword doesn't correspond to newPassword2.
	return;
}

if ($newPassword == "") {
	
	echo "2";//newPassword has nothing.
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
		
		echo "3"; // the old password the user key in is not correct.
		
		return;
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

echo "0";

// Todo:send an email to provide the url for confriming this password change.
// $url = "http://sdm.im.ntu.edu.tw/~Group1/ConfirmPasswordChange?q=".$randomKey;
// $email

?>