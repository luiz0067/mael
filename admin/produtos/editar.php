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

<body topmargin="0" leftmargin="0" rightmargin="0">

<?php
require("../../scripts/conexao.inc.php"); //arquivo incluido que contem todas as variaveis necessarias para conexao com o MYSQL
require("../../scripts/funcao.php"); //arquivo que contem algumas funcoes basicas

conexao_mysql($host,$user,$pass,$db); //funcao para conexao com o MYSQL
?>

<?php include "../topo_base_menu/topo.php"; ?>

<table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#666666">
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
   
$sql = "SELECT * FROM `tb_produtos` WHERE cp_id=$id";
   $resultado = mysql_query($sql, $conexao);
   $linha = mysql_fetch_row($resultado);


// DF1 - Deleta Foto 1 no diretorio


if(($form_img1 != "") or ($form_del_img1 != ""))
{

$uploaddir = '../upload_imagens/';

if($linha[1] != ""){if(isset($linha[1])){if(!unlink($uploaddir . $linha[1])){
print("Error!! O arquivo não pode ser deletado do seu diretório devido a não ter permissões.");
}

if($linha[2] != ""){if(isset($linha[2])){if(!unlink($uploaddir . $linha[2])){
print("Error!! O arquivo não pode ser deletado do seu diretório devido a não ter permissões.");

}}}}}}

/////////////////////////


