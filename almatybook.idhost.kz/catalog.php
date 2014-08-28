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








$searchstr="";
if ($publisher !=0)
$searchstr=$searchstr."  and id_publisher=$publisher ";
if ($yearfrom !=0)
$searchstr=$searchstr."  and (year_book>=$yearfrom or year_book is null) ";
if ($yearto !=0)
$searchstr=$searchstr."  and (year_book<=$yearto or year_book is null) ";
if ($booknamelike !="")
$searchstr=$searchstr."  and  name_book  like  '%$booknamelike%' ";
if ($authorlike !="")
$searchstr=$searchstr."  and  author_book  in (select id_author from books_author    where name_author like '%$authorlike%') ";

$pagecount=$_POST['pagecount'];
if (($pagecount===null)||($pagecount==0))
{
$pagecount=$_GET['pagecount'];
if (($pagecount===null)||($pagecount==0))
{
$querystr="select count(id_book)  from books_book where id_catalog=$cat and hide_book='show' ".$searchstr;
$stmt=$dbh->prepare($querystr);
$stmt->execute();
$rows = $stmt->fetchall();

if ($rows)	
		$pagecount=ceil($rows[0][0]/30);
	if (($pagecount===null)||($pagecount==0))
	{
	echo "catalog is empty now".$querystr;
	exit;	
		
	}
}
}
$pageoffset=0;
$currentpage=0;
if ($pagecount>1)
{
$currentpage=$_POST['currentpage'];
if (($currentpage===null)||($currentpage==0))

$currentpage=$_GET['currentpage'];
if (($currentpage===null)||($currentpage==0)) $currentpage=1;
if ($currentpage>$pagecount) $currentpage=$pagecount;
$lim=($currentpage-1)*30;
$querystr1="select id_book  from books_book where id_catalog=$cat and hide_book='show' ".$searchstr." order by id_book limit $lim";
$stmt=$dbh->prepare($querystr1);
$stmt->execute();
$rows = $stmt->fetchall();

if ($rows)	
		$pageoffset=$rows[$lim-1][0];
if ($pageoffset===null) $pageoffset=0;
if ($currentpage==1) $pageoffset=0;	
}

	

$querystr="select *  from books_book where id_catalog=$cat and hide_book='show' and id_book>$pageoffset  ".$searchstr." order by id_book limit 30 ";
$stmt=$dbh->prepare($querystr);	
$stmt->execute();
$rows = $stmt->fetchall();

$querystr="select * from books_section";
$stmt=$dbh->prepare($querystr);
$stmt->execute();
$rowsection = $stmt->fetchall();
$jenre=array();
$i=1;
foreach ($rowsection as $row)
{
	$tempsection=$row['name_section'];
	$tempidsec=$row['id_section'];
$querystr="select * from books_catalog where id_section=$tempidsec;";

$stmt=$dbh->query($querystr);
//$stmt->execute();
$rowcatalog = $stmt->fetchall();

 $jenre[$tempsection]=array();
foreach ($rowcatalog as $rcat)
{
	$tempcat=$rcat['name_catalog'];
	$tempidcat=$rcat['id_catalog'];
	$jenre[$tempsection][$tempidcat]=$tempcat;
	
	
	
}
}
$querystrpub='select id_publisher, name_publisher from books_publisher';
$stmt=$dbh->prepare($querystrpub);
$stmt->execute();
$publisherrow=$stmt->fetchAll();

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
<link href="jquery-ui.css" media="screen" rel="stylesheet" type="text/css">
<link href="banner.gif">
<link href="jquery-ui.structure.css" media="screen" rel="stylesheet" type="text/css">
<link href="jquery-ui.theme.css" media="screen" rel="stylesheet" type="text/css">



        <!-- Scripts -->
        <script src="jquery.js"></script>	
        <script type="text/javascript" src="bootstrap.js"></script>
           <script type="text/javascript" src="jquery-ui.js"></script>
<!--[if lt IE 9]><script type="text/javascript" src="/js/html5.js"></script><![endif]--> <link rel="stylesheet" href="claro.css">

