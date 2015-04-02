<?php
    include_once("./db.php");
    if($link->connect_errno) {
        echo "Connect failed: %s\n".mysqli_connect_error();
        exit();
    }
    $f = array();
    $aid = $_GET['aid'];
    $query="SELECT Time, UID, Content FROM comment WHERE AID=? ORDER BY Time ASC";  
    if ($stmt = $link->prepare($query)) {
        $stmt->bind_param("s",$aid);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($f[0],$f[1],$f[2]);
    }
    
    $article = array();
    $i = 0;
    while($stmt->fetch()){
        $message[$i] = array('time'=>$f[0],'uid'=>$f[1],'content'=>$f[2]);
        $i++;
    }
    
    echo json_encode($message);
?>