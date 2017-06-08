<html>
<head>

<link rel="stylesheet" type="text/css" href="./static/css/main.css">

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
                <a href="./index/login.php">
                        <span>LOGIN</span>
                </a>
        </li>

	<li class="home">
                <a href="./index/join.php">
                        <span>JOIN</span>
                </a>
        </li>
        <li class="home">
                <a href="./index/logout.php">
                        <span>LOGOUT</span>
                </a>
        </li>
	  <li class="home">
                <a href="./index/contact.php">
                        <span>CONTACT</span>
                </a>
        </li>


</ul>
	
</header>

<body>

<section class="box2">
<?php
session_start(); 
echo "</br></br></br>";

if($_SESSION['user_session']) {
	echo "<font size=7> Hello ".$_SESSION['user_session']."</font>";
}



else {
	echo "<font size=7> login please </font><br>";
}
?>


</br>
<img src ="../static/image/2.PNG" height="170" width="170">
<img src ="../static/image/6.PNG" height="170" width="170">
<img src ="../static/image/3.PNG" height="170" width="170"></br>

<?php

if($_SESSION['user_session']==='admin'){
	print ("SSGCTF{wjdakftnrhaksgdmtuTtmqslek}");
}
?>


</section>
</body>

</html>
