<?php
require("scripts/conexao.inc.php"); //arquivo incluido que contem todas as variaveis necessarias para conexao com o MYSQL
require("scripts/funcao.php"); //arquivo que contem algumas funcoes basicas

conexao_mysql($host,$user,$pass,$db); //funcao para conexao com o MYSQL
?>

<?php 

if(@$_POST['send'] == "true"){ // Se o form nao for preenchido ele nao ira enviar o email>>>
	
	$destinatario = "vendas1@maelluminarias.com.br, valmir@portaltoledo.com.br";
    //$destinatario = "valmir@portaltoledo.com.br";
	
	$assunto = "Cotacao do Site - Mael";		// Aqui voce coloca o ASSUNTO do email>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	$mensagem = htmlspecialchars($mensagem); // Isso aqui é pra Desabilitar Tag's HTML (Muito Util)
	$IP = $_POST['IP']; 
    $headers  = "Content-Type: text/html; charset=iso-8859-1\n"; 
	$headers .= "From: Site Mael";
	$fonte = "<font size=\"-4\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#000000\">";
	$fonte2 = "<font size=\"-4\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#cc0000\">";	
	
$msg .= "<table width=\"646\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse: collapse; border-top-width:0\" bordercolor=\"#cccccc\" align=\"center\">
  <tr> 
    <td align=\"left\" width=\"70\" height=\"16\"> &nbsp; <strong>$fonte Nome</strong></td>
    <td align=\"left\" width=\"253\" height=\"16\">$fonte2 &nbsp; $nome</td>
    <td align=\"left\" width=\"60\"> &nbsp; <strong>$fonte E-mail</strong></td>
    <td align=\"left\" width=\"263\">$fonte2 &nbsp; $email</td>
  </tr>
  <tr> 
    <td align=\"left\"> &nbsp; <strong>$fonte Empresa</strong></td>
    <td align=\"left\">$fonte2 &nbsp; $empresa</td>
    <td align=\"left\" height=\"16\"> &nbsp; <strong>$fonte CNPJ</strong></td>
    <td align=\"left\" height=\"16\">$fonte2 &nbsp; $cnpj</td>
  </tr>
  <tr> 
    <td align=\"left\" height=\"16\"> &nbsp; <strong>$fonte Endereço</strong></td>
    <td align=\"left\" height=\"16\" colspan=\"3\">$fonte2 &nbsp; $endereco</td>
  </tr>
  <tr> 
    <td align=\"left\" height=\"16\"> &nbsp; <strong>$fonte Fone</strong></td>
    <td align=\"left\" height=\"16\">$fonte2 &nbsp; $fone</td>
    <td align=\"left\" height=\"16\"> &nbsp; <strong>$fonte Cidade</strong></td>
    <td align=\"left\" height=\"16\">$fonte2 &nbsp; $cidade</td>
  </tr>
  <tr> 
    <td align=\"left\" height=\"16\"> &nbsp; <strong>$fonte Bairro</strong></td>
    <td align=\"left\" height=\"16\">$fonte2 &nbsp; $bairro</td>
    <td align=\"left\" height=\"16\"> &nbsp; <strong>$fonte Estado</strong></td>
    <td align=\"left\" height=\"16\">$fonte2 &nbsp; $estado</td>
  </tr>
  <tr>
  <td> &nbsp; <strong>$fonte Obs.:</strong></td>
  <td colspan=\"3\">$fonte2 &nbsp; $obs</td>
  </tr>
</table><br>";

///////////////////////////////////////////////////////////////////////////////////////////////////  tabela canopla

$msg .= "<table width=\"646\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse: collapse; border-top-width:0\" bordercolor=\"#cccccc\" align=\"center\">
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>Qtd.</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte <strong>Linha</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; <strong>$fonte <strong>Produto</strong></font></strong> &nbsp;</td>
    <td align=\"left\">&nbsp; <strong>$fonte <strong>Aleta</strong></font></strong> &nbsp;</td>
    <td align=\"left\">&nbsp; <strong>$fonte <strong>Cor</strong></font></strong> &nbsp;</td>
    <td align=\"left\">&nbsp; <strong>$fonte <strong>Composição</strong></font></strong> &nbsp;</td>
  </tr>";

//////////////////////////////////////////
	
   $conexao = mysql_connect("$host", "$user", "$pass");
    mysql_select_db("$db", $conexao);
   
   $consultax = "SELECT * FROM `tb_produtos` ORDER BY cp_categoria ASC, cp_titulo ASC";
   $resultadox = mysql_query($consultax, $conexao);
   
while ($linhax = mysql_fetch_row($resultadox)) {

$quant = $_POST['qtd'."$linhax[0]"];
$tipoaleta = $_POST['tp_aletas'."$linhax[0]"];
$cor = $_POST['tp_cor'."$linhax[0]"];
$compo = $_POST['tp_compo'."$linhax[0]"];

$quant1 = $_POST['q1td'."$linhax[0]"];
$quant2 = $_POST['q2td'."$linhax[0]"];
$quant3 = $_POST['q3td'."$linhax[0]"];
$quant4 = $_POST['q4td'."$linhax[0]"];
$quant5 = $_POST['q5td'."$linhax[0]"];
$quant6 = $_POST['q6td'."$linhax[0]"];
$quant7 = $_POST['q7td'."$linhax[0]"];
$quant8 = $_POST['q8td'."$linhax[0]"];
$quant9 = $_POST['q9td'."$linhax[0]"];
$quant10 = $_POST['q10td'."$linhax[0]"];
$quant11 = $_POST['q11td'."$linhax[0]"];
$quant12 = $_POST['q12td'."$linhax[0]"];
$quant13 = $_POST['q13td'."$linhax[0]"];
$quant14 = $_POST['q14td'."$linhax[0]"];


if ($quant == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}


if ($quant1 == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant1</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3] 1 x 14W</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}


if ($quant2 == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant2</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3] 2 x 14W</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}


