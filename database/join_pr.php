<?php
header("Content-Type: text/html; charset=UTF-8");


if(!preg_match("/".$_SERVER['HTTP_HOST']."/",$_SERVER['HTTP_REFERER'])) {

header("location:./../index/join.php");

exit();
}

include("./../include/database_join.php");


$stmt0=$dbh_0->prepare('select * from user_info where id=:id ');

$stmt0->bindParam(":id",$id0);
$id0=htmlspecialchars($_POST['id']);

$stmt0->execute();

$userRow = $stmt0->fetch(PDO::FETCH_ASSOC);


if($stmt0->rowcount()>0) {
	header("location:./../index/join.php?no=yes1");
	exit(1);
}



$stmt=$dbh->prepare("INSERT INTO user_info (id,pw,name,email) VALUES (:id, :pw, :name , :email)");

$stmt->bindParam(':id',$id);
$stmt->bindParam(':pw',$pw);
$stmt->bindParam(':name',$nickname);
$stmt->bindParam(':email',$email);

$id=htmlspecialchars($_POST['id']);
$pw=htmlspecialchars($_POST['pw']);
$nickname=htmlspecialchars($_POST['nickname']);
$email=htmlspecialchars($_POST['email']);


if(  $id===null or $pw===null or $nickname===null or $email===null or strlen($id)>10 or strlen($pw)>15 or strlen($nickname)>10 or strlen($email)>20) {
	header("location:./../index/join.php?no=yes");
	exit(1);

}

$stmt->execute();

header("Location:./../index/login.php");
exit(1);

?>
