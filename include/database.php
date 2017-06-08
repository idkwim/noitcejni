<?php

$dbh = new PDO("mysql:host=localhost;dbname=SsG",'user1','password!!',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$my_db = new mysqli("localhost","user1","password!!","SsG");


?>
