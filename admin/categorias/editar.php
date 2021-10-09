<?php
session_start();
if (session_is_registered('user_login')) {

include "../fckeditor/fckeditor.php";
?>

<html>
<head>
<title>::. Administração .::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link rel="stylesheet" type="text/css" href="../../scripts/padrao.css">
<link type="text/css" rel="stylesheet" href="../../scripts/calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>

<script language="JavaScript" src="../../scripts/scripts.js"></script>
<SCRIPT type="text/javascript" src="../../scripts/calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
<script language="JavaScript" src="../../scripts/overlib.js"></script>

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
    <td width="800" valign="top">
	
	<?php
if(isset($envia) and ($envia == "editar")){
$conexao = mysql_connect($host, $user, $pass);
    mysql_select_db($db, $conexao);
   
$sql = "SELECT * FROM `tb_categorias` WHERE cp_id=$id";
   $resultado = mysql_query($sql, $conexao);
   $linha = mysql_fetch_row($resultado);



/////////////////////////

if(isset($envia)){


$sql = "UPDATE tb_categorias SET
        cp_nome='$form_nome'		
		WHERE cp_id='$id'";
		


if(@mysql_query($sql)){
print("<br><br><p align=\"center\"><font color=\"#FF0000\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Alterado com sucesso!<br><br><br><br><a href=alterar.php> <font color=\"003399\">Visualizar</a></font></font></p><br><br><br><br><br><br><br>");
} else {
print("<p align=\"center\"><font color=\"#cc0000\" size=\"1\"><b>Erro ao adicionar " . mysql_error() . '</b></font></p><br><br><br><br><br><br><br>');
}
}
}

//Verifica se a variavel editar foi setada
elseif(isset($editar)){
$conexao = mysql_connect($host, $user, $pass);
    mysql_select_db($db, $conexao);
//Realiza a consulta no banco de dados, e coloca o resultado no formulário
$id = $editar;
$sql = "SELECT * FROM `tb_categorias` WHERE cp_id=$editar";
/*"SELECT diretorio, largura, altura, produto, conteudo FROM ofertas WHERE ID=$editar";*/
$resultado = mysql_query($sql);
while($row = mysql_fetch_row($resultado)){
$cp_nome = $row[1];


?>

        <form action="<?=$_SERVER['PHP_SELF'] ?>?acao=editar" method="post" enctype="multipart/form-data" onSubmit="return Valida_add_categoria();" name="form1">
	<input type="hidden" name="id" value="<? print($id); ?>">
	<table border="0" cellpadding="0" cellspacing="0" class="branco10b" align="center" width="750">
        <tr> 
          <td height="30" align="center" bgcolor="#003334"><b>Alterar Categoria do Produto</b></td>
        </tr>
		<tr><td height="10"></td></tr>
		</table>
		      <table border="0" cellpadding="0" cellspacing="0" class="menu3" align="center" width="750">
		<tr> 
          <td  height="20" class="menu3" align="right"><font color="cc0000">*</font> <b>Categoria:</b> &nbsp;</td>
		  <td ><input type="text" class="menu3" size="120" name="form_nome" value="<?  print($cp_nome); ?>" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc">		  </td>
        </tr>
				<tr>
			<td height="10" colspan="2"></td>
		</tr>

		
		

		
		<tr>
			<td height="10"colspan="2"></td>
		</tr>		

        <tr> 
          <td colspan="2" height="20" class="menu3"><font color="cc0000">*</font> Campos obrigatórios </td>
         </tr>
		</table>

  <table border="0" cellpadding="0" cellspacing="1" align="center" class="menu3" width="500">
  
    <tr> 
      <td height="40">
	   <input type="hidden" class="menu3" name="id" value="<? print($id); ?>">
	   <input type="hidden" name="envia" value="editar">
	   <input class="menu3" type="submit" name="enviar" value="ENVIAR" style="color: #000000; background-color: #e5e5e5; border: 1 solid #cccccc">
      <td></td>
    </tr>
  </table>
  </form>
<?php

}
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
<br><br><br>
</body>
</html>
<?php

}else{
print("<html>\n<head>\n<title>Error!!</title>\n</head>\n<body>\n");
print("<center><pre>Usuário não fornecido, dirija-se para <a href='../../index.php' target='_self'>Painel de Administração</a> para ser logado</pre></center>\n");
print("</body>\n</html>");
}
?>