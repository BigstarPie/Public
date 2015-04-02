<?php
    session_start();
    include_once("db.php");
    if ($mysqli->connect_errno) {
        echo "Connect failed: %s\n".mysqli_connect_error();
        exit();
    }
    
    $aid = $_GET['aid'];
    $uid = 'r01725027';
    $content = $_GET['comment'];
    
    $query="INSERT INTO comment (AID, UID, Content) VALUES (?, ?, ?)";  
    /*$res = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_assoc($res);
    var_dump($row);*/
    if ($stmt = $link->prepare($query)) {
        $stmt->bind_param("sss",$aid,$uid,$content);
        $stmt->execute();
    }
?>