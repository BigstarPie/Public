<?php
$randomKey = "";

if (isset ( $_GET ["q"] )) {
	$randomKey = trim ( $_GET ["q"] );
}

$mysqli = new mysqli ( "sdm2.im.ntu.edu.tw", "Group1", "sdmg1", "Group1" );

mysqli_query ( $mysqli, "set names'utf8'" );
mysqli_query ( $mysqli, "set character_set_client=utf8" );
mysqli_query ( $mysqli, "set character_set_results=utf8" );

// to query the randomKey and get the studentId and new password.

$studentId = "";
$newPassword = "";
$validity = 1;

// query string
$query = "select StudentId , NewPassword,Validity from password_change_request where RandomKey = ?";

// to get the prepare statement
$stmt = mysqli_prepare ( $mysqli, $query );

// to bind parameters
mysqli_stmt_bind_param ( $stmt, "s", $randomKey );

// to execute
mysqli_stmt_execute ( $stmt );

// to store result
mysqli_stmt_store_result ( $stmt );

// to bind result
mysqli_stmt_bind_result ( $stmt, $studentId, $newPassword, $validity );

if (mysqli_stmt_fetch ( $stmt )) {
	
	if ($validity == 1) {
		
		// query string
		$query = "update Member set Password=? where StudentId = ?";
		
		// to get the prepare statement
		$stmt = mysqli_prepare ( $mysqli, $query );
		
		// to bind parameter
		mysqli_stmt_bind_param ( $stmt, "ss", $newPassword, $studentId );
		
		// to execute
		mysqli_stmt_execute ( $stmt );
		
		// to set the validity to 0
		// query string
		$query = "update password_change_request set Validity=0 where RandomKey = ?";
		
		// to get the prepare statement
		$stmt = mysqli_prepare ( $mysqli, $query );
		
		// to bind parameter
		mysqli_stmt_bind_param ( $stmt, "s", $randomKey );
		
		// to execute
		mysqli_stmt_execute ( $stmt );
		
		echo "0";
		
	} else {
		
		echo "1";
	}
} else {
	echo "2";
}

?>