if ($quant3 == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant3</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3] 1 x 16W</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}


if ($quant4 == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant4</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3] 2 x 16W</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}


if ($quant5 == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant5</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3] 1 x 20W</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}


if ($quant6 == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant6</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3] 2 x 20W</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}


if ($quant7 == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant7</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3] 1 x 28W</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}


if ($quant8 == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant8</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3] 2 x 28W</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}


if ($quant9 == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant9</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3] 1 x 32W</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}


if ($quant10 == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant10</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3] 2 x 32W</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}


if ($quant11 == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant11</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3] 1 x 40W</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}


if ($quant12 == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant12</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3] 2 x 40W</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}


if ($quant13 == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant13</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3] 1 x 54W</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}


if ($quant14 == ""){
}else{
$msg .= "
   <tr> 
    <td align=\"right\" height=\"16\">&nbsp; $fonte2 <strong>$quant14</strong></font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[11]</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $linhax[3] 2 x 54W</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $tipoaleta</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $cor</font> &nbsp;</td>
    <td align=\"left\">&nbsp; $fonte $compo</font> &nbsp;</td>
  </tr>";

}






}

$msg .= "</table><br>";

//////////////////////////////////////////

	
	
	
	
    $envia = mail("$destinatario", "$assunto", "$msg", "$headers"); 
     
    if($envia){ 

		print "<SCRIPT> alert('Pedido de cotação enviado com sucesso!'); window.location='cotacao.php'; </SCRIPT>";
		
        	}
			else
				{ print "<SCRIPT> alert('Erro ao enviar cotação, tente novamente!'); window.history.go(-1); </SCRIPT>"; }
			 
         
    }else{ 
	
?> 

<html>
<head>
<title>Pedido</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
BODY {
background-color: white;
font-family: Arial, Helvetica, sans-serif;;
font-size: 15px;
color: black;
scrollbar-face-color:#e2e2e2; 
scrollbar-shadow-color: #cccccc; 
scrollbar-highlight-color: #ffffff; 
scrollbar-3dlight-color: #E2E2E2; 
scrollbar-darkshadow-color: #666666; 
scrollbar-track-color:#efefef; 
scrollbar-arrow-color: #666666;
margin-left: 0px;
margin-top: 0px;
margin-right: 0px;
margin-bottom: 0px;
}
.bg {
	background-color: #FFFFFF;
	background-image:  url(img/bg.jpg);
	background-repeat: repeat-x;
}
.distancia_1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	padding-top: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 10px;
	text-align: justify;
}
.box_recomende {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}

