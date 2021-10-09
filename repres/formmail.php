<?php
/******************************
 * FormMail v1.0
 * by Calvin
 * data: 2002-12-05
 ******************************/

/*  Domínios ou IPS de sitess que vc autoriza enviar dados para este script
    Para habilitar esse recurso, retire o comentário (as duas barras do começo da linha: // )
    e edite os domínios permitidos  */

//$referencia_formulario = array ('localhost','dominio.com.br','www.dominio.com.br','200.10.145.194');

/* Não alterar se vc não tem idéia do que é CSV
adiciona uma formatação estilo CSV para os dados do formulário */
$CFG = array(
'csv_style' => 0,         // Utilizar esquema CSV? 0=não e 1=sim
'csv_delimiter' => '	' // Qual o delimitador entre os campos (TAB é a melhor opção)
);

/* Textos que aparecem no programa */
$txt_msg = array(
0 => 'O formulário não foi enviado pelas seguintes razões:<p>',
1 => '<a href="javascript:history.back()"><strong>&laquo; voltar</strong></a>.<p>',
2 => 'Você está utilizando um endereço de email banido do sistema',
3 => 'Você está enviando o formulário de uma origem <b>não autorizado</b>',
4 => '<b>Precisa de um email de destinatário válido para continuar</b>',
5 => 'Faltando',
6 => 'Seu <b>endereço de email</b> é invalido',
7 => 'Dados do Formulário',
8 => 'Obrigado por enviar o formulário',
9 => 'Formulário: Erro',
10 => 'Formulário: Enviado'
);

// controle interno
$versao = '1.0';
/* ############################################################################################# */
function pagina_cabecalho($title){
	global $txt_msg;
	
   	$bgcolor = "#FFFFFF";
	$text_color = "#000000";
	$link_color = "#0000FF";
	$vlink_color = "#FF0000";
	$alink_color = "#000088";
	$background = '';
	echo "<html><head><title>$title</title><link href='http://www.imatol.com.br/padrao.css' rel='stylesheet' type='text/css'></head>\n";
	$background = !empty($background) ? "background='$background'" : '';
	echo "<body bgcolor='$bgcolor' text='$text_color' link='$link_color' vlink='$vlink_color' alink='$alink_color' $background>\n\n";
}
function imprimir_erro($razao,$tipo = 0) {
	global $txt_msg;
	
	echo pagina_cabecalho($txt_msg['9']);
	if ($tipo=='falta'){
	   	echo $txt_msg['0'];
		echo '<ul><b>' . $razao. '</b></ul>';
		echo $txt_msg['1'];
	}else{ // every other error
     	echo $txt_msg['0'];
	}	
	echo "<br><br>\n</body></html>";
	exit;
}

function verificar_referencia($referencia_formulario) {
	global $txt_msg;
	if(count($referencia_formulario))
	{
		$encontrado = false;
		$temp = explode('/',getenv('HTTP_REFERER'));
		$referencia = $temp[2];
		for($x=0; $x<count($referencia_formulario); $x++)
		{
			if(eregi($referencia_formulario[$x], $referencia))
			{
				$encontrado = true;
			}
		}
		if(!getenv('HTTP_REFERER'))
			$encontrado = false;
		if(!$encontrado)
		{
			imprimir_erro($txt_msg['3']);
			error_log("[FormMail.php] Referência Ilegal. (".getenv("HTTP_REFERER").")", 0);
		}
		return $encontrado;
    }else{
		return true;
	}
}

