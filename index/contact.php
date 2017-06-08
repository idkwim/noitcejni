<?php

header("Content-Type: text/html; charset=UTF-8");

session_start();

if(!$_SESSION['user_session'] ){
	header('location:./../main.php');
	exit(1);
}

if($_SESSION['user_session']==='admin'){
	header('location:./../main.php');
	exit(1);
}

?>
<html>

<head>

<link rel="stylesheet" type="text/css" href="./../static/css/main.css">
<title>ssg ctf</title>

</head>
<header>
<ul class="left">
	<li class="home">	
	<a href="/">
	 	<span>noitcejni</span>
	</a>
	</li>
</ul>
<ul class="right">
	<li class="home">
		<a href="./login.php">
			<span>LOGIN</span>
		</a>
	</li>
	
	 </li>
        
	<li class="home">
                <a href="./join.php">
                        <span>JOIN</span>
                </a>
        </li>

	<li class="home">
		<a href="./logout.php">
			<span>LOGOUT</span>
		</a>
	</li>
	<li class="home">
		<a href="./contact.php">
			<span>CONTACT</span>
		</a>
	</li>
	
</header>

<body>

<section class="box3">
<?php
if($_GET['no']==='yes')echo "check receiver or message";
?>
</br>
SEND MESSAGE
<form name="message" method="post" action="./../database/send_pr.php">
<p>RECEIVE ID : <input type="text" name="receiver" maxlength="20"/></p>
<p>MESSAGE : <input type="text" name="message" maxlength="45"</p>
<p><input type="submit" value="submit"/></p>

</section>

<section class="box4">
</br>
MESSAGE BOX
</br>
</br>
</br>
<table align="center" height="10px"  width="700px"  border =1  cellpadding = "0" cellspacing="0">     

<td align="center" > sender</td>
<td align="center">message </td>
<td align="center"> receiver </td> 
<?php 
include("./../include/database_message.php");
#$dbh = new PDO("mysql:host=localhost;dbname=SsG",'user2','password!@',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$stmt=$dbh->prepare('select * from messagebox where receiver=:user');

$stmt->bindParam(":user",$user_c);

$string='';
$hex=$_COOKIE['user'];
$hex=base64_decode($hex);
    for ($i=0; $i < strlen($hex)-1; $i+=2){
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
$user_c=$string;

$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
echo "</tr><td>";
echo $row['sender'];echo "\n";

echo "</td><td>";

echo$row['message']; echo "\n";
echo "</td><td>";

echo $row['receiver']; echo "\n";
echo "</td></tr>";
}
?>
</table>
</section>

</body>

</html>
