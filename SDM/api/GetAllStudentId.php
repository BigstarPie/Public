<?php
session_start ();

if (! isset ( $_SESSION ["account"] )) {
	
	echo ("fatal error~");
	return;
}




$studentId = "";

$mysqli = new mysqli ( "sdm2.im.ntu.edu.tw", "Group1", "sdmg1", "Group1" );
// query string
$query = "select StudentId from Member";

// to get the prepare statement
$stmt = mysqli_prepare ( $mysqli, $query );

// to execute
mysqli_stmt_execute ( $stmt );

// to store result
mysqli_stmt_store_result ( $stmt );

// to bind result
mysqli_stmt_bind_result ( $stmt, $studentId );

$result = array ();

$count = 0;

while ( mysqli_stmt_fetch ( $stmt ) ) {
	
	$result [$count] = $studentId;
	$count ++;
}

echo json_encode ( $result );

?>