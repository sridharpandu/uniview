<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:php="http://php.net/xsl">

<xsl:param name="memberid" />
 <xsl:template match="/">
<html>

 <body>
  <table border="1" width="100%" style="border-collapse: collapse;" id="xdoctable"> 
	<tr>
        <td><div align="center"><xsl:value-of select="bill/clubname"/></div></td>
	</tr>
  </table>
  <table border="1" width="100%" style="border-collapse: collapse;" id="xdoctable"> 
	<tr>
        <td><div align="center"><xsl:value-of select="bill/address"/></div></td>
	</tr>
  </table>
  <table border="1" width="100%" style="border-collapse: collapse;" id="xdoctable"> 
	<tr>
        <td><div align="center"><xsl:value-of select="bill/city"/></div></td>
	</tr>
  </table>

  <xsl:for-each select="bill/member[membernumber=$memberid]">
   <table border="1" width="100%" style="border-collapse: collapse;" id="xdoctable"> 
	<tr>
        <td width="50px"><div align="center"><xsl:value-of select="membername"/></div></td>
        <td width="50px"><div align="center"><xsl:value-of select="memberphonenumber"/></div></td>
        <td width="50px"><div align="center"><xsl:value-of select="memberemail"/></div></td>
	</tr>
   </table>
   <table border="1" width="100%" style="border-collapse: collapse;" id="xdoctable"> 
 	<tr >
        <td width="50px"><div align="center"><xsl:value-of select="membernumber"/></div></td>
	
        <td width="107px"><div align="center"><xsl:value-of select="billnumber"/></div></td>
	</tr>
   </table>
   <table border="1" width="100%" style="border-collapse: collapse;" id="xdoctable"> 
        <tr>	
	<td width="50px"><div align="center"><xsl:value-of select="memberaddress1"/>,
                                <xsl:value-of select="memberaddress2"/>,
				<xsl:value-of select="memberaddress3"/></div></td>
	</tr>
	<tr>
	<td width="50px"><div align="center"><xsl:value-of select="membercity"/>-<xsl:value-of select="memberpostalcode"/></div></td>      
	</tr>
    </table>

 <h5>Bill Information,</h5>
 <xsl:for-each select="line">
   <table border="1" width="100%" style="border-collapse: collapse;" id="xdoctable"> 
	<tr>
        <td colspan="2" width="50px"><div align="center"><xsl:value-of select="particular1"/></div></td>
        <td colspan="2" width="50px"><div align="center"><xsl:value-of select="amount1"/></div></td>   
	<xsl:choose>
      <xsl:when test="particular2 != ''">
       <td colspan="2" width="150px"><div align="center"><xsl:value-of select="particular2"/></div></td>
        <td colspan="2" width="187px"><div align="center"><xsl:value-of select="amount2"/></div></td>
</xsl:when>
    </xsl:choose>
	</tr>
   </table>
   </xsl:for-each>
   </xsl:for-each>

 </body>
</html>
 </xsl:template>
</xsl:stylesheet>



