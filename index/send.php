<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
if(!$_SESSION['user_session']){
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
	<li class="home">
		<a href="./logout.php">
			<span>LOGOUT</span>
		</a>
	</li>
	   <li class="home">
                <a href="./join.php">
                        <span>JOIN</span>
                </a>
        </li>
	<li class="home">
		<a href="./contact.php">
			<span>CONTACT</span>
		</a>
	</li>
	
</header>

<body>

<section class="box1">
</br>
</br>
send success !!!!
</section>

</body>

</html>