if(isset($envia)){


//F1
if ($form_img1 != ""){
$uploaddir = '../upload_imagens/';
 
$renomear = md5(uniqid(rand(), true)); // nome aleatorio
$uploaddir . $_FILES['form_img1']['name'] = ($renomear . ".jpg"); // cria nome da imagem
 

if(move_uploaded_file(
 
$_FILES['form_img1']['tmp_name'], $uploaddir . $_FILES['form_img1']['name']
 
)){$form_img1 = $_FILES['form_img1']['name'];
}
 

$pic = $uploaddir . $_FILES['form_img1']['name'];
 $width = 700; // Tamanho Máximo
 $im    = imagecreatefromjpeg($pic);
   $orange = imagecolorallocate($im, 220, 210, 60);
   $px    = (imagesx($im) - 7.5 * strlen($string)) / 2;
 
   $old_x=imageSX($im);
   $old_y=imageSY($im);
 
   $new_w=(int)($width);
   
   if ($new_w>$old_x) {
   
     $new_w=$old_x;
   }
 
/*
Pode ser usado um tamanho fixo de altura para o redimensionamento.
Para isto, utilize:
   $new_h = 200;
*/
   $new_h=($old_y*($new_w/$old_x));
 
  
       $thumb_w=$new_w;
       $thumb_h=$new_h;
	   
 
     $thumb=ImageCreateTrueColor($thumb_w,$thumb_h);
     imagecopyresampled($thumb,$im,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);
 

   imagejpeg($thumb,"$pic",95); 

/////////////////////////////////////////////////////


// Início do redimensionamento para a imagem thumbs.
$pic2 = $uploaddir . $_FILES['form_img1']['name'];
 $width2 = 300; // Tamanho Máximo
 $im2    = imagecreatefromjpeg($pic2);
   $orange2 = imagecolorallocate($im2, 220, 210, 60);
   $px2    = (imagesx($im2) - 7.5 * strlen($string2)) / 2;
 
   $old_x2=imageSX($im2);
   $old_y2=imageSY($im2);
 
   $new_w2=(int)($width2);
   
   if ($new_w2>$old_x2) {
     $new_w2=$old_x2;
   }
 
   $new_h2=($old_y2*($new_w2/$old_x2));
   

       $thumb_w2=$new_w2;
       $thumb_h2=$new_h2;
 
 
     $thumb2=ImageCreateTrueColor($thumb_w2,$thumb_h2);
     imagecopyresampled($thumb2,$im2,0,0,0,0,$thumb_w2,$thumb_h2,$old_x2,$old_y2);
 
$uploaddir . $_FILES['form_img1']['name'] = ($renomear); // cria nome da imagem
 
 imagejpeg($thumb2,$uploaddir . $_FILES['form_img1']['name'].'_p'.'.jpg',95);
 
$form_img1p = $_FILES['form_img1']['name'].'_p'.'.jpg';

}

///////////////////////////////////////////////////////////////////////////

if (($form_img1 == "") and ($form_del_img1 == "")){$img1 = $linha[1]; $img1p = $linha[2];}
if (($form_img1 != "") and ($form_del_img1 == "")){$img1 = $form_img1; $img1p = $form_img1p;}
if (($form_img1 == "") and ($form_del_img1 != "")){$img1 = ""; $img1p = "";}

$sql = "UPDATE tb_produtos SET
        cp_img1='$img1',
        cp_img1p='$img1p',
        cp_titulo='$form_titulo',
        cp_subtitulo='$form_subtitulo',
        cp_texto='$form_texto',
        cp_at='$form_at',		
        cp_ct='$form_ct',		
        cp_lt='$form_lt',		
        cp_cn='$form_cn',		
		cp_ln='$form_ln',
		cp_categoria='$form_categoria',
		cp_cod='$form_cod',
		cp_dt='$form_dt',
		cp_dn='$form_dn',
		cp_aletas='$form_aletas',
		cp_brancopreto='$form_brancopreto',
		cp_colorido='$form_colorido',
		cp_solumi='$form_solumi',
		cp_lampada='$form_lampada',
		cp_reator='$form_reator'		
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
$sql = "SELECT * FROM `tb_produtos` WHERE cp_id=$editar";
/*"SELECT diretorio, largura, altura, produto, conteudo FROM ofertas WHERE ID=$editar";*/
$resultado = mysql_query($sql);
while($row = mysql_fetch_row($resultado)){

$cp_img1 = $row[1];
$cp_img1p = $row[2];
$cp_titulo = $row[3];
$cp_texto = $row[4];
$cp_subtitulo = $row[5];
$cp_at = $row[6];
$cp_ct = $row[7];
$cp_lt = $row[8];
$cp_cn = $row[9];
$cp_ln = $row[10];
$cp_categoria = $row[11];
$cp_cod = $row[12];
$cp_dt = $row[13];
$cp_dn = $row[14];
$cp_aletas = $row[15];
$cp_brancopreto = $row[16];
$cp_colorido = $row[17];
$cp_solumi = $row[18];
$cp_lampada = $row[19];
$cp_reator = $row[20];

?>

        <form action="<?=$_SERVER['PHP_SELF'] ?>?acao=editar" method="post" enctype="multipart/form-data" name="form1">
	<input type="hidden" name="id" value="<? print($id); ?>">
	<table border="0" cellpadding="0" cellspacing="0" class="branco10b" align="center" width="750">
        <tr> 
          <td height="30" align="center" bgcolor="#003334"><b>Alterar  Produto</b></td>
        </tr>
		<tr><td height="10"></td></tr>
		</table>
		      <table border="0" cellpadding="0" cellspacing="0" class="menu3" align="center" width="750">
	    <tr> 
          <td width="80" height="20" class="menu3"><font color="cc0000">*</font> <b>Linha:</b> </td>
		  <td width="670">
		  
	  <?php

   $conexao = mysql_connect("$host", "$user", "$pass");
    mysql_select_db("$db", $conexao);
   
   $consulta = "SELECT * FROM `tb_categorias` ORDER BY cp_nome ASC ";
   $resultado = mysql_query($consulta, $conexao);
   
   
   
   $i = "0";

print ("
<select class=\"texto\" name=\"form_categoria\" style=\"color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc\">
<option  value=\"$cp_categoria\" selected>$cp_categoria</option>
<option  value=\"\">---------</option>
");

while($linha = mysql_fetch_row($resultado)) {

print("

<option value=\"$linha[1]\">$linha[1]</option>

");

 $i = $i + "1";
}



if ($i == "0"){
	printf ("");
}



?></td>
        </tr>
				<tr>
			<td height="10" colspan="2"></td>
		</tr> 
<tr> 
          <td  height="20" class="menu3"><font color="cc0000">*</font> <b>Cód. Int.:</b> </td>
		  <td ><input type="text" class="menu3" size="20" name="form_cod" value="<?  print($cp_cod); ?>" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc">		  </td>
        </tr>

		<tr>
			<td height="10" colspan="2"></td>
		</tr> 

<tr> 
          <td  height="20" class="menu3"><font color="cc0000">*</font> <b>Nome:</b> </td>
		  <td ><input type="text" class="menu3" size="120" name="form_titulo" value="<?  print($cp_titulo); ?>" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc">		  </td>
        </tr>

		<tr>
			<td height="10" colspan="2"></td>
		</tr> 
<tr> 
          <td  height="20" class="menu3"><font color="cc0000">*</font> <b>Sub Nome:</b> </td>
		  <td ><input type="text" class="menu3" size="120" name="form_subtitulo" value="<?  print($cp_subtitulo); ?>" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc">		  </td>
        </tr>
		<tr>
			<td height="10" colspan="2"></td>
		</tr> 

        <tr> 
          <td  height="20" valign="top" class="menu3"><font color="cc0000">*</font> <b>Descrição:</b> </td>
		  <td  valign="top">
<textarea name="form_texto" cols="120" rows="20" class="menu" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc"><?php print ("$cp_texto");?></textarea>		  </td>
        </tr>
		<tr>
			<td height="10" colspan="2"></td>
		</tr> 		
<td height="20" class="menu" colspan="2">
<font color="ffffff">*</font> <b>Altura Total:</b> <input type="text" class="menu3" size="10" name="form_at" value="<?  print($cp_at); ?>" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc"> &nbsp;&nbsp;&nbsp;&nbsp; 
<font color="ffffff">*</font> <b>Comprimento Total:</b> <input type="text" class="menu3" size="10" name="form_ct" value="<?  print($cp_ct); ?>" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc"> &nbsp;&nbsp;&nbsp;&nbsp; 
<font color="ffffff">*</font> <b>Largura Total:</b> <input type="text" class="menu3" size="10" name="form_lt" value="<?  print($cp_lt); ?>" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc">&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
		<tr>
			<td height="10" colspan="2"></td>
		</tr> 

<tr> 
          <td height="20" class="menu" colspan="2">
<font color="ffffff">*</font> <b>Comprimento Nicho:</b>
<input type="text" class="menu3" size="10" name="form_cn" value="<?  print($cp_cn); ?>" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc">&nbsp;&nbsp;&nbsp;&nbsp; 
<font color="ffffff">*</font> <b>Largura Nicho:</b> <input type="text" class="menu3" size="10" name="form_ln" value="<?  print($cp_ln); ?>" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc">&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
		<tr>
			<td height="10" colspan="2"></td>
		</tr>
<tr> 
          <td height="20" class="menu" colspan="2">
<font color="ffffff">*</font> <b>Diametro Total:</b>
<input type="text" class="menu3" size="10" name="form_dt" value="<?  print($cp_dt); ?>" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc">&nbsp;&nbsp;&nbsp;&nbsp; 
<font color="ffffff">*</font> <b>Diamatro Nicho:</b> <input type="text" class="menu3" size="10" name="form_dn" value="<?  print($cp_dn); ?>" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc">&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
		<tr>
			<td height="20" colspan="2"></td>
		</tr> 
		<tr>
			<td height="1" colspan="2" bgcolor="#666666"></td>
		</tr> 
		<tr>
			<td height="20" colspan="2"></td>
		</tr> 
<tr> 
          <td height="20" class="menu" colspan="2">
<font color="ffffff">*</font> <strong>Aletas</strong> <select class="menu" name="form_aletas" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666">
					  <option class="menu2" value="<?  print($cp_aletas); ?>" selected="selected"><?  print($cp_aletas); ?></option>
                      <option class="menu2" value="sim">sim</option>					
                      <option class="menu2" value="nao">nao</option>					
                    </select> &nbsp;&nbsp;&nbsp;

<font color="ffffff">*</font> <strong>Branco/Preto</strong> <select class="menu" name="form_brancopreto" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666">
					  <option class="menu2" value="<?  print($cp_brancopreto); ?>" selected="selected"><?  print($cp_brancopreto); ?></option>
                      <option class="menu2" value="sim">sim</option>					
                      <option class="menu2" value="nao">nao</option>					
                    </select> &nbsp;&nbsp;&nbsp;

<font color="ffffff">*</font> <strong>Colorido</strong> <select class="menu" name="form_colorido" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666">
					  <option class="menu2" value="<?  print($cp_colorido); ?>" selected="selected"><?  print($cp_colorido); ?></option>
                      <option class="menu2" value="sim">sim</option>					
                      <option class="menu2" value="nao">nao</option>					
                    </select> &nbsp;&nbsp;&nbsp;&nbsp; 

</td>
        </tr>
		<tr>
			<td height="10" colspan="2"></td>
		</tr> 
<tr> 
          <td height="20" class="menu" colspan="2">
<font color="ffffff">*</font> <strong>Só Luminária</strong> <select class="menu" name="form_solumi" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666">
					  <option class="menu2" value="<?  print($cp_solumi); ?>" selected="selected"><?  print($cp_solumi); ?></option>
                      <option class="menu2" value="sim">sim</option>					
                      <option class="menu2" value="nao">nao</option>					
                    </select> &nbsp;&nbsp;&nbsp;

<font color="ffffff">*</font> <strong>Lampada</strong> <select class="menu" name="form_lampada" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666">
					  <option class="menu2" value="<?  print($cp_lampada); ?>" selected="selected"><?  print($cp_lampada); ?></option>
                      <option class="menu2" value="sim">sim</option>					
                      <option class="menu2" value="nao">nao</option>					
                    </select> &nbsp;&nbsp;&nbsp;

<font color="ffffff">*</font> <strong>Reator</strong> <select class="menu" name="form_reator" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #666666">
					  <option class="menu2" value="<?  print($cp_reator); ?>" selected="selected"><?  print($cp_reator); ?></option>
                      <option class="menu2" value="sim">sim</option>					
                      <option class="menu2" value="nao">nao</option>					
                    </select> &nbsp;&nbsp;&nbsp;&nbsp; 

</td>
        </tr>
		
		<tr>
			<td height="10" colspan="2"></td>
		</tr>
		<tr>
					<td height="9" background="../img/point.jpg" colspan="2"></td>
		</tr>		
		<tr>
			<td height="10"colspan="2"></td>
		</tr>		


        <tr> 
          <td  height="20" class="menu3"><font color="ff0000">&nbsp;&nbsp;</font><b>Imagem:</b> </td>
		  <td >
		  
<table  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100" align="center">	 

	   <?php 
	   if($cp_img1 == "")
	   { print("<img src='../img/tosemp.jpg' border='0' align='left'>"); } 

	   else 
{ ?> <?php print("<img align='left' src='../upload_imagens/$cp_img1p' onMouseOver=\"return overlib('<img src=\'../upload_imagens/$cp_img1\'>',CAPTION,'Imagem 1')\" onMouseOut=\"return nd()\">"); } ?></td>
    <td class="menu3">
<?php 
	   if($cp_img1 != "")
	   {
	   print("
	  	   
				<input type=\"checkbox\" name=\"form_del_img1\" onClick=\"desabilita_img1();\"> <strong>Excluir imagem</strong> <img src=\"../img/w.jpg\" onMouseOver=\"return overlib('Deixe esta opção marcada se deseja excluir a imagem ao lado e desmarque-a para adicionar uma nova imagem no campo abaixo.',CAPTION,'')\" onMouseOut=\"return nd()\"><br><br>
		
		
		");
		}else{
		print("");
		}
	?>		
	
			  <!-- Limitar tamanho em mega do arquivo <input type="hidden" name="MAX_FILE_SIZE" value="8000000"> --><input type="file" class="menu3" maxlenght="250" size="30" name="form_img1" value="" style="color: #cc0000; background-color: #FFFFFF; border: 1 solid #cccccc"> <img src="../img/w.jpg" onMouseOver="return overlib('Se deixar esse campo sem preenchimento, permanecerá a imagem atual ao lado. Obs.: Somente Imagens JPEG',CAPTION,'')" onMouseOut="return nd()">	</td>
  </tr>
</table></td>
        </tr>
		

		<tr>
			<td height="10"colspan="2"></td>
		</tr>		
		<tr>
			<td height="9" background="../img/point.jpg" colspan="2"></td>
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