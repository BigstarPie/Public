<?php
include_once './db.php';
session_start ();
if (!isset ( $_SESSION ["account"] )) {
	echo ("fatal error~");
	header("Location:http://sdm.im.ntu.edu.tw/~Group1/");
}
//$_POST["name"] ="楊";
//$_POST["nickname"]="";
//$_POST["education"]="台灣大學";
//$_POST["work"]="google";
mysqli_set_charset($link, "utf8");
if($_POST["key"] == "name"){
   
   $finalresult=array();
   $sql = "SELECT Id, Name,EName,Nickname,Gender, Education, Work FROM member WHERE Name LIKE '%".$_POST["value"]."%'";
   $result = mysqli_query($link,$sql);
   $i = 0;
   while($row = mysqli_fetch_array($result)){
    $finalresult[$i] = array("state" => "OK", "Name" => $row['Name'], "EName" => $row["EName"], "Gender" => $row["Gender"], "Education" => $row["Education"], "Work" => $row["Work"]);
    $i++;
    }
   echo json_encode($finalresult);
}

if($_POST["key"]=="nickname"){
   $finalresult=array();
   $sql = "SELECT Id, Name,EName,Nickname,Gender, Education, Work FROM member WHERE Nickname LIKE '%".$_POST["value"]."%'";
   $result = mysqli_query($link,$sql);
   $i = 0;
   while($row = mysqli_fetch_array($result)){
    $finalresult[$i] = array("state" => "OK","Name" => $row['Name'], "EName" => $row["EName"], "Gender" => $row["Gender"], "Education" => $row["Education"], "Work" => $row["Work"]);
    $i++;
    }
   echo json_encode($finalresult);
}

if($_POST["key"]=="education"){
  $finalresult=array();
   $sql = "SELECT Id, Name,EName,Nickname,Gender, Education, Work FROM member WHERE Education LIKE '%".$_POST["value"]."%'";
   $result = mysqli_query($link,$sql);
   $i = 0;
   while($row = mysqli_fetch_array($result)){
    $finalresult[$i] = array("state" => "OK","Name" => $row['Name'], "EName" => $row["EName"], "Gender" => $row["Gender"], "Education" => $row["Education"], "Work" => $row["Work"]);
    $i++;
    }
   echo json_encode($finalresult);
}



if($_POST["key"]=="work"){
  $finalresult=array();
   $sql = "SELECT Id, Name,EName,Nickname,Gender, Education, Work FROM member WHERE work LIKE '%".$_POST["value"]."%'";
   $result = mysqli_query($link,$sql);
   $i = 0;
   while($row = mysqli_fetch_array($result)){
    $finalresult[$i] = array("state" => "OK","Name" => $row['Name'], "EName" => $row["EName"], "Gender" => $row["Gender"], "Education" => $row["Education"], "Work" => $row["Work"]);
    $i++;
    }
   echo json_encode($finalresult);
}
?>