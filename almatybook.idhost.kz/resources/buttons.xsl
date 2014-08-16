<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fo="http://www.w3.org/1999/XSL/Format">
<xsl:output method="html" indent="no"/>
<xsl:strip-space elements="*"/>
	<!--MENU-->
	<xsl:template match="MENU" mode="top">
		<xsl:apply-templates select="MENU-ITEM"  mode="top"/>
	</xsl:template>

	<!--MENU-ITEM-->
	<xsl:template match="MENU-ITEM"  mode="top">
   		<xsl:choose>
           <!-- active menu with link-->
           	<xsl:when test="MENU-ITEM[@ID=/LAYOUT/@ID] or @ID=/LAYOUT/@ID">
<td align="center">
<table border="0" cellpadding="0" cellspacing="0" style="margin-left:20pt;margin-right:20pt ">
<tr>
<td align="center" style="padding-bottom:4px"><img src="images/header_bullet.gif" width="15" height="15" alt=""/></td>
</tr>
<tr>
<td align="center" class="amenu"><a href="{@HREF}" class="amenu"><xsl:value-of select="@TITLE" disable-output-escaping="yes"/></a></td>
</tr>
</table>
</td>
            </xsl:when>
            
            
            <xsl:otherwise>
<td align="center">
<table border="0" cellpadding="0" cellspacing="0" style="margin-left:20pt;margin-right:20pt ">
<tr>
<td align="center" style="padding-bottom:4px"><img src="images/header_bullet.gif" width="15" height="15" alt=""/></td>
</tr>
<tr>
<td align="center" class="menu"><a href="{@HREF}" class="menu"><xsl:value-of select="@TITLE" disable-output-escaping="yes"/></a></td>
</tr>
</table>
</td>
            </xsl:otherwise>
	    </xsl:choose>
  		<xsl:if test="position()!=last()">
              <td width="1" bgcolor="#5A656D"></td>
  		</xsl:if>
	</xsl:template>	

</xsl:stylesheet>
