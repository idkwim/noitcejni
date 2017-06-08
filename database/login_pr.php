<?php
session_start();

include("./../include/database.php");

$stmt=$dbh->prepare('select * from user_info where id=:id and pw=:pw');

$stmt->bindParam(':id',$id);
$stmt->bindParam(':pw',$pw);

$id=htmlspecialchars($_POST['id']);
$pw=htmlspecialchars($_POST['pw']);

$stmt->execute();

$userRow = $stmt->fetch(PDO::FETCH_ASSOC);


$hex_string='';

$session_id=$userRow['id'];


$hex='';
    for ($i=0; $i < strlen($session_id); $i++){
        $hex .= dechex(ord($session_id[$i]));
    }


$hex=base64_encode($hex);
if($stmt->rowcount()>0) {
	if($pw===$userRow['pw']) {
		$_SESSION['user_session'] = $session_id;
		setcookie('user',$hex,time()+3060,'/');
		header("location:./../main.php");
		exit();
	}
	
}
else {

header ("location:./../index/login.php?login_check=false");
exit();
}
?>
