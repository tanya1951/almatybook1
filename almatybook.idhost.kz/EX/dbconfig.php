<?php
$user='u1114105_omir';
$pass='newpara46ABDR';
$dbh = new PDO('mysql:host=mysql38.cp.idhost.kz;dbname=db1114105_books', $user, $pass);
$stmt=$dbh->prepare("set names 'utf8'");
$stmt->execute();




?>