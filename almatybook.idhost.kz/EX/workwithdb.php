
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Документ без названия</title>
<script type="text/javascript" src="../jquery.js"></script>
</head>

<body>
hhhhhhhhhhhhhhhhhhhhhhhhhhhhh
jjjjjjjjjjjjjjjjjjjjjjj
<div class="greeting"><?php
require_once("dbconfig.php");

$test=$_POST['next'];
$f=fopen('wwdb.txt','r');
$tn=fgets($f);
fclose($f);

if (!$tn) $tn=0;
$querystr="select min(id_book) from books_book where id_book>$tn;";
$stmt=$dbh->prepare($querystr);
$stmt->execute();
$rows=$stmt->fetchAll();
if ($rows)
$tn=$rows[0][0];
if (!$rows) echo "end";

$f=fopen('wwdb.txt','w');
fputs($f,$tn);
fclose($f);
$querystr="select tempstring from books_book where id_book=$tn;";

$stmt=$dbh->prepare($querystr);
$stmt->execute();
$rows=$stmt->fetchAll();
if ($rows)
$temp=$rows[0][0];
if (!$rows)
 echo "next";


$querystr="select col3 from newtable11 where col1='$temp';";

$stmt=$dbh->prepare($querystr);
$stmt->execute();
$rows=$stmt->fetchAll();
if ($rows)
$auth=$rows[0][0];
if (!$rows) echo "next";

$querystr="select id_author from books_author where name_author='$auth';";

$stmt=$dbh->prepare($querystr);
$stmt->execute();
$rows=$stmt->fetchAll();
if ($rows)
$id=$rows[0][0];
if (!$rows) echo "next";

$querystr="update books_book set id_author=$id where id_book=$tn;";

$stmt=$dbh->prepare($querystr);
$stmt->execute();

echo "all right";









?></div>
<div class="newgreeting"></div>
<form id="fo" method="post"><input type="text" name="t"  id="t"><input type="hidden" value="hide" name="next"><input type="submit"></form>
<script type="text/javascript">
var st=$().jquery;
var check=0;

function fun()
{
var nec=$('.greeting').html();
nec=nec.substr(1,10);
var test="all right";
if (nec==test) 
$('#fo').submit();
$('#fo #t').val('jjjj');
$('.newgreeting').html('==='+nec+'==='+check);
check+=1;
}
window.setTimeout(fun,2000);
</script>
</body>
</html>