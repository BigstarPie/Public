<?php      
 
	include_once './db.php';

	if(isset($_GET["StudentId"])&&isset($_GET["password"])){
		$account = $_GET["StudentId"];
		$password = $_GET["password"];
	//	$password_hash=md5($password);
	    $sql = "SELECT StudentId,Password FROM member WHERE Password='".$password."' and StudentId='".$account."'";

	    $result = mysqli_query($link,$sql);
	    $num = mysqli_num_rows($result);
       
        //echo $result;
	}
	if(isset($_GET["Email"])&&isset($_GET["password"])){
        $account = $_GET["Email"];
        $password = $_GET["password"];
    //  $password_hash=md5($password);
        $sql = "SELECT Email,Password FROM member WHERE Password='".$password."' and Email='".$account."'";
   
        $result = mysqli_query($link,$sql);
        $num = mysqli_num_rows($result);
       
        //echo $result;
    }
     
	
	if($num==1){
		session_start();
		$_SESSION["account"] = $account;
       	
        echo json_encode(array('state' => 'OK','result' => $account));
	}else{
	     echo json_encode(array('state' => 'ERROR','result' => 'account or passord is not correct'));
	}

?>

