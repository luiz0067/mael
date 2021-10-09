<?php
session_start();
if (session_is_registered('user_login')) {
?>

<html>
<head>
<title>::. Administração .::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../../scripts/padrao.css">

<!--Valida!-->
<script language="JavaScript" src="../../scripts/scripts.js"></script>
<script language="JavaScript" src="../../scripts/overlib.js"></script>

<script language="javascript">
function confirma() {
  if (confirm("Deseja realmente apagar este registro?")) {
     document.location.href = "deletar.php?acao=deleta&deleta=$linha[0]";
  }
  else {
     return false;
  }
  return true;
}
</script>

</head>

<body topmargin="0" leftmargin="0" rightmargin="0" background="../../img/bk.jpg">

<?php
require("../../scripts/conexao.inc.php"); //arquivo incluido que contem todas as variaveis necessarias para conexao com o MYSQL
require("../../scripts/funcao.php"); //arquivo que contem algumas funcoes basicas

conexao_mysql($host,$user,$pass,$db); //funcao para conexao com o MYSQL
?>

<?php include "../topo_base_menu/topo.php"; ?>

<table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#003334">
  <tr>
    <td height="1"></td>
  </tr>
</table>

 <table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td>
	<table width="950" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="150" valign="top">
<?php include "../topo_base_menu/menu.php"; ?>
 	</td>
    <td width="800" valign="top" height="450">
	
	<table border="0" cellpadding="0" cellspacing="0" class="branco10b" align="center" width="750">
        <tr> 
          <td height="30" align="center" bgcolor="#003334"><b>Alterar / Excluir Categorias de Produtos</b></td>
        </tr>
		<tr><td height="10"></td></tr>
		</table>

	<?php

	  $numreg = 30; // Quantos registros por página vai ser mostrado
    if (!isset($_GET['pg'])) {
        $_GET['pg'] = 0;
    }
    $inicial = $_GET['pg'] * $numreg;

   $conexao = mysql_connect("$host", "$user", "$pass");
    mysql_select_db("$db", $conexao);
   
   $resultado = mysql_query("SELECT * FROM `tb_categorias` ORDER BY cp_nome ASC LIMIT $inicial, $numreg");
   $resultado_conta = mysql_query("SELECT * FROM `tb_categorias`");
		$quantreg = mysql_num_rows($resultado_conta); // Quantidade de registros pra paginação
   
   $i = "0";
   
echo "<table border=0 class='menu3' align='center' cellpadding='0' cellspacing='0' width='750'>
<tr><td height='5'></td></tr></table><table border=0 class='menu3' align='center' cellpadding='0' cellspacing='0'>\n";
while ($linha = mysql_fetch_row($resultado)) {

  printf("<tr>");

  printf("<td width='30' height='15' align='left'><a href=deletar.php?acao=deleta&deleta=$linha[0] Onclick='return confirma();' onMouseOver=\"return overlib('excluir',CAPTION,'')\" onMouseOut=\"return nd()\"><img src=\"../img/excluir.jpg\" border=\"0\"></a></td>");
  printf("<td width='30' height='15' align='left'><a href=editar.php?acao=editar&editar=$linha[0] onMouseOver=\"return overlib('editar',CAPTION,'')\" onMouseOut=\"return nd()\"><img src=\"../img/alterar.jpg\" border=\"0\"></a></td>");
  printf("<td width='690' align='left'class=\"menu3\">");
 
  printf("&nbsp; <font class=\"menu3\"><font color=\"#cc0000\">-</font></font> $linha[1]");

 
  printf("</td>");
 printf("</tr>");
  printf("<tr><td height='3' background='../img/bk3.jpg' colspan='4'></td></tr>");
 
 $i = $i + "1";
}
echo "</table>\n";

if($quantreg > $numreg){
echo("<br>\n");
include("../paginacao.php");
}

if ($i == "0"){
	printf ("<div class=menu3 align=center>Nenhum registro até o momento</div><br>");
}

 ?>
	
	</td>
  </tr>
</table>

	
	</td>
  </tr>
</table>
<?php include "../topo_base_menu/base.php"; ?>
</body>
</html>
<?php

}else{
print("<html>\n<head>\n<title>Error!!</title>\n</head>\n<body>\n");
print("<center><pre>Usuário não fornecido, dirija-se para <a href='../../index.php' target='_self'>Painel de Administração</a> para ser logado</pre></center>\n");
print("</body>\n</html>");
}
?>