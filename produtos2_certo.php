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
<br>
<table width="850" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
  <tr>
    <td height="40" valign="middle" bgcolor="#666666" class="branco16b" align="center"><?php print ("$line"); ?></td>
  </tr>
</table>
<br><br>
<?
 //*********************************************************************
 // GERA A INSTRUÇÃO SQL E CHAMA A FUNÇÃO PARA GERAR AS COLUNAS
 //*********************************************************************
$sql = "SELECT * FROM `tb_produtos` WHERE cp_categoria = '$line' ORDER BY cp_id ASC";

 GeraColunas(2, $sql)

 ?>
<?
//*********************************************************************
// FUNÇÃO: GERACOLUNAS
// Parametros:
//  $pNumColunas (int)   > Quant. de colunas para distribuição
//  $pQuery    (string) > Query de registros
//*********************************************************************
function GeraColunas($pNumColunas, $pQuery) {
$resultado = mysql_query($pQuery);
echo ("<table width='850' border='0' cellspacing=\"0\" cellpadding=\"0\" align=\"center\"  hspace=\"0\" vspace=\"0\">\n");
 for($i = 0; $i <= mysql_num_rows($resultado); ++$i) {
 
 for ($intCont = 0; $intCont < $pNumColunas; $intCont++) {
  $linha = mysql_fetch_array($resultado);
  if ($i > $linha) {
   if ( $intCont < $pNumColunas-1) echo "</tr>\n"; 
   break;
  }


  if ( $intCont == 0 ) echo "<tr>\n";
  
  
  echo "<td align=\"left\" valign=\"top\">\n";
  
/////////////////////////////////////////////////////////////////////////////////  
////////////////////////////////////////////// INÍCIO tabela que vai se repetir
/////////////////////////////////////////////////////////////////////////////////  

  printf("
<table width=\"425\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
  <tr>
    <td width=\"425\" valign=\"top\" class=\"texto\">

<table width=\"410\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
  <tr>
  <td width=\"20\" bgcolor=\"#666666\"></td>
    <td width=\"390\" valign=\"middle\" class=\"texto\" background=\"img/bartiti.jpg\" height=\"40\">
&nbsp;&nbsp; <strong><font color=\"#cc0000\">$linha[3]</font></strong><br>
&nbsp;&nbsp; <font color=\"#000000\">$linha[5]</font>
 </td>
 </tr>
 </table>
<br><br>
 
<center><a href=\"admin/upload_imagens/$linha[1]\" rel=\"lytebox[vacation]\" title=\"$linha[3]\" onMouseOver=\"return overlib('Ampliar imagem',CAPTION,'')\" onMouseOut=\"return nd()\"><img src=\"admin/upload_imagens/$linha[2]\" width=\"300\" class=\"bordaverde\"></a></center><br>
<font class=\"cinza10\">");

print(nl2br(htmlentities("$linha[4]")));

print("
<br><br>
</font>");


if (($linha[6] <> "") and ($linha[7] <> "") and ($linha[8] <> "") and ($linha[9] <> "") and ($linha[10] <> "")){
print ("
<table width=\"350\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" bordercolor=\"#CCCCCC\" class=\"texto\" align=\"center\">
  <tr>
    <td colspan=\"3\" height=\"25\" align=\"center\"><strong>Dimensão Total</strong></td>
    <td colspan=\"2\" align=\"center\"><img src=\"img/nicho.jpg\" width=\"100\" height=\"20\"></td>
  </tr>
  <tr class=\"preto10\">
    <td align=\"center\" height=\"25\"><strong>Altura</strong></td>
    <td align=\"center\"><strong>Comprimento</strong></td>
    <td align=\"center\"><strong>Largura</strong></td>
    <td align=\"center\"><strong>Comprimento</strong></td>
    <td align=\"center\"><strong>Largura</strong></td>
  </tr>
  <tr class=\"preto12\">
    <td align=\"center\" height=\"20\">$linha[6]mm</td>
    <td align=\"center\">$linha[7]mm</td>
    <td align=\"center\">$linha[8]mm</td>
    <td align=\"center\">$linha[9]mm</td>
    <td align=\"center\">$linha[10]mm</td>
  </tr>
</table>");
}

if (($linha[6] == "") and ($linha[7] == "") and ($linha[8] == "") and ($linha[9] == "") and ($linha[10] == "")){
print ("");
}

if (($linha[6] <> "") and ($linha[7] <> "") and ($linha[8] <> "") and ($linha[9] == "") and ($linha[10] == "")){
print ("
<table width=\"250\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" bordercolor=\"#CCCCCC\" class=\"texto\" align=\"center\">
  <tr>
    <td colspan=\"3\" height=\"25\" align=\"center\"><strong>Dimensão Total</strong></td>
  </tr>
  <tr class=\"preto10\">
    <td align=\"center\" height=\"25\"><strong>Altura</strong></td>
    <td align=\"center\"><strong>Comprimento</strong></td>
    <td align=\"center\"><strong>Largura</strong></td>
  </tr>
  <tr class=\"preto12\">
    <td align=\"center\" height=\"20\">$linha[6]mm</td>
    <td align=\"center\">$linha[7]mm</td>
    <td align=\"center\">$linha[8]mm</td>
  </tr>
</table>");
}


print("	</td>
    <td width=\"15\" rowspan=\"2\">&nbsp;</td>
  </tr>
  <tr>
    <td height=\"40\"></td>

  </tr>
</table>  ");



/////////////////////////////////////////////////////////////////////////////////  
////////////////////////////////////////////// FIM tabela que vai se repetir
/////////////////////////////////////////////////////////////////////////////////  

  echo "</td>\n";

  if ( $intCont == $pNumColunas-1 ) {
   echo "</tr>\n";
  } else { $i++; }
 } 
 
 }
echo ('</table>');
}

?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="80" valign="middle" align="center" class="texto"><a href="javascript:history.back()" target="_self"><font color="#cc0000"><strong>&laquo; voltar</strong></font></a></td>
  </tr>
</table>

</div>
</body>
</html>
