<html>
<head>

<link rel="stylesheet" type="text/css" href="./../static/css/main.css">
<title>ssg ctf</title>

</head>

<header>
<ul class="left">
        <li class="home">
        <a href="./../">
                <span>noitcejni</span>
        </a>
        </li>
</ul>
<ul class="right">

        <li class="home">
                <a href="./../index/login.php">
                        <span>LOGIN</span>
                </a>
        </li>

        <li class="home">
                <a href="./../index/logout.php">
                        <span>LOGOUT</span>
                </a>
        </li>

        <li class="home">
                <a href="./../index/join.php">
                        <span>JOIN</span>
                </a>
        </li>

        <li class="home">
                <a href="./../index/contact.php">
                        <span>CONTACT</span>
                </a>
        </li>

</ul>

</header>

<body>
<section class="box1">

<?php

session_start();

if(!($_SESSION['user_session'])) {
//session_id check;
        header("location:./../main.php");
        exit(1);
}


if($_SESSION['user_session'] !== 'admin') {

        include("./../include/database.php");
	$stmt=$dbh->prepare('select * from user_info where id=:id');
        $stmt->bindParam(':id',$_SESSION['user_session']);
        $stmt->execute();
        $check_session = $stmt->fetch(PDO::FETCH_ASSOC);


        if($check_session['visit']> 100 or (empty ($check_session['id']) )) {
                $stmtd=$dbh->prepare('delete from user_info where id=:id');
                $stmtd->bindParam(':id',$_SESSION['user_session']);
                $stmtd->execute();
                session_destroy();
                header("location:./../index/join.php");
                exit(1);

        }
	
	echo "your visite : ". $check_session['visit']."</br>";

	echo "<a href='./admin.txt'>source</a>";
        $visit=$check_session['visit']+1;
        $stmtt=$dbh->prepare('update user_info set visit=:visit where id=:id');
        $stmtt->bindParam(':id',$_SESSION['user_session']);
        $stmtt->bindParam(':visit',$visit);
        $stmtt->execute();

	$id=$_POST['id'];
	$pw=$_POST['pw'];
	$email=$_POST['email'];
	$name=$_POST['name'];
	$root_key=$_POST['root_key'];
	if(strlen($id) > 4 || strlen($name) > 31 ||  strlen($email) > 33 ||strlen($pw)> 33 || strlen($root_key) > 29 ){
		exit("too long");
 	}
	
$pattern_zero="/ascii|\'|\"|hex|bin|bit|char|concat|set|field|find|insert|like|lpad|lo|mid|pos|ote|eat|replace|right|instr|hour|space|str|trim|case|un|up|abs|add|int|now|point|sha|ceil|cos|cot|crc|deg|div|exp|LN|log|mod|oct|pi|pow|sign|sin|sqrt|tan|between|and|or|coer|mult|to|date|day|line|time|md5|cur|compress|geo|coalesce|>|<|=|not|true|false|is|less|string|inet|sleep|benchmark|limit|sub|union|st|by|having|database|version|0|-|_|B|[@+%^!$]/i";

$pattern_one="/ascii|\'|\"|bin|bit|char|concat|set|field|find|insert|like|lpad|lo|mid|pos|ote|eat|replace|right|instr|hour|space|str|trim|case|un|up|abs|add|int|now|point|sha|ceil|cos|cot|crc|deg|div|exp|LN|log|mod|oct|pi|pow|sign|sin|sqrt|tan|between|~|\^|and|or|coer|mult|to|date|day|line|time|md5|cur|compress|geo|coalesce|NULL|>|<|=|not|true|false|is|less|string|inet|sleep|benchmark|limit|sub|union|st|by|having|database|version|0|-|_|Bi|[@+%^!$]/i";

$pattern_two="/ascii|\'|hex|bin|bit|char|concat|set|field|find|insert|like|lpad|lo|mid|pos|ote|eat|replace|right|instr|hour|space|str|trim|case|un|up|abs|add|int|now|point|sha|ceil|cos|cot|crc|deg|div|exp|LN|log|mod|oct|pi|pow|sign|sin|sqrt|tan|between|~|\^|and|or|coer|mult|to|date|day|line|time|md5|cur|compress|geo|coalesce|NULL|>|<|=|not|true|false|is|less|string|inet|sleep|benchmark|limit|sub|union|st|by|having|database|version|0|-|_|B|[@+%^!$]/i";


	if(preg_match($pattern_zero,$id)){
		exit("ID FILTER");
	}
	if(preg_match($pattern_zero,$email)){
		exit("EMAIL FILTER");
	}	
	if(preg_match($pattern_zero,$root_key)){
		exit("ROOT_KEY FILTER");
	}

	if(preg_match($pattern_two,$pw)){
		exit("PW FILTER");
	}
	if(preg_match($pattern_one,$name)){
		exit("NAME FILTER");
	}


	$querys="select id from user_info where id= '$id' and pw='$pw' and name='$name' and email= '$email' and root_key='$root_key' ";
	print $query;
	$result = mysqli_query($my_db, $querys);

	if($row = mysqli_fetch_array($result)){
 
		echo "!!".$row[id]."!!";
	}
	
	}

else {
	echo "go to the mainpage !! ";

}

?>
</br>
<img src ="../static/image/7.PNG" height="170" width="170">
<img src ="../static/image/8.PNG" height="170" width="170">
<img src ="../static/image/9.PNG" height="170" width="170">


</section>
</body>

</html>
