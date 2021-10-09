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
if(isset($envia)){
print("<font face=\"Verdana,Arial,Helvetica,sans-serif\" size=\"1\" color=\"#000000\">");

conexao_mysql($host,$user,$pass,$db);//funcao para conexao com o MYSQL

if(isset($envia)){

$sql = "INSERT INTO tb_categorias SET
        cp_nome='$form_nome'";

	   
if(@mysql_query($sql)){
print("<br><br><p align=\"center\"><font color=\"#FF0000\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Adicionado com sucesso!
      <br><br><a href=adicionar.php><font color=\"003399\">Adicionar outra</font></a> | <a href=alterar.php> <font color=\"003399\">Visualizar</a></font></p><br><br><br><br><br><br><br><br><br><br><br>");
} else {
print("<p align=\"center\"><font color=\"#cc0000\" size=\"1\"><b>Erro ao adicionar " . mysql_error() . '</b></font></p><br>');
}
}
} else { //Se a variavel envia não for setada
?>

<div align="center">
<center>
    <form action="<?=$_SERVER['PHP_SELF'] ?>?acao=editar" method="post" enctype="multipart/form-data" onSubmit="return Valida_add_categoria();" name="form1">
      <table border="0" cellpadding="0" cellspacing="0" class="branco10b" align="center" width="750">
        <tr> 
          <td height="30" align="center" bgcolor="#003334"><b>Adicionar Categoria para Produtos</b></td>
        </tr>
		<tr><td height="10"></td></tr>
		</table>

   <table border="0" cellpadding="0" cellspacing="0" class="menu3" align="center" width="750">
        <tr> 
          <td width="80" height="20" class="menu3" align="right"><font color="cc0000">*</font> <b>Categoria:</b> &nbsp;</td>
		  <td width="670"><input type="text" class="menu3" size="80" name="form_nome" value="" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc"></td>
        </tr>
		<tr>
			<td height="10" colspan="2"></td>
		</tr>
        

        <tr> 
          <td colspan="2" height="20" class="menu3"><font color="cc0000">*</font> Campos obrigatórios </td>
         </tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" class="menu3" align="center" width="750">
        <tr> 
          <td height="40"> <input type="hidden" name="escolher">
            <input type="submit" class="menu3" name="envia" value="Adicionar" style="color: #000000; background-color: #e5e5e5; border: 1 solid #cccccc"> 
            &nbsp;&nbsp;&nbsp; <input type="reset" class="menu3" name="limpa" value="Limpar" style="color: #000000; background-color: #e5e5e5; border: 1 solid #cccccc">
            </td>
        </tr>
      </table>
	   </form>
</center>
</div>
	
	
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
}
}else{
print("<html>\n<head>\n<title>Error!!</title>\n</head>\n<body>\n");
print("<center><pre>Usuário não fornecido, dirija-se para <a href='../../index.php' target='_self'>Painel de Administração</a> para ser logado</pre></center>\n");
print("</body>\n</html>");
}
?>