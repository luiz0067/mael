<?php
session_start();
require("../../scripts/conexao.inc.php"); //alterar de acordo com seu diretorio
$corpo = false;

if (!session_is_registered('user_login')) { //realiza a identificacao com o banco de dados

   if (isset($user_login) and ($user_login != "") and isset($user_pass) and ($user_pass != "")) {
    if (isset($host) and isset($db) and isset($user) and isset($pass)) {
    $conexao = mysql_connect($host, $user, $pass) or die("Impossível conectar-se ao mysql...<br>");

    mysql_select_db($db) or die("Impossível conectar-se com o banco de dados: " . $db . '<br>');

    $resultado = mysql_query("SELECT cp_user,cp_pass,cp_status FROM tb_login WHERE cp_user='$user_login'");
    if(!$resultado){
    die("Impossível realizar a consulta!" . mysql_error());
    }

    $line = mysql_fetch_array($resultado);

    if (strtolower($line[0]) == strtolower($user_login)) {
        if ($line[1] == $user_pass) {
            $corpo = true;
            $estatos = $line[2];
            session_register('estatos');
            session_register('user_login');
            session_register('user_pass');
            $data = date("Y-m-d H:i:s");
            $resultado1 = mysql_query("UPDATE tb_login SET cp_ip='$REMOTE_ADDR', cp_data='$data' WHERE cp_user='$user_login'");
            if(!$resultado1){
            die("Impossível realizar a consulta!" . mysql_error());
            }
        }else{
            print("<center><font size='2' face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff'><br><br><b>Senha Incorreta!</b></font></center>");
        }
    }else{
        print("<center><font size='2' face='Verdana, Arial, Helvetica, sans-serif' color='#ffffff'><br><br><b>Usuário Incorreto!</b></font></center>");
    }
}
}
}else{
    $corpo = true;
}
if (!$corpo) {  //campo para login e password
print("<body topmargin='0' leftmargin='0' rightmargin='0' background='../../img/bk.jpg'><head><title>Administração do Site</title><link rel='stylesheet' type='text/css' href='../../scripts/padrao.css'></head><body>");
print("<br><br><br><br><br><br><form name='forma' method='post' action='index.php'>");
print("<table width='463' border='0' bordercolor='#333333' align='center' bgcolor='#ffffff'>");
print("<tr bordercolor='#FFFFFF'><td colspan='2'>");
print("<div align='center' class='menu4'><img src='../img/logo.jpg' width='201' height='99'><br><br>Acesso a área administrativa do site</div>");
print("</td></tr><tr valign='top' bordercolor='#FFFFFF'><td colspan='2' height='34'>");
print("</td></tr><tr bordercolor='#FFFFFF'><td width='181'><div align='right' class='menu3'><b>Usuário:</b></div>");
print("</td><td width='272'><input type='text' name='user_login' class='menu3' style='color: #CC0000; background-color: #FFFFFF; border: 1 solid #666666'></td></tr>");
print("<tr bordercolor='#FFFFFF'><td width='181'><div align='right' class='menu3'><b>Senha:</b></font></div></td>");
print("<td width='272'><input type='password' name='user_pass' class='menu3' style='color: #CC0000; background-color: #FFFFFF; border: 1 solid #666666'></td></tr><tr bordercolor='#FFFFFF'>");
print("<td colspan='2' height='57'><div align='center'><input type='submit' name='Submit' value='Entrar' class='menu3' style='color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666'></div>");
print("</td></tr></table></form></body></html>");
}

if ($corpo) {
          if (isset($acao) and ($acao == "logout")) {
          session_destroy();
          print("<p align='center'><table width='300' border='0'>");
          print("<tr><td width='50%' class='menu3'><p align='center'>Você está fora da administração!<br><a href='adm_noticias.php'>[Click aqui para entrar!]</a></td></tr></table>");
          die;
          }

 ?>
<html>
<head>
<title>::. Administração .::. Portal Toledo .::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../../scripts/padrao.css">
<script language="JavaScript" src="../../scripts/scripts.js"></script>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0"  background="../../img/bk.jpg">
<?php include "../topo_base_menu/topo.php"; ?>

<table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#cc0000">
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
?>