.recomende_bt {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	background-color: #FFFFFF;
}
A.link1 {
	FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
}
A.link1:hover {
	FONT-SIZE: 12px; COLOR: #333333; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: underline
}
A.link1:visited {
	FONT-SIZE: 12px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif
}
.borda {
	border: 1px solid #999999;
}
.minifoto {
	border: 1px solid #666666;
}

</style>

<script>
	function Valida(){
		
		if(Formulario.nome.value == ""){
			alert("Informe seu nome por gentileza.");
			Formulario.nome.focus();return false;
			}

		if(Formulario.empresa.value == ""){
			alert("Informe o nome de sua empresa por gentileza.");
			Formulario.empresa.focus();return false;
			}

		if(Formulario.endereco.value == ""){
			alert("Informe o endereco por gentileza.");
			Formulario.endereco.focus();return false;
			}

		if(Formulario.fone.value == ""){
			alert("Informe o número de seu telefone por gentileza.");
			Formulario.fone.focus();return false;
			}

		if(Formulario.bairro.value == ""){
			alert("Informe o bairro por gentileza.");
			Formulario.bairro.focus();return false;
			}

		if(Formulario.cidade.value == ""){
			alert("Informe sua cidade por gentileza.");
			Formulario.cidade.focus();return false;
			}

		if(Formulario.estado.value == ""){
			alert("Informe seu estado por gentileza.");
			Formulario.estado.focus();return false;
			}

		if(Formulario.email.value == ""){
			alert("Informe seu E-mail por gentileza.");
			Formulario.email.focus();return false;
			}


}
</script>

<link rel="stylesheet" href="scripts/padrao.css"  type="text/css"  media="screen">
<script language="JavaScript" src="scripts/scripts.js"></script>
<script language="JavaScript" src="scripts/overlib.js"></script>
<script language="javascript" src="scripts/lytebox.js"></script>


</head>


<body background="../img/bkcot.jpg" topmargin="0" leftmargin="0" rightmargin="0">

 <form name="Formulario" method="post" action="cotacao.php" onSubmit="return Valida();">
 
            <br>
<table width="683" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="10" bgcolor="#02602C"></td>
    <td width="663">
	<table width="663" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" bgcolor="#02602C" class="box_recomende" align="center"><strong><font color="#FFFFFF">COTAÇÃO - Para solicitar a cotação preencha corretamente os campos "DADOS DO CLIENTE"<br>e nos itens preencha somente as quantidades dos itens que deseja cotar.</font></strong></td>
  </tr>
</table>

	<table width="663" border="0" cellspacing="0" cellpadding="0" bgcolor="#EAFFEB" align="center">
  <tr>
            <td width="150"><img src="img/logo.jpg" width="150" height="84"></td>
    <td align="center" valign="middle"><font color=#000000 size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>INDÚSTRIA DE LUMINÁRIAS MAEL</strong><BR><BR>
Rua Zulmir Longhi, 325 - Centro Industrial Amilton Arruda<br>
Toledo - Paraná - CEP 85903-180<br>
Fones: (45) 3054-1418 &nbsp;&nbsp;&nbsp; (45) 3054-1419	
	</font>
	</td>
   
  </tr>
</table>
<table width="663" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="20" bgcolor="#02602C" class="box_recomende" align="center"><strong><font color="#FFFFFF">DADOS DO CLIENTE</font></strong></td>
   </tr>
