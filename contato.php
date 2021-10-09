<?php 

if(@$_POST['send'] == "true"){ // Se o form nao for preenchido ele nao ira enviar o email>>>

	$em1 = $_POST['e1'];
	$em2 = $_POST['e2'];

	$destinatario = "$em1,$em2"; // Aqui voce coloca o E-MAIL para onde sera enviado o EMAIL>>>>>>>>>
	$assunto = "Contato - Site Mael";		// Aqui voce coloca o ASSUNTO do email>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	
	
    $nome = $_POST['nome']; 
    $empresa = $_POST['empresa']; 
    $endereco = $_POST['endereco']; 
    $cidade = $_POST['cidade']; 
    $estado = $_POST['estado']; 
    $telefone = $_POST['telefone']; 
    $email = $_POST['email']; 
    $mensagem = $_POST['mensagem']; 						

// $mensagem = htmlspecialchars($mensagem); // Isso aqui é pra Desabilitar Tag's HTML (Muito Util)
	
	$IP = $_POST['IP']; 
    $headers  = "Content-Type: text/html; charset=iso-8859-1\n"; 
    $headers .= "From: $email";
	
	$verde = "<font size=\"-1\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#000000\">";
	$bordo = "<font size=\"-1\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#cc0000\">";
	$cinza = "<font size=\"-1\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#999999\">";
	
	$msg  = "<table width='600' border='0' cellspacing='0' cellpadding='0' align='left' style='border-collapse: collapse; border-top-width:0' bordercolor='#cccccc'>
 <tr>
    <td width='600' colspan='3'>
<hr width='600' color='#006633'>
<strong>$verde </font> $bordo Dados do internauta:</font></strong>
<br><br>

<table width='600' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='100' align='right' height='20'>$verde Nome:</font>&nbsp;</td>
    <td align='left' width='500'>$bordo $nome</font></td>
  </tr>
  <tr>
    <td width='100' align='right' height='20'>$verde Empresa:</font>&nbsp;</td>
    <td align='left' width='500'>$bordo $empresa</font></td>
  </tr>
  <tr>
    <td align='right' height='20'>$verde E-mail:</font>&nbsp;</td>
    <td align='left'> <a href='mailto:$email'>$bordo $email</font></a></td>
  </tr>
  <tr>
    <td align='right' height='20'>$verde Endereço:</font>&nbsp;</td>
    <td align='left'>$bordo $endereco - $cidade - $estado</font></td>
  </tr>
  <tr>
    <td align='right' height='20'>$verde Telefone:</font>&nbsp;</td>
    <td align='left'>$bordo $telefone</font></td>
  </tr>
</table><br>
<strong>$verde </font> $bordo Mensagem do internauta:</font></strong>
<br><br>
<table width='600' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='100' align='right' height='20' valign='top'>$verde Mensagem:</font>&nbsp;</td>
    <td width='500' align='left'>$bordo $mensagem</font></td>
  </tr>
</table>
<br>
<hr width='600' color='#006633'>
<br>
<br></font>
</td>
 </tr>  
</table>

";
	
    $envia = mail("$destinatario", "$assunto", "$msg", "$headers"); 
     
    if($envia){ 

print "<SCRIPT> alert('E-mail enviado com sucesso!'); window.location='contato.php'; </SCRIPT>";
        	}
			else
				{ print "<SCRIPT> alert('Erro ao enviar e-mail, tente novamente!'); window.history.go(-1); </SCRIPT>"; }
			 
         
    }else{ 
?> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::.  .::</title>

<link rel="stylesheet" href="scripts/padrao.css"  type="text/css"  media="screen">
<script language="JavaScript" src="scripts/scripts.js"></script>
<script language="JavaScript" src="scripts/overlib.js"></script>
<script language="javascript" src="scripts/lytebox.js"></script>

</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginheight="0" marginwidth="0" onLoad="atualizaIframe();">
<div id="container">
<table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
  <tr>
    <td height="80" valign="bottom"><img src="img/tit_contato.jpg" width="350" height="60"></td>
  </tr>
</table>
<table width="818" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
  <tr>
    <td align="center" class="menu14">
	<table width="850" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="482">
		<form name="form1" method="post" action="contato.php" onSubmit="return Valida_faleconosco();">


<input type="hidden" name="e2" value="valmir@portaltoledo.com.br">

<table width="470" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>

		<td colspan="2" class="menu2" height="50" align="right"><font class="menu4">*</font> 	Deseja enviar sua mensagem para qual setor? <select class="menu2" name="e1" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666">
                      <option class="menu2" value="" selected="selected"></option>					
                      <option class="menu2" value="financeiro@maelluminarias.com.br">Financeiro</option>					
                      <option class="menu2" value="vendas1@maelluminarias.com.br">Televendas Santa Catarina</option>					                       <option class="menu2" value="vendas2@maelluminarias.com.br">Televendas Curitiba</option>					  
                      <option class="menu2" value="mael@maelluminarias.com.br">Central de atendimento</option>					  
                    </select> &nbsp;</td>
	</tr>
                  <tr> 
                    <td width="120" align="right" class="menu2" height="22"><font class="menu4">*</font> Nome: &nbsp;</td>
                    <td class="menu2" width="350">
<input name="nome" class="menu" size="70" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666">                      </td>
                  </tr>
                  <tr> 
                    <td align="right" class="menu2" height="22"><font color="#FFFFFF">*</font> Empresa: &nbsp;</td>
                    <td class="menu2">
<input name="empresa" class="menu" size="70" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666">                      </td>
                  </tr>
				  <tr> 
                    <td align="right" class="menu2" height="22"><font class="menu4">*</font> Endereço: &nbsp;</td>
                    <td class="menu2">
<input name="endereco" class="menu" size="70" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666">                      </td>
                  </tr>
                  <tr> 
                    <td align="right" class="menu2" height="22"><font class="menu4">*</font> Cidade: &nbsp;</td>
                    <td class="menu2">
<input name="cidade" class="menu" size="46" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666">
                      &nbsp;<font class="menu4">*</font> Estado:&nbsp;<select class="menu" name="estado" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666">
                      <option class="texto" value="" selected></option>					  
                      <option class="texto" value="AC">AC</option>
                      <option class="texto" value="AL">AL</option>
                      <option class="texto" value="AP">AP</option>
                      <option class="texto" value="AM">AM</option>
                      <option class="texto" value="BA">BA</option>
                      <option class="texto" value="CE">CE</option>
                      <option class="texto" value="DF">DF</option>
                      <option class="texto" value="ES">ES</option>
                      <option class="texto" value="GO">GO</option>
                      <option class="texto" value="MA">MA</option>
                      <option class="texto" value="MT">MT</option>
                      <option class="texto" value="MS">MS</option>
                      <option class="texto" value="MG">MG</option>
                      <option class="texto" value="PA">PA</option>
                      <option class="texto" value="PB">PB</option>
                      <option class="texto" value="PR">PR</option>
                      <option class="texto" value="PE">PE</option>
                      <option class="texto" value="PI">PI</option>
                      <option class="texto" value="RJ">RJ</option>
                      <option class="texto" value="RN">RN</option>
                      <option class="texto" value="RS">RS</option>
                      <option class="texto" value="RO">RO</option>
                      <option class="texto" value="RR">RR</option>
                      <option class="texto" value="SC">SC</option>
                      <option class="texto" value="SP">SP</option>
                      <option class="texto" value="SE">SE</option>
                      <option class="texto" value="TO">TO</option>
                    </select>                      </td>
                  </tr>
                  <tr> 
                    <td align="right" class="menu2" height="22"><font class="menu4">*</font> Telefone: &nbsp;</td>
                    <td class="menu2"> 
<input name="telefone" class="menu" size="40" onKeyPress="MascaraTelefone(form1.telefone);" maxlength="14"  style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666"></td>
                  </tr>
                  <tr> 
                    <td align="right" class="menu2" height="22"><font class="menu4">*</font> E-mail: &nbsp;</td>
                    <td class="menu2"> 
                 
<input name="email" class="menu" size="70" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666">
                      </font></td>
                  </tr>

                  <tr> 
                    <td align="right" valign="top" class="menu2"><font class="menu4">*</font> Mensagem: &nbsp;</td>
                    <td class="menu2">
<textarea name="mensagem" cols="67" rows="10" class="menu" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666"></textarea>                      </td>
                  </tr>
				  <tr>
				  	<td height="30" class="menu2" align="center"><font class="menu4">*</font> Preencimento obrigatório</td>
					<td align="center">
<input name="enviar" type="submit" class="menu" value="Enviar" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #999999">
&nbsp;
<input name="limpar" type="reset" class="menu" value="Limpar" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #999999">
<input type="hidden" name="send" value="true"></td>
				  </tr>
</table>
</form>
	



	</td>

    <td width="368" valign="top"><br>
	<table width="368" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" height="100"><img src="img/tele.jpg" width="62" height="69"></td>
    <td class="texto" align="left">
telefones:<br>
<strong><font size="2" color="#CC0000">(45) 3054-1418<br>(45) 3054-1419</font></strong>

	
	</td>
  </tr>
<!--  <tr>
    <td width="101" align="center" height="100"><img src="img/msn2.jpg" width="72" height="65"></td>
    <td width="267" class="texto" align="left">msn:<br>
<strong><font size="2" color="#CC0000">tomazellima@hotmail.com</font></strong>

	</td>
  </tr> !-->
  <tr>
    <td align="center" height="100" width="101"><img src="img/arroba.jpg" width="62" height="69"></td>
    <td class="texto" align="left" width="267">
e-mail:<br>
<a href="mailto:mael@maelluminarias.com.br " target="_blank"><strong><font size="2" color="#CC0000">vendas1@maelluminarias.com.br </font></strong></a>
	
	</td>
  </tr>
<tr>
    <td align="center" height="100" width="101"><img src="img/carta.jpg" width="70" height="70"></td>
    <td class="texto" align="left" width="267">
endereço:<br>
<strong><font size="2" color="#CC0000">Rua Zulmir Longhi, 325<br>Centro Industrial Arruda<br>
CEP 85.903-180 - Toledo - PR</font></strong>
	
	</td>
  </tr>
</table>

	</td>
  </tr>
</table>

	</td>
  </tr>
</table>
<!--<table width="800" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="320" valign="bottom" align="center" class="texto"><img src="img/telea.jpg" width="800" height="267"></td>
  </tr>
</table>!-->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="80" valign="middle" align="center" class="texto"><a href="javascript:history.back()" target="_self"><font color="#cc0000"><strong>&laquo; voltar</strong></font></a></td>
  </tr>
</table>


</div>

</body>
</html>
<?php } // Termina o Script // ?>