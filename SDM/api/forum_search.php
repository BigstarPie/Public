<?php
include_once './db.php';
session_start ();
if (!isset ( $_SESSION ["account"] )) {
	echo ("fatal error~");
	header("Location:http://sdm.im.ntu.edu.tw/~Group1/");
}
//$_POST["author"] ="51";
if(isset($_POST["author"])){
   $finalresult=array();
   $sql = "SELECT Author,Topic,Content FROM article WHERE Author LIKE '%".$_POST["author"]."%'";
   $result = mysqli_query($link,$sql);
   $i = 0;
   while($row = mysqli_fetch_array($result)){
        $finalresult[$i]=array("Author" => $row["Author"], "Topic" => $row["Topic"], "Content" => $row["Content"]);
		$i++;
    }
   echo json_encode($finalresult);
}

if(isset($_POST["topic"])){
   $sql = "SELECT Author,Topic,Content FROM article WHERE Topic LIKE '%".$_POST["topic"]."%'";
   $result = mysqli_query($link,$sql);
   $i = 0;
   while($row = mysqli_fetch_array($result)){
        $finalresult[$i]=array("Author" => $row["Author"], "Topic" => $row["Topic"], "Content" => $row["Content"]);
		$i++;
    }
   echo json_encode($finalresult);
}

if(isset($_POST["content"])){
   $sql = "SELECT Author,Topic,Content FROM article WHERE Content LIKE '%".$_POST["content"]."%'";
   $result = mysqli_query($link,$sql);
   $i = 0;
   while($row = mysqli_fetch_array($result)){
        $finalresult[$i]=array("Author" => $row["Author"], "Topic" => $row["Topic"], "Content" => $row["Content"]);
		$i++;
    }
   echo json_encode($finalresult);
}

?>