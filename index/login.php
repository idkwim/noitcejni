<?php

session_start();
if($_SESSION['user_session']){
header('location:./../main.php');
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
		<a href="./../main.php">
			<span>HOME</span>
		</a>
	</li>
	
	 </li>
        
	   <li class="home">
                <a href="./login.php">
                        <span>LOGIN</span>
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

<section class="box2">
<form name="message" method="post" action="./../database/login_pr.php" style="font-size:18px">

</br>
<?php
if($_GET['login_check']==='false'){
echo "check id or pw";
}
?>

<p>ID : <input type="text" name="id" maxlength= "10" /></p>
<p>PW : <input type="password" name="pw" maxlength= "15" /></p>
<p><input type="submit" value="login"/></p>
</form>
<img src="../static/image/123.PNG" height="170" width="170">
<img src="../static/image/123456.PNG" height="170" width="170">
<img src="../static/image/1234.PNG" height="170" width="170">



</section>

</body>

</html>
