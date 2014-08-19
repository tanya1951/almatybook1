<?php

require_once("dbconfig.php");
$cat=$_POST['catalog'];
if ($cat===null)
{$cat=$_GET['catalog'];
if  ($cat===null)
$cat=1;
}
$publisher=$_POST['publisher'];
if ($publisher===null) $publisher=0;
$yearfrom=$_POST['yearfrom'];
if ($yearfrom===null) $yearfrom=0;
$yearto=$_POST['yearto'];
if ($yearto===null) $yearto=$yearfrom;
$booknamelike=$_POST['booknamelike'];
if ($booknamelike===null) $booknamelike="";
$authorlike=$_POST['authorlike'];
if ($authorlike===null) $authorlike="";
$oldpage=$_GET['oldpage'];

if  ($oldpage===null)
$oldpage=1;
$pageoffset=$_GET['pageoffset'];
$pagecount=$_GET['pagecount'];

if  ($pageoffset===null)
$pageoffset=0;
$addpage=$_GET['addpage'];
if  ($addpage===null)
$addpage=0;
$minuspage=$_GET['minuspage'];
if ($minuspage===null) $minuspage=0;
$searchstr="";
if ($publisher !=0)
$searchstr=$searchstr."  and id_publisher=$publisher ";
if ($yearfrom !=0)
$searchstr=$searchstr."  and year_book<=$yearfrom ";
if ($yearto !=0)
$searchstr=$searchstr."  and year_book>=$yearto ";
if ($booknamelike !="")
$searchstr=$searchstr."  and  name_book  like  %'$booknamelike'% ";
if ($authorlike !="")
$searchstr=$searchstr."  and  author_book  in (select id_author from books_author    where name_author like %'$authorlike'%) ";

if (($pagecount===null)||($pagecount==0))
{
$querystr="select count(id_book)  from books_book where id_catalog=$cat and hide_book='show' ".$searchstr;
$stmt=$dbh->prepare($querystr);
$stmt->execute();
$rows = $stmt->fetchall();
if ($rows)	
		$pagecount=$rows[0][0];
	if (($pagecount===null)||($pagecount==0))
	{
	echo "catalog is empty now";
	exit;	
		
	}
}
if ($pagecount>1)
{
if ($addpage>0)
{
	
$addlimit=$addpage*30;	
$querystr="select min(id_book)  from books_book where id_catalog=$cat and hide_book='show' and id_book>$pageoffset  ".$searchstr." order by id_book limit $addlimit ";
$stmt=$dbh->prepare($querystr);	
$rows = $stmt->fetchall();
if ($rows)	
		$newoffset=$rows[0][0];
if ($newoffset==$pageoffset)
	{
	echo "catalog is overwhelmed now";
	exit;	
		
	}
$pageoffset=$newoffset;	
	
}
if ($minuspage>0)
{
	
$addlimit=$minuspage*30+1;	
$querystr="select min(id_book)  from books_book where id_catalog=$cat and hide_book='show' and id_book<$pageoffset  ".$searchstr."order by id_book desc  limit $addlimit ";
$stmt=$dbh->prepare($querystr);	
$rows = $stmt->fetchall();
if ($rows)	
		$newoffset=$rows[0][0];
if ($newoffset==$pageoffset)
	{
	echo "catalog is overwhelmed now";
	exit;	
		
	}
$pageoffset=$newoffset;	
	
}
$querystr="select *  from books_book where id_catalog=$cat and hide_book='show' and id_book>$pageoffset  ".$searchstr." order by id_book limit 30 ";
$stmt=$dbh->prepare($querystr);	
$stmt->execute();
$rows = $stmt->fetchall();

}





?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Букинист на НикольскомОбмен покупка продажа</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Le styles -->
        <link href="bootstrap.css" media="screen" rel="stylesheet" type="text/css">
<link href="style.css" media="screen" rel="stylesheet" type="text/css">
<link href="bootstrap-responsive.css" media="screen" rel="stylesheet" type="text/css">
<link href="banner.gif">
        <!-- Scripts -->
        <script src="jquery.js"></script>	
        <script type="text/javascript" src="bootstrap.js"></script>
<!--[if lt IE 9]><script type="text/javascript" src="/js/html5.js"></script><![endif]--> <link rel="stylesheet" href="claro.css">

<style>
.dopinfo{
	
	
	color:#F36;
	height:100px;
	display:none;}
.hei100
{height:100px;}
.dopinfo div{border-color:#6F0;
	border-radius:10px;
	border-style:double;
	border-width:5px;

	background:#60F;
	}
.clr{background:#90F;}
</style>

    </head>
    <body class="claro">
       <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://almatybook.kz/">Букинист на Никольском</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
                          <li class="active"><a href="http://almatybook.kz/">Главная</a></li>
      <li ><a href="EX/catalog.php">Каталог</a></li>
                            <li ><a href="EX/zayava.php">Заявки</a></li>
                            <li ><a href="EX/top.php">ТОП 100</a></li>
              </ul>
            </li>
          </ul>
        
        </div><!--/.nav-collapse -->
      </div>
    </div> 
    <div width="100%" border="3" >
  <caption>
    catalog
  </caption>
  <?php
  foreach ($rows as $row):?>
 <div class="bookinfo">  <div style="display:block;height:100px">
 <div class="row ">

    <div class="col-md-4"><?php echo $row['name_book'];?></div>
    <div class="col-md-4"><?php  $id_author= $row['id_author'];
	$stmt2=$dbh->prepare("select name_author from books_author where id_author=$id_author;");
	$stmt2->execute();
	$rows2=$stmt2->fetchAll();
	echo $rows2[0][0];?></div>
    <div class="col-md-4"><?php echo $row['description_book'];?></div>
    </div></div><div class="row">
    <div class="dopinfo">
    
     <div class="col-md-4"><?php echo $row['name_book'];?></div>
    <div class="col-md-4"><?php echo $row['name_book'];?></div>
     <div class="col-md-4"><?php  $id_author= $row['id_author'];
	$stmt2=$dbh->prepare("select name_author from books_author where id_author=$id_author;");
	$stmt2->execute();
	$rows2=$stmt2->fetchAll();
	echo $rows2[0][0];?></div>
   </div>
   </div>
  </div>
  <?php endforeach;?>
  
</div>


 </div> <!-- /container -->
  <hr><DIV class="hei100">&nbsp;</DIV>
  <hr/>
            <footer>
                <p> 2014Карасай-батыра 88(б) Без перерыва, без выходных</p>
            </footer>
            

<script >



$('.bookinfo').hover(function(){ $(this).addClass('activeinfo');$('.activeinfo .dopinfo').show(500);
var dopinfoheight=$('.activeinfo .dopinfo').css('height');
var dh=dopinfoheight.substr(1,3);
dh=int(dh);
if (dh<500) $('.activeinfo .dopinfo').css('height','50px');
$('.activeinfo .dopinfo div').first().append("<div class='clr'>dh="+dh+"</div>");},function(){$( '.activeinfo .dopinfo').hide();$(this).removeClass('activeinfo'); });


</script>

</body></html>
