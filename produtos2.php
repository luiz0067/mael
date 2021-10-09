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
$sql = "SELECT * FROM `tb_produtos` WHERE cp_categoria = '$line' ORDER BY cp_titulo ASC";

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

print("oziel
<br><br>
</font>");

if (($linha[6] <> "") or ($linha[7] <> "") or ($linha[8] <> "") or ($linha[13] <> "") or ($linha[9] <> "") or ($linha[10] <> "") or ($linha[14] <> "")){
print ("
<table width=\"350\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" bordercolor=\"#CCCCCC\" class=\"texto\" align=\"center\">
  <tr>");
}
////////////////////////////////////////
////////// calcula colspam  ////////////
////////////////////////////////////////    
if ($linha[6] <> "") { $a1 = 1; }else{ $a1 = 0; }  
if ($linha[7] <> "") { $b1 = 1; }else{ $b1 = 0; }  
if ($linha[8] <> "") { $c1 = 1; }else{ $c1 = 0; }  
if ($linha[13] <> "") { $d1 = 1; }else{ $d1 = 0; }  
$col_a = $a1 + $b1 + $c1 + $d1;

if ($linha[9] <> "") { $e1 = 1; }else{ $e1 = 0; }  
if ($linha[10] <> "") { $f1 = 1; }else{ $f1 = 0; }  
if ($linha[14] <> "") { $g1 = 1; }else{ $g1 = 0; }  
$col_b = $e1 + $f1 + $g1;
////////////////////////////////////////
///////// fim calcula colspam  /////////
////////////////////////////////////////    

if (($linha[6] <> "") or ($linha[7] <> "") or ($linha[8] <> "") or ($linha[13] <> "")){
print("<td colspan=\"$col_a\" height=\"25\" align=\"center\"><strong>Dimensão Total</strong></td>");
}

if (($linha[9] <> "") or ($linha[10] <> "") or ($linha[14] <> "")){
print("<td colspan=\"$col_b\" align=\"center\"><img src=\"img/nicho.jpg\" width=\"100\" height=\"20\"></td>");
}

print("</tr>
    <tr class=\"preto10\">");
	

if ($linha[6] <> ""){
print ("<td align=\"center\" height=\"25\"><strong>Altura</strong></td>");
}

if ($linha[7] <> ""){
print ("<td align=\"center\" height=\"25\"><strong>Comprimento</strong></td>");
}

if ($linha[8] <> ""){
print ("<td align=\"center\" height=\"25\"><strong>Largura</strong></td>");
}

if ($linha[13] <> ""){
print ("<td align=\"center\" height=\"25\"><strong>Diâmetro</strong></td>");
}

if ($linha[9] <> ""){
print ("<td align=\"center\" height=\"25\"><strong>Comprimento</strong></td>");
}

if ($linha[10] <> ""){
print ("<td align=\"center\" height=\"25\"><strong>Largura</strong></td>");
}

if ($linha[14] <> ""){
print ("<td align=\"center\" height=\"25\"><strong>Diâmetro</strong></td>");
}


 print ("</tr>
 <tr class=\"preto12\">");


  
if ($linha[6] <> ""){
print ("<td align=\"center\" height=\"20\">$linha[6]mm</td>");
}

if ($linha[7] <> ""){
print ("<td align=\"center\" height=\"20\">$linha[7]mm</td>");
}

if ($linha[8] <> ""){
print ("<td align=\"center\" height=\"20\">$linha[8]mm</td>");
}

if ($linha[13] <> ""){
print ("<td align=\"center\" height=\"20\">$linha[13]mm</td>");
}

if ($linha[9] <> ""){
print ("<td align=\"center\" height=\"20\">$linha[9]mm</td>");
}

if ($linha[10] <> ""){
print ("<td align=\"center\" height=\"20\">$linha[10]mm</td>");
}

if ($linha[14] <> ""){
print ("<td align=\"center\" height=\"20\">$linha[14]mm</td>");
}
 
 
if (($linha[6] <> "") or ($linha[7] <> "") or ($linha[8] <> "") or ($linha[13] <> "") or ($linha[9] <> "") or ($linha[10] <> "") or ($linha[14] <> "")){
 print ("</tr>
</table>");
}



print("</td>
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
