<?php
require_once('init.php');
$loadClass = SB_Modules::loadClass('Modules_Statistics');
$statisticsObject = new Modules_Statistics('xjlgnsj4pry');
$statisticsObject->init();
$statisticsObject->processAction();
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title>Заголовок сайта - Resume</title><meta name="DESCRIPTION" content=""><meta name="KEYWORDS" content=""><meta name="GENERATOR" content="Parallels Plesk Sitebuilder 4.5.0"><link href="css/styles.css?template=av-075&colorScheme=green&header=&button=buttons1" rel="stylesheet" type="text/css"></head><body style="margin:0px;"><center><table border="0" cellpadding="0" cellspacing="0" class="main-bg" style="width: 100%; height: 100%;"><tr><td></td><td align="center" height="69" background="images/header_bg.gif?template=av-075&colorScheme=green&header=&button=buttons1"><table border="0" cellpadding="0" cellspacing="0" height="69"><tr><td align="center"><table border="0" cellpadding="0" cellspacing="0" style="margin-left:20pt;margin-right:20pt "><tr><td align="center" style="padding-bottom:4px"><img src="images/header_bullet.gif?template=av-075&colorScheme=green&header=&button=buttons1" width="15" height="15" alt=""></td></tr><tr><td align="center" class="menu"><a href="page1.php" class="menu">Home</a></td></tr></table></td><td width="1" bgcolor="#5A656D"></td><td align="center"><table border="0" cellpadding="0" cellspacing="0" style="margin-left:20pt;margin-right:20pt "><tr><td align="center" style="padding-bottom:4px"><img src="images/header_bullet.gif?template=av-075&colorScheme=green&header=&button=buttons1" width="15" height="15" alt=""></td></tr><tr><td align="center" class="menu"><a href="page2.php" class="menu">About Me</a></td></tr></table></td><td width="1" bgcolor="#5A656D"></td><td align="center"><table border="0" cellpadding="0" cellspacing="0" style="margin-left:20pt;margin-right:20pt "><tr><td align="center" style="padding-bottom:4px"><img src="images/header_bullet.gif?template=av-075&colorScheme=green&header=&button=buttons1" width="15" height="15" alt=""></td></tr><tr><td align="center" class="menu"><a href="page3.php" class="menu">My Family</a></td></tr></table></td><td width="1" bgcolor="#5A656D"></td><td align="center"><table border="0" cellpadding="0" cellspacing="0" style="margin-left:20pt;margin-right:20pt "><tr><td align="center" style="padding-bottom:4px"><img src="images/header_bullet.gif?template=av-075&colorScheme=green&header=&button=buttons1" width="15" height="15" alt=""></td></tr><tr><td align="center" class="menu"><a href="page4.php" class="menu">Photos</a></td></tr></table></td><td width="1" bgcolor="#5A656D"></td><td align="center"><table border="0" cellpadding="0" cellspacing="0" style="margin-left:20pt;margin-right:20pt "><tr><td align="center" style="padding-bottom:4px"><img src="images/header_bullet.gif?template=av-075&colorScheme=green&header=&button=buttons1" width="15" height="15" alt=""></td></tr><tr><td align="center" class="amenu"><a href="page5.php" class="amenu">Resume</a></td></tr></table></td><td width="1" bgcolor="#5A656D"></td><td align="center"><table border="0" cellpadding="0" cellspacing="0" style="margin-left:20pt;margin-right:20pt "><tr><td align="center" style="padding-bottom:4px"><img src="images/header_bullet.gif?template=av-075&colorScheme=green&header=&button=buttons1" width="15" height="15" alt=""></td></tr><tr><td align="center" class="menu"><a href="page6.php" class="menu">Favorite Links</a></td></tr></table></td><td width="1" bgcolor="#5A656D"></td><td align="center"><table border="0" cellpadding="0" cellspacing="0" style="margin-left:20pt;margin-right:20pt "><tr><td align="center" style="padding-bottom:4px"><img src="images/header_bullet.gif?template=av-075&colorScheme=green&header=&button=buttons1" width="15" height="15" alt=""></td></tr><tr><td align="center" class="menu"><a href="page7.php" class="menu">Contact Me</a></td></tr></table></td></tr></table></td></tr><tr><td></td><td align="center" valign="top" height="245"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td background="images/header01.jpg?template=av-075&colorScheme=green&header=&button=buttons1" width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="100%" height="245" align="left" background="images/header02.jpg?template=av-075&colorScheme=green&header=&button=buttons1" style="padding-left:50px;background-position:right;background-repeat:no-repeat"><table width="200" border="0" cellspacing="0" cellpadding="0"><tr><td><div align="center"><a href="./"><img src="images/logo/880f7ed841ab2d4fb3f59dc77dda6e87.jpg?template=av-075&colorScheme=green&header=&button=buttons1" border="0" alt=""></a></div></td></tr><tr><td align="center"><span class="company">Заголовок сайта</span></td></tr><tr><td align="center"><span class="slogan">Подзаголовок</span></td></tr></table></td></tr></table></td><td width="382"><div align="right"><img src="images/header03.jpg?template=av-075&colorScheme=green&header=&button=buttons1" width="382" height="245" alt=""></div></td></tr></table></td></tr><tr><td></td><td width="100%" height="100%" align="center" valign="top"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0"><tr><td width="100%" height="100%" align="right" valign="top"><table cellpadding="0" cellspacing="0" border="0" style="width: 100%; height: 100%;"><tr><td valign="top" class="pageContent" style="padding: 25px;" name="SB_stretch"><table cellpadding="0" cellspacing="0" border="0"><tr><td class="text-header">Resume</td><td style="padding-left: 5px;"><img src="images/txtheader_bullet.gif?template=av-075&colorScheme=green&header=&button=buttons1" border="0" alt=""></td></tr></table><div style="width:0px; height:15px;"><span></span></div><p>Place your full resume or CV here.</p><?php
echo $statisticsObject->getContentBlock();
?></td><td width="2" style="padding-top: 25px"><table width="2" height="95%" border="0" cellpadding="0" cellspacing="0"><tr><td background="images/txt_bg.gif?template=av-075&colorScheme=green&header=&button=buttons1"></td></tr></table></td></tr></table></td><td width="214" align="right" valign="top"><table width="214" border="0" cellspacing="0" cellpadding="0" style="margin-top:25px;margin-left:25px;margin-bottom:25px"><tr><td></td></tr></table><img src="images/blank.gif?template=av-075&colorScheme=green&header=&button=buttons1" width="214" height="1"></td></tr></table></td></tr><tr><td></td><td align="center" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="100%" valign="bottom"><table width="100%" height="69" border="0" align="center" cellpadding="0" cellspacing="1" style="border:1px #47545C solid"><tr><td align="center" background="images/footer_bg01.gif?template=av-075&colorScheme=green&header=&button=buttons1" bgcolor="#59666E" height="69" valign="bottom"><table border="0" cellspacing="0" cellpadding="0" height="100%"><tr><td align="center"><a href="page1.php" class="menu" id="bmenu1">Home</a></td><td valign="bottom"><img src="images/bmenu_separator.gif?template=av-075&colorScheme=green&header=&button=buttons1" style="margin: 0px 5px 0px 5px;"></td><td align="center"><a href="page2.php" class="menu" id="bmenu2">About Me</a></td><td valign="bottom"><img src="images/bmenu_separator.gif?template=av-075&colorScheme=green&header=&button=buttons1" style="margin: 0px 5px 0px 5px;"></td><td align="center"><a href="page3.php" class="menu" id="bmenu3">My Family</a></td><td valign="bottom"><img src="images/bmenu_separator.gif?template=av-075&colorScheme=green&header=&button=buttons1" style="margin: 0px 5px 0px 5px;"></td><td align="center"><a href="page4.php" class="menu" id="bmenu4">Photos</a></td><td valign="bottom"><img src="images/bmenu_separator.gif?template=av-075&colorScheme=green&header=&button=buttons1" style="margin: 0px 5px 0px 5px;"></td><td align="center"><a href="page5.php" class="amenu" id="abmenu">Resume</a></td><td valign="bottom"><img src="images/bmenu_separator.gif?template=av-075&colorScheme=green&header=&button=buttons1" style="margin: 0px 5px 0px 5px;"></td><td align="center"><a href="page6.php" class="menu" id="bmenu6">Favorite Links</a></td><td valign="bottom"><img src="images/bmenu_separator.gif?template=av-075&colorScheme=green&header=&button=buttons1" style="margin: 0px 5px 0px 5px;"></td><td align="center"><a href="page7.php" class="menu" id="bmenu7">Contact Me</a></td></tr></table></td></tr></table></td><td height="69" background="images/footer_bg.gif?template=av-075&colorScheme=green&header=&button=buttons1"><div align="center" class="footer" style="width:240px">Нижний колонтитул</div></td></tr></table></td></tr><tr><td width="20"><img src="images/blank.gif?template=av-075&colorScheme=green&header=&button=buttons1" width="20" height="5"></td><td width="100%" height="30" align="center" valign="top"><img src="images/blank.gif?template=av-075&colorScheme=green&header=&button=buttons1" width="760" height="5"></td></tr></table></center></body></html>
<?php
$statisticsObject->destruct();
?>