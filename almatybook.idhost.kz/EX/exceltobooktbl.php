<?php
require_once 'excel_reader2.php';

$exfilename=$_POST['exfile'];
$newtbl=$_POST['tablename'];
if (($exfilename)&&(!$newtbl)) ;
{
$data= new Spreadsheet_Excel_Reader($exfilename,false,"CP1251");

$user='u1114105_omir';
$pass='newpara46ABDR';

$dbh = new PDO('mysql:host=mysql38.cp.idhost.kz;dbname=db1114105_books', $user, $pass);
$stmt=$dbh->prepare("set names 'utf8'");
$stmt->execute();



error_reporting(E_ALL ^ E_NOTICE);
$qv="create table $newtbl ( ";
echo $qv."   it is first echo<br>";
echo "colcount===".$data->colcount(0)."==<br>";
for ($j=1;$j<=$data->colcount(0);$j++)
{
$qv=$qv." col$j  text";
if ($j<$data->colcount(0)) $qv=$qv.', ';






}
$qv=$qv.');';

$stmt=$dbh->prepare($qv);
$stmt->execute();
for ($i=1;$i<$data->rowcount(0);$i++)
{
$qv="insert into $newtbl values(";	
for ($j=1;$j<=$data->colcount(0);$j++)
{
$p=$data->val($i,$j);

$p=iconv("windows-1251", "utf-8", $p);

$qv=$qv."'$p'";
if ($j<($data->colcount(0))) $qv=$qv.', ';
}
$qv=$qv.');';
echo $qv."   it is $i echo<br>";
$stmt=$dbh->prepare($qv);
$stmt->execute();
}
}
$dir=dirname(_DIR_);
$filesex=scandir($dir);

$fex=array();
for ($i=0;$i<count($filesex);$i++)
{
	$tempf=$filesex[$i];
	$temp = explode(".", $tempf);
$extension = end($temp);
if ($extension=='xls') $fex[]=$tempf;
	
	
	
}



?>
<html>
<body>

<form  method="post">
<?php 
print_r($filesex);
echo "di==".$dir."==";
for ($i=0;$i<count($fex);$i++)
echo "  <label>$fex[$i]</label><input type=\"radio\" name=\"exfile\" value=\"$fex[$i]\" /></br>";
?>
<input type="text" name="tablename"></br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html> 


