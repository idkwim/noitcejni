<?php
session_start();

header("Content-Type: text/html; charset=UTF-8");

if(!$_SESSION['user_session'] ){
	header('location:./../main.php');
	exit(1);
}

if($_SESSION['user_session']){
	header('location:./../main.php');
	exit(1);
}

if(!preg_match("/".$_SERVER['HTTP_HOST']."/",$_SERVER['HTTP_REFERER'])) {
	header("location:./../index/join.php");
	exit();
}

include("./../include/database_message.php");

$stmt=$dbh->prepare("INSERT INTO messagebox (sender,receiver,message) VALUES (:sender, :receiver, :message )");


$stmt->bindParam(':sender',$sender);
$stmt->bindParam(':receiver',$receiver);
$stmt->bindParam(':message',$message);

$sender=htmlspecialchars($_SESSION['user_session']);
$receiver=htmlspecialchars($_POST['receiver']);
$message=htmlspecialchars($_POST['message']);

if( $sender===null or $receiver===null or $message===null or  strlen($sender) > 20 or strlen($receiver) > 20 or strlen($message)>45 )  {

       header("location:./../index/contact.php?no=yes");
       exit(1);

}

$stmt->execute();
header("Location:./../index/send.php");
exit();

?>
