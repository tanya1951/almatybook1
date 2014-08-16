<?php
// Test CVS
echo "test1";

require_once 'excel_reader2.php';
echo "tewst2666666";

// ExcelFile($filename, $encoding);
$data= new Spreadsheet_Excel_Reader("d1.xls",false,"CP1251");

$user='u1114105_omir';
$pass='newpara46ABDR';
$dbh = new PDO('mysql:host=mysql38.cp.idhost.kz;dbname=db1114105_books', $user, $pass);
$stmt=$dbh->prepare("set names 'utf8'");
$stmt->execute();



error_reporting(E_ALL ^ E_NOTICE);
echo "rowcount==".$data->rowcount(0)."<br>";
for ($i=1;$i<$data->rowcount(0);$i++)
{
$id_p=0;
$p=$data->val($i,3);
echo "publisher==".$p."    i==$i<br>";
$p=iconv("windows-1251", "utf-8", $p);

$qv="select id_publisher from books_publisher_synonim where synonim='$p'";
echo $qv;
$stmt=$dbh->prepare($qv);
$stmt->execute();
$rows = $stmt->fetchall();
if ($rows)	
		$id_p=$rows[0]['id_publisher'];
	
echo "id_p===".$id_p."==<br>";
if (($id_p===null)||($id_p==0))
{
echo "begin insert publisher  ".$p."<br>";
$qv="insert into books_publisher (name_publisher) values('".$p."');";
echo $qv;
$stmt=$dbh->prepare($qv);
$stmt->execute();
echo "test33";
$qv="select id_publisher from books_publisher  where name_publisher='$p'";
$stmt=$dbh->prepare($qv);
$stmt->execute();

$rows = $stmt->fetchall();
	
		$id_p=$rows[0]['id_publisher'];
echo "continue insert publisher  ".$p."<br>";
$stmt=$dbh->prepare("insert into books_publisher_synonim(synonim,id_publisher) values('".$p."',$id_p);");
$stmt->execute();
echo "finish insert publisher  ".$p."<br>";
}
$v= $data->val($i,2);
$v=iconv("windows-1251", "utf-8", $v);
$qv="insert into books_book (name_book,id_author,id_publisher) values('".$v."',0,$id_p)";
echo $qv."<br>";
$stmt=$dbh->prepare($qv);
$stmt->execute();



}

//for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) 
//{
//	for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
//		echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
//	}
//	echo " this is line end \n";
//
//}


//print_r($data);
//print_r($data->formatRecords);
?>