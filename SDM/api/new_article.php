<?php
    ob_start();
    include_once("db.php");
    if($link->connect_errno) {
        echo "Connect failed: %s\n".mysqli_connect_error();
        exit();
    }
    $aid = $_GET['aid'];
    //$author = $_SESSION['account'];
    $author = "R01725027";
    $topic = $_GET['topic']; 
    $content = $_GET['content'];
    $classify = $_GET['classify'];
    
    $query="INSERT INTO article (AID, Author, Topic, Content, Classify) VALUES (?, ?, ?, ?, ?)";  
    if ($stmt = $link->prepare($query)) {
        $stmt->bind_param("sssss",$aid,$author,$topic,$content,$classify);
        $stmt->execute();
    }
    
    echo "OK";
?> 