<style>
.dopinfo{
	
	background:#FFC;
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
.paginitem
{float:left;
background:#55D3D7;
margin-left:auto;
margin-right:auto;

width:40px;
height:30px;
margin-left:3px;
font-style:oblique;
color:#F03;

}
.ogr
{width:120px;}
</style>
<link rel="stylesheet" href="superfish.css" media="screen">
		<style> body { max-width: 40em; } </style>
		
		<script src="hoverIntent.js"></script>
		<script src="superfish.js"></script>
		<script>

		(function($){ //create closure so we can safely use $ as alias for jQuery

			$(document).ready(function(){

				// initialise plugin
				var example = $('#example').superfish({
					//add options here if required
				});

				// buttons to demonstrate Superfish's public methods
				$('.destroy').on('click', function(){
					example.superfish('destroy');
				});

				$('.init').on('click', function(){
					example.superfish();
				});

				$('.open').on('click', function(){
					example.children('li:first').superfish('show');
				});

				$('.close').on('click', function(){
					example.children('li:first').superfish('hide');
				});
			});

		})(jQuery);


		</script>
    </head>
    <body class="claro">
      <form method="post">
       <div class="navbar navbar-default " role="navigation">
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
        
                    <ul class="sf-menu" id="example">
			
                            <li ><a href="EX/top.php">ТОП 100</a></li>
               
                                   <li class="current" ><a href="#">Жанры</a><ul><?php 
								   foreach ($jenre as $sect=>$catr)
								   {echo "<li class=\"current\"><a href=#>$sect</a> <ul>";
foreach ($catr as $catid=>$catname)
{echo "<li><a href=\"catalog.php?cat=$catid\">$catname</a></li>";

}echo "</ul></li>";
}
?>
 </ul></li>   
      <li ><a href="#">Поиск</a>
    
      <ul>
      <li><a href=#>Автор:</a><input type="text" name="authorlike" value="<?php echo $authorlike;?>"></li>
      <li><a href=#>Название:</a><input type="text" name="booknamelike" value="<?php echo $booknamelike;?>"></li>
     <li><a href=#>Издательство:</a><div class="ogr"><select name="publisher">
      <option value="0">Все</option>
      <?php foreach($publisherrow as $pr)
	  {$idp=$pr['id_publisher'];
	  $np=$pr['name_publisher'];
	  $s="";
	  if ($idp==$publisher) $s=" \"selected\" ";
	  echo "<option value=\"$idp\" name=\"publisher\"".$s.">$np</option>";
	  }
	  ?>
      
      </select></div></li>
      <li><a href=#>Год издания от</a>
      <select name="yearfrom">
      <?php
	  for ($i=1924;$i<2014;$i++)
	  { $s="";
	  if ($i==$yearfrom) $s=" \"selected\" ";
	  echo "<option name=\"yearfrom\" value=\"$i\"".$s.">$i</option>";
	  }
      ?>
      </select></li>
          <li><a href=#>Год издания до</a>
      <select name="yearto">
      <?php
	  for ($i=1924;$i<2014;$i++)
	  {
		   $s="";
	  if ($i==$yearto) $s=" \"selected\" ";
	  echo "<option name=\"yearto\" value=\"$i\"".$s.">$i</option>";
	  }
      ?>
      </select></li>
     <li><input type="submit" value="Начать поиск">
     </li>
      </ul>
      
      
      
      
      
      </li>
           </ul>
          
        
        </div><!--/.nav-collapse -->
      </div>
    </div> 
    <input type="hidden" name="cat" value="<?php echo $cat;?>">
      <input type="hidden" name="currentpage" value="1">
   </form> 
    <div width="100%" border="3" >
  <caption>
    catalog
  </caption>
  <?php
  foreach ($rows as $row):?>
 <div class="bookinfo">  <div style="display:block;height:100px">
 <div class="row ">

    <div class="col-md-4"><div ><?php echo $row['name_book'];?></div></div>
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
 <div class="cat"><?php echo $cat;?></div>
 <div class="pagecount"><?php echo $pagecount;?></div>
  <div class="currentpage"><?php echo $currentpage;?></div>
  <div class="pagin"></div>


  <hr/>
            <footer>
                <p> 2014Карасай-батыра 88(б) Без перерыва, без выходных</p>
            </footer>
          

<script >

var pagecount=$('.pagecount').html();
var currentpage=$('.currentpage').html();
var cat=$('.cat').html();


function pagin(pc,cp,cat){
	var htm="";

	var l=cp-0+4;

for (i=cp-3;i<l;i++)
{
	
	
	if ((i>1)&&(i<pc))
	htm=htm+"<div class='paginitem'><a href='catalog.php?cat="+cat+"&currentpage="+i+"&pagecount="+pc+"'>"+i+"</a></div>";
	
}
	if (cp<=5) htm="<div class='paginitem'><a href='catalog.php?cat="+cat+"&currentpage=1&pagecount="+pc+"'>"+1+"</a></div>"+htm;
	if (cp>5) htm="<div class='paginitem'><a href='catalog.php?cat="+cat+"&currentpage=1&pagecount="+pc+"'>"+1+"</a></div><div class=\"paginitem\">...</div>"+htm;
	if (cp>=pc-5) htm=htm+"<div class='paginitem'><a href='catalog.php?cat="+cat+"&currentpage="+pc+"&pagecount="+pc+"'>"+pc+"</a></div>";
	if (cp<pc-5) htm=htm+"<div class='paginitem'>.........</div><div class='paginitem'><a href='catalog.php?cat="+cat+"&currentpage="+pc+"&pagecount="+pc+"'>"+pc+"</a></div>";


	return htm;	
}

var ht=pagin(pagecount,currentpage,cat);

$('.pagin').html(ht);
$('.cat').hide();
$('.currentpage').hide();
$('.pagecount').hide();

$('.bookinfo').click(function(){ $(this).find('.dopinfo').toggle(500);
var dopinfoheight=$(this).find('.dopinfo').css('height');

var dh1=dopinfoheight.substr(0,1);

var dh2=dopinfoheight.substr(1,2);

if (dh2!='px') dh1=dh1+dh2;

dh1=int(dh1);

if (dh1<50) $(this).find('.dopinfo').css('height','50px');
$(this).find('.dopinfo').find('.col-md-4 div').css('background-color',"#0F6");});


</script>
 <script>
$(function() {
$( "#menu" ).menu();

});

</script>
</body></html>