</table>

<table width="663" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="center" height="20" bgcolor="#eaffeb" valign="middle">
	
						<font face="Verdana, Arial, Helvetica, sans-serif" size="-2" color="#FF0000">

			
					
					</font></div>

</td>
  </tr>
</table>

	<table width="663" border="0" cellspacing="0" cellpadding="0" class="box_recomende" bgcolor="#eaffeb" align="center">
 	 <tr>
      <td width="10" height="23"></td>
<td width="59" align="left">Nome:</td>
<td width="240" align="left"><input name="nome" size="41" class="box_recomende" style="color: #000000; background-color: #FFFFFF; border: 1 solid #000000"></td>
<td width="57" align="left">Empresa:</td>
<td align="right"><input name="empresa" size="50" class="box_recomende" style="color: #000000; background-color: #FFFFFF; border: 1 solid #000000" align="right"></td>

<td width="10"></td>
 	 </tr>
	</table>

	<table width="663" border="0" cellspacing="0" cellpadding="0" class="box_recomende" bgcolor="#eaffeb" align="center">
	 <tr>
	   <td width="10" height="20"></td>
 	   <td width="59" align="left">Endereço:</td>
	   <td align="left"><input name="endereco" size="69" class="box_recomende" style="color: #000000; background-color: #FFFFFF; border: 1 solid #000000"></td>
       <td align="right">Fone:</td>  
 	   <td align="right"><input name="fone" size="20" class="box_recomende" style="color: #000000; background-color: #FFFFFF; border: 1 solid #000000"></td>
       <td width="10"></td>	   
 	 </tr>
	</table>

	<table width="663" border="0" cellspacing="0" cellpadding="0" class="box_recomende" align="center" bgcolor="#eaffeb">
 	 <tr>
       <td width="10" height="20"></td>
	   <td width="59" align="left">Bairro:</td>
 	   <td><input name="bairro" size="41" class="box_recomende" style="color: #000000; background-color: #FFFFFF; border: 1 solid #000000"></td>
       <td width="60">&nbsp;&nbsp;Cidade:</td>  
 	   <td align="left"><input name="cidade" size="37" class="box_recomende" style="color: #000000; background-color: #FFFFFF; border: 1 solid #000000"></td>
	   <td align="left" width="50">Estado:&nbsp;</td>  
 	   <td align="right"><input name="estado" size="3" maxlength="2" class="box_recomende" style="color: #000000; background-color: #FFFFFF; border: 1 solid #000000" align="right"></td>
	   <td width="10"></td>
 	 </tr>
	</table>

	<table width="663" border="0" cellspacing="0" cellpadding="0" class="box_recomende" align="center" bgcolor="#eaffeb">
 	 <tr>
       <td width="10" height="20"></td>	 
 	   <td width="59" align="left">CNPJ:</td>
 	   
      <td width="250"><input name="cnpj" size="41" maxlength="18" class="box_recomende" style="color: #000000; background-color: #FFFFFF; border: 1 solid #000000"></td>
       
      <td width="115" align="right">E-mail: </td>  
 	   <td align="right" width="202"><input name="email" size="35" class="box_recomende" style="color: #000000; background-color: #FFFFFF; border: 1 solid #000000"></td>
       <td width="10"></td>	   
 	 </tr>
	</table>

	<table width="663" border="0" cellspacing="0" cellpadding="0" class="box_recomende" align="center" bgcolor="#eaffeb">
 	 <tr>
       <td width="10" height="20"></td>	   	 	 
 	   <td width="59">Obs.:</td>
 	   <td width="567">
	   <textarea name="obs" cols="110" rows="3" class="box_recomende" style="color: #000000; background-color: #FFFFFF; border: 1 solid #000000"></textarea>
	   </td>
       <td width="10"></td>	   	 	   
 	 </tr>
	</table>
	<table width="663" border="0" cellspacing="0" cellpadding="0" class="box_recomende" align="center" bgcolor="#eaffeb">
 	 <tr>
       <td width="10" height="20"></td>
	 </tr>
	 </table>  
	
