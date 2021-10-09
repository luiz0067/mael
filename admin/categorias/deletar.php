<?php
session_start();
if (session_is_registered('user_login')) {
?>

<?php
require("../../scripts/conexao.inc.php"); //arquivo incluido que contem todas as variaveis necessarias para conexao com o MYSQL
require("../../scripts/funcao.php"); //arquivo que contem algumas funcoes basicas

conexao_mysql($host,$user,$pass,$db); //funcao para conexao com o MYSQL
?>
<html>
<head>
<title>::. Administração .::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../../scripts/padrao.css">

<!--Valida!-->
<script language="JavaScript" src="../../scripts/scripts.js"></script>

</head>

<body topmargin="0" leftmargin="0" rightmargin="0" background="../../img/bk.jpg">



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
	
	
<?php

//Se a notícia for deletada
if(isset($deleta)){
$conexao = mysql_connect("$host", "$user", "$pass");
    mysql_select_db("$db", $conexao);

$id = $deleta;

/////////////////////////////////////////////////////////////////////

	$resultado_conta = mysql_query("SELECT * FROM `tb_procat` WHERE cp_idtbcategorias=$id");
	$quantreg = mysql_num_rows($resultado_conta); 
	
		if ($quantreg == 0){
		
	$sql = "DELETE FROM tb_categorias WHERE cp_id=$id";
	

}else{
	print "<SCRIPT> alert('Ainda existem Produtos nesta Categoria, por favor exclua primeiramente todos os produtos desta Categoria para depois excluí-la.'); window.history.go(-1); </SCRIPT>";
	}

//////////////////////////////////////////////////////////////////////


if(@mysql_query($sql)){
print("<br><br><p align=\"center\" class=\"menu3\"><font color=\"#ff0000\"><b>Excluido com sucesso!</font><br><br> <a href=javascript:history.go(-1)><font color=\"#003399\">Voltar</font></a></p>");
} else {

print("<p align=\"center\" class=\"menu3\"><font color=\"#FF0000\" size=\"1\">Erro ao excluir " . mysql_error() . '</font></p>');
}

?>
<?php
}else{
print("<html>\n<head>\n<title>Error!!</title>\n</head>\n<body>\n");
print("<center><pre>Usuário não fornecido, <a href=../../index.php>Clique Aqui</a> faça seu login</pre></center>\n");
print("</body>\n</html>");
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