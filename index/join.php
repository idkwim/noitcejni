<?php 
header("Content-Type: text/html; charset=UTF-8");
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
                <a href="./join.php">
                        <span>JOIN</span>
                </a>
        </li>

	<li class="home">
		<a href="./login.php">
			<span>LOGIN</span>
		</a>
	</li>
	<li class="home">
		<a href="./contact.php">
			<span>CONTACT</span>
		</a>
	</li>
	
</header>

<body>


<section class="box5">
<?php
if($_GET['no']==='yes'){
echo "check please";
}
if($_GET['no']=='yes1'){
echo "This ID exists";
}
?>

<form name="message" method="post" action="./../database/join_pr.php" style="font-size:18px">
	<p>ID : <input type="text" name="id" minlength="5"  maxlength="10" required  /></p>
	<p>PW : <input type="password" name="pw" minlength="5"maxlength="15"  required /></p>
	<p>NAME : <input type="text" name="nickname" minlength="4" maxlength="10" required /></p>
	<p>EMAIL : <input type="email" name="email"  maxlength="20" required/></p>
	<input type="submit" value="go join">
	</form>
<img src ="../static/image/4.PNG" height="160" width="170">
<img src ="../static/image/2.PNG" height="160" width="170">
<img src ="../static/image/1.PNG" height="160" width="170">
</section>

</body>

</html>