<table width="663" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="2" bgcolor="#02602C"></td>
  </tr>
</table>

<?php
	
   $conexao = mysql_connect("$host", "$user", "$pass");
    mysql_select_db("$db", $conexao);



/////////////////////
/////////////////////
/////////////////////

   $consultac = "SELECT * FROM `tb_categorias` ORDER BY cp_id ASC";
   $resultadoc = mysql_query($consultac, $conexao);
   
   $i = "0";
   
while ($linhac = mysql_fetch_row($resultadoc)) {

print ("
<table width=\"663\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"branco16b\" align=\"center\">
	<tr bgcolor=\"#02602C\"> 
		<td align=\"center\" height=\"40\"><strong><font color=\"#FFFFFF\">$linhac[1]</font></strong></td>
	</tr>
</table>
");

/////////////////////
/////////////////////
/////////////////////

   
   $consulta = "SELECT * FROM `tb_produtos` WHERE cp_categoria = '$linhac[1]' and cp_id <> '24' ORDER BY cp_titulo ASC";
   $resultado = mysql_query($consulta, $conexao);
   
   $i = "0";
   
while ($linha = mysql_fetch_row($resultado)) {

print("
<table width=\"663\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"box_recomende\" bgcolor=\"#FFFFFF\">
  <tr>
    <td width=\"300\"><a href=\"admin/upload_imagens/$linha[1]\" rel=\"lytebox[vacation]\" title=\"$linha[3]<br>$linha[5]\" onMouseOver=\"return overlib('Ampliar imagem',CAPTION,'')\" onMouseOut=\"return nd()\"><img src=\"admin/upload_imagens/$linha[2]\" width=\"300\" border=\"0\"></a></td>
    <td width=\"15\"></td>
	<td valign=\"top\">
	<br><strong>$linha[3]<br></strong>$linha[5]
	<br><font color=\"#999999\">------------------------------------------------------------------</font>");

if ($linha[15] == "sim"){ //aletas
print("<br><strong>Aleta:</strong> &nbsp;&nbsp; <input type=\"radio\" name=\"tp_aletas$linha[0]\" value=\"Aleta Plana\">  Plana  &nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"tp_aletas$linha[0]\" value=\"Aleta Parabólica\"> Parabólica
<br><font color=\"#999999\">------------------------------------------------------------------</font>");
}

if ($linha[16] == "sim"){ //cor branco ou preto
print("<br><strong>Cor:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"tp_cor$linha[0]\" value=\"Branco\"> Branco  &nbsp;&nbsp;&nbsp;
 <input type=\"radio\" name=\"tp_cor$linha[0]\" value=\"Preto\"> Preto
 <br><font color=\"#999999\">------------------------------------------------------------------</font>");
}

if ($linha[17] == "sim"){ //cor colorido
print("<br><strong>Cor:</strong> <input type=\"text\" size=\"15\" name=\"tp_cor$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> Digite a cor desejada.(qualquer cor)
<br><font color=\"#999999\">------------------------------------------------------------------</font>");
}
	
if (($linha[18] == "sim") and ($linha[19] == "sim") and ($linha[20] == "nao")){ //cor branco ou preto
print("<br><input type=\"radio\" name=\"tp_compo$linha[0]\" value=\"Só Luminária\"> Só Luminária  &nbsp;&nbsp;&nbsp;
 <input type=\"radio\" name=\"tp_compo$linha[0]\" value=\"Luminária+Lamp\"> Luminária + Lâmpada
<br><font color=\"#999999\">------------------------------------------------------------------</font>");
}

if (($linha[18] == "sim") and ($linha[19] == "sim") and ($linha[20] == "sim")){ //cor branco ou preto
print("<br><input type=\"radio\" name=\"tp_compo$linha[0]\" value=\"Só Luminária\"> Só Luminária  &nbsp;&nbsp;&nbsp;
 <input type=\"radio\" name=\"tp_compo$linha[0]\" value=\"Luminária+Lamp+Reat\"> Luminária + Lâmpada + Reator
<br><font color=\"#999999\">------------------------------------------------------------------</font>");
}


if ($linha[3] <> "REATOR ELETRÔNICO"){ //quantidade para todos - reator
	print(" 
<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"qtd$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\">
<br><font color=\"#999999\">------------------------------------------------------------------</font>");
}


if ($linha[3] == "REATOR ELETRÔNICO"){ //quantidade para os tipos de reator
print("
<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"q1td$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> 1 x 14W
<br><font color=\"#999999\">------------------------------------------------------------------</font>

<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"q2td$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> 2 x 14W
<br><font color=\"#999999\">------------------------------------------------------------------</font>

<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"q3td$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> 1 x 16W
<br><font color=\"#999999\">------------------------------------------------------------------</font>

<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"q4td$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> 2 x 16W
<br><font color=\"#999999\">------------------------------------------------------------------</font>

<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"q5td$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> 1 x 20W
<br><font color=\"#999999\">------------------------------------------------------------------</font>

<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"q6td$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> 2 x 20W
<br><font color=\"#999999\">------------------------------------------------------------------</font>

<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"q7td$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> 1 x 28W
<br><font color=\"#999999\">------------------------------------------------------------------</font>

<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"q8td$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> 2 x 28W
<br><font color=\"#999999\">------------------------------------------------------------------</font>

<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"q9td$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> 1 x 32W
<br><font color=\"#999999\">------------------------------------------------------------------</font>

<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"q10td$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> 2 x 32W
<br><font color=\"#999999\">------------------------------------------------------------------</font>

<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"q11td$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> 1 x 40W
<br><font color=\"#999999\">------------------------------------------------------------------</font>

<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"q12td$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> 2 x 40W
<br><font color=\"#999999\">------------------------------------------------------------------</font>

<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"q13td$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> 1 x 54W
<br><font color=\"#999999\">------------------------------------------------------------------</font>

<br>Qtde.: <input type=\"text\" size=\"5\" maxlength=\"5\" name=\"q14td$linha[0]\" class=\"box_recomende\" style=\"color: #000000; background-color: #FFFFFF; border: 1 solid #000000\"> 2 x 54W
<br><font color=\"#999999\">------------------------------------------------------------------</font>

");
}



	print("</td>
  </tr>
  <tr>
  	<td colspan=\"3\" height=\"5\" bgcolor=\"#02602C\"></td>
  </tr>
</table>

  ");

 
$i = $i + "1";

}

if ($i == "0"){
	printf ("<font class=\"v11b\">Nenhum dado até o momento</font>");
}

/////////////////////
/////////////////////
/////////////////////
}
/////////////////////
/////////////////////
/////////////////////

?>
	
	
	


<table width="663" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="2" bgcolor="#02602C"></td>
  </tr>
</table>

<table width="663" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#eaffeb">
                        <tr>
						<td width="130"></td>
                          <td width="196"><br>
        <input name="enviar" type="submit" class="box_recomende" id="enviar2" value="enviar" style="color: #000000; background-color: #FFFFFF; border: 1 solid #000000"> 
        &nbsp;&nbsp;&nbsp; 
        <input name="limpar" type="reset" class="box_recomende" id="limpar" value="limpar" style="color: #000000; background-color: #FFFFFF; border: 1 solid #000000"><br><br>
                          
						  <font color=#000000 size="1" face="Verdana, Arial, Helvetica, sans-serif">
                            <input type="hidden" name="send" value="true">
                            <input type="hidden" name="IP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
						  </font>
						  
                          </td>
                        </tr>
        </table>
<table width="663" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10" bgcolor="#02602C"></td>
  </tr>
</table>	
	</td>
    <td width="10" bgcolor="#02602C"></td>
  </tr>
</table>

 </form>

</body>
</html><?php } // Termina o Script // ?>