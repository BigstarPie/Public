<?php      
    
$cfgDB_HOST = "sdm2.im.ntu.edu.tw";
$cfgDB_USERNAME = "Group1";
$cfgDB_PASSWORD = "sdmg1";
$cfgDB_NAME = "group1";
$link = mysqli_connect($cfgDB_HOST, $cfgDB_USERNAME, $cfgDB_PASSWORD,$cfgDB_NAME )
        or die("Couldn't connect to server: ".mysqli_error());
?>