function capturar_campos($array) {
	global $txt_msg,$CFG,$csv_header;
	$campos_reservados[] = 'destinatario';
	$campos_reservados[] = 'obrigatorio';
	$campos_reservados[] = 'assunto';
	$campos_reservados[] = 'campos_faltando_redirecionar';
	$campos_reservados[] = 'redirecionar';
	if (count($array))
	{
		while (list($key, $val) = each($array))
		{
			$reservado_violado = 0;
			for ($i=0; $i<count($campos_reservados); $i++)
			{
				if ($key == $campos_reservados[$i])
				{
					$reservado_violado = 1;
				}
			}
			if ($reservado_violado != 1)
			{
				if (is_array($val))
				{
					for ($z=0;$z<count($val);$z++)
					{
						$csv_header .= ($CFG['csv_style']==1)? $key.$CFG['csv_delimiter'] : '';
						$conteudo .= ($CFG['csv_style']==1)? $val[$z].$CFG['csv_delimiter'] : "$key: $val[$z]\r\n";
					}
				}else{
					$csv_header .= ($CFG['csv_style']==1)? $key.$CFG['csv_delimiter'] : '';
					$conteudo .= ($CFG['csv_style']==1)? $val.$CFG['csv_delimiter'] : "$key: $val\r\n";
				}
			}
		}
	}
	return $conteudo;
}
function mail_it($destinatario_email, $assunto, $corpo, $remetente_email) {

		$header  = !empty($remetente_email)? "From: $remetente_email\r\n" : '';
		$header .= !empty($remetente_email)? "Reply-To: $remetente_email\r\n" : '';
		$header .= "X-Mailer: PHP mail ver".phpversion()."\r\n";
        mail($destinatario_email, $assunto, $corpo,$header);
}
/* ############################################################################################# */
error_reporting(E_ERROR | E_WARNING | E_PARSE);

if(!empty($HTTP_GET_VARS)) {
	while(list($xxxname, $value) = each($HTTP_GET_VARS)) {
		$$xxxname = $value;
    }
}
if(!empty($HTTP_POST_VARS)){
	while(list($xxxname, $value) = each($HTTP_POST_VARS)) {
		$$xxxname = $value;
	}
}
if(!empty($HTTP_POST_FILES)) {
	while(list($xxxname, $value) = each($HTTP_POST_FILES)) {
    	$$xxxname = $value['tmp_name'];
    }
}
/* ############################################################################################# */
if(!empty($referencia_formulario))
{
	verificar_referencia($referencia_formulario);
}
/* ############################################################################################# */

$destinatario_array = split(',',$destinatario);
for($i=0; $i<count($destinatario_array); $i++)
{
	$destinatario_testar = trim($destinatario_array[$i]);
	if(!eregi("^[_\\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\\.)+[a-z]{2,4}$", $destinatario_testar))
	{
		imprimir_erro($txt_msg['4']);
	}
}
if(!empty($obrigatorio))
{
	$campos_requeridos = $obrigatorio;
}
if(!empty($campos_requeridos))
{
	$campos_requeridos = split(',',$campos_requeridos);
	for($i=0; $i<count($campos_requeridos); $i++)
	{
		$key_campo = trim($campos_requeridos[$i]);
		if(empty($$key_campo))
		{
			if(!empty($campos_faltando_redirecionar))
			{
				header ("Location: $campos_faltando_redirecionar");
				exit;
			}
			$campos_faltando_lista .= "<b>" . $txt_msg['5'] . ": $campos_requeridos[$i]</b><br>\n";
		}
		$val_campo = '';
	}
	if ($campos_faltando_lista)
	{
		imprimir_erro($campos_faltando_lista,'falta');
	}
}
if(empty($assunto))
{
	$assunto = $txt_msg['7'];
}
if(!empty($email) || !empty($EMAIL))
{
	$email = trim($email);
	if ($EMAIL)
		$email = trim($EMAIL);
	if (!eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,4}$", $email))
	{
		imprimir_erro($txt_msg['6']);
	}
	$EMAIL = $email;
}
$conteudo = capturar_campos($HTTP_POST_VARS);
$conteudo = $CFG['csv_style']==1 ? "\n\n".$csv_header."\n".$conteudo."\n" : $conteudo;
mail_it($destinatario, stripslashes($assunto), stripslashes($conteudo), $email );

if(!empty($redirecionar))
{
	header ("Location: $redirecionar");
	exit;
}else{
	pagina_cabecalho($txt_msg['10']);
	print $txt_msg['8'];
	echo "<br><br>\n</body></html>";
	exit;
}

?>