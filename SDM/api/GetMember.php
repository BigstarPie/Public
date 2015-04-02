<?php

session_start ();

if (! isset ( $_SESSION ["account"] )) {
	
	echo ("fatal error~");
	return;
}

    include_once("db.php");
$name = "";
$ename = "";
$nickname = "";
$gender = "";
$phone="";
$birthday = "";
$city= "";
$education = "";
$email = "";
$work = "";
$intro = "";
$studentId= $_SESSION ["account"] ;
$f = array();
$mysqli = new mysqli ( "sdm2.im.ntu.edu.tw", "Group1", "sdmg1", "Group1" );
$studentId= "r01725039";
mysqli_query ( $link, "set names'utf8'" );
mysqli_query ( $link, "set character_set_client=utf8" );
mysqli_query ( $link, "set character_set_results=utf8" );

// query string
$query = "select Name, EName, Nickname, Gender, Birthday,Education,Work,Intro, Email,Phone,City from member where StudentId = ? ";

// to get the prepare statement
	if($stmt = $link->prepare($query)){
		$stmt->bind_param("s",$_SESSION ["account"]);// to bind parameters
		$stmt->execute();// to execute
		$stmt->store_result();
        $stmt->bind_result($f[0],$f[1],$f[2],$f[3],$f[4],$f[5],$f[6],$f[7],$f[8],$f[9],$f[10]);
    }
		$i=0;
		while($stmt->fetch()){
        $message[$i] = array('name'=>$f[0],'ename'=>$f[1],'nickname'=>$f[2],'gender'=>$f[3],'birthday'=>$f[4],'education'=>$f[5],'work'=>$f[6],'intro'=>$f[7],'email'=>$f[8],'phone'=>$f[9],'city'=>$f[10]);

    }
      


    echo json_encode($message);


?>