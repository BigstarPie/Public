<?php 
include_once("./db.php");
session_start();
$id = $_SESSION["account"];
//part1 send welcome mail
///////////////////////////////
if($_POST["message"]=="welcome"){
$sCharset = "utf8";

//@ 要送給誰
$sMailTo = $_POST["email"];
//@ 誰送的
$sMailFrom = "z552283@gmail.com";
//@ 信件的主旨
$sSubject = "Welcome to Information Management Alumni System";
//@ 信件內容
$sMessage = "
<h1>尼豪阿</h1>
<strong>藍天藍 白雲白 天線寶寶說尼豪!</strong>
";

//@ 為了傳送 HTML 格式的 email, 我們需要設定 MIME 版本和 Content-type header 內容.
$sHeaders = "MIME-Version: 1.0\r\n" .
            "Content-type: text/html; charset=$sCharset\r\n" .
            "From: $sMailFrom\r\n";

//@ 傳送 email
if(mail($sMailTo, $sSubject, $sMessage, $sHeaders))
echo json_encode(array('state' => 'OK'));
else
echo json_encode(array('state' => 'ERROR'));

} //end part1
//part2 send mail when updating information 
///////////////////////////////
if($_POST["message"]=="updatemember"){
$sCharset = "utf8";

//@ 要送給誰
$sMailTo = $_POST["email"];
//@ 誰送的
$sMailFrom = "z552283@gmail.com";
//@ 信件的主旨
$sSubject = "Successfully updating your personal information";
//@ 信件內容
$sMessage = "
已成功修改資料

如果您沒有印象做過此事

請通知 b97705017@ntu.edu.tw

";

//@ 為了傳送 HTML 格式的 email, 我們需要設定 MIME 版本和 Content-type header 內容.
$sHeaders = "MIME-Version: 1.0\r\n" .
            "Content-type: text/html; charset=$sCharset\r\n" .
            "From: $sMailFrom\r\n";

//@ 傳送 email
if(mail($sMailTo, $sSubject, $sMessage, $sHeaders))
echo json_encode(array('state' => 'OK'));
else
echo json_encode(array('state' => 'ERROR'));
}//end part2


//part3 send subcribe mail
///////////////////////////////
if($_POST["message"]=="subscribe"){
$sCharset = "utf8";
$sql= "SELECT Id,Email FROM member WHERE StudentId = '".$id."'";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);
//@ 要送給誰
$sMailTo = $row["Email"];
//@ 誰送的
$sMailFrom = "z552283@gmail.com";
//@ 信件的主旨
$sSubject = "Thanks to subscribe this topic";
//@ 信件內容
$sMessage = "
恭喜您已成功訂閱!
";

//@ 為了傳送 HTML 格式的 email, 我們需要設定 MIME 版本和 Content-type header 內容.
$sHeaders = "MIME-Version: 1.0\r\n" .
            "Content-type: text/html; charset=$sCharset\r\n" .
            "From: $sMailFrom\r\n";

//@ 傳送 email
if(mail($sMailTo, $sSubject, $sMessage, $sHeaders)){
$sql= "INSERT INTO subscription (Id, Classify) VALUES ('".$row["Id"]."','".$_POST["classify"]."')";
$result = mysqli_query($link,$sql);
echo json_encode(array('state' => 'OK'));
}
else
echo json_encode(array('state' => 'ERROR'));

} //end part3


//part4 send when new article
///////////////////////////////
if($_POST["message"]=="newarticle"){
$sCharset = "utf8";
$sql= "SELECT Id FROM subscription WHERE Classify = '".$_POST["Classify"]."'";
//@ 要送給誰
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result)){
$sql2= "SELECT Email FROM member WHERE Id = '".$row["Id"]."'";
$result2 = mysqli_query($link,$sql2);
$row2 = mysqli_fetch_array($result2);
$sMailTo = $row2["Email"];
//@ 誰送的
$sMailFrom = "z552283@gmail.com";
//@ 信件的主旨
$sSubject = "Successfully updating your personal information";
//@ 信件內容
$sMessage = "
您訂閱的主題".$_POST["Classify"]." 已有新文章

歡迎前往參加討論!

";

//@ 為了傳送 HTML 格式的 email, 我們需要設定 MIME 版本和 Content-type header 內容.
$sHeaders = "MIME-Version: 1.0\r\n" .
            "Content-type: text/html; charset=$sCharset\r\n" .
            "From: $sMailFrom\r\n";

//@ 傳送 email
mail($sMailTo, $sSubject, $sMessage, $sHeaders);
}

}
//end part4

?>