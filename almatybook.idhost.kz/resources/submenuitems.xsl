<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fo="http://www.w3.org/1999/XSL/Format">

<xsl:output method="html" indent="yes" encoding="utf-8" doctype-public="-//W3C//DTD HTML 4.01 Transitional//EN"/>
<xsl:strip-space elements="*"/>
<xsl:include href="buttons.xsl"/>

<xsl:template match="LAYOUT">
	<xsl:variable name="cID" select="@ID"/>
	<html>
<!-- av-075 -->
		<head>
			<title><xsl:value-of select="@SITE-TITLE" disable-output-escaping="yes"/> - <xsl:value-of select="@TITLE" disable-output-escaping="yes"/></title>
			<xsl:apply-templates select="META-TAGS"/>
			<link href="css/styles.css" rel="stylesheet" type="text/css" />
		</head>
<body style="margin:0px;">
<center>
<table border="0" cellpadding="0" cellspacing="0" class="main-bg" style="width: 100%; height: 100%;">
  <tr>
    <td ></td>
    <td align="center" height="69" background="images/header_bg.gif">
		<table border="0" cellpadding="0" cellspacing="0" height="69">
		<tr>
			<xsl:call-template name="TOP-MENU"/>
		</tr>
		</table>
	</td>
  </tr>
  <tr>
    <td ></td>
    <td align="center" valign="top" height="245">
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td background="images/header01.jpg" width="100%">
			  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td width="100%" height="245" align="left" background="images/header02.jpg" style="padding-left:50px;background-position:right;background-repeat:no-repeat">
				  <table width="200" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td><div align="center"><a href="./"><img src="images/{LOGO/@NAME}" border="0" alt=""/></a>
						</div></td>
					  </tr>
					  <tr>
						<td align="center"><span class="company"><xsl:value-of select="COMPANY-INFO/NAME" disable-output-escaping="yes"/>
						</span></td>
					  </tr>
					  <tr>
						<td align="center"><span class="slogan"><xsl:value-of select="COMPANY-INFO/SLOGAN" disable-output-escaping="yes"/>
						</span></td>
					  </tr>
				  </table>
			  </td>
			</tr>
			</table>
		  </td>
		  <td width="382">
		  <div align="right"><img src="images/header03.jpg" width="382" height="245" alt=""/></div>
		  </td>
		</tr>
	</table>
	</td>
  </tr>
  <tr>
    <td ></td>
    <td width="100%" height="100%" align="center" valign="top">
	<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
	<tr>
        <td width="100%" height="100%" align="right" valign="top">
		<table cellpadding="0" cellspacing="0" border="0" style="width: 100%; height: 100%;">
          <tr>
            <td valign="top" class="pageContent" style="padding: 25px;" name="SB_stretch">
			<!-- CONTENT -->
                <table cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td class="text-header">
					<xsl:value-of select="@TITLE" disable-output-escaping="yes"/>
					</td>
                    <td style="padding-left: 5px;">
					<img src="images/txtheader_bullet.gif" border="0" alt=""/>
					</td>
                  </tr>
                </table>
                <div style="width:0px; height:15px;"><span></span></div>
				<xsl:apply-templates select="PAGE-CONTENT"/>
			</td>
            <td width="2" style="padding-top: 25px">
			<table width="2" height="95%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td background="images/txt_bg.gif"></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="214" align="right" valign="top">
		<table width="214" border="0" cellspacing="0" cellpadding="0" style="margin-top:25px;margin-left:25px;margin-bottom:25px">
          <tr>
            <td>
<xsl:call-template name="SUB-MENU">
<xsl:with-param name="pageID" select="@ID"/>
</xsl:call-template>
			</td>
          </tr>
        </table>
		<img src="images/blank.gif" width="214" height="1"/>
		</td>
      </tr>
	  </table>
	  </td>
  </tr>
  <tr>
    <td ></td>
    <td align="center" valign="bottom">
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100%" valign="bottom">
		<table width="100%" height="69" border="0" align="center" cellpadding="0" cellspacing="1" style="border:1px #47545C solid" >
          <tr>
            <td align="center" background="images/footer_bg01.gif" bgcolor="#59666E" height="69"  valign="bottom">
			<table border="0" cellspacing="0" cellpadding="0" height="100%">
                <tr>
<xsl:call-template name="BOTTOM-MENU"/>
                </tr>
            </table></td>
          </tr>
        </table>
		</td>
        <td height="69" background="images/footer_bg.gif">
		<div align="center" class="footer" style="width:240px">
<xsl:value-of select="COPYRIGHT" disable-output-escaping="yes"/>
		</div>
		</td>
      </tr>
    </table>
	</td>
  </tr>
  <tr>
    <td width="20" ><img src="images/blank.gif" width="20" height="5"/></td>
    <td width="100%" height="30" align="center" valign="top"><img src="images/blank.gif" width="760" height="5"/>
	</td>
  </tr>
</table>
</center>
</body>

	</html>
</xsl:template>


<xsl:template name="TOP-MENU">
		<xsl:apply-templates select="MENU" mode="top"/>	
</xsl:template>


<xsl:template name="SUB-MENU">
	<xsl:param name="pageID"/>
	<xsl:choose>
		<xsl:when test="//MENU/MENU-ITEM[@ID = $pageID]/MENU-ITEM">
			<xsl:apply-templates select="//MENU/MENU-ITEM[@ID = $pageID]/MENU-ITEM" mode="sub"/>
		</xsl:when>
		<xsl:when test="//MENU/MENU-ITEM/MENU-ITEM[@ID = $pageID]">
			<xsl:variable name="parentID" select="//MENU/MENU-ITEM/MENU-ITEM[@ID = $pageID]/../@ID"/>
			<xsl:apply-templates select="//MENU/MENU-ITEM[@ID=$parentID]/MENU-ITEM" mode="sub"/>
		</xsl:when>
	</xsl:choose>
</xsl:template>
	
<xsl:template match="MENU-ITEM" mode="sub">
	<xsl:choose>
		<xsl:when test="@ID=/LAYOUT/@ID" >
<table width="215" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="20"><div align="left"><img src="images/left_bullet03.gif" width="10" height="10" vspace="10" alt=""/></div></td>
<td><span class="amenu"><xsl:value-of select="@TITLE" disable-output-escaping="yes"/></span></td>
</tr>
</table> 
		</xsl:when>
		<xsl:otherwise>
			<xsl:if test="../MENU-ITEM[@ID=/LAYOUT/@ID] or ../../MENU-ITEM[@ID=/LAYOUT/@ID]">
<table width="215" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="20"><div align="left"><img src="images/left_bullet03.gif" width="10" height="10" vspace="10" alt=""/></div></td>
<td><span class="heard"><a href="{@HREF}" class="menu"><xsl:value-of select="@TITLE" disable-output-escaping="yes"/></a></span></td>
</tr>
</table> 
			</xsl:if>
		</xsl:otherwise>
	</xsl:choose>
	<xsl:if test="position()!=last()">
<table width="215" border="0" cellspacing="0" cellpadding="0">
<tr bgcolor="#525D63">
<td height="1" colspan="2"></td>
</tr>
<tr bgcolor="#839098">
<td height="1" colspan="2"></td>
</tr>
</table> 
	</xsl:if>
</xsl:template>	

<xsl:template name="BOTTOM-MENU">   		
	<xsl:apply-templates select="MENU" mode="bottom"/>			
</xsl:template>

<xsl:template match="MENU" mode="bottom">
	<xsl:apply-templates select="MENU-ITEM"  mode="bottom"/>
</xsl:template>
		
<xsl:template match="MENU-ITEM"  mode="bottom">
	<xsl:choose>
       <!-- when vizited inside-->
       	<xsl:when test="MENU-ITEM[@ID=/LAYOUT/@ID] or @ID=/LAYOUT/@ID">
<td align="center"><a href="{@HREF}" class="amenu" id="abmenu"><xsl:value-of select="@TITLE" disable-output-escaping="yes"/></a></td>
           </xsl:when>
           <!-- when active-->
           
           <xsl:otherwise>
                 <td align="center"><a href="{@HREF}" class="menu" id="bmenu{position()}"><xsl:value-of select="@TITLE" disable-output-escaping="yes"/></a></td>
           </xsl:otherwise>
       </xsl:choose>
  		<xsl:if test="position()!=last()">
                  <td valign="bottom"><img src="images/bmenu_separator.gif" style="margin: 0px 5px 0px 5px;"/></td>
  		</xsl:if>
</xsl:template>
	
<xsl:template match="META-TAGS">
	<xsl:apply-templates mode="meta-tags"/>
</xsl:template>
	
<xsl:template match="*" mode="meta-tags">
	<meta name="{local-name(.)}"><xsl:attribute name="content"><xsl:value-of select="." disable-output-escaping="yes"/></xsl:attribute></meta>
</xsl:template>


<xsl:template match="PAGE-CONTENT">
	<xsl:comment> EDITABLE CONTENT </xsl:comment>
	<xsl:apply-templates mode="meta-tags"/>
</xsl:template>
	     	
</xsl:stylesheet>
