<?php
    include_once("./db.php");
    if ($link->connect_errno) {
        echo "Connect failed: %s\n".mysqli_connect_error();
        exit();
    }
    
    $f = array(); //array to contain result
    $classify = $_GET['classify'];
    $query="SELECT * FROM article WHERE Classify = ? ORDER BY time DESC";
    /*$res = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_assoc($res);
    var_dump($row);*/
    if ($stmt = $link->prepare($query)) {
        $stmt->bind_param("s",$classify);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($f[0],$f[1],$f[2],$f[3],$f[4],$f[5]);
    }
    
    $article = array();
    $i = 0;
    while($stmt->fetch()){
        $article[$i] = array('aid'=>$f[0],'author'=>$f[1],'topic'=>$f[2],'content'=>$f[3],'time'=>$f[4], 'classify'=>$f[5]);
        $i++;
        //$article[] = array('aid'=>$f[0],'author'=>$f[1],'topic'=>$f[2],'content'=>$f[3],'classify'=>$f[4]);
    }
    
    echo json_encode($article);
?>