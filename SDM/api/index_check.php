<?php
session_start();

if ($_SESSION ['account'] != "") {
	
echo json_encode(array("state" => "OK"));
}

?>