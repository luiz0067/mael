<?php
require("scripts/conexao.inc.php"); //arquivo incluido que contem todas as variaveis necessarias para conexao com o MYSQL
require("scripts/funcao.php"); //arquivo que contem algumas funcoes basicas

conexao_mysql($host,$user,$pass,$db); //funcao para conexao com o MYSQL
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::. .::</title>

<link rel="stylesheet" href="scripts/padrao.css"  type="text/css"  media="screen">
<script language="JavaScript" src="scripts/scripts.js"></script>
<script language="JavaScript" src="scripts/overlib.js"></script>
<script language="javascript" src="scripts/lytebox.js"></script>

</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginheight="0" marginwidth="0" onLoad="atualizaIframe();">
<div id="container">
<table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
  <tr>
    <td height="80" valign="bottom"><img src="img/tit_produtos.jpg" width="350" height="60"></td>
  </tr>
</table>

<table width="800" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="80" valign="middle" align="center" class="texto">
<?php
	
   $conexao = mysql_connect("$host", "$user", "$pass");
    mysql_select_db("$db", $conexao);
   
   $consulta = "SELECT * FROM `tb_categorias`";
   $resultado = mysql_query($consulta, $conexao);
   
   $i = "0";

print("<strong>Selecione qual linha de produtos deseja acessar:</strong><br><br><br>");
   
while ($linha = mysql_fetch_row($resultado)) {

print("
<table width=\"300\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
  <tr>
  <td width=\"20\" height=\"30\" bgcolor=\"#666666\"></td>
    <td width=\"390\" valign=\"middle\" align=\"center\" class=\"texto\" bgcolor=\"#f5f5f5\">
<a href=\"produtos2.php?line=$linha[1]\"><font color=\"#cc0000\"><strong>$linha[1]</strong></font></a>
</td>
</tr>
</table>
<br><br>
  ");

$i = $i + "1";

}

if ($i == "0"){
	printf ("<font class=\"v11b\">Nenhum dado até o momento</font>");
}
?></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="80" valign="middle" align="center" class="texto"><a href="javascript:history.back()" target="_self"><font color="#cc0000"><strong>&laquo; voltar</strong></font></a></td>
  </tr>
</table>

</div>
</body>
</